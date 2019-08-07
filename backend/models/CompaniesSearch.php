<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Companies;

/**
 * CompaniesSearch represents the model behind the search form about `backend\models\Companies`.
 */
class CompaniesSearch extends Companies
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type'], 'integer'],
            [['name'], 'safe'],
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
        $query = Companies::find();

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
            'type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
    public function filter($post)
    {
      $query = Companies::find();
      $searchModel = new CompaniesSearch();
      $dataProvider = new ActiveDataProvider([
          'query' => $query,]);
      $name=$_POST['CompaniesSearch']['name'];
      $tarif_id=$_POST['CompaniesSearch']['tarif_id']; 

      if(isset($name) || isset($tarif_id)){
          $query->joinWith('tarifs');
          $query->andFilterWhere(['like', 'tarifs.name', $tarif_id])
                ->andFilterWhere(['like', 'companies.name', $name]); 
      }
       return $dataProvider;
    }
}
