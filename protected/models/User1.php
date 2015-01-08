<?php

class User extends CActiveRecord
{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{user}}';
	}

	public function rules()
	{
		return array(
			array('email, password', 'required'),
            array('email', 'email'),
            //array('password', 'length', 'max'=>36,'min'=>6),

            array('email', 'unique','className'=>'User','attributeName'=>'email','on'=>'registration','message'=>'Такой E-mail уже существует!'),
            array('email', 'exist','className'=>'User','attributeName'=>'email','on'=>'login','message'=>'Такого E-mail не существует!'),

			array('ts_reg,ts_last_login', 'safe'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'email' => 'email',
			'password' => 'Password',
			'ts_reg' => 'ts_reg',
		);
	}

	public function validatePassword($password)
	{
		return CPasswordHelper::verifyPassword($password,$this->password);
		//return $password===$this->password;
	}

	public function hashPassword($password)
	{
		return CPasswordHelper::hashPassword($password);
		//return $password;
	}
}
