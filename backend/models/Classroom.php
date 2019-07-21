<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "classroom".
 *
 * @property int $id
 * @property string $name Наименование
 * @property int $company_id Компания
 * @property int $filial_id Филиал
 *
 * @property Companies $company
 */
class Classroom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'classroom';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'filial_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['company_id' => 'id']],
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
    public function getFilial()
    {
        return $this->hasOne(Filials::className(), ['id' => 'filial_id']);
    }
    public function ColumnsClassroom($post)
    {
        $session = Yii::$app->session;

        $session['Classroom[name]'] = 0;
        $session['Classroom[company_id]'] = 0;
        $session['Classroom[filial_id]'] = 0;
            
        if( isset($post['Classroom']['name']) ) $session['Classroom[name]'] = 1;
        if( isset($post['Classroom']['company_id']) ) $session['Classroom[company_id]'] = 1;
        if( isset($post['Classroom']['filial_id']) ) $session['Classroom[filial_id]'] = 1;
    }
}
