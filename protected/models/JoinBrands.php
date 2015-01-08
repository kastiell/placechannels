<?php

class JoinBrands extends CFormModel
{
    public $full_name;
    public $email;
    public $password;
    //public $password_repeat;
    public $company_name;
    public $phone;


    public function rules()
    {
        return array(
            array('phone, email, password, company_name, full_name', 'required'), //Добавить password_repeat по надобности
            array('email', 'email'),
            array('password ', 'length', 'min'=>6, 'max'=>30), //Добавить password_repeat по надобности
            array('full_name', 'length', 'min'=>1, 'max'=>100),
            //array('password_repeat', 'compare', 'compareAttribute'=>'password'), //Раскомментировать по надобности password_repeat
            array('email', 'unique', 'attributeName'=>'email','className'=>'User'),
        );
    }
}