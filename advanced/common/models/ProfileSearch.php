<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Profile;

/**
 * ProfileSearch represents the model behind the search form of `common\models\Profile`.
 */
class ProfileSearch extends Profile
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['p_id', 'p_user_id', 'p_phone', 'p_id_city'], 'integer'],
            [['p_name', 'p_description', 'p_image', 'p_date_create'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Profile::find();

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
            'p_id' => $this->p_id,
            'p_user_id' => $this->p_user_id,
            'p_phone' => $this->p_phone,
            'p_id_city' => $this->p_id_city,
        ]);

        $query->andFilterWhere(['ilike', 'p_name', $this->p_name])
            ->andFilterWhere(['ilike', 'p_description', $this->p_description])
            ->andFilterWhere(['ilike', 'p_image', $this->p_image]);

        return $dataProvider;
    }
}
