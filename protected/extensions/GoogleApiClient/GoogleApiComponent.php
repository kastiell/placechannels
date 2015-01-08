<?php

class GoogleApiComponent extends CApplicationComponent
{
    public $_client;
    public $_user_id_from_db;
    public $_channel_name;
    public $_access_token;

    public $YouTubeAPI_client_id;
    public $YouTubeAPI_client_secret;
    public $YouTubeAPI_redirect_uri;
    public $YouTubeAPI_app_name;
    public $YouTubeAPI_developer_key;
    public $YouTubeAPI_scope;

    public $last_send_url;

    public function init(){
        parent::init();
    }

    public function setup($id){

        $this->_user_id_from_db = $id;
        $youtuber = Youtuber::model()->findByPk($id);

        $this->_channel_name = $youtuber->channel;
        $this->refreshToken($youtuber->refresh_token);
        $youtuber->save(true);

    }

    //Получаем текущий access_toket
    public function refreshToken($refresh_token_old){

        if($this->_access_token == null){

            Yii::import('application.vendors.Google.src.*');
            require_once 'core.php';
            require_once 'Google/Client.php';

            $this->_client = new Google_Client();

            $this->_client->setAccessType('offline'); //Ставим для того что бы получить refresh_token
            $this->_client->setApprovalPrompt('force'); //Ставим для того что бы получить refresh_token
            $this->_client->setApplicationName($this->getYouTubeAPI_app_name());
            $this->_client->setClientId($this->getYouTubeAPI_client_id());
            $this->_client->setClientSecret($this->getYouTubeAPI_client_secret());
            $this->_client->setRedirectUri($this->getYouTubeAPI_redirect_uri());
            $this->_client->addScope($this->getYouTubeAPI_scope());

            $this->_client->refreshToken($refresh_token_old); //Меняем токен
            $this->_access_token = $this->parseAccessToken($this->_client->getAccessToken()); //Парсим токен
        }
    }

    private function parseAccessToken($accessTokenStr = null){
        if($accessTokenStr != ''){
            return json_decode($accessTokenStr)->access_token;
        }
        return null;
    }

    //Базовая функция запроса
    private function execute($url){
        $token = $this->_access_token;
        $developer_key = $this->getYouTubeAPI_developer_key();
        $headers = array
        (
            'Accept: */*',
            'Accept-Language: uk,ru;q=0.8,en-US;q=0.6,en;q=0.4',
            'Accept-Encoding: gzip,deflate',
            'Accept-Charset: utf-8;q=0.7,*;q=0.7',
            'Authorization: Bearer '.$token,
            'X-GData-Key: key='.$developer_key
        );

        $this->last_send_url = $url;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, true);
        $response = curl_exec($curl);

        /*echo '<br><pre>';
        print_r($response);
        echo '</pre>';*/

        return $response;
    }

    //Прослойка для работы с report channel
    public function reportChannel($url_array = null,$key = true){
        return $this->execute(
            'https://www.googleapis.com/youtube/analytics/v1/reports?ids=channel%3D%3D'.$this->_channel_name.
            $this->array2getUrl($url_array).($key == true ? '&key='.$this->getYouTubeAPI_developer_key() : ''));
    }

    //Парсим массив параметров в строку для передачи как get параметры
    private function array2getUrl($array_query){
        $str = '';
        foreach($array_query as $k=>$v){
            $str.='&'.$k.'='.$v;
        }
        return $str;
    }


    public function getChannelName(){
        return $this->_channel_name;
    }

    public function getYouTubeAPI_client_id(){
        return $this->YouTubeAPI_client_id;
    }
    public function getYouTubeAPI_client_secret(){
        return $this->YouTubeAPI_client_secret;
    }
    public function getYouTubeAPI_redirect_uri(){
        return $this->YouTubeAPI_redirect_uri;
    }
    public function getYouTubeAPI_developer_key(){
        return $this->YouTubeAPI_developer_key;
    }
    public function getYouTubeAPI_scope(){
        return $this->YouTubeAPI_scope;
    }
    public function getYouTubeAPI_app_name(){
        return $this->YouTubeAPI_app_name;
    }
}