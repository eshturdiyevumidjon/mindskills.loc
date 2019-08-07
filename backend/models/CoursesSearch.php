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
    public function filter($post)
    {
        $query = Courses::find();
        $dataProvider = new ActiveDataProvider([
        'query' => $query,
        ]);
        $name = $_POST['CoursesSearch']['name'];
        $subject_id = $_POST['CoursesSearch']['subject_id'];
        $user_id = $_POST['CoursesSearch']['user_id'];
        $company_id = $_POST['CoursesSearch']['company_id'];
        $begin_date = ($_POST['CoursesSearch']['begin_date'])?\Yii::$app->formatter->asDate($_POST['CoursesSearch']['begin_date'], 'php:Y-m-d'):"";;
        $end_date = ($_POST['CoursesSearch']['end_date'])?\Yii::$app->formatter->asDate($_POST['CoursesSearch']['end_date'], 'php:Y-m-d'):"";;
        $prosent_for_teacher = $_POST['CoursesSearch']['prosent_for_teacher'];
        $cost = $_POST['CoursesSearch']['cost'];
        $filial_id = $_POST['CoursesSearch']['filial_id'];
       
        if(isset($name) || isset($subject_id) || isset($user_id) || isset($company_id)
            || isset($begin_date) || isset($end_date) || isset($prosent_for_teacher) || isset($cost) ||isset($filial_id) ||isset($user_id)){

        $query->joinWith('company');                
        $query->joinWith('subject');
        $query->joinWith('filial');
        $query->joinWith('user');

        $query->andFilterWhere(['like', 'courses.name', $name])
              ->andFilterWhere(['like', 'subjects.name', $subject_id])
              ->andFilterWhere(['like', 'user.fio', $user_id])
              ->andFilterWhere(['like', 'courses.begin_date', $begin_date])
              ->andFilterWhere(['like', 'courses.end_date', $end_date])
              ->andFilterWhere(['like', 'courses.prosent_for_teacher', $prosent_for_teacher])
              ->andFilterWhere(['like', 'courses.cost', $cost])
              ->andFilterWhere(['like', 'filials.filial_name', $filial_id])
              ->andFilterWhere(['like', 'companies.name', $company_id]);
            }
        return $dataProvider;
    }
}
