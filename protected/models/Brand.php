<?php

/**
 * This is the model class for table "{{brand}}".
 *
 * The followings are the available columns in table '{{brand}}':
 * @property string $id
 * @property string $company_name
 * @property string $full_name
 * @property string $phone
 */
class Brand extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{brand}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, company_name, full_name, phone', 'required'),
			array('id', 'length', 'max'=>10),
			array('company_name', 'length', 'max'=>100),
			array('full_name', 'length', 'max'=>150),
			array('phone', 'length', 'max'=>50)
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
			'id' => 'ID',
			'company_name' => 'Company Name',
			'full_name' => 'Full Name',
			'phone' => 'Phone',
		);
	}


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
