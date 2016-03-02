<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Designer;

/**
 * DesignerSearch represents the model behind the search form about `backend\models\Designer`.
 */
class DesignerSearch extends Designer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'uid', 'auth_type', 'province', 'city', 'feeh', 'feel', 'is_show', 'is_rec', 'orderid', 'level', 'create_uid', 'create_at'], 'integer'],
            [['name', 'sentence', 'avatar', 'label', 'exp', 'good_style', 'good_space', 'brief', 'award', 'bgimg'], 'safe'],
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
        $query = Designer::find();

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
            'uid' => $this->uid,
            'auth_type' => $this->auth_type,
            'province' => $this->province,
            'city' => $this->city,
            'feeh' => $this->feeh,
            'feel' => $this->feel,
            'is_show' => $this->is_show,
            'is_rec' => $this->is_rec,
            'orderid' => $this->orderid,
            'level' => $this->level,
            'create_uid' => $this->create_uid,
            'create_at' => $this->create_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'sentence', $this->sentence])
            ->andFilterWhere(['like', 'avatar', $this->avatar])
            ->andFilterWhere(['like', 'label', $this->label])
            ->andFilterWhere(['like', 'exp', $this->exp])
            ->andFilterWhere(['like', 'good_style', $this->good_style])
            ->andFilterWhere(['like', 'good_space', $this->good_space])
            ->andFilterWhere(['like', 'brief', $this->brief])
            ->andFilterWhere(['like', 'award', $this->award])
            ->andFilterWhere(['like', 'bgimg', $this->bgimg]);

        return $dataProvider;
    }
}
