<?php

class WModuleWidget extends CWidget {

    public $title = 'Title';
    public $data = array('item'=>'percent');
    public $opt = '%';
    public $style = 'width:250px;';
    public $class = '';
    public $type = 'single';
    public $name = null;
    public $categoryLang = null;
    public $type_parse = 'single';
    public $specType = null;
    public $id_yt = null;
    public $video_yt = null;

    public $ext = null;

    public function run() {

        if(is_array($this->ext)){
            if(isset($this->ext['data']))
            $this->data = $this->ext['data'];
            if(isset($this->ext['title']))
            $this->title = $this->ext['title'];
            if(isset($this->ext['type']))
            $this->type = $this->ext['type'];
            if(isset($this->ext['opt']))
            $this->opt = $this->ext['opt'];
            if(isset($this->ext['class']))
            $this->class = $this->ext['class'];
            if(isset($this->ext['categoryLang']))
            $this->categoryLang = $this->ext['categoryLang'];
            if(isset($this->ext['specType']))
            $this->specType = $this->ext['specType'];
        }



        if($this->type_parse == 'table'){
            $this->data = $this->nameDel();
            $this->render('WModuleWidgetTable');
        }else{
            $this->render('WModuleWidgetSingle');
        }
    }

    public function nameDel(){
        if($this->name != null){
            $data_new = array();
            foreach($this->data as $k=>$v){
                foreach($this->name as $k1=>$v1){
                    if($k == $v1){
                        $data_new[$k] = $v;
                    }else{
                        continue;
                    }
                }
            }
            return $data_new;
        }
        return $this->data;
    }

    public function hash($count = 4){
        Yii::import('application.components.Helper');
        return Helper::generatePassword($count);
    }
}