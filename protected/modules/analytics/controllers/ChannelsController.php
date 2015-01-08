<?php

class ChannelsController extends Controller
{
    public $layout = 'main';
    public $time_parse = null;
    public $onCache = false;
    public $timeCache = 600;
    public $strCache = null;

	public function actionShow($id,$video=null,$time=null,$nocache=false)
	{
        if((int)$id == false){
            die('Нет id');
        }
        Yii::app()->GoogleApi->setup((int)$id);

        $this->strCache = 'id='.$id.'&video='.$video.'&time='.$time;
        $this->time_parse = $this->parseTime($time);

        $arrVal = array();
        if(Yii::app()->params['useCache']&&($nocache==false)){
            if(Yii::app()->cache->get($this->strCache)===false){
                $arr = $this->getAllReports($id,$video);
                $arr1 = $this->getAllReports1($id,$video);
                $arrVal = array($arr,$arr1);
                Yii::app()->cache->set($this->strCache, $arrVal , $this->timeCache);
                $this->onCache = false;
            }else{
                $arrVal = Yii::app()->cache->get($this->strCache);
                $this->onCache = true;
            }
        }else{
            $arr = $this->getAllReports($id,$video);
            $arr1 = $this->getAllReports1($id,$video);
            $arrVal = array($arr,$arr1);
        }
		$this->render('index',array('arr'=>$arrVal[0],'arr1'=>$arrVal[1],'id'=>$id,'video'=>$video));
    }

    public function actionList(){

        $youtuber  = new CActiveDataProvider('Youtuber', array(
            'pagination' => array(
                'pageSize' => 10,
            ),
        ));

        $this->render('listWrap',array('youtuber'=>$youtuber));
    }

    public function  getAllReports1($id,$video = null){

        $arr = array();

        sleep(1);
        if($video == null)
            $arr[] = $this->exOneReport(array(
                'metrics'=>'views,comments,favoritesAdded,favoritesRemoved,likes,dislikes',
                'dimensions'=>'video',
                'max-results'=>5,
                'sort'=>'-views',
            ),'Отчет по ТОП 5 видео','table',array('opt'=>'','specType'=>'video','categoryLang'=>'basic','class'=>'tstyle2 wwfull'));

        sleep(1);
        $arr[] = $this->exOneReport(array(
            'metrics'=>'views,comments,favoritesAdded,favoritesRemoved,likes,dislikes,shares,estimatedMinutesWatched,averageViewDuration,averageViewPercentage,annotationClickThroughRate,annotationCloseRate,annotationImpressions,annotationClickableImpressions,annotationClosableImpressions,annotationClicks,annotationCloses,subscribersGained,subscribersLost',
            'dimensions'=>'country',
            'sort'=>'-views',
            'max-results'=>5,
            'filters'=>(($video)?'video=='.$video:''),
        ),'Отчет по странам просмотра','table',array('opt'=>'','categoryLang'=>'basic','class'=>'tstyle2 wwfull'));


        sleep(1);
        $arr[] = $this->exOneReport(array(
            'metrics'=>'views,comments,favoritesAdded,favoritesRemoved,likes,dislikes',
            'dimensions'=>'day',
            'max-results'=>5,
            'sort'=>'-day',
            'filters'=>(($video)?'video=='.$video:''),
        ),'Отчет по последним дням','table',array('opt'=>'','categoryLang'=>'basic','class'=>'tstyle2 wwfull'));

        return $arr;
    }

