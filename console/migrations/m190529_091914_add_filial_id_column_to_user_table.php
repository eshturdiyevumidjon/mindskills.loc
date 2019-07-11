<?php

use yii\db\Migration;

/**
 * Handles adding filial_id to table `{{%user}}`.
 */
class m190529_091914_add_filial_id_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'filial_id', $this->integer()->comment("Филиал"));
        $this->addColumn('{{%user}}', 'company_id', $this->integer()->comment("Компания"));

        $this->createIndex(
            'idx-user-filial_id',
            'user',
            'filial_id'
        );

        $this->addForeignKey(
            'fk-user-filial_id',
            'user',
            'filial_id',
            'filials',
            'id',
            'CASCADE'
        );

         $this->createIndex(
            'idx-user-company_id',
            'user',
            'company_id'
        );

        $this->addForeignKey(
            'fk-user-company_id',
            'user',
            'company_id',
            'companies',
            'id',
            'CASCADE'
        );

        Yii::$app->db->createCommand()->update('user', ['company_id' => 1, 'filial_id' => 1], [ 'id' => 1 ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-user-filial_id',
            'users'
        );

        $this->dropIndex(
            'idx-user-filial_id',
            'users'
        );

        $this->dropForeignKey(
            'fk-user-company_id',
            'users'
        );

        $this->dropIndex(
            'idx-user-company_id',
            'users'
        );

        $this->dropColumn('{{%user}}', 'filial_id');
        $this->dropColumn('{{%user}}', 'company_id');
    }
}
