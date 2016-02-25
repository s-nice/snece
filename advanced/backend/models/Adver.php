<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%adver}}".
 *
 * @property string $id
 * @property string $name
 * @property string $remark
 * @property string $create_uid
 * @property string $create_at
 * @property string $update_at
 */
class Adver extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%adver}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'create_uid', 'create_at', 'update_at'], 'required'],
            [['create_uid', 'create_at', 'update_at'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['remark'], 'string', 'max' => 120]
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
            'remark' => '备注',
            'create_uid' => '创建者',
            'create_at' => '创建时间',
            'update_at' => '更新时间',
        ];
    }
}
