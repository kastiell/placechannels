<?php
/*
 *
 * brand
 * youtuber
 * admin
 *
 *
 */



class MainController extends Controller
{
	public $layout='column1';

	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionWell()
	{
        $this->layout='empty';
		$this->render('wellBrands');
	}
	
	public function actionYoutubers()
	{
		$this->render('youtubers');
	}
	
	public function actionBrands()
	{
		$this->render('brands');
	}

    public function actionRuBrands(){
        $layout='column1';
        $this->render('brandsru');
    }

    public function actionUaBrands(){
        $layout='column1';
        $this->render('brandsua');
    }

	public function actionLogin()
	{
        $model = new LoginForm();

        if(isset($_POST['LoginForm']))
        {
            //print_r($_POST['LoginForm']);
            //exit;
            $model->attributes=$_POST['LoginForm'];
            if($model->validate()){
                if($model->login()){

                    Yii::import('application.vendors.MixPanel.Mixpanel');
                    $mp = Mixpanel::getInstance("6374fe0ab314b8bad17a35b02cb708d5");

                    $mp->identify(Yii::app()->user->getId());
                    $mp->track("Пользователь залогинился");

                    $this->layout='empty';
                    if(Yii::app()->user->role == 'admin'){
                        $this->redirect(array('analytics/channels/list'));
                    }
                    if(Yii::app()->user->role == 'brand'){
                        $this->redirect(array('main/sendRequest','idBrand'=>Yii::app()->user->getId()));
                    }

                    $this->render('wellBrands',array('model'=>$model));
                    Yii::app()->end();
                }
            }
        }

        $this->layout='empty';
        $this->render('login',array('model'=>$model));
    }

	public function actionJoinBrands()
	{
        $this->layout='empty';
        $model=new JoinBrands();
        $model->attributes=$_POST['JoinBrands'];

        if(isset($_POST['JoinBrands'])){
            if($model->validate()){

                $user = new User;
                $user->email = $model->email;
                $user->password = $model->password;
                $user->phone = $model->phone;
                $user->role = 'brand';
                $user->time_reg = time();
                $user->time_last_login = time();
                if($user->save(true)){

                    $brand = new Brand;
                    $brand->id = $user->id;
                    $brand->company_name = $model->company_name;
                    $brand->full_name = $model->full_name;
                    $brand->phone = $model->phone;

                    if($brand->save(true)){
                        Yii::import('application.vendors.MixPanel.Mixpanel');
                        $mp = Mixpanel::getInstance("6374fe0ab314b8bad17a35b02cb708d5");

                        $mp->people->set($user->id, array(
                            '$email'            => $user->email,
                            'role'            => $user->role
                        ));

                        $this->redirect(array('main/sendRequest','idBrand'=>$brand->id));
                        //$this->render('wellBrands',array('model'=>$model));
                        Yii::app()->end();
                    }
                }
            }
        }

        $this->layout='empty';
		$this->render('joinBrands',array('model'=>$model));
	}


	public function actionJoinYouTubers()
	{
        $this->layout='empty';
        $model=new JoinYouTubers();
        $model->attributes=$_POST['JoinYouTubers'];

        if(isset($_POST['JoinYouTubers'])){
            if($model->validate()){
                //exit;
                Yii::app()->session['YOUTUBERS_PHONE_ON_REG'] = $model->phone;
//                $this->redirect(array('oauth/createAndFollowAuthUrl'));
                $this->redirect(array('main/joinAllowYouTubers'));
            }
        }

        $this->layout='empty';
		$this->render('joinYouTubers',array('model'=>$model));
	}


    public function actionJoinYouTubersNew()
    {
        $this->layout='empty';
        $model=new JoinYouTubers();
        $model->attributes=$_POST['JoinYouTubers'];

        if(isset($_POST['JoinYouTubers'])){
            if($model->validate()){
                //exit;
                Yii::app()->session['YOUTUBERS_PHONE_ON_REG'] = $model->phone;
//                $this->redirect(array('oauth/createAndFollowAuthUrl'));
                $this->redirect(array('main/joinInfoYouTubersNew'));
            }
        }

        $this->layout='empty';
        $this->render('joinYouTubersNew',array('model'=>$model));
    }

