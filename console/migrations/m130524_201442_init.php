<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'fio' => $this->string(255),
            'username' => $this->string(255)->notNull()->unique(),
            'auth_key' => $this->string(255)->notNull(),
            'password_hash' => $this->string(255),
            'type' => $this->integer(),
            'birthday'=>$this->date(),
            'phone'=>$this->string(255)->comment('Телефон'),
            'image'=>$this->string(255)->comment('Фото'),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'balanc'=>$this->float()->notNull(),
        ], $tableOptions);

        $this->insert('user',array(
            'fio' => 'Иванов Иван Иванович',          
            'username' => 'admin',
            'auth_key' => 'admin',
            'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
            'type' => 1,
            'image'=>'',
            'status' => 0,
            'phone'=>'+998977777778',
            'birthday'=>'1995-05-25',
            'created_at' => time(),
            'updated_at' => time(),
            'balanc'=>12,
        ));
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
