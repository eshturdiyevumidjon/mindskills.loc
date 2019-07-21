<?php

namespace backend\models;

use Yii;
use kartik\datetime\DateTimePicker;
/**
 * This is the model class for table "feadback".
 *
 * @property int $id
 * @property string $name Наименование
 * @property string $email Email
 * @property string $message Текст
 * @property string $date_cr Дата создание
 */
class Feadback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feadback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['date_cr'], 'integer'],
            [['name', 'email'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'email' => 'Эмаил',
            'message' => 'Текст',
            'date_cr' => 'Дата создание',
        ];
    }
    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->date_cr = time();   
        }       
        return parent::beforeSave($insert);
    }
    public static function getDate($date=null)
    {
        return ($date!=null)?\Yii::$app->formatter->asDate($date, 'php:H:i d.m.Y'):null;
    }
    public function ColumnsFeadback($post)
    {
        $session = Yii::$app->session;

        $session['Feadback[name]'] = 0;
        $session['Feadback[email]'] = 0;
        $session['Feadback[message]'] = 0;
        $session['Feadback[date_cr]'] = 0;
            
        if( isset($post['Feadback']['name']) ) $session['Feadback[name]'] = 1;
        if( isset($post['Feadback']['email']) ) $session['Feadback[email]'] = 1;
        if( isset($post['Feadback']['message']) ) $session['Feadback[message]'] = 1;
        if( isset($post['Feadback']['date_cr']) ) $session['Feadback[date_cr]'] = 1;
    }
}
