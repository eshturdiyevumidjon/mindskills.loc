<?php

namespace backend\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property string $name Название курса
 * @property int $company_id Компания
 * @property int $filial_id Филиал
 * @property int $subject_id Предмет
 * @property int $teacher_id Преподаватель
 * @property double $price Стоимость занятий курса
 * @property double $sum_of_teacher Зарплата преподавателю
 * @property string $begin_date Начало курса
 * @property string $end_date Конец курса
 * @property int $status Статус
 * @property int $type Тип занятия
 *
 * @property Companies $company
 * @property Filials $filial
 * @property Schedule $subject
 * @property User $teacher
 * @property ScheduleGraph[] $scheduleGraphs
 * @property ScheduleUsers[] $scheduleUsers
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'filial_id', 'subject_id', 'teacher_id', 'status', 'type'], 'integer'],
            [['price', 'sum_of_teacher'], 'number'],
            [['begin_date', 'end_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 
            'targetClass' => Companies::className(),
             'targetAttribute' => ['company_id' => 'id']],
            [['filial_id'], 'exist', 'skipOnError' => true, 
            'targetClass' => Filials::className(), 'targetAttribute' => ['filial_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 
            'targetClass' => Subjects::className(), 'targetAttribute' =>['subject_id'=>'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 
            'targetClass' => User::className(), 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название курса',
            'company_id' => 'Компания',
            'filial_id' => 'Филиал',
            'subject_id' => 'Предмет',
            'teacher_id' => 'Преподаватель',
            'price' => 'Стоимость занятий курса',
            'sum_of_teacher' => 'Зарплата преподавателю',
            'begin_date' => 'Начало курса',
            'end_date' => 'Конец курса',
            'status' => 'Статус',
            'type' => 'Тип занятия',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Companies::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilial()
    {
        return $this->hasOne(Filials::className(), ['id' => 'filial_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subjects::className(), ['id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(User::className(), ['id' => 'teacher_id']);
    }
     public function beforeSave($insert)
    {
         if ($this->isNewRecord) {
            $this->status = 0;
        }
        if($this->begin_date != null)
            $this->begin_date = \Yii::$app->formatter->asDate($this->begin_date, 'php:Y-m-d');
        if($this->end_date != null)
            $this->end_date = \Yii::$app->formatter->asDate($this->end_date, 'php:Y-m-d');
       
        return parent::beforeSave($insert);
    }
    public static function getDate($date=null)
    {
        return ($date!=null)?\Yii::$app->formatter->asDate($date, 'php:d.m.Y'):null;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScheduleGraphs()
    {
        return $this->hasMany(ScheduleGraph::className(), ['schedule_id' => 'id']);
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

    //Получить описание типов пользователя.
    public function getStatusDescription()
    {
        switch ($this->status) {
            case 0: return "Создано";
            case 10: return "Завершено";
        }
    }
     public function getStatus()
    {
        return [
            0 => 'Создано',
            10 => 'Завершено',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScheduleUsers()
    {
        return $this->hasMany(ScheduleUsers::className(), ['schedule_id' => 'id']);
    }
    public function ColumnsSchedule($post)
    {
        $session = Yii::$app->session;

        $session['Schedule[name]'] = 0;
        $session['Schedule[company_id]'] = 0;
        $session['Schedule[filial_id]'] = 0;

        $session['Schedule[subject_id]'] = 0;
        $session['Schedule[teacher_id]'] = 0;
        $session['Schedule[price]'] = 0;

        $session['Schedule[sum_of_teacher]'] = 0;
        $session['Schedule[begin_date]'] = 0;
        $session['Schedule[end_date]'] = 0;

        $session['Schedule[status]'] = 0;
        $session['Schedule[type]'] = 0;
            
    if( isset($post['Schedule']['name']) ) $session['Schedule[name]'] = 1;
    if( isset($post['Schedule']['company_id']) ) $session['Schedule[company_id]'] = 1;
    if( isset($post['Schedule']['filial_id']) ) $session['Schedule[filial_id]'] = 1;

    if( isset($post['Schedule']['subject_id']) ) $session['Schedule[subject_id]'] = 1;
    if( isset($post['Schedule']['teacher_id']) ) $session['Schedule[teacher_id]'] = 1;
    if( isset($post['Schedule']['price']) ) $session['Schedule[price]'] = 1;

    if( isset($post['Schedule']['sum_of_teacher']) ) $session['Schedule[sum_of_teacher]'] = 1;
    if( isset($post['Schedule']['begin_date']) ) $session['Schedule[begin_date]'] = 1;
    if( isset($post['Schedule']['end_date']) ) $session['Schedule[end_date]'] = 1;

    if( isset($post['Schedule']['status']) ) $session['Schedule[status]'] = 1;
    if( isset($post['Schedule']['type']) ) $session['Schedule[type]'] = 1;
    }
}
