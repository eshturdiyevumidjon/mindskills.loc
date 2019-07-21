<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%schedule_users}}`.
 */
class m190718_095608_create_schedule_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%schedule_users}}', [
            'id' => $this->primaryKey(),
            'schedule_id' => $this->integer()->comment('Расписание'),
            'pupil_id' => $this->integer()->comment('Ученик'),
            'payed' => $this->float()->comment('Размер оплаты'),
            'comment' => $this->text()->comment('Комментария'),
            'unsubscribe' => $this->integer()->comment('Отписать'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%schedule_users}}');
    }
}
