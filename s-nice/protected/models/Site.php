<?php

/**
 * This is the model class for table "{{site}}".
 *
 * The followings are the available columns in table '{{site}}':
 * @property integer $id
 * @property string $name
 * @property string $domain
 * @property integer $status
 * @property string $remark
 * @property string $title
 * @property string $keyword
 * @property string $des
 * @property string $email
 * @property string $version
 * @property string $code
 */
class Site extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{site}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>60),
			array('domain, title', 'length', 'max'=>120),
			array('keyword, email, version', 'length', 'max'=>150),
			array('remark, des, code', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, domain, status, remark, title, keyword, des, email, version, code', 'safe', 'on'=>'search'),
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
			'name' => '网站名称',
			'domain' => '网站域名',
			'status' => '网站状态',
			'remark' => '备注',
			'title' => 'SEO标题',
			'keyword' => 'SEO关键词',
			'des' => 'SEO描述',
			'email' => '管理员邮箱',
			'version' => '版权信息',
			'code' => '统计代码',
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
		$criteria->compare('domain',$this->domain,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('keyword',$this->keyword,true);
		$criteria->compare('des',$this->des,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('version',$this->version,true);
		$criteria->compare('code',$this->code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Site the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
