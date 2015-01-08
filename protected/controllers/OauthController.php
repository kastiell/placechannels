<?php

class OauthController extends Controller
{
    public $_client = null;

    public function actionCallback()
    {
        $client = $this->getClient();

        if(isset($_GET['code'])){
            $client->authenticate($_GET['code']);
            if($client->getAccessToken() != ''){
                $access_token = json_decode($client->getAccessToken())->access_token;
                $refresh_token = isset(json_decode($client->getAccessToken())->refresh_token) ? json_decode($client->getAccessToken())->refresh_token : null;

                $userinfo = $this->getAllData($access_token,$refresh_token);
                $results = $this->saveData2DB($userinfo);

                if(!$results){
                    throw new CHttpException(404,'Ошибка при сохранении данных!');
                }

                //$this->curl_execute_request('https://www.googleapis.com/youtube/analytics/v1/reports?ids=channel%3D%3DUC--i9Fptp2kkvDpDmFtltVg&start-date=2000-01-01&end-date=2020-01-01&metrics=views&dimensions=video&max-results=10&sort=-views',$access_token);
                $this->layout='empty';
                $this->render('wellBrands');
            }
        }
    }

    public function saveData2DB($userinfo){
        Yii::import('application.components.Helper');

        $r1 = User::model()->findAllByAttributes(array('email'=>$userinfo['email']));
        $r2 = Youtuber::model()->findAllByAttributes(array('channel'=>$userinfo['channel']));


        if($r2 != null){
            throw new CHttpException(404,'Такой канал уже существует!');
        }

        if(isset(Yii::app()->session['YOUTUBERS_ID_ON_REG'])&&((int)Yii::app()->session['YOUTUBERS_ID_ON_REG'])){
            //echo (int)Yii::app()->session['YOUTUBERS_ID_ON_REG'];
            $user = User::model()->findByPk((int)Yii::app()->session['YOUTUBERS_ID_ON_REG']);
            $user->password = Helper::generatePassword(16);
            $user->role = 'youtuber';
            $user->time_reg = time();
            $user->time_last_login = time();

            Yii::app()->session['YOUTUBERS_ID_ON_REG'] = null;
            unset(Yii::app()->session['YOUTUBERS_ID_ON_REG']);
        }else{

            if($r1 != null){
                throw new CHttpException(404,'Такой Email уже существует!');
            }

            $user = new User();
            $user->email = $userinfo['email'];
            $user->password = Helper::generatePassword(16);
            $user->role = 'youtuber';
            $user->phone = $userinfo['phone'];
            $user->time_reg = time();
            $user->time_last_login = time();
        }

        if($r3 = $user->save(true)){

            Yii::import('application.vendors.MixPanel.Mixpanel');
            $mp = Mixpanel::getInstance("6374fe0ab314b8bad17a35b02cb708d5");

            $mp->people->set($user->id, array(
                '$email'            => $user->email,
                '$phone'            => $user->phone,
                'role'            => $user->role
            ));


            $youtuber = new Youtuber();
            $youtuber->id = $user->id;
            $youtuber->channel = $userinfo['channel'];
            $youtuber->familyName = $userinfo['familyName'];
            $youtuber->givenName = $userinfo['givenName'];
            $youtuber->image_url = $userinfo['image_url'];
            $youtuber->language = $userinfo['language'];
            $youtuber->id_google = $userinfo['id_google'];
            $youtuber->gender = $userinfo['gender'];
            $youtuber->str_userinfo = $userinfo['str_userinfo'];
            $youtuber->access_token = $userinfo['access_token'];
            $youtuber->refresh_token = $userinfo['refresh_token'];

            if($r3&&$youtuber->save(true)){
                return true;
            }
        }
        return false;
    }

    public function getAllData($access_token,$refresh_token = null){

        $userinfo = array(
            'str_userinfo'=>$this->curl_execute_request('https://www.googleapis.com/plus/v1/people/me',$access_token) //Берем инфу о юзере
        );

        $obj_userinfo = json_decode($userinfo['str_userinfo']);
        $obj_channels = json_decode($this->curl_execute_request('https://www.googleapis.com/youtube/v3/channels?part=id&mine=true',$access_token)); //Вытягиваем id канала

        $userinfo['familyName'] = $obj_userinfo->name->familyName;
        $userinfo['givenName'] = $obj_userinfo->name->givenName;
        $userinfo['image_url'] = $obj_userinfo->image->url;
        $userinfo['language'] = $obj_userinfo->language;
        $userinfo['id_google'] = $obj_userinfo->id;
        $userinfo['gender'] = $obj_userinfo->gender;

        $userinfo['access_token'] = $access_token;
        $userinfo['refresh_token'] = $refresh_token;

        $userinfo['email'] = $obj_userinfo->emails[0]->value;
        $userinfo['channel'] = $obj_channels->items[0]->id;
        $userinfo['phone'] = Yii::app()->session['YOUTUBERS_PHONE_ON_REG'];

        return $userinfo;
    }

    public function curl_execute_request($url,$token,$developer_key = null){
        $developer_key = $developer_key == null ? Yii::app()->GoogleApi->getYouTubeAPI_developer_key() : $developer_key;
        $headers = array
        (
            'Accept: */*',
            'Accept-Language: uk,ru;q=0.8,en-US;q=0.6,en;q=0.4',
            'Accept-Encoding: gzip,deflate',
            'Accept-Charset: utf-8;q=0.7,*;q=0.7',
            'Authorization: Bearer '.$token,
            'X-GData-Key: key='.$developer_key
        );

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, true);
        $response = curl_exec($curl);
        return $response;
    }

    private function getClient(){

        if($this->_client == null){
            Yii::import('application.vendors.Google.src.*');
            require_once 'core.php';
            require_once 'Google/Client.php';

            $this->_client = new Google_Client();

            $this->_client->setAccessType('offline'); //Ставим для того что бы получить refresh_token
            $this->_client->setApprovalPrompt('force'); //Ставим для того что бы получить refresh_token
            $this->_client->setApplicationName(Yii::app()->GoogleApi->getYouTubeAPI_app_name());
            $this->_client->setClientId(Yii::app()->GoogleApi->getYouTubeAPI_client_id());
            $this->_client->setClientSecret(Yii::app()->GoogleApi->getYouTubeAPI_client_secret());
            $this->_client->setRedirectUri(Yii::app()->GoogleApi->getYouTubeAPI_redirect_uri());
            $this->_client->addScope(Yii::app()->GoogleApi->getYouTubeAPI_scope());

        }
        return $this->_client;
    }

    public function actionCreateAndFollowAuthUrl(){

        $authUrl = $this->getClient()->createAuthUrl();
        $this->redirect($authUrl);
    }
}
