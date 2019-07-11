<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\BlameableBehavior;
use backend\base\AppActiveQuery;
use yii\web\ForbiddenHttpException;

/**
 * This is the model class for table "filials".
 *
 * @property int $id
 * @property string $filial_name Наименование
 * @property string $logo Логотип
 * @property string $surname Фамилия
 * @property string $name Имя
 * @property string $middle_name Отчество
 * @property string $phone Телефон
 * @property int $region_id Область
 * @property int $district_id Район
 * @property string $address Адрес
 * @property string $site Сайт филиала
 * @property string $email E-mail
 * @property int $company_id Компания
 *
 * @property Companies $company
 * @property Districts $district
 * @property Regions $region
 * @property User[] $users
 */
class Filials extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'filials';
    }

    public function behaviors()
    {
        if(Yii::$app->user->identity){
            return [
                [
                    'class' => BlameableBehavior::class,
                    'createdByAttribute' => 'company_id',
                    'updatedByAttribute' => null,
                    'value' => function($event) {
                        return Yii::$app->user->identity->company_id;
                    },
                ],
            ];
        }
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
    public function rules()
    {
        return [
            [['region_id', 'district_id', 'company_id'], 'integer'],
            [['address'], 'string'],
            [['filial_name'],'required'],
            [['filial_name', 'logo', 'surname', 'name', 'middle_name', 'phone', 'site', 'email'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => Districts::className(), 'targetAttribute' => ['district_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filial_name' => 'Наименование',
            'logo' => 'Логотип',
            'surname' => 'Фамилия',
            'name' => 'Имя',
            'middle_name' => 'Отчество',
            'phone' => 'Телефон',  
            'region_id' => 'Область',
            'district_id' => 'Район',
            'address' => 'Адрес',
            'site' => 'Сайт филиала',
            'email' => 'E-mail',
            'company_id' => 'Компания',
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
    public function getDistrict()
    {
        return $this->hasOne(Districts::className(), ['id' => 'district_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Regions::className(), ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['filial_id' => 'id']);
    }
    public function getAdmin()
    {
        return $this->name." ".$this->middle_name." ".$this->surname;
    }
    public function getRegions()
    {
       return ArrayHelper::map(Regions::find()->all(),'id', 'name');  
    }
    public function getDistricts()
    {
       return ArrayHelper::map(Districts::find()->all(),'id', 'name');  
    }

}
