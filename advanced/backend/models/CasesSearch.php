<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Cases;

/**
 * CasesSearch represents the model behind the search form about `backend\models\Cases`.
 */
class CasesSearch extends Cases
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pid', 'aid', 'did', 'bedroom', 'style', 'budget', 'cost_range', 'area', 'area_range', 'space', 'is_rec', 'is_show', 'orderid', 'views', 'create_uid', 'create_at', 'update_at'], 'integer'],
            [['name', 'img', 'brief'], 'safe'],
            [['cost'], 'number'],
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
        $query = Cases::find();

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
            'aid' => $this->aid,
            'did' => $this->did,
            'bedroom' => $this->bedroom,
            'style' => $this->style,
            'budget' => $this->budget,
            'cost' => $this->cost,
            'cost_range' => $this->cost_range,
            'area' => $this->area,
            'area_range' => $this->area_range,
            'space' => $this->space,
            'is_rec' => $this->is_rec,
            'is_show' => $this->is_show,
            'orderid' => $this->orderid,
            'views' => $this->views,
            'create_uid' => $this->create_uid,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'brief', $this->brief]);

        return $dataProvider;
    }
}
