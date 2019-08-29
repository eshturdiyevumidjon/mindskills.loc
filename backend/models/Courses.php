<?php

namespace backend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use common\models\User;
use yii\web\IdentityInterface;
use backend\base\AppActiveQuery;
use backend\models\Companies;
use yii\behaviors\BlameableBehavior;
use backend\models\Filials;
use yii\web\ForbiddenHttpException;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "courses".
 *
 * @property int $id
 * @property string $name Наименование
 * @property int $subject_id Предметы
 * @property int $user_id Пользователи
 * @property string $begin_date Время начало
 * @property string $end_date Время заканчало
 * @property double $cost Цена
 * @property double $prosent_for_teacher Зарплата предподаватела
 * @property int $company_id Компания
 * @property int $filial_id Филиал
 *
 * @property Companies $company
 * @property Filials $filial
 * @property Subjects $subject
 * @property User $user
 */
class Courses extends \yii\db\ActiveRecord
{
    public $search;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','subject_id'],'required'],
            [['subject_id', 'user_id', 'company_id', 'filial_id'], 'integer'],
            [['begin_date', 'end_date','search'], 'safe'],
            [['cost', 'prosent_for_teacher'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 
            'targetClass' => Companies::className(), 
            'targetAttribute' => ['company_id' => 'id']],
            [['filial_id'], 'exist', 'skipOnError' => true, 
            'targetClass' => Filials::className(), 
            'targetAttribute' => ['filial_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 
            'targetClass' => Subjects::className(), 
            'targetAttribute' => ['subject_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 
            'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }
     /**
     * @inheritdoc
     */
    public static function find()
    {
        if(Yii::$app->user->isGuest == false){

            if(Yii::$app->user->identity->company->type === 2){

                $companyId = Yii::$app->user->identity->company_id;
            }
            else $companyId = null;
        } 
        else $companyId = null;
        return new AppActiveQuery(get_called_class(), [
           'companyId' => $companyId,
        ]);
    }

    /**
     * @inheritdoc
     */
    public static function findOne($condition)
    {
        $model = parent::findOne($condition);
        if(Yii::$app->user->isGuest == false){

            if(Yii::$app->user->identity->company->type === 2){
                
                $companyId = Yii::$app->user->identity->company_id;
                if($model->company_id != $companyId){
                    throw new ForbiddenHttpException('Доступ запрещен');
                }
            }
        }
        return $model;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название курса',
            'subject_id' => 'Предметы',
            'user_id' => 'Пользователи',
            'begin_date' => 'Время начало',
            'end_date' => 'Время заканчало',
            'cost' => 'Цена',
            'prosent_for_teacher' => 'Зарплата предподаватела',
            'company_id' => 'Компания',
            'filial_id' => 'Филиал',
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

    public function beforeSave($insert)
    {
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    public function ColumnsCourses($post)
    {
        $session = Yii::$app->session;
        $session['Courses[name]'] = 0;
        $session['Courses[subject_id]'] =0;
        $session['Courses[user_id]'] = 0;
        $session['Courses[begin_date]'] = 0;
        $session['Courses[end_date]'] = 0;
        $session['Courses[cost]'] = 0;
        $session['Courses[prosent_for_teacher]'] = 0;
        $session['Courses[company_id]'] = 0;
        $session['Courses[filial_id]'] = 0;
        
            
        if( isset($post['Courses']['name']) ) $session['Courses[name]'] = 1;
        if( isset($post['Courses']['subject_id']) ) $session['Courses[subject_id]'] = 1;
        if( isset($post['Courses']['user_id']) ) $session['Courses[user_id]'] = 1;
        if( isset($post['Courses']['begin_date']) ) $session['Courses[begin_date]'] = 1;
        if( isset($post['Courses']['end_date']) ) $session['Courses[end_date]'] = 1;
        if( isset($post['Courses']['cost']) ) $session['Courses[cost]'] = 1;
        if( isset($post['Courses']['prosent_for_teacher']) ) $session['Courses[prosent_for_teacher]'] = 1;
        if( isset($post['Courses']['company_id']) ) $session['Courses[company_id]'] = 1;
        if( isset($post['Courses']['filial_id']) ) $session['Courses[filial_id]'] = 1;
    }
}