    public function actionJoinInfoYouTubersNew()
    {
        $this->layout='empty';
        $model=new JoinYouTubersNew();
        $model->attributes=$_POST['JoinYouTubersNew'];

        if(isset($_POST['JoinYouTubersNew'])){
            if($model->validate()){
                $user = new User();
                $user->email = $model->email;
                $user->name_user = $model->name;
                $user->password = Helper::generatePassword(8);
                $user->role = 'youtuber';
                $user->phone = Yii::app()->session['YOUTUBERS_PHONE_ON_REG'];
                $user->time_reg = time();
                if($user->save()){
                    Yii::app()->session['YOUTUBERS_ID_ON_REG'] = $user->id;
                    $this->redirect(array('main/joinAllowYouTubersNew'));
                }else{
                    throw new Exception("База не сохранена!",500);
                }
                Yii::app()->session['YOUTUBERS_PHONE_ON_REG'] = null;
                unset(Yii::app()->session['YOUTUBERS_PHONE_ON_REG']);
            }
        }

        $this->layout='empty';
        $this->render('joinInfoYouTubersNew',array('model'=>$model));
    }
    public function actionJoinYouTubersUpload()
    {
        $dir1 = '/protected/data/screen';
        $dir = 'application.data.screen';
        $dir_to_upload = YiiBase::getPathOfAlias($dir);

        Yii::import('application.components.Helper');
        if(!isset(Yii::app()->session['YOUTUBERS_ID_ON_REG'])||((int)Yii::app()->session['YOUTUBERS_ID_ON_REG']==false)){
            throw new Exception("Нет ID",403);
        }else{
            $id = Yii::app()->session['YOUTUBERS_ID_ON_REG'];
        }
        $this->layout='empty';
        $model=new ImgModel();
        $model->attributes=$_POST['ImgModel'];

        if(isset($_POST['ImgModel'])){
            if($model->validate()){
                $img = new Img();
                $img->id_user = $id;
                $randString = Helper::generatePassword(16);
                $model->image=CUploadedFile::getInstance($model,'image');
                $nameFile = $id.'_'.$randString.'.'.preg_replace("/(^.*)\//","",$model->image->type);
                $img->screen_name = $nameFile;
                $img->date_add = time();
                if($img->save()){
                    $model->image->saveAs($dir_to_upload.'/'.$nameFile);
                    $this->redirect(array('main/joinYouTubersUpload','id'=>$id,'status'=>'success'));
                }else{
                    throw new Exception("База не сохранена!",500);
                }
            }
        }

        $this->layout='empty';
        $img = Img::model()->findAllByAttributes(array('id_user'=>$id));
        $this->render('joinYouTubersUpload',array('model'=>$model,'img'=>$img,'dir'=>$dir1));
    }

    public function actionJoinAllowYouTubersNew(){
        $this->layout='empty';
        $this->render('joinAllowYouTubersNew');
    }

    public function actionJoinAllowYouTubers(){
        $this->layout='empty';
        $this->render('joinAllowYouTubers');
    }

    public function actionValid(){
        if(isset($_POST['ajax']) && $_POST['ajax']==='joinBrands-form')
        {
            echo CActiveForm::validate(new JoinBrands);
            Yii::app()->end();
        }
    }

