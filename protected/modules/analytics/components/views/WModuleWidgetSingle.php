<div class="grid wmodule c-wmodule <?=$this->class?>" style="<?=$this->style?>">
    <div class="c-title">
        <?=$this->title?>
    </div>
    <?php
        $lang_obj = new Lang;


        foreach($this->data as $k=>$v){
            if($lang_obj->isExistExScope($k,'basic')) continue;
            if(is_array($v)){
                $v = $v[0];
            }
    ?>
                <div class="c-item c-item-left">
                    <?=$lang_obj->tspan($k,$this->categoryLang)?>
                </div>
            <div class="c-item-right">
                <span class="percent"><?=number_format($v).$this->opt?></span>
            </div>
    <?php
        }
    ?>
</div>