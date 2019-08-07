<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Filials;

/**
 * FilialsSearch represents the model behind the search form about `backend\models\Filials`.
 */
class FilialsSearch extends Filials
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'region_id', 'district_id', 'company_id'], 'integer'],
            [['filial_name', 'logo', 'surname', 'name', 'middle_name', 'phone', 'address', 'site', 'email'], 'safe'],
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
        $query = Filials::find();

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
            'region_id' => $this->region_id,
            'district_id' => $this->district_id,
            'company_id' => $this->company_id,
        ]);

        $query->andFilterWhere(['like', 'filial_name', $this->filial_name])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'site', $this->site])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
    public function filter($post)
    {
        $query = Filials::find();
        $dataProvider = new ActiveDataProvider([
        'query' => $query,
        ]);
        $filial_name=$_POST['FilialsSearch']['filial_name'];
        $region_id=$_POST['FilialsSearch']['region_id'];
        $district_id=$_POST['FilialsSearch']['district_id'];
        $company_id=$_POST['FilialsSearch']['company_id'];
        $surname=$_POST['FilialsSearch']['surname'];
        $name=$_POST['FilialsSearch']['name'];
        $middle_name=$_POST['FilialsSearch']['middle_name'];
        $phone=$_POST['FilialsSearch']['phone'];
        $address=$_POST['FilialsSearch']['address'];
        $email=$_POST['FilialsSearch']['email'];
        $site=$_POST['FilialsSearch']['site'];

        if(isset($filial_name) || isset($region_id) || isset($district_id) || isset($company_id)
            || isset($surname) || isset($name) || isset($middle_name) || isset($phone) ||isset($address) || isset($email) || isset($site)){
        $query->joinWith('company');                
        $query->joinWith('region');
        $query->joinWith('district');

        $query->andFilterWhere(['like', 'districts.name', $district_id])
              ->andFilterWhere(['like', 'filials.filial_name', $filial_name])
              ->andFilterWhere(['like', 'regions.name', $region_id])
              ->andFilterWhere(['like', 'districts.name', $district_id])
              ->andFilterWhere(['or',
                                ['like','filials.surname',$admin],
                                ['like','filials.name',$admin],
                                ['like','filials.middlename',$admin],])
              ->andFilterWhere(['like', 'filials.phone', $phone])
              ->andFilterWhere(['like', 'filials.address', $address])
              ->andFilterWhere(['like', 'filials.email', $email])
              ->andFilterWhere(['like', 'filials.site', $site])
              ->andFilterWhere(['like', 'companies.name', $company_id]);
        } 
         return $dataProvider;
    }
}
