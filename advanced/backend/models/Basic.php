<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%basic}}".
 *
 * @property string $id
 * @property string $name
 * @property string $pid
 * @property string $orderid
 * @property string $create_uid
 * @property string $create_at
 * @property string $update_at
 */
class Basic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%basic}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'pid', 'create_uid', 'create_at', 'update_at'], 'required'],
            [['pid', 'orderid', 'create_uid', 'create_at', 'update_at'], 'integer'],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键自增ID',
            'name' => '名称',
            'pid' => '分类',
            'orderid' => '排序',
            'create_uid' => '创建者',
            'create_at' => '创建时间',
            'update_at' => '更新时间',
        ];
    }
}