    public function  getAllReports($id,$video = null){

        $arr = array();

        $arr[] = $this->exOneReport(array(
            'metrics'=>'views,comments,favoritesAdded,favoritesRemoved,likes,dislikes,shares,estimatedMinutesWatched,averageViewDuration,averageViewPercentage,annotationClickThroughRate,annotationCloseRate,annotationImpressions,annotationClickableImpressions,annotationClosableImpressions,annotationClicks,annotationCloses,subscribersGained,subscribersLost',
            'sort'=>'-views',
            'filters'=>(($video)?'video=='.$video:''),
        ),'Базовая статистика','table',array('opt'=>'','categoryLang'=>'basic','class'=>'tstyle1 ww350'));

        sleep(1);

        $arr[] = $this->exOneReport(array(
            'metrics'=>'shares',
            'dimensions'=>'sharingService',
            'sort'=>'-shares',
            'filters'=>(($video)?'video=='.$video:''),
        ),'sharing Service','single',array('opt'=>'','class'=>'tstyle1 ww350'));

        //sleep(1);
        $arr[] = $this->exOneReport(array(
            'metrics'=>'viewerPercentage',
            'dimensions'=>'ageGroup',
            'sort'=>'-viewerPercentage',
            'filters'=>(($video)?'video=='.$video:''),
        ),'ОТЧЕТ ДЕМОГРАФИЯ','single',array('opt'=>'%','class'=>'tstyle1 ww350'));
        sleep(1);
        /*-------------*/
        $arr[] = $this->exOneReport(array(
            'metrics'=>'viewerPercentage',
            'dimensions'=>'gender',
            'sort'=>'-viewerPercentage',
            'filters'=>(($video)?'video=='.$video:''),
        ),'ОТЧЕТ ПОЛ','single',array('opt'=>'%','class'=>'tstyle1 ww350'));
        /* ---------------------- */


        //sleep(1);
        $arr[] = $this->exOneReport(array(
                                            'metrics'=>'views',
                                            'dimensions'=>'deviceType',
                                            'max-results'=>10,
                                            'filters'=>(($video)?'video=='.$video:''),
                                            'sort'=>'-views'),'ТИП УСТРОЙСТВА','single',array('opt'=>'','class'=>'tstyle1 ww350'));

        sleep(1);
        $arr[] = $this->exOneReport(array(
                                            'metrics'=>'views',
                                            'dimensions'=>'insightTrafficSourceType',
                                            'max-results'=>10,
                                            'filters'=>(($video)?'video=='.$video:''),
                                            'sort'=>'-views'),'как пользователи нашли видео','single',array('opt'=>'','class'=>'tstyle1 ww350'));
        //sleep(1);
        $arr[] = $this->exOneReport(array(
                                            'metrics'=>'views',
                                            'dimensions'=>'insightPlaybackLocationType',
                                            'sort'=>'-views',
                                            'filters'=>(($video)?'video=='.$video:''),
                                        ),'Где пользователи смотрели видео','single',array('opt'=>'','categoryLang'=>'playbackLocationType','class'=>'tstyle1 ww350'));


        /*$arr[] = $this->exOneReport(array(
            'start-date'=>date("Y").'-'.date("m").'-01',
            'end-date'=>date("Y").'-'.(date("m")+1).'-01',
                                            'metrics'=>'views,comments,favoritesAdded,favoritesRemoved,likes,dislikes,shares,estimatedMinutesWatched,averageViewDuration,averageViewPercentage,annotationClickThroughRate,annotationCloseRate,annotationImpressions,annotationClickableImpressions,annotationClosableImpressions,annotationClicks,annotationCloses,subscribersGained,subscribersLost',
                                            'sort'=>'-views'
                                        ),'BASIC USER ACTIVITY STATISTICS за последний месяц');



        $arr[] = $this->exOneReport(array('start-date'=>'2000-05-01',
                                            'end-date'=>'2015-06-30',
                                            'metrics'=>'views,comments,favoritesAdded,favoritesRemoved,likes,dislikes,shares,estimatedMinutesWatched,averageViewDuration,averageViewPercentage,annotationClickThroughRate,annotationCloseRate,annotationImpressions,annotationClickableImpressions,annotationClosableImpressions,annotationClicks,annotationCloses,subscribersGained,subscribersLost',
                                            'dimensions'=>'country',
                                            'sort'=>'-views',
                                            'max-results'=>10

                                        ),'USER ACTIVITY BY COUNTRY');

        $arr[] = $this->exOneReport(array('start-date'=>'2000-05-01',
                                            'end-date'=>'2015-06-30',
                                            'metrics'=>'views,comments,favoritesAdded,favoritesRemoved,likes,dislikes,shares,estimatedMinutesWatched,averageViewDuration,averageViewPercentage,annotationClickThroughRate,annotationCloseRate,annotationImpressions,annotationClickableImpressions,annotationClosableImpressions,annotationClicks,annotationCloses,subscribersGained,subscribersLost',
                                            'dimensions'=>'country',
                                            'sort'=>'-views',
                                            'max-results'=>10,
                                            'filters'=>'video==4tD5lEW-dKA'
                                        ),'USER ACTIVITY BY COUNTRY VIDEO TOP 1');


        $arr[] = $this->exOneReport(array(
                                            'start-date'=>'2000-05-01',
                                            'end-date'=>'2015-06-30',
                                            'metrics'=>'views,comments,favoritesAdded,favoritesRemoved,likes,dislikes',
                                            'dimensions'=>'video',
                                            'max-results'=>10,
                                            'sort'=>'-views'
                                        ),'TOP VIDEOS');

        $arr[] = $this->exOneReport(array(
                                            'start-date'=>'2000-05-01',
                                            'end-date'=>'2015-06-30',
                                            'metrics'=>'views,comments,favoritesAdded,favoritesRemoved,likes,dislikes',
                                            'dimensions'=>'day',
                                            'max-results'=>10,
                                            'sort'=>'-day'
                                        ),'USER ACTIVITY BY COUNTRY FOR SPECIFIC TIME PERIODS');*/


        return $arr;
    }

