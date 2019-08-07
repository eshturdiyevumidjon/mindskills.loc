<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Schedule;

/**
 * ScheduleSearch represents the model behind the search form about `backend\models\Schedule`.
 */
class ScheduleSearch extends Schedule
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'company_id', 'filial_id', 'subject_id', 'teacher_id', 'status', 'type'], 'integer'],
            [['name', 'begin_date', 'end_date'], 'safe'],
            [['price', 'sum_of_teacher'], 'number'],
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
        $query = Schedule::find();

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
            'subject_id' => $this->subject_id,
            'teacher_id' => $this->teacher_id,
            'price' => $this->price,
            'sum_of_teacher' => $this->sum_of_teacher,
            'begin_date' => $this->begin_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
            'type' => $this->type,
        ]);
        $query->andFilterWhere(['like', 'name', $this->name]);
            return $dataProvider;
    }
    public function filter($post)
    {
       $query = Schedule::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $name=$_POST['ScheduleSearch']['name'];
        $company_id=$_POST['ScheduleSearch']['company_id'];
        $filial_id=$_POST['ScheduleSearch']['filial_id'];
        $subject_id=$_POST['ScheduleSearch']['subject_id'];
        $teacher_id=$_POST['ScheduleSearch']['teacher_id'];
        $price=$_POST['ScheduleSearch']['price'];
        $sum_of_teacher=$_POST['ScheduleSearch']['sum_of_teacher'];
        $begin_date=($_POST['ScheduleSearch']['begin_date'])?\Yii::$app->formatter->asDate($_POST['ScheduleSearch']['begin_date'], 'php:Y-m-d'):"";
        $end_date=($_POST['ScheduleSearch']['end_date'])?\Yii::$app->formatter->asDate($_POST['ScheduleSearch']['end_date'], 'php:Y-m-d'):"";
       
        if($_POST['ScheduleSearch']['status']) 
            if($_POST['ScheduleSearch']['status']=="Создано")$status=0;     
            if($_POST['ScheduleSearch']['status']=="Завершено")$status=10;

        if($_POST['ScheduleSearch']['type']) 
            if($_POST['ScheduleSearch']['type']=="Регулярные занятия")$type=1;     
            if($_POST['ScheduleSearch']['type']=="Единичное занятие")$type=2;

        if(isset($name) || isset($company_id) || isset($filial_id) || isset($subject_id) || isset($teacher_id) || isset($price) || isset($sum_of_teacher) || isset($begin_date) || isset($end_date) || isset($status) || isset($type)){

        $query->joinWith('company');
        $query->joinWith('filial');
        $query->joinWith('subject');
        $query->joinWith('teacher');
        $query->andFilterWhere([
                'schedule.price' => $price,
                'schedule.sum_of_teacher' => $sum_of_teacher,
                'schedule.status' => $status,
                'schedule.type' => $type,
        ]);
        $query->andFilterWhere(['like', 'companies.name', $company_id])
              ->andFilterWhere(['like', 'filials.filial_name', $filial_id])
              ->andFilterWhere(['like', 'subjects.name', $subject_id])
              ->andFilterWhere(['like', 'user.fio', $teacher_id])
              ->andFilterWhere(['like', 'schedule.begin_date', $begin_date])
              ->andFilterWhere(['like', 'schedule.end_date', $end_date])
              ->andFilterWhere(['like', 'schedule.name', $name]);
        }
         return $dataProvider;
    }
}
