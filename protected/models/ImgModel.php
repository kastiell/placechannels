<?php

    class ImgModel extends CFormModel{
        public $image;

        public function rules(){
            return array(
                array('image', 'file', 'types'=>'jpg, gif, png, bmp'),
            );
        }
    }