<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Courses;

/**
 * CoursesSearch represents the model behind the search form about `backend\models\Courses`.
 */
class CoursesSearch extends Courses
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'subject_id', 'user_id', 'company_id', 'filial_id'], 'integer'],
            [['name', 'begin_date', 'end_date'], 'safe'],
            [['cost', 'prosent_for_teacher'], 'number'],
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
        $query = Courses::find();
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
            'subject_id' => $this->subject_id,
            'user_id' => $this->user_id,
            'begin_date' => $this->begin_date,
            'end_date' => $this->end_date,
            'cost' => $this->cost,
            'prosent_for_teacher' => $this->prosent_for_teacher,
            'company_id' => $this->company_id,
            'filial_id' => $this->filial_id,
        ]);
        $query->andFilterWhere(['like', 'name', $this->name]);
        return $dataProvider;
    }
}
