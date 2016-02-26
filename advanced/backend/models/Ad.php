<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%ad}}".
 *
 * @property string $id
 * @property string $pid
 * @property string $title
 * @property string $img
 * @property string $link
 * @property string $orderid
 * @property integer $is_show
 * @property string $create_uid
 * @property string $create_at
 * @property string $update_at
 */
class Ad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ad}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'title', 'link', 'orderid', 'is_show', 'create_uid', 'create_at', 'update_at'], 'required'],
            [['pid', 'orderid', 'is_show', 'create_uid', 'create_at', 'update_at'], 'integer'],
            [['title', 'img', 'link'], 'string', 'max' => 120]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => '广告位',
            'title' => '标题',
            'img' => '图片',
            'link' => '链接',
            'orderid' => '排序',
            'is_show' => '是否显示',
            'create_uid' => '创建者',
            'create_at' => '创建时间',
            'update_at' => '更新时间',
        ];
    }
}
