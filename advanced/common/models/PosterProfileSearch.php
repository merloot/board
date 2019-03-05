<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Poster;

/**
 * PosterSearch represents the model behind the search form of `common\models\Poster`.
 */
class PosterProfileSearch extends Poster
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['po_id', 'po_id_user', 'po_id_categories', 'po_price', 'po_status', 'po_id_city'], 'integer'],
            [['po_title', 'po_description', 'po_image', 'po_data_create'], 'safe'],
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
        $query = Poster::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=>6,
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'po_id' => $this->po_id,
            'po_id_user' => $this->po_id_user,
            'po_id_categories' => $this->po_id_categories,
            'po_price' => $this->po_price,
            'po_status' => $this->po_status,
            'po_data_create' => $this->po_data_create,
            'po_id_city' => $this->po_id_city,
        ]);

        $query->andFilterWhere(['ilike', 'po_title', $this->po_title])
            ->andFilterWhere(['ilike', 'po_description', $this->po_description])
            ->andFilterWhere(['ilike', 'po_image', $this->po_image]);

        return $dataProvider;
    }
}
