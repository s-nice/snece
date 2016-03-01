<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%question}}".
 *
 * @property string $id
 * @property string $pid
 * @property integer $relid
 * @property string $question
 * @property string $detail
 * @property string $questioner
 * @property string $orderid
 * @property integer $status
 * @property integer $is_show
 * @property integer $source
 * @property string $label
 * @property string $views
 * @property integer $answers
 * @property string $create_at
 * @property integer $is_rec
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%question}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'question', 'questioner', 'create_at'], 'required'],
            [['pid', 'relid', 'questioner', 'orderid', 'status', 'is_show', 'source', 'views', 'answers', 'create_at', 'is_rec'], 'integer'],
            [['detail'], 'string'],
            [['question'], 'string', 'max' => 200],
            [['label'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => '分类',
            'relid' => '关联ID',
            'question' => '问题',
            'detail' => '问题详情',
            'questioner' => '提问者',
            'orderid' => '排序',
            'status' => '状态',
            'is_show' => '是否显示',
            'source' => '来源',
            'label' => '标签',
            'views' => '浏览次数',
            'answers' => '回答次数',
            'create_at' => '提问时间',
            'is_rec' => '是否推荐',
        ];
    }
}
