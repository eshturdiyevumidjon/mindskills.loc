<?php

namespace backend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\web\ForbiddenHttpException;
use backend\base\AppActiveQuery;

/**
 * This is the model class for table "companies".
 *
 * @property int $id
 * @property string $name Наименование
 * @property int $type
 *
 * @property Filials[] $filials
 * @property Companies[] $Companiess
 */
class Companies extends \yii\db\ActiveRecord
{
    public $filial_name;
    public $Companies_fio;
    public $Companies_phone;
    public $Companiesname;
    public $password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','filial_name','Companiesname','Companies_phone','password','Companies_fio'], 'string', 'max' => 255],
            [['name','filial_name','Companiesname','Companies_phone','password','Companies_fio'],'required'],
            [['type','tarif_id'], 'integer'],
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
            'type'=>'Тип',
            'filial_name' => 'Наименование филиала',
            'Companies_fio' => 'ФИО',
            'Companiesname' => 'Логин',
            'password' => 'Пароль',
            'Companiesphone'=>'Телефон',
            'tarif_id'=>'Тариф',
        ];
    }
    public function beforeSave($insert) 
    { 
       if ($this->isNewRecord) 
       { 
           $this->type=2; 
       } 
       return parent::beforeSave($insert); 
    } 

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilials()
    {
        return $this->hasMany(Filials::className(), ['company_id' => 'id']);
    }
    public function getTarifs()
    {
        return $this->hasOne(Tarifs::className(), ['id' => 'tarif_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniess()
    {
        return $this->hasMany(Companies::className(), ['company_id' => 'id']);
    }
    public function ColumnsCompanies($post)
    {
    $session = Yii::$app->session;

    $session['Companies[name]'] = 0;
    $session['Companies[filial_name]'] = 0;
    $session['Companies[Companies_fio]'] =0;

    $session['Companies[Companiesname]'] = 0;
    $session['Companies[Companies_phone]'] =0;
    $session['Companies[tarif_id]'] =0;
        
    if( isset($post['Companies']['name']) ) $session['Companies[name]'] = 1;
    if( isset($post['Companies']['filial_name']) ) $session['Companies[filial_name]'] = 1;
    if( isset($post['Companies']['Companies_fio']) ) $session['Companies[Companies_fio]'] = 1;

    if( isset($post['Companies']['Companiesname']) ) $session['Companies[Companiesname]'] = 1;
    if( isset($post['Companies']['Companies_phone']) ) $session['Companies[Companies_phone]'] = 1;
    if( isset($post['Companies']['tarif_id']) ) $session['Companies[tarif_id]'] = 1;
    }
}
