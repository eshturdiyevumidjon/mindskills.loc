<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * UserSearch represents the model behind the search form about `common\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'status', 'created_at', 'updated_at', 'filial_id', 'company_id'], 'integer'],
            [['fio', 'username', 'auth_key', 'password_hash', 'birthday', 'phone','search', 'image'], 'safe'],
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
    public function search($params,$id=-1)
    {
        $query = User::find();
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
            'type' => ($id != -1) ? $id : $this->type,
            'birthday' => $this->birthday,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'filial_id' => $this->filial_id,
            'company_id' => $this->company_id,
        ]);
        $query->andFilterWhere(['like', 'fio', $this->fio])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'image', $this->image]);
            return $dataProvider;
    }
    public function filter($post,$type)
    {
        $query = User::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $birthday = ($post['UserSearch']['birthday'])?\Yii::$app->formatter->asDate($post['UserSearch']['birthday'], 'php:Y-m-d'):"";
        $filial_id = $post['UserSearch']['filial_id'];
        $company_id = $post['UserSearch']['company_id'];
        $fio = $post['UserSearch']['fio'];
        $username = $post['UserSearch']['username'];
        $phone = $post['UserSearch']['phone'];
        $balanc = $post['UserSearch']['balanc'];

        if($post['UserSearch']['status']) 
            if($post['UserSearch']['status'] == "Активен")$status = 0;     
            if($post['UserSearch']['status'] == "Не активен")$status = 10;
       
        if(isset($birthday) || isset($status) || isset($filial_id) || isset($company_id)
            || isset($fio) || isset($username) ||isset($phone) || isset($balanc)){
            $query->andFilterWhere([
                'user.type' => $type,
                'user.balanc' => $balanc,
                'user.status' => $status
            ]);
            $query->joinWith('company');
            $query->joinWith('filial');
            $query->andFilterWhere(['like', 'fio', $fio])
                    ->andFilterWhere(['like', 'username', $username])
                    ->andFilterWhere(['like', 'birthday', $birthday])
                    ->andFilterWhere(['like', 'companies.name', $company_id])
                    ->andFilterWhere(['like', 'filials.filial_name', $filial_id])
                    ->andFilterWhere(['like', 'user.status', $status])
                    ->andFilterWhere(['like', 'user.phone', $phone]);        
         } 
         return $dataProvider;
    }
}
