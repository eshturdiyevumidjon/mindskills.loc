<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tarifs}}`.
 */
class m190713_121337_create_tarifs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tarifs}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->comment("Наименование"),
            'days' => $this->integer()->comment("дней"),
            'price' => $this->float()->comment("Цена"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tarifs}}');
    }
}
