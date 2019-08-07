<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tarifs;

/**
 * TarifsSearch represents the model behind the search form about `backend\models\Tarifs`.
 */
class TarifsSearch extends Tarifs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'days'], 'integer'],
            [['name'], 'safe'],
            [['price'], 'number'],
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
        $query = Tarifs::find();

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
            'days' => $this->days,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
    public function filter($post)
    {
        $query = Tarifs::find();
        $dataProvider = new ActiveDataProvider([
        'query' => $query,
        ]);
        $name=$_POST['TarifsSearch']['name'];
        $days=$_POST['TarifsSearch']['days'];
        $price=$_POST['TarifsSearch']['price'];

        if(isset($name) || isset($days) || isset($price)){
            
        $query->andFilterWhere(['like', 'tarifs.name', $name])
              ->andFilterWhere(['like', 'tarifs.days', $days])
              ->andFilterWhere(['like', 'tarifs.price', $price]);
        } 
         return $dataProvider;
    }
}
