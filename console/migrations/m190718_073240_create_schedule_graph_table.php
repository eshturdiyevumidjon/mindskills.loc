<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%schedule_graph}}`.
 */
class m190718_073240_create_schedule_graph_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%schedule_graph}}', [
            'id' => $this->primaryKey(),
            'schedule_id' => $this->integer()->comment('Расписание'),
            'classroom_id' => $this->integer()->comment('Аудитория'),
            'begin_date' => $this->datetime()->comment('Дата начало занятий'),
            'end_date' => $this->datetime()->comment('Дата окончание занятий'),
            'type' => $this->integer()->comment('Тип занятия'),
            'day_of_the_week' => $this->string()->comment('День недели'),
            'period' => $this->integer()->comment('Период'),
            'class_date' => $this->date()->comment('Дата занятия'),
            'class_start' => $this->time()->comment('Начало занятия'),
            'class_duration' => $this->time()->comment('Продолжительность занятия'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%schedule_graph}}');
    }
}
