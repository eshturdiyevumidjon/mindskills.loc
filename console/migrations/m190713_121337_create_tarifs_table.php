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

            $this->insert('tarifs', array(
            'name' => 'Бесплатный период',          
            'days' => 15,
            'price' => 0,)
             );
            $this->insert('tarifs',array(
            'name' => 'Базовый',          
            'days' => 30,
            'price' => 20000,)
            );
            $this->insert('tarifs',array(
            'name' => 'Стандартный',          
            'days' => 30,
            'price' => 50000,)
            );
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tarifs}}');
    }
}
