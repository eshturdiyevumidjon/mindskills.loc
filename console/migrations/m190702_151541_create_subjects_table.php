<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subjects}}`.
 */
class m190702_151541_create_subjects_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subjects}}', [
            'id' => $this->primaryKey(),
            'company_id' => $this->integer()->comment("Коипания"),
            'filial_id' => $this->integer()->comment("Филиал"),
            'name' => $this->string(255)->comment("Наименование"),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%subjects}}');
    }
}
