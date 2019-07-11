<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%courses}}`.
 */
class m190702_152727_create_courses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%courses}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->comment("Наименование"),
            'subject_id' => $this->integer()->comment("Предметы"),
            'user_id' => $this->integer()->comment("Пользователи"),
            'begin_date' => $this->date()->comment("Время начало"),
            'end_date' => $this->date()->comment("Время заканчало"),
            'cost' => $this->float()->comment("Цена"),
            'prosent_for_teacher' => $this->float()->comment("Зарплата предподаватела"),
            'company_id' => $this->integer()->comment("Компания"),
            'filial_id' => $this->integer()->comment("Филиал"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%courses}}');
    }
}
