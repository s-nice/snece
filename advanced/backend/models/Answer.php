<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%answer}}".
 *
 * @property string $id
 * @property string $qid
 * @property string $answer
 * @property string $answer_uid
 * @property string $create_at
 * @property string $praise
 * @property integer $source
 */
class Answer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%answer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['qid', 'answer', 'answer_uid', 'create_at'], 'required'],
            [['qid', 'answer_uid', 'create_at', 'praise', 'source'], 'integer'],
            [['answer'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'qid' => '问题',
            'answer' => '回答',
            'answer_uid' => '回答者',
            'create_at' => '回答时间',
            'praise' => '赞',
            'source' => '来源',
        ];
    }
}
