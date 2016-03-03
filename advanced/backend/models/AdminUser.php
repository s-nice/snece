<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%adminuser}}".
 *
 * @property string $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property string $avatar
 * @property string $phone
 * @property integer $type
 * @property string $created_at
 * @property string $updated_at
 */
class Adminuser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%adminuser}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'type', 'created_at', 'updated_at'], 'required'],
            [['status', 'type', 'created_at', 'updated_at'], 'integer'],
            [['username'], 'string', 'max' => 30],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['avatar'], 'string', 'max' => 120],
            [['phone'], 'string', 'max' => 20]
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
            'avatar' => '头像',
            'phone' => '手机号码',
            'type' => '身份类型',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
