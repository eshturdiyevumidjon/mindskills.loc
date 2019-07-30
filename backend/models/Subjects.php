<?php

namespace backend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use backend\base\AppActiveQuery;
use backend\models\Companies;
use yii\behaviors\BlameableBehavior;
use backend\models\Filials;
use yii\web\ForbiddenHttpException;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "subjects".
 *
 * @property int $id
 * @property int $company_id Коипания
 * @property int $filial_id Филиал
 * @property string $name Наименование
 *
 * @property Courses[] $courses
 * @property Companies $company
 * @property Filials $filial
 */
class Subjects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subjects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'filial_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'],'required'],
            [['company_id'], 'exist', 'skipOnError' => true,
             'targetClass' => Companies::className(),
              'targetAttribute' => ['company_id' => 'id']],
            [['filial_id'], 'exist', 'skipOnError' => true, 
            'targetClass' => Filials::className(), 'targetAttribute' => ['filial_id' => 'id']],
        ];
    }

     /**
     * @inheritdoc
     */
    public static function find()
    {
        if(Yii::$app->user->isGuest == false)
        {
            if(Yii::$app->user->identity->company->type === 2)
            {
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
        if(Yii::$app->user->isGuest == false) 
        {
            if(Yii::$app->user->identity->company->type === 2)
            {
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
            'company_id' => 'Коипания',
            'filial_id' => 'Филиал',
            'name' => 'Наименование',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Courses::className(), ['subject_id' => 'id']);
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
    public function ColumnsSubjects($post)
    {
        $session = Yii::$app->session;

        $session['Subjects[name]'] = 0;
        $session['Subjects[company_id]'] = 0;
        $session['Subjects[filial_id]'] = 0;
            
        if( isset($post['Subjects']['name']) ) $session['Subjects[name]'] = 1;
        if( isset($post['Subjects']['company_id']) ) $session['Subjects[company_id]'] = 1;
        if( isset($post['Subjects']['filial_id']) ) $session['Subjects[filial_id]'] = 1;
    }
}
