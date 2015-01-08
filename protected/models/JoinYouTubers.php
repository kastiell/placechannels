<?php

class JoinYouTubers extends CFormModel
{
    public $phone;


    public function rules()
    {
        return array(
            array('phone', 'required'), //Добавить password_repeat по надобности
            array('phone', 'unique', 'attributeName'=>'phone','className'=>'User'),
        );
    }
}