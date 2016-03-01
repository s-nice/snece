<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Question;

/**
 * QuestionSearch represents the model behind the search form about `backend\models\Question`.
 */
class QuestionSearch extends Question
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pid', 'relid', 'questioner', 'orderid', 'status', 'is_show', 'source', 'views', 'answers', 'create_at', 'is_rec'], 'integer'],
            [['question', 'detail', 'label'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Question::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'pid' => $this->pid,
            'relid' => $this->relid,
            'questioner' => $this->questioner,
            'orderid' => $this->orderid,
            'status' => $this->status,
            'is_show' => $this->is_show,
            'source' => $this->source,
            'views' => $this->views,
            'answers' => $this->answers,
            'create_at' => $this->create_at,
            'is_rec' => $this->is_rec,
        ]);

        $query->andFilterWhere(['like', 'question', $this->question])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'label', $this->label]);

        return $dataProvider;
    }
}
