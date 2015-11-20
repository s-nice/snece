<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "s_menu".
 *
 * @property string $id
 * @property string $name
 * @property integer $pid
 * @property string $url
 * @property integer $level
 * @property string $path
 * @property string $orderid
 * @property integer $is_show
 * @property string $create_uid
 * @property string $create_time
 * @property string $update_uid
 * @property string $update_time
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 's_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'pid', 'orderid', 'create_uid', 'create_time'], 'required'],
            [['pid', 'level', 'orderid', 'is_show', 'create_uid', 'update_uid'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['url'], 'string', 'max' => 120],
            [['path'], 'string', 'max' => 15]
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
            'pid' => '上级菜单',
            'url' => 'URL',
            'level' => '层级',
            'path' => '路径',
            'orderid' => '排序',
            'is_show' => '是否显示',
            'create_uid' => '创建者',
            'create_time' => '创建时间',
            'update_uid' => '更新者',
            'update_time' => '更新时间',
        ];
    }
}
