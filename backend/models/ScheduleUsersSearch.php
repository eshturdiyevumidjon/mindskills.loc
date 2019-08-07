<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ScheduleUsers;

/**
 * ScheduleUsersSearch represents the model behind the search form about `backend\models\ScheduleUsers`.
 */
class ScheduleUsersSearch extends ScheduleUsers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'schedule_id', 'pupil_id'], 'integer'],
            [['payed'], 'number'],
            [['comment', 'unsubscribe'], 'safe'],
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
        $query = ScheduleUsers::find();

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
            'pupil_id' => $this->pupil_id,
            'payed' => $this->payed,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'unsubscribe', $this->unsubscribe]);

        return $dataProvider;
    }
    public function filter($post)
    {
        $query = ScheduleUsers::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $schedule_id=$_POST['ScheduleUsersSearch']['schedule_id'];
        $pupil_id=$_POST['ScheduleUsersSearch']['pupil_id'];
        $payed=$_POST['ScheduleUsersSearch']['payed'];
        $comment=$_POST['ScheduleUsersSearch']['comment'];
        $unsubscribe=$_POST['ScheduleUsersSearch']['unsubscribe'];

        if($_POST['ScheduleUsersSearch']['unsubscribe']) 
            if($_POST['ScheduleUsersSearch']['unsubscribe']=="Да")$unsubscribe=1;     
            if($_POST['ScheduleUsersSearch']['unsubscribe']=="Нет")$unsubscribe=2;

        if(isset($schedule_id) || isset($pupil_id) || isset($payed) || isset($comment) || isset($unsubscribe)){
            
            $query->joinWith('schedule');
            $query->joinWith('pupil');

            $query->andFilterWhere([
                'schedule_users.payed' => $payed,
                'schedule_users.comment' => $comment,
                'schedule_users.unsubscribe' => $unsubscribe,
            ]);

            $query->andFilterWhere(['like', 'schedule.name', $schedule_id])
                    ->andFilterWhere(['like', 'user.fio', $pupil_id]);
        }
         return $dataProvider;
    }
}
