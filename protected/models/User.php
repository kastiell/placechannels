<?php

class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password, role', 'required'),
			array('login', 'length', 'max'=>100),
			array('email, password', 'length', 'max'=>120),
			array('role', 'length', 'max'=>30),
			array('time_reg, time_last_login', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, login, email, password, role, time_reg, time_last_login', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'id пользователя',
			'login' => 'Login',
			'email' => 'Email',
			'password' => 'Password',
			'role' => 'Роль',
			'phone' => 'Телефон',
			'time_reg' => 'Время регистрации',
			'time_last_login' => 'Время последнего входа в систему',
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
