<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ScheduleGraph;

/**
 * ScheduleGraphSearch represents the model behind the search form about `backend\models\ScheduleGraph`.
 */
class ScheduleGraphSearch extends ScheduleGraph
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'schedule_id', 'classroom_id','period','type'], 'integer'],
            [['begin_date', 'end_date','class_date','class_start','class_duration','day_of_the_week'], 'safe'],
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
        $query = ScheduleGraph::find();

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
            'schedule_id' => $this->schedule_id,
            'classroom_id' => $this->classroom_id,
            'begin_date' => $this->begin_date,
            'end_date' => $this->end_date,
            'type' => $this->integer(),
            'day_of_the_week' => $this->string(),
            'period' => $this->integer(),
            'class_date' => $this->date(),
            'class_start' => $this->time(),
            'class_duration' => $this->time(),
        ]);
        return $dataProvider;
    }
    public function filter($post)
    {
        $query = ScheduleGraph::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $schedule_id=$_POST['ScheduleGraphSearch']['schedule_id'];
        $classroom_id=$_POST['ScheduleGraphSearch']['classroom_id'];
        $begin_date=($_POST['ScheduleGraphSearch']['begin_date'])?\Yii::$app->formatter->asDate($_POST['ScheduleGraphSearch']['begin_date'], 'php:Y-m-d'):"";;
        $end_date=($_POST['ScheduleGraphSearch']['end_date'])?\Yii::$app->formatter->asDate($_POST
            ['ScheduleGraphSearch']['end_date'], 'php:Y-m-d'):"";;

        if(isset($schedule_id) || isset($classroom_id) || isset($begin_date) || isset($end_date)){

            $query->joinWith('schedule');
            $query->joinWith('classroom');

            $query->andFilterWhere(['like', 'schedule.name', $schedule_id])
                  ->andFilterWhere(['like', 'classroom.name', $classroom_id])
                  ->andFilterWhere(['like', 'schedule_graph.begin_date', $begin_date])
                  ->andFilterWhere(['like', 'schedule_graph.end_date', $end_date]);
            } 
         return $dataProvider;
    }
}
