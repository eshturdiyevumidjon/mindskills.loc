<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%regions}}`.
 */
class m190520_090826_create_regions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%regions}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->comment("Наименование"),
        ]);
        $this->insert('{{%regions}}',array('id' => '1','name' => 'Andijon viloyati',));
        $this->insert('{{%regions}}',array('id' => '2','name' => 'Buxoro viloyati',));
        $this->insert('{{%regions}}',array('id' => '3','name' => 'Farg\'ona viloyati',));
        $this->insert('{{%regions}}',array('id' => '4','name' => 'Jizzax viloyati',));
        $this->insert('{{%regions}}',array('id' => '5','name' => 'Xorazm viloyati',));
        $this->insert('{{%regions}}',array('id' => '6','name' => 'Namangan viloyati',));
        $this->insert('{{%regions}}',array('id' => '7','name' => 'Navoiy viloyati',));
        $this->insert('{{%regions}}',array('id' => '8','name' => 'Qashqadaryo viloyati',));
        $this->insert('{{%regions}}',array('id' => '9','name' => 'Samarqand viloyati',));
        $this->insert('{{%regions}}',array('id' => '10','name' => 'Sirdaryo viloyati',));
        $this->insert('{{%regions}}',array('id' => '11','name' => 'Surxondaryo viloyati',));
        $this->insert('{{%regions}}',array('id' => '12','name' => 'Toshkent viloyati',));
        $this->insert('{{%regions}}',array('id' => '13','name' => 'Toshkent shahri',));
        $this->insert('{{%regions}}',array('id' => '14','name' => 'Qoraqalpog\'iston Respublikasi',));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%regions}}');
    }
}
