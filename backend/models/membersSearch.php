<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\members;

/**
 * membersSearch represents the model behind the search form about `app\models\members`.
 */
class membersSearch extends members
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mem_mid'], 'integer'],
            [['mem_first_name', 'mem_last_name', 'mem_email', 'mem_mobile', 'mem_city', 'mem_state', 'mem_country', 'mem_postal_code'], 'safe'],
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
        $query = members::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'mem_mid' => $this->mem_mid,
        ]);

        $query->andFilterWhere(['like', 'mem_first_name', $this->mem_first_name])
            ->andFilterWhere(['like', 'mem_last_name', $this->mem_last_name])
            ->andFilterWhere(['like', 'mem_email', $this->mem_email])
            ->andFilterWhere(['like', 'mem_mobile', $this->mem_mobile])
            ->andFilterWhere(['like', 'mem_city', $this->mem_city])
            ->andFilterWhere(['like', 'mem_state', $this->mem_state])
            ->andFilterWhere(['like', 'mem_country', $this->mem_country])
            ->andFilterWhere(['like', 'mem_postal_code', $this->mem_postal_code]);

        return $dataProvider;
    }
}
