<?php
    Yii::app()->bootstrap->register();
    Yii::app()->clientScript->registerCoreScript('jquery');
    Yii::app()->clientScript->registerPackage('analytics');
    Yii::app()->clientScript->registerPackage('analytics_widget');
    Yii::app()->clientScript->registerPackage('jquery_ui');

    if(Yii::app()->controller->action->id == 'show'){

    }

?>
<html>
<head>
    <meta charset="utf-8">
    <title>List Channels</title>
</head>
<body>
<div class="grid">
    <div class="с-header">
        <?php
            if(Yii::app()->getRequest()->getParam('video')){
                $vvv = Yii::app()->getRequest()->getParam('video');
        ?>
            <div class="link-list"><a href="<?=Yii::app()->createAbsoluteUrl('analytics/channels/show',array('id'=>Yii::app()->getRequest()->getParam('id')))?>">< Назад к статистике канала</a>
                &nbsp;&nbsp;
                <a href="https://www.youtube.com/watch?v=<?=$vvv?>" target="_blank">
                    Открыть видео в YouTube
                </a>
            </div>
        <?php
            }else{
                if(Yii::app()->controller->action->id == 'show'){
                $yt = Youtuber::model()->findByPk(Yii::app()->getRequest()->getParam('id'));
        ?>
                <div class="link-list"><a href="<?=Yii::app()->createAbsoluteUrl('analytics/channels/list')?>">< Назад к списку каналов</a>
                    &nbsp;&nbsp;

                    <a href="https://www.youtube.com/channel/<?=$yt->channel?>" target="_blank"><img src="<?=$yt->image_url?>" style="width: 20px;"></a>
                    <a href="https://www.youtube.com/channel/<?=$yt->channel?>" target="_blank"><?=json_decode($yt->str_userinfo)->displayName?></a>
                    <span>(<?=User::model()->findByPk(Yii::app()->getRequest()->getParam('id'))->email?>)</span>
                </div>

        <?php
                }
            }
        ?>
        <?php
            if(Yii::app()->controller->id == 'channels'){
        ?>
        <div class="time-panel" style="right: 1px;">
            <span class="wrap_cir"><span class="cir"></span><span class="cir_desc" style="right: 0;
width: 70px;"><span class="title_cir">Кеш</span><span class="text1_cir"><?=($this->onCache ? 'Взято из кеша': 'Новые данные')?></span></span></span>
        </div>
            <?php
            }
            if(Yii::app()->controller->action->id == 'show'){
        ?>
                <div class="time-panel"><a class="<?=((Yii::app()->getRequest()->getParam('time')=='all')||(Yii::app()->getRequest()->getParam('time')==''))?'selected_p':''?>" href="<?=Yii::app()->createAbsoluteUrl('analytics/channels/show',array('id'=>Yii::app()->getRequest()->getParam('id'),'time'=>'all','video'=>Yii::app()->getRequest()->getParam('video')))?>">All time</a>&nbsp;
                    <a class="<?=(Yii::app()->getRequest()->getParam('time')=='y')?'selected_p':''?>" href="<?=Yii::app()->createAbsoluteUrl('analytics/channels/show',array('id'=>Yii::app()->getRequest()->getParam('id'),'time'=>'y','video'=>Yii::app()->getRequest()->getParam('video')))?>">Year</a>&nbsp;
                    <a class="<?=(Yii::app()->getRequest()->getParam('time')=='m')?'selected_p':''?>" href="<?=Yii::app()->createAbsoluteUrl('analytics/channels/show',array('id'=>Yii::app()->getRequest()->getParam('id'),'time'=>'m','video'=>Yii::app()->getRequest()->getParam('video')))?>">Month</a>&nbsp;
                    <a class="<?=(Yii::app()->getRequest()->getParam('time')=='t')?'selected_p':''?>" href="<?=Yii::app()->createAbsoluteUrl('analytics/channels/show',array('id'=>Yii::app()->getRequest()->getParam('id'),'time'=>'t','video'=>Yii::app()->getRequest()->getParam('video')))?>">Week</a>&nbsp;
                    <a class="<?=(Yii::app()->getRequest()->getParam('time')=='d')?'selected_p':''?>" href="<?=Yii::app()->createAbsoluteUrl('analytics/channels/show',array('id'=>Yii::app()->getRequest()->getParam('id'),'time'=>'d','video'=>Yii::app()->getRequest()->getParam('video')))?>">Day</a>
                </div>
        <?php
            }else if((Yii::app()->controller->action->id == 'list')&&(Yii::app()->controller->id == 'channels')){
        ?>
                <div class="time-panel">
                    <a href="<?=Yii::app()->createAbsoluteUrl('analytics/single/list')?>">Статистика открытия E-mail</a>
                 </div>


        <?php
            }else if((Yii::app()->controller->action->id == 'list')&&(Yii::app()->controller->id == 'single')){
        ?>
                <div class="time-panel">
                    <a href="<?=Yii::app()->createAbsoluteUrl('analytics/channels/list')?>">Назад</a>
                </div>

            <?php
            }

        ?>



        <div class="name-user"></div>
        <div class="logout"><a href="<?=Yii::app()->createAbsoluteUrl('main/logout')?>">Выйти(<?=User::model()->findByPk(Yii::app()->user->getId())->email?>)</a></div>
    </div>
</div>
<div class="content">
    <?php echo $content; ?>
</div>
</body>
</html>


