<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Apply;

/**
 * ApplySearch represents the model behind the search form about `backend\models\Apply`.
 */
class ApplySearch extends Apply
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'aid', 'mid', 'money', 'cid', 'did', 'eff', 'status'], 'integer'],
            [['name', 'phone', 'province', 'city', 'property', 'prize', 'create_time', 'remark'], 'safe'],
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
        $query = Apply::find();

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
            'aid' => $this->aid,
            'mid' => $this->mid,
            'money' => $this->money,
            'cid' => $this->cid,
            'did' => $this->did,
            'eff' => $this->eff,
            'status' => $this->status,
            'create_time' => $this->create_time,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'property', $this->property])
            ->andFilterWhere(['like', 'prize', $this->prize])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
