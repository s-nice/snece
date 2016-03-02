<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%cases}}".
 *
 * @property string $id
 * @property string $name
 * @property string $pid
 * @property string $aid
 * @property string $did
 * @property string $bedroom
 * @property string $style
 * @property string $budget
 * @property double $cost
 * @property string $cost_range
 * @property string $area
 * @property string $area_range
 * @property string $space
 * @property string $img
 * @property string $brief
 * @property integer $is_rec
 * @property integer $is_show
 * @property string $orderid
 * @property string $views
 * @property integer $create_uid
 * @property string $create_at
 * @property string $update_at
 */
class Cases extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cases}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'pid', 'aid', 'did', 'bedroom', 'style', 'area', 'area_range', 'space', 'create_uid', 'create_at', 'update_at'], 'required'],
            [['pid', 'aid', 'did', 'bedroom', 'style', 'budget', 'cost_range', 'area', 'area_range', 'space', 'is_rec', 'is_show', 'orderid', 'views', 'create_uid', 'create_at', 'update_at'], 'integer'],
            [['cost'], 'number'],
            [['brief'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['img'], 'string', 'max' => 120]
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
            'pid' => '楼盘ID',
            'aid' => '户型ID',
            'did' => '设计师ID',
            'bedroom' => '居室',
            'style' => '风格',
            'budget' => '预算',
            'cost' => '造价',
            'cost_range' => '造价范围',
            'area' => '面积',
            'area_range' => '面积范围',
            'space' => '空间',
            'img' => '图片',
            'brief' => '简介',
            'is_rec' => '是否推荐',
            'is_show' => '是否显示',
            'orderid' => '排序',
            'views' => '浏览数',
            'create_uid' => '创建者',
            'create_at' => '创建时间',
            'update_at' => '更新时间',
        ];
    }
}
