<?php

class AwayController extends Controller
{
    //http://placechannels.com/index.php?r=link/away/l&src=http://ex.ua/&id=64&type=annotation
	public function actionL($src = null,$id=null,$type = 'annotation')
	{
        if(($src!=null)&&($id!=null)){
            $link = Link::model()->findByAttributes(array('link'=>$src));
            if($link == null){
                $link = new Link;
            }
            $link->link = $src;
            if($type){
                $link->annotation = $link->annotation == '' ? 1 : $link->annotation+1;
            }else{
                $link->target = $link->target == '' ? 1 : $link->target+1;
            }
            $link->referer = $id;
            $link->save(true);
            $this->redirect($src,array('target'=>'_blank'));
            Yii::app()->end();
        }
	}
}