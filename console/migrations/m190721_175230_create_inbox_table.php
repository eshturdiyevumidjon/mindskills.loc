<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%inbox}}`.
 */
class m190721_175230_create_inbox_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%inbox}}', [
            'id' => $this->primaryKey(),
            'from' => $this->integer()->comment('Создатель'),
            'to' => $this->integer()->comment('Получатель'),
            'title' => $this->string(255)->comment('Заголовок'),
            'file' => $this->string(255)->comment('Файл'),
            'text' => $this->binary()->comment('Текст'),
            'date_cr' => $this->datetime()->comment('Дата создания'),
            'starred' => $this->boolean()->comment('Избранные'),
            'reply' => $this->integer()->comment('Ответить'),
            'deleted' => $this->boolean()->comment('Удалено'),
            'is_read' => $this->boolean()->comment('Прочитал'),
        ]);

        $this->createIndex('idx-inbox-from', 'inbox', 'from', false);
        $this->addForeignKey("fk-inbox-from", "inbox", "from", "user", "id");

        $this->createIndex('idx-inbox-to', 'inbox', 'to', false);
        $this->addForeignKey("fk-inbox-to", "inbox", "to", "user", "id");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-inbox-from','inbox');
        $this->dropIndex('idx-inbox-from','inbox');

        $this->dropForeignKey('fk-inbox-to','inbox');
        $this->dropIndex('idx-inbox-to','inbox');

        $this->dropTable('{{%inbox}}');
    }
}
