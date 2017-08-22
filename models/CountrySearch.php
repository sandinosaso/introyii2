<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class CountrySearch extends Country
{ 
    /* setup rules */
    public function rules() {
       return [
        ['population', 'number'],
        [['code', 'name', 'population'], 'safe']
       ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
 
   
    public function search($params)
    {
        $query = Country::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 5 ],
        ]);


        // load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        // adjust the query by adding the filters
        $query->andFilterWhere(['code' => $this->code]);
        $query->andFilterWhere(['like', 'name', $this->name])
              ->andFilterWhere(['like', 'population', $this->population]);

        return $dataProvider;
    }
}