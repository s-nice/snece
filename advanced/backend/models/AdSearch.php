<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Ad;

/**
 * AdSearch represents the model behind the search form about `backend\models\Ad`.
 */
class AdSearch extends Ad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pid', 'orderid', 'is_show', 'create_uid', 'create_at', 'update_at'], 'integer'],
            [['title', 'img', 'link'], 'safe'],
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
        $query = Ad::find();

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
            'orderid' => $this->orderid,
            'is_show' => $this->is_show,
            'create_uid' => $this->create_uid,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'link', $this->link]);

        return $dataProvider;
    }
}
