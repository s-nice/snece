<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $user_name
 * @property string $real_name
 * @property string $password
 * @property integer $gender
 * @property string $phone
 * @property string $email
 * @property integer $qq
 * @property string $status
 * @property integer $login_num
 * @property string $last_login_time
 * @property string $last_login_ip
 * @property string $create_time
 * @property string $update_time
 */
class User extends CActiveRecord
{
	public $oldpwd;
	public $newpwd1;
	public $newpwd2;
	
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
			array('user_name, password, create_time', 'required'),
			array('gender, qq, login_num', 'numerical', 'integerOnly'=>true),
			
			//array('user_name, password', 'required','on'=>'admin_login'),
			//array('user_name, password', 'required','on'=>'create'),
			
			array('user_name, real_name, last_login_ip', 'length', 'max'=>20),
			array('user_name, real_name', 'length', 'min'=>3),
			array('password', 'length', 'min'=>6),
			array('password', 'length', 'max'=>64),
			array('phone', 'length', 'max'=>15),
			array('email', 'length', 'max'=>50),
			array('status', 'length', 'max'=>1),
			array('avatar', 'length', 'max'=>150),
			
			array('oldpwd, newpwd1, newpwd2', 'safe'),
			
			array('last_login_time, update_time, avatar', 'safe'),
			/*
			array('avatar',
				'file', //定义为file类型
				'allowEmpty' => false,
				//'types' => 'jpg,png,gif,doc,docx,pdf,xls,xlsx,zip,rar,ppt,pptx', //上传文件的类型
				'types' => 'jpg,png,gif', //上传文件的类型
				'maxSize' => 1024 * 1024 * 2, //上传大小限制，注意不是php.ini中的上传文件大小
				'tooLarge' => '文件大于2M，上传失败！请上传小于2M的文件！'
			),
			*/
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_name, real_name, password, gender, phone, email, qq, status, login_num, last_login_time, last_login_ip, create_time, update_time, avatar', 'safe', 'on'=>'search'),
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
			'user_name' => '用户名',
			'real_name' => '真实姓名',
			'password' => '密码',
			'gender' => '性别',
			'phone' => '手机号码',
			'email' => '邮箱',
			'qq' => 'QQ号码',
			'status' => '状态',
			'login_num' => '登录次数',
			'last_login_time' => '最后登录时间',
			'last_login_ip' => '最后登录IP',
			'create_time' => '创建时间',
			'update_time' => '修改时间',
			'avatar' => '头像',
			'oldpwd'=>'旧密码',
			'newpwd1' => '新密码',
			'newpwd2' => '确认',
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
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('real_name',$this->real_name,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('qq',$this->qq);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('login_num',$this->login_num);
		$criteria->compare('last_login_time',$this->last_login_time,true);
		$criteria->compare('last_login_ip',$this->last_login_ip,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
	
	public static function getName ( $uid='')
	{
		$condition = array ('condition' => 'id=:id' , 'params' => array ( 'id' => $uid ) );
		$dataRs = User::model()->find($condition);
		if($dataRs){
			return $dataRs['user_name'];
		}else{
			return '';
		}
	}
	
	public static function getGender ( $gender='')
	{
		if($gender==1){
			return '男';
		}else if($gender==2){
			return '女';
		}else{
			return '未设置';
		}
	}
	
	public static function getAvatar()
	{
		$uid=Yii::app()->user->id;
		$condition = array ('condition' => 'id=:id' , 'params' => array ( 'id' => $uid ) );
		$dataRs = User::model()->find($condition);
		if($dataRs){
			return $dataRs['avatar'];
		}else{
			return '';
		}
	}
	
}
