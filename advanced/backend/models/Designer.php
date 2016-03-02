<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%designer}}".
 *
 * @property string $id
 * @property string $uid
 * @property string $name
 * @property string $sentence
 * @property integer $auth_type
 * @property string $province
 * @property string $city
 * @property string $avatar
 * @property string $label
 * @property string $exp
 * @property string $feeh
 * @property string $feel
 * @property string $good_style
 * @property string $good_space
 * @property string $brief
 * @property string $award
 * @property string $bgimg
 * @property integer $is_show
 * @property integer $is_rec
 * @property string $orderid
 * @property string $level
 * @property string $create_uid
 * @property string $create_at
 */
class Designer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%designer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'name', 'create_uid', 'create_at'], 'required'],
            [['uid', 'auth_type', 'province', 'city', 'feeh', 'feel', 'is_show', 'is_rec', 'orderid', 'level', 'create_uid', 'create_at'], 'integer'],
            [['brief', 'award'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['sentence', 'bgimg'], 'string', 'max' => 150],
            [['avatar', 'exp'], 'string', 'max' => 120],
            [['label'], 'string', 'max' => 12],
            [['good_style', 'good_space'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => '用户ID',
            'name' => '姓名',
            'sentence' => '一句话签名',
            'auth_type' => '认证状态',
            'province' => '省份',
            'city' => '城市',
            'avatar' => '头像',
            'label' => '标签',
            'exp' => '经验',
            'feeh' => '最高收费',
            'feel' => '最低收费',
            'good_style' => '擅长风格',
            'good_space' => '擅长空间',
            'brief' => '简介',
            'award' => '证书与奖励',
            'bgimg' => '主页背景图',
            'is_show' => '是否显示',
            'is_rec' => '是否推荐',
            'orderid' => '排序',
            'level' => '级别',
            'create_uid' => '创建者',
            'create_at' => '创建时间',
        ];
    }
}
