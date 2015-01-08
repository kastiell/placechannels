<?php

class JoinYouTubersNew extends CFormModel
{
    public $email;
    public $name;


    public function rules()
    {
        return array(
            array('name', 'required'), //Добавить password_repeat по надобности
            array('email', 'required'), //Добавить password_repeat по надобности
            array('email', 'email'), //Добавить password_repeat по надобности
            array('email', 'unique', 'attributeName'=>'email','className'=>'User'),
        );
    }
}