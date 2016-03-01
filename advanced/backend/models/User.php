<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends \yii\db\ActiveRecord
{
	public $newpw;
	public $repeat;

	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

	public function scenarios() {
		return [
			'pw' => ['password_hash', 'newpw', 'repeat', 'avatar'],
			'default' => ['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'],
		];
	}

	/**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required', 'on' => ['default']],
			[['newpw', 'repeat'], 'required', 'on' => ['pw']],
			[['password_hash'], 'required', 'message' => '旧密码不能为空.', 'on' => ['pw']],
            [['status', 'created_at', 'updated_at'], 'integer', 'on' => ['default']],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255, 'on' => ['default']],
            [['auth_key'], 'string', 'max' => 32, 'on' => ['default']],
			
			['repeat', 'compare', 'compareAttribute' => 'newpw', 'operator' => '===', 'message' => '两次密码不一致.', 'on' => ['pw']],
			[['avatar'], 'file', 'on' => ['pw']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'auth_key' => 'Auth Key',
            'password_hash' => '密码',
            'password_reset_token' => 'Password Reset Token',
            'email' => '邮箱',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
			'newpw' => '新密码',
			'repeat' => '确认新密码',
			'avatar' => '头像',
			'type' => '身份类型',
			'phone' => '手机号码',
			
        ];
    }
	
	public static function getName($id){
		$name=User::find()->where(['id' => $id])->one()->username;
		return $name;
	}
	
}
