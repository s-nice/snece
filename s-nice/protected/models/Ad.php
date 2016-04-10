<?php

/**
 * This is the model class for table "{{ad}}".
 *
 * The followings are the available columns in table '{{ad}}':
 * @property string $id
 * @property integer $pid
 * @property string $name
 * @property string $brief
 * @property string $img
 * @property string $link
 * @property string $orderid
 * @property integer $is_show
 * @property string $create_uid
 * @property string $create_time
 * @property string $update_uid
 * @property string $update_time
 */
class Ad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{ad}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pid, name, create_uid, create_time, update_uid, update_time', 'required'),
			array('pid, is_show', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('img, link', 'length', 'max'=>150),
			array('orderid', 'length', 'max'=>6),
			array('create_uid, update_uid', 'length', 'max'=>5),
			array('brief, link, title', 'safe'),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pid, name, brief, img, link, orderid, is_show, create_uid, create_time, update_uid, update_time', 'safe', 'on'=>'search'),
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
			'pid' => '广告位',
			'name' => '名称',
			'title' => '标题',
			'brief' => '简介',
			'img' => '图片',
			'link' => '链接',
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
		$criteria->compare('pid',$this->pid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('brief',$this->brief,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('link',$this->link,true);
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
	 * @return Ad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
