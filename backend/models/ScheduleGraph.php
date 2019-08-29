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
    public $search;
    //public $days;
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
            [['schedule_id', 'classroom_id','type','period'], 'integer'],
            [['begin_date','end_date','class_date','class_start','class_duration','search'], 'safe'],
            [['day_of_the_week'], 'safe'],
            [['begin_date', 'end_date','class_date','class_start','class_duration'], 'required'],
            [['classroom_id'], 'exist', 'skipOnError' => true, 
            'targetClass' => Classroom::className(), 
            'targetAttribute' => ['classroom_id' => 'id']],
            [['schedule_id'], 'exist', 'skipOnError' => true, 
            'targetClass' => Schedule::className(), 
            'targetAttribute' => ['schedule_id' => 'id']],
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
            'day_of_the_week' => 'День недели',
            'type' => 'Тип занятия',
            'period' => 'Период',
            'class_date' => 'Дата занятия',
            'class_start' => 'Начало занятия',
            'class_duration' => 'Продолжительность занятия',
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
     public function beforeSave($insert)
    {
        if($this->begin_date != null)
            $this->begin_date = \Yii::$app->formatter->asDate($this->begin_date, 'php:Y-m-d');
        if($this->end_date != null)
            $this->end_date = \Yii::$app->formatter->asDate($this->end_date, 'php:Y-m-d');
        if($this->class_date != null)
            $this->class_date = \Yii::$app->formatter->asDate($this->class_date, 'php:Y-m-d');
        return parent::beforeSave($insert);
    }
    public static function getDate($date=null)
    {
        return ($date!=null)?\Yii::$app->formatter->asDate($date, 'php:d.m.Y'):null;
    }
    public function getTypeDescription()
    {
        switch ($this->type) {
            case 1: return "Регулярные занятия";
            case 2: return "Единичное занятие";
        }
    }
    public function getType()
    {
        return [
            1 => 'Регулярные занятия',
            2 => 'Единичное занятие',
        ];
    }
    public function getPeriodDescription()
    {
        switch ($this->period) {
            case 1: return "Всего курса (c 1 августа 2019 г. по 1 сентября 2019 г.)Весь период";
            case 2: return "Произвольный период";
        }
    }
    public function getPeriod()
    {
        return [
            1 => 'Всего курса (c 1 августа 2019 г. по 1 сентября 2019 г.)Весь период',
            2 => 'Произвольный период',
        ];
    }
    public function getWeek()
    {
        return [
            1 => 'Понедельник',
            2 => 'Вторник',
            3 => 'Среда',
            4 => 'Четверг',
            5 => 'Пятница',
            6 => 'Суббота',
            7 => 'Воскресенье',
        ];
    }
    public function getWeekDescription()
    {
        $arr=explode(',',$this->day_of_the_week);
        $days="";
        foreach ($arr as $value) {
        switch ($value) {
            case 1: $days.= "Понедельник<br>";break;
            case 2: $days.= "Вторник<br>";break;
            case 3: $days.= "Среда<br>";break;
            case 4: $days.= "Четверг<br>";break;
            case 5: $days.= "Пятница<br>";break;
            case 6: $days.= "Суббота<br>";break;
            case 7: $days.= "Воскресенье<br>";break;
        }
    }
    return $days;
    }
    public function timeToStr($time) {
    $ts = explode(':', $time);
    $str = '';
    $str .= intval($ts[0]);
    if (intval($ts[0]) >= 10) {
        $str .= ' hours ';
    } else {
        $str .= ' hour ';
    }
    
    $str .= intval($ts[1]);
    if (intval($ts[1]) >= 10) {
        $str .= ' minutes';
    } else {
        $str .= ' minute';
    }
    return $str;
}
    public function ColumnsScheduleGraph($post)
    {
        $session = Yii::$app->session;
        $session['ScheduleGraph[schedule_id]'] = 0;
        $session['ScheduleGraph[classroom_id]'] = 0;
        $session['ScheduleGraph[begin_date]'] = 0;
        $session['ScheduleGraph[end_date]'] = 0;
            
        if( isset($post['ScheduleGraph']['schedule_id']))$session['ScheduleGraph[schedule_id]'] = 1;
        if( isset($post['ScheduleGraph']['classroom_id']))$session['ScheduleGraph[classroom_id]'] = 1;
        if( isset($post['ScheduleGraph']['begin_date']))$session['ScheduleGraph[begin_date]'] = 1;
        if( isset($post['ScheduleGraph']['end_date']))$session['ScheduleGraph[end_date]'] = 1;
    }
}
