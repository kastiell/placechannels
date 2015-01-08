<?php

/**
 * This is the model class for table "{{campaign_proposal}}".
 *
 * The followings are the available columns in table '{{campaign_proposal}}':
 * @property string $id
 * @property integer $id_brand
 * @property string $title
 * @property integer $id_img
 * @property string $details
 * @property string $views_count
 * @property string $ts
 */
class CampaignProposal extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{campaign_proposal}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, views_count', 'required'),
			//array('id_brand, id_img', 'numerical', 'integerOnly'=>true),
			//array('id_brand', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>200),
			array('views_count, ts', 'length', 'max'=>20),
			array('details', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('title, id_img, details, views_count', 'safe'),
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
			'id_brand' => 'Id Brand',
			'title' => 'Title',
			'id_img' => 'Id Img',
			'details' => 'Details',
			'views_count' => 'Views Count',
			'ts' => 'Ts',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('id_brand',$this->id_brand);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('id_img',$this->id_img);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('views_count',$this->views_count,true);
		$criteria->compare('ts',$this->ts,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CampaignProposal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
