<?php
    $hash = $this->hash(10);
    $count_item = 5;
?>

<div class="grid wmodule c-wmodule <?=$this->class?>" style="<?=$this->style?> ">
    <div class="c-title">
        <?=$this->title?>
    </div>
    <?php
    $lang_obj = new Lang;

    $i = 1;
    foreach($this->data as $k=>$v){
        $i++;
        $bg = ($i%2==0) ? 'backgroundee' : '';
        if($lang_obj->isExistExScope($k,'basic')) continue;
        $count_column = count($v);
        $width_style = (int)70/$count_column;
        ?>
        <div class="c-item c-item-left <?=$bg?>" style="width: 30%">
            <?=$lang_obj->tspan($k,$this->categoryLang)?>
        </div>
        <?php
            foreach($v as $val){
            if($this->specType){
                if(($this->specType == 'video')&&($k == 'video')){
                    $val = "<a href='".Yii::app()->createAbsoluteUrl('analytics/channels/show',array('id'=>$this->id_yt,'video'=>$val))."'>".$val."</a>";
                }
            }
        ?>
                <div class="c-item-right <?=$bg?>"  style="width: <?=$width_style?>%">
                    <span class="percent"><?=((is_numeric($val))?number_format($val):$val).$this->opt?></span>
                </div>
        <?
            }
        ?>

    <?php
    }
    ?>
</div>