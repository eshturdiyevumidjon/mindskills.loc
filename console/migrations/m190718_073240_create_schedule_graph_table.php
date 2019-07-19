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
