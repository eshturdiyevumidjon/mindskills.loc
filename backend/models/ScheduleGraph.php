<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "schedule_graph".
 *
 * @property int $id
 * @property int $schedule_id Расписание
 * @property int $classroom_id Аудитория
 * @property string $begin_date Дата начало занятий
 * @property string $end_date Дата окончание занятий
 *
 * @property Classroom $classroom
 * @property Schedule $schedule
 */
class ScheduleGraph extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule_graph';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['schedule_id', 'classroom_id'], 'integer'],
            [['begin_date', 'end_date'], 'safe'],
            [['classroom_id'], 'exist', 'skipOnError' => true, 'targetClass' => Classroom::className(), 'targetAttribute' => ['classroom_id' => 'id']],
            [['schedule_id'], 'exist', 'skipOnError' => true, 'targetClass' => Schedule::className(), 'targetAttribute' => ['schedule_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'schedule_id' => 'Расписание',
            'classroom_id' => 'Аудитория',
            'begin_date' => 'Дата начало занятий',
            'end_date' => 'Дата окончание занятий',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassroom()
    {
        return $this->hasOne(Classroom::className(), ['id' => 'classroom_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedule()
    {
        return $this->hasOne(Schedule::className(), ['id' => 'schedule_id']);
    }
    public static function getDate($date=null)
    {
        return ($date!=null)?\Yii::$app->formatter->asDate($date, 'php:d.m.Y'):null;
    }
    public function ColumnsScheduleGraph($post)
    {
        $session = Yii::$app->session;

        $session['ScheduleGraph[schedule_id]'] = 0;
        $session['ScheduleGraph[classroom_id]'] = 0;
        $session['ScheduleGraph[begin_date]'] = 0;
        $session['ScheduleGraph[end_date]'] = 0;
            
        if( isset($post['ScheduleGraph']['schedule_id']) ) $session['ScheduleGraph[schedule_id]'] = 1;
        if( isset($post['ScheduleGraph']['classroom_id']) ) $session['ScheduleGraph[classroom_id]'] = 1;
        if( isset($post['ScheduleGraph']['begin_date']) ) $session['ScheduleGraph[begin_date]'] = 1;
        if( isset($post['ScheduleGraph']['end_date']) ) $session['ScheduleGraph[end_date]'] = 1;
    }
}
