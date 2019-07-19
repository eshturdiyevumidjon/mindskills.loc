<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%classroom}}`.
 */
class m190718_071431_create_classroom_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%classroom}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->comment('Наименование'),
            'company_id' => $this->integer()->comment('Компания'),
            'filial_id' => $this->integer()->comment('Филиал'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%classroom}}');
    }
}