    public function actionRegistration()
    {
        $model=new User('registration');

        if(isset($_POST['ajax']) && $_POST['ajax']==='reg-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['User']))
        {
            $model->attributes=$_POST['User'];

            if (!Yii::app()->user->isGuest) {
                throw new CException('Вы уже зарегистрированны!');
            }
            if($model->validate()){
                $password = CPasswordHelper::hashPassword($model->password);
                $model->password = $password;
                $time = time()*1000;
                $model->ts_reg = $time;
                $model->ts_last_login = $time;
                $model->save();

                $login=new LoginForm;
                $login->attributes=$_POST['User'];
                $login->attributes=$password;
                $login->login();

                //$this->redirect(Yii::app()->user->returnUrl);
            }
        }

        $this->render('registration',array('model'=>$model));
    }

	public function actionShow(){
		print_r($_REQUEST);
	}
	
	public function actionVideo(){
		$this->render('video');
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);

        }
    }



    public function actionUpdateAjax(){
            $model=new Reg;
            $this->layout='empty';
            $this->render('reg', array('model'=>$model));
    }

    public function actionGetImage($nameImg){
        $dir = 'application.data.screen';
        $dir_to_upload = YiiBase::getPathOfAlias($dir);

        $this->imagecreatefromfile($dir_to_upload.'/'.$nameImg);
    }

    function imagecreatefromfile($filename){
        if (!file_exists($filename)) {
            throw new InvalidArgumentException('File "'.$filename.'" not found.');
        }
        switch ( strtolower( pathinfo( $filename, PATHINFO_EXTENSION ))) {
            case 'jpeg':
            case 'jpg':
                header("Content-Type: image/jpeg");
                imagejpeg(imagecreatefromjpeg($filename));
                break;

            case 'png':
                header("Content-Type: image/png");
                imagepng(imagecreatefrompng($filename));
                break;

            case 'gif':
                header("Content-Type: image/gif");
                imagegif(imagecreatefromgif($filename));
                break;

            default:
                throw new InvalidArgumentException('File "'.$filename.'" is not valid jpg, png or gif image.');
                break;
        }
    }

    function actionResetSession(){
        Yii::app()->session['YOUTUBERS_ID_ON_REG'] = null;
        unset(Yii::app()->session['YOUTUBERS_ID_ON_REG']);
        $this->redirect(array('main/Well'));
    }

    /*
    public function actionNew()
    {
        $model=new Reg;
        if(isset($_POST['Reg'])){
            $model->attributes=$_POST['Reg'];
            if($model->validate()){

                $db_model_user = new User;
                $db_model_user->login = $model->email;
                $db_model_user->password = $model->password;
                $db_model_user->role = ($model->type_reg == 'client') ? 'client' : 'lawyer';
                $db_model_user->type = $model->type_reg;
                $db_model_user->save(true);

                $data_for_new_user = array('name'=>$model->name,
                    'first_name'=>$model->first_name,
                    'city'=>isset($model->city)? $model->city : null,
                    'type_reg'=>$model->type_reg);

                $this->addNewPropertiesAndTables($db_model_user->id,$data_for_new_user);

                $identity = new UserIdentity($model->email,$model->password);
                $identity->authenticate();

                if($identity->errorCode===UserIdentity::ERROR_NONE)
                {
                    $duration = 0;
                    Yii::app()->user->login($identity,$duration);
                }
            }
        }
        $this->redirect(Yii::app()->user->returnUrl);
    }
    */

    public function actionSendRequest($idBrand = null){

        if($idBrand == null){
            throw new ErrorException("Нет ID бренда",404);
        }

        if(CampaignProposal::model()->findByAttributes(array('id_brand'=>$idBrand)) !== null){
            $this->layout = 'empty';
            $this->render('wellSendRequest');
            Yii::app()->end();
        }

        $dir = 'application.data.proposal';
        $dir_to_upload = YiiBase::getPathOfAlias($dir);

        $model = new CampaignProposal;
        $model->attributes=$_POST['CampaignProposal'];

        if(isset($_POST['CampaignProposal'])){
            if($model->validate()){
                $img = new Img();
                $img->id_user = $idBrand;
                $randString = Helper::generatePassword(16);
                $model->id_img=CUploadedFile::getInstance($model,'id_img');
                $nameFile = $idBrand.'_'.$randString.'.'.preg_replace("/(^.*)\//","",$model->id_img->type);
                $img->screen_name = $nameFile;
                $img->date_add = time();
                if($img->save()||!$model->id_img){
                    if(is_object($model->id_img))
                    $model->id_img->saveAs($dir_to_upload.'/'.$nameFile);
                    $model->id_img = $img->id;
                    $model->ts = time();

                    $model->id_brand = $idBrand;

                    $model->age_range = $_POST['CampaignProposal']['au13-17'] ? $model->age_range.',13-17' : $model->age_range ;
                    $model->age_range = $_POST['CampaignProposal']['au18-24'] ? $model->age_range.',18-24' : $model->age_range ;
                    $model->age_range = $_POST['CampaignProposal']['au25-34'] ? $model->age_range.',25-34' : $model->age_range ;
                    $model->age_range = $_POST['CampaignProposal']['au35-50'] ? $model->age_range.',35-50' : $model->age_range ;

                    if($model->save(true)){
                        $this->layout = 'empty';
                        $this->render('wellSendRequest');
                        Yii::app()->end();
                    }

                    //$this->redirect(array('main/joinYouTubersUpload','id'=>$idBrand,'status'=>'success'));
                }else{
                    throw new Exception("База не сохранена!",500);
                }
            }
        }

        $this->layout = 'empty';
        $this->render('sendRequest',array('model'=>$model));

    }
}
