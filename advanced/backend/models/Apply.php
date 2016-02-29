<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%apply}}".
 *
 * @property string $id
 * @property string $aid
 * @property string $mid
 * @property string $name
 * @property string $phone
 * @property string $province
 * @property string $city
 * @property string $property
 * @property string $money
 * @property string $prize
 * @property string $cid
 * @property string $did
 * @property integer $eff
 * @property integer $status
 * @property string $create_time
 * @property string $remark
 */
class Apply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%apply}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aid', 'name', 'phone', 'province', 'city', 'create_time'], 'required'],
            [['aid', 'mid', 'money', 'cid', 'did', 'eff', 'status'], 'integer'],
            [['create_time'], 'safe'],
            [['remark'], 'string'],
            [['name', 'property'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 20],
            [['province'], 'string', 'max' => 15],
            [['city'], 'string', 'max' => 36],
            [['prize'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'aid' => '活动',
            'mid' => '媒体',
            'name' => '姓名',
            'phone' => '手机号',
            'province' => '省份',
            'city' => '城市',
            'property' => '楼盘',
            'money' => '金额',
            'prize' => '奖品',
            'cid' => '跟进客服',
            'did' => '设计师',
            'eff' => '有效性',
            'status' => '跟进状态',
            'create_time' => '报名时间',
            'remark' => '备注',
        ];
    }
}
