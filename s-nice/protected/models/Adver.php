<?php

/**
 * This is the model class for table "{{adver}}".
 *
 * The followings are the available columns in table '{{adver}}':
 * @property integer $id
 * @property string $name
 * @property string $remark
 * @property string $create_uid
 * @property string $create_time
 * @property string $update_uid
 * @property string $update_time
 */
class Adver extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{adver}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, create_uid, create_time, update_uid, update_time', 'required'),
			array('name', 'length', 'max'=>50),
			array('remark', 'length', 'max'=>200),
			array('create_uid, update_uid', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, remark, create_uid, create_time, update_uid, update_time', 'safe', 'on'=>'search'),
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
			'remark' => '备注',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('create_uid',$this->create_uid,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_uid',$this->update_uid,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->order='id desc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Adver the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	//获取广告位列表（数组）
	public static function getDropList() {
		$data = Adver::model()->findAll();
		
		$dropList = array();
		$dropList[0]='请选择';
		if($data){
			foreach ($data as $key => $row) {
				$dropList[$row['id']] = $row['name'];
			}
		}
		
		return $dropList;
	}
	
	public static function getName ( $id='')
	{
		$condition = array ('condition' => 'id=:id' , 'params' => array ( 'id' => $id ) );
		$dataRs = Adver::model()->find($condition);
		if($dataRs){
			return $dataRs['name'];
		}else{
			return '';
		}
	}
	
}