    public function exOneReport($arr_data,$title='Title',$type="table",$options = array()){
        $arr_data = array_merge($arr_data,$this->time_parse);
        $r = Yii::app()->GoogleApi->reportChannel($arr_data);

        if($type == 'table'){
            if(!json_decode($r)){
                $r = array();
            }else{
                $r = $this->parseTable(json_decode($r));
            }
        }else{
            $type = 'single';
            $r = $this->parseRows(json_decode($r)->rows);
        }

        return array_merge(array('data'=>$r,'title'=>$title,'type'=>$type),$options);
    }

    public function parseRows($rows){
        $wdata = array();
        if(!isset($rows)){
            return array();
        }
        foreach($rows as $v){
            $wdata[$v[0]] = $v[1];
        }
        return $wdata;
    }

    public function parseTable($o){
        $arr = array();
        $i = 0;
        foreach($o->columnHeaders as $v){
        if(($v->dataType == 'INTEGER' )||($v->dataType == 'FLOAT')||($v->dataType == 'STRING')){
            $arr[$v->name] = array();
            if(!isset($o->rows)){
                return array();
            }
            foreach($o->rows as $k1=>$v1){
                $arr[$v->name][] = $v1[$i];
            }
        }
        $i++;
        }
        return $arr;
    }

    public function filters()
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
    }

    public  function parseTime($time = null){
        $time = ($time==null)?'all':$time;
        switch($time){
            case 'all':{
                $arr = array('start-date' => '2000-01-01','end-date' => (date("Y")+1).'-01-01');
                break;
            }
            case 'y':{
                $arr = array('start-date' => (date("Y")-1).'-'.date("m").'-'.date("d"),'end-date' => (date("Y")).'-'.date("m").'-'.date("d"));
                break;
            }
            case 'm':{
                $arr = array('start-date' => (date("Y")).'-'.(str_pad(date("m")-1, 2, '0', STR_PAD_LEFT)).'-'.date("d"),'end-date' => (date("Y")).'-'.date("m").'-'.date("d"));
                break;
            }
            case 't':{
                $arr = array('start-date' => (date("Y")).'-'.(date("m")).'-'.(str_pad(date("d")-7, 2, '0', STR_PAD_LEFT)),'end-date' => (date("Y")).'-'.date("m").'-'.date("d"));
                break;
            }
            case 'd':{
                $arr = array('start-date' => (date("Y")).'-'.(date("m")).'-'.(str_pad(date("d")-1, 2, '0', STR_PAD_LEFT)),'end-date' => (date("Y")).'-'.date("m").'-'.date("d"));
                break;
            }
        }
        return $arr;
    }

    /*public function mergeTime($arr,$arr_time){
        foreach($arr as $k=>$v){
            $arr[$k]=array_merge($arr[$k],$arr_time);
        }
        return $arr;
    }*/

}