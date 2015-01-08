<?php

class SingleController extends Controller
{

    public function actionYoutuber($id = null){

        //$this->render('youtuberSingle');

    }

    public function actionList(){

        $this->layout = 'main';

        $model = EmailIsOpen::model()->findAll();
        $this->render('list',array('model'=>$model));

    }

    public function actionEmailIsOpen($email = null,$id = null){
        //<img src="http://placechannels.com/index.php?r=analytics/single/EmailIsOpen&email=[email]&id=[1]">
        header('Content-Type: image/gif');
        echo base64_decode('R0lGODlhAQABAJAAAP8AAAAAACH5BAUQAAAALAAAAAABAAEAAAICBAEAOw==');

        if(($email != null)||($id != null)){
            if($email)
            $q1 = EmailIsOpen::model()->findByAttributes(array('email'=>$email));
            if($id)
            $q2 = EmailIsOpen::model()->findByAttributes(array('id_user_brand'=>$id));
            if($q1){
                $model = $q1;
                $model->open++;
            }else if($q2){
                $model = $q2;
                $model->open++;
            }else{
                $model =  new EmailIsOpen();
                $model->open = 1;
            }

            $model->email = $email;
            $model->id_user_brand = $id;

            $model->ts_open = time();
            $model->save(false);

            Yii::import('application.vendors.MixPanel.Mixpanel');
            $mp = Mixpanel::getInstance("6374fe0ab314b8bad17a35b02cb708d5");
            $mp->track("БРЕНД ОТКРЫЛ EMAIL",array('$email'=>$email,'id'=>$id));
        }
        exit;
    }

    /*public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'roles'=>array('admin'),
            ),
            array('deny',
                'users'=>array('*'),
                'message'=>'Access Denied.',
            ),

        );
    }*/
}