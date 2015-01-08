<?php

/**
 * This is the model class for table "{{youtuber}}".
 *
 * The followings are the available columns in table '{{youtuber}}':
 * @property integer $id
 * @property string $channel
 * @property string $familyName
 * @property string $givenName
 * @property string $image_url
 * @property string $language
 * @property string $id_google
 * @property string $gender
 * @property string $str_userinfo
 * @property string $access_token
 * @property string $refresh_token
 */
class Youtuber extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{youtuber}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, channel, id_google, str_userinfo, access_token, refresh_token', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('channel, id_google', 'length', 'max'=>100),
			array('familyName, givenName', 'length', 'max'=>150),
			array('image_url', 'length', 'max'=>300),
			array('language', 'length', 'max'=>50),
			array('gender', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, channel, familyName, givenName, image_url, language, id_google, gender, str_userinfo, access_token, refresh_token', 'safe', 'on'=>'search'),
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
			'channel' => 'Channel',
			'familyName' => 'Family Name',
			'givenName' => 'Given Name',
			'image_url' => 'Image Url',
			'language' => 'Language',
			'id_google' => 'Id Google',
			'gender' => 'Gender',
			'str_userinfo' => 'Str Userinfo',
			'access_token' => 'token доступа',
			'refresh_token' => 'token переопределения',
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Youtuber the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
