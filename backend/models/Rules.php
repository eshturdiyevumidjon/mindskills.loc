<?php

namespace backend\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "rules".
 *
 * @property int $id
 * @property int $user_id Пользователи
 * @property int $users_create Пользователи Добавить
 * @property int $users_view Пользователи Просмотр
 * @property int $users_update Пользователи Изменить
 * @property int $users_delete Пользователи Удалить
 * @property int $inbox_create Обсуждения Добавить
 * @property int $inbox_view Обсуждения Просмотр
 * @property int $inbox_update Обсуждения Изменить
 * @property int $inbox_delete Обсуждения Удалить
 *
 * @property User $user
 */
class Rules extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rules';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'users_create', 'users_view', 'users_update', 'users_delete', 'inbox_create', 'inbox_view', 'inbox_update', 'inbox_delete'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'users_create' => 'Users Create',
            'users_view' => 'Users View',
            'users_update' => 'Users Update',
            'users_delete' => 'Users Delete',
            'inbox_create' => 'Inbox Create',
            'inbox_view' => 'Inbox View',
            'inbox_update' => 'Inbox Update',
            'inbox_delete' => 'Inbox Delete',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
