<?php

use yii\db\Migration;

/**
 * Class m190716_062318_add_foreign_keys
 */
class m190716_062318_add_foreign_keys extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('idx-companies-tarif_id', 'companies', 'tarif_id', false);
        $this->addForeignKey("fk-companies-tarif_id", "companies", "tarif_id", "tarifs", "id");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-companies-tarif_id','companies');
        $this->dropIndex('idx-companies-tarif_id','companies');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190716_062318_add_foreign_keys cannot be reverted.\n";

        return false;
    }
    */
}
