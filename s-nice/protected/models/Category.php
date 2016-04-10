<?php

/**
 * This is the model class for table "{{category}}".
 *
 * The followings are the available columns in table '{{category}}':
 * @property string $id
 * @property string $name
 * @property integer $pid
 * @property integer $is_show
 * @property string $orderid
 * @property string $create_uid
 * @property string $create_time
 */
class Category extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{category}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, create_uid, create_time', 'required'),
			array('pid, is_show', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>30),
			array('orderid', 'length', 'max'=>10),
			array('create_uid', 'length', 'max'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, pid, is_show, orderid, create_uid, create_time', 'safe', 'on'=>'search'),
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
			'pid' => '上级分类',
			'is_show' => '是否显示',
			'orderid' => '排序',
			'create_uid' => '创建者',
			'create_time' => '创建时间',
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
		$criteria->compare('pid',$this->pid);
		$criteria->compare('is_show',$this->is_show);
		$criteria->compare('orderid',$this->orderid,true);
		$criteria->compare('create_uid',$this->create_uid,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	//获取分类列表（数组）
	public static function getDropList($pid) {
		$model = new Category();
		$criteria = new CDbCriteria();
		$criteria->addCondition("pid=$pid");
		$criteria->order = 'orderid ASC';
		$data = $model->findAll($criteria);
		
		if($data){
			foreach ($data as $key => $row) {
				$dropList[$row['id']] = $row['name'];
			}
		}
		
		return $dropList;
	}
	
	public static function getParent ( $pid='')
	{
		$condition = array ('condition' => 'id=:id' , 'params' => array ( 'id' => $pid ) );
		$dataRs = Category::model()->find($condition);
		if($dataRs){
			return $dataRs;
		}else{
			return '';
		}
	}
	
	public static function getName ( $pid='')
	{
		$condition = array ('condition' => 'id=:id' , 'params' => array ( 'id' => $pid ) );
		$dataRs = Category::model()->find($condition);
		if($dataRs){
			return $dataRs['name'];
		}else{
			return '';
		}
	}
	
}
