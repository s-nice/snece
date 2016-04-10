<?php

/**
 * This is the model class for table "{{image}}".
 *
 * The followings are the available columns in table '{{image}}':
 * @property string $id
 * @property integer $pid
 * @property string $img
 * @property string $des
 * @property string $orderid
 * @property integer $is_show
 * @property string $create_at
 * @property string $create_uid
 */
class Image extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{image}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pid, img, create_at, create_uid', 'required'),
			array('title', 'safe'),
			array('pid, is_show', 'numerical', 'integerOnly'=>true),
			array('img', 'length', 'max'=>90),
			array('des', 'length', 'max'=>150),
			array('orderid, create_at', 'length', 'max'=>10),
			array('create_uid', 'length', 'max'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pid, img, des, orderid, is_show, create_at, create_uid', 'safe', 'on'=>'search'),
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
			'title' => '标题',
			'pid' => '分类',
			'img' => '图片',
			'des' => '描述',
			'orderid' => '排序',
			'is_show' => '是否显示',
			'create_at' => '上传时间',
			'create_uid' => '上传者',
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
		$criteria->compare('pid',$this->pid);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('des',$this->des,true);
		$criteria->compare('orderid',$this->orderid,true);
		$criteria->compare('is_show',$this->is_show);
		$criteria->compare('create_at',$this->create_at,true);
		$criteria->compare('create_uid',$this->create_uid,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Image the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
