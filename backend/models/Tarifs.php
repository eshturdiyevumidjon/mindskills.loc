<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tarifs".
 *
 * @property int $id
 * @property string $name Наименование
 * @property int $days дней
 * @property double $price Цена
 */
class Tarifs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tarifs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['days'], 'integer'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование тарифа',
            'days' => 'Дней',
            'price' => 'Цена',
        ];
    }
    public function ColumnsTarifs($post)
    {
        $session = Yii::$app->session;

        $session['Tarifs[name]'] =0;
        $session['Tarifs[days]'] = 0;
        $session['Tarifs[price]'] = 0;
            
        if( isset($post['Tarifs']['name']) ) $session['Tarifs[name]'] = 1;
        if( isset($post['Tarifs']['days']) ) $session['Tarifs[days]'] = 1;
        if( isset($post['Tarifs']['price']) ) $session['Tarifs[price]'] = 1;
    }
}
