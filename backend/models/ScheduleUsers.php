<?php

namespace backend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "schedule_users".
 *
 * @property int $id
 * @property int $schedule_id Расписание
 * @property int $pupil_id Ученик
 * @property double $payed Размер оплаты
 * @property string $comment Комментария
 * @property int $unsubscribe Отписать
 *
 * @property User $pupil
 * @property Schedule $schedule
 */
class ScheduleUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['schedule_id', 'pupil_id', 'unsubscribe'], 'integer'],
            [['payed'], 'number'],
            [['comment'], 'string'],
            [['pupil_id'], 'exist', 'skipOnError' => true, 
            'targetClass' => User::className(), 'targetAttribute' => ['pupil_id' => 'id']],
            [['schedule_id'], 'exist', 'skipOnError' => true, 
            'targetClass' => Schedule::className(), 'targetAttribute' => ['schedule_id' => 'id']],
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
            'pupil_id' => 'Ученик',
            'payed' => 'Размер оплаты',
            'comment' => 'Комментария',
            'unsubscribe' => 'Отписать',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPupil()
    {
        return $this->hasOne(User::className(), ['id' => 'pupil_id']);
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
        if ($this->isNewRecord) {
            $this->unsubscribe = 1;
        }      
        return parent::beforeSave($insert);
    }
    public function getUnsubscribeDescription()
    {
        switch ($this->unsubscribe) {
            case 1: return "Да";
            case 2: return "Нет";
        }
    }
    public function getUnsubscribe()
    {
        return [
            1 => 'Да',
            2 => 'Нет',
        ];
    }
    public function ColumnsScheduleUsers($post)
    {
        $session = Yii::$app->session;

        $session['ScheduleUsers[schedule_id]'] = 0;
        $session['ScheduleUsers[pupil_id]'] = 0;
        $session['ScheduleUsers[payed]'] = 0;
        $session['ScheduleUsers[comment]'] = 0;
        $session['ScheduleUsers[unsubscribe]'] = 0;

            
        if( isset($post['ScheduleUsers']['schedule_id']) ) $session['ScheduleUsers[schedule_id]'] = 1;
        if( isset($post['ScheduleUsers']['pupil_id']) ) $session['ScheduleUsers[pupil_id]'] = 1;
        if( isset($post['ScheduleUsers']['payed']) ) $session['ScheduleUsers[payed]'] = 1;
        if( isset($post['ScheduleUsers']['comment']) ) $session['ScheduleUsers[comment]'] = 1;
        if( isset($post['ScheduleUsers']['unsubscribe']) ) $session['ScheduleUsers[unsubscribe]'] = 1;
    }
}
