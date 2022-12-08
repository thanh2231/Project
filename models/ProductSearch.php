<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'typeid', 'companyid', 'price'], 'integer'],
            [['name', 'description', 'image', 'configuration', 'screen', 'operatingsystem', 'camera', 'batteries', 'ngaysx'], 'safe'],
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
        $query = Product::find();

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
            'id' => $this->id,
            'typeid' => $this->typeid,
            'companyid' => $this->companyid,
            'price' => $this->price,
            'ngaysx' => $this->ngaysx,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'configuration', $this->configuration])
            ->andFilterWhere(['like', 'screen', $this->screen])
            ->andFilterWhere(['like', 'operatingsystem', $this->operatingsystem])
            ->andFilterWhere(['like', 'camera', $this->camera])
            ->andFilterWhere(['like', 'batteries', $this->batteries]);

        return $dataProvider;
    }
}
