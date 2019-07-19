<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%feadback}}`.
 */
class m190718_072126_create_feadback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%feadback}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment('Наименование'),
            'email' => $this->string()->comment('Email'),
            'message' => $this->text()->comment('Текст'),
            'date_cr' => $this->datetime()->comment('Дата создание'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%feadback}}');
    }
}
