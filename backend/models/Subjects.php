<?php

namespace backend\models;

use Yii;

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
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['filial_id'], 'exist', 'skipOnError' => true, 'targetClass' => Filials::className(), 'targetAttribute' => ['filial_id' => 'id']],
        ];
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
}
