<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Classroom;

/**
 * ClassroomSearch represents the model behind the search form about `backend\models\Classroom`.
 */

class ClassroomSearch extends Classroom
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'company_id', 'filial_id'], 'integer'],
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
        $query = Classroom::find();

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
            'company_id' => $this->company_id,
            'filial_id' => $this->filial_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        return $dataProvider;
    }
    public function filter($post)
    {
       $query = Classroom::find();
       $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $name = $_POST['ClassroomSearch']['name'];
        $filial_id = $_POST['ClassroomSearch']['filial_id'];
        $company_id = $_POST['ClassroomSearch']['company_id'];
       
        if(isset($filial_id) || isset($company_id) || isset($name)){
        $query->joinWith('company');
        $query->joinWith('filial');
        $query->andFilterWhere(['like', 'companies.name', $company_id])
              ->andFilterWhere(['like', 'filials.filial_name', $filial_id])
              ->andFilterWhere(['like', 'classroom.name', $name]);
        } 
         return $dataProvider;
    }
}
