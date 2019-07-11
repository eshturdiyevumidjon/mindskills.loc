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
 * @property User[] $users
 */
class Companies extends \yii\db\ActiveRecord
{
    public $filial_name;
    public $user_fio;
    public $user_phone;
    public $username;
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
            [['name','filial_name','username','user_phone','password','user_fio'], 'string', 'max' => 255],
            [['type'], 'integer'],
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
            'user_fio' => 'ФИО',
            'username' => 'Логин',
            'password' => 'Пароль',
            'user_phone'=>'Телефон',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['company_id' => 'id']);
    }
}
