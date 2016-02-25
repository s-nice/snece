<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%activity}}".
 *
 * @property string $id
 * @property string $name
 * @property string $template
 * @property string $link
 * @property string $remark
 * @property string $orderid
 * @property string $create_uid
 * @property string $create_at
 * @property string $update_at
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%activity}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'template', 'link', 'create_uid', 'create_at', 'update_at'], 'required'],
            [['orderid', 'create_uid', 'create_at', 'update_at'], 'integer'],
            [['name', 'template'], 'string', 'max' => 50],
            [['link', 'remark'], 'string', 'max' => 120]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'template' => '模板',
            'link' => '链接',
            'remark' => '备注',
            'orderid' => '排序',
            'create_uid' => '创建者',
            'create_at' => '创建时间',
            'update_at' => '更新时间',
        ];
    }
}
