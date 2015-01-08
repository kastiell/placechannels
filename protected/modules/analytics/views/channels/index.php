<?php
    Yii::app()->bootstrap->register();
    Yii::app()->clientScript->registerCoreScript('jquery');
    Yii::app()->clientScript->registerPackage('analytics');
    Yii::app()->clientScript->registerPackage('analytics_widget');
    Yii::app()->clientScript->registerPackage('jquery_ui');
?>

<script>
    function toggleAlertBlock(e){
        jQuery(e).parents('.wmodule').find('.c-top-panel').toggleClass('disable');
    }
</script>

<meta charset="utf-8">
<div class="all">
    <div class="title_all">
        БАЗОВАЯ СТАТИСТИКА
    </div>
<div class="grid" style="width: 760px;
box-sizing: border-box;
-webkit-column-count: 2;
margin: auto;
padding-right: 15px;">
    <?php
        foreach($arr as $v){
            $this->beginWidget('WModuleWidget',array('ext'=>$v,'class'=>'c-wmodule','style'=>'')); $this->endWidget();
        }
    ?>
</div>
    <div class="title_all" style="margin-top: 0px;">
        АГРЕГИРОВАННАЯ СТАТИСТИКА
    </div>
<div class="grid" style="width: 760px;
box-sizing: border-box;
margin: auto;
margin-bottom: 50px;">
    <?php
        foreach($arr1 as $v){
            $this->beginWidget('WModuleWidget',array('ext'=>$v,'class'=>'c-wmodule1','style'=>'','type_parse'=>'table','id_yt'=>$id,'video_yt'=>$video)); $this->endWidget();
        }
    ?>
</div>
</div>