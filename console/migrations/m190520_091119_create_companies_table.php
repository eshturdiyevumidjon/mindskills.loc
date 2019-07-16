<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%companies}}`.
 */
class m190520_091119_create_companies_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%companies}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->comment("Наименование"),
            'type'=>$this->integer(),
            'tarif_id'=>$this->integer(),
        ]);
        $this->insert('{{%companies}}',array(
            'name' => 'Super Company',
            'type' => 1,
            'tarif_id'=>3,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%companies}}');
    }
}
