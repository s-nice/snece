<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%links}}".
 *
 * @property string $id
 * @property string $name
 * @property string $img
 * @property string $link
 * @property string $orderid
 * @property string $create_uid
 * @property string $create_at
 * @property string $update_at
 */
class Links extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%links}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'link', 'orderid', 'create_uid', 'create_at', 'update_at'], 'required'],
            [['orderid', 'create_uid', 'create_at', 'update_at'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['img', 'link'], 'string', 'max' => 120],
			[['img'], 'file'],
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
            'img' => '图片',
            'link' => '链接',
            'orderid' => '排序',
            'create_uid' => '创建者',
            'create_at' => '创建时间',
            'update_at' => '更新时间',
        ];
    }
}
