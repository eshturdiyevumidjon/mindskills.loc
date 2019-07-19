<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%schedule}}`.
 */
class m190719_134353_create_schedule_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%schedule}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->comment('Название курса'),
            'company_id' => $this->integer()->comment('Компания'),
            'filial_id' => $this->integer()->comment('Филиал'),
            'subject_id' => $this->integer()->comment('Предмет'),
            'teacher_id' => $this->integer()->comment('Преподаватель'),
            'price' => $this->float()->comment('Стоимость занятий курса'),
            'sum_of_teacher' => $this->float()->comment('Зарплата преподавателю'),
            'begin_date' => $this->date()->comment('Начало курса'),
            'end_date' => $this->date()->comment('Конец курса'),
            'status' => $this->integer()->comment('Статус'),
            'type' => $this->integer()->comment('Тип занятия'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%schedule}}');
    }
}
