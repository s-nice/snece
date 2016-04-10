<?php

/**
 * This is the model class for table "{{links}}".
 *
 * The followings are the available columns in table '{{links}}':
 * @property string $id
 * @property string $name
 * @property string $link
 * @property string $logo
 * @property string $orderid
 * @property integer $is_show
 * @property string $create_uid
 * @property string $create_time
 * @property string $update_uid
 * @property string $update_time
 */
class Links extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{links}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, link, is_show, create_uid, create_time', 'required'),
			array('update_uid, update_time', 'safe'),
			array('is_show', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('link, logo', 'length', 'max'=>150),
			array('orderid, create_uid, update_uid', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, link, logo, orderid, is_show, create_uid, create_time, update_uid, update_time', 'safe', 'on'=>'search'),
			/*
			array('logo',
				'file', //定义为file类型
				'allowEmpty' => true,
				//'types' => 'jpg,png,gif,doc,docx,pdf,xls,xlsx,zip,rar,ppt,pptx', //上传文件的类型
				'types' => 'jpg,png,gif', //上传文件的类型
				'maxSize' => 1024 * 1024 * 2, //上传大小限制，注意不是php.ini中的上传文件大小
				'tooLarge' => '文件大于2M，上传失败！请上传小于2M的文件！'
			),
			 * 
			 */
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
			'name' => '名称',
			'link' => '链接',
			'logo' => 'logo',
			'orderid' => '排序',
			'is_show' => '是否显示',
			'create_uid' => '创建者',
			'create_time' => '创建时间',
			'update_uid' => '更新者',
			'update_time' => '更新时间',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('orderid',$this->orderid,true);
		$criteria->compare('is_show',$this->is_show);
		$criteria->compare('create_uid',$this->create_uid,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_uid',$this->update_uid,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Links the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
