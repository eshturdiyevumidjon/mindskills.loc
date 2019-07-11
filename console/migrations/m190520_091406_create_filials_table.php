<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%filials}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%regions}}`
 * - `{{%districts}}`
 * - `{{%companies}}`
 */
class m190520_091406_create_filials_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%filials}}', [
            'id' => $this->primaryKey(),
            'filial_name' => $this->string(255)->comment("Наименование"),
            'logo' => $this->string(255)->comment("Логотип"),
            'surname' => $this->string(255)->comment("Фамилия"),
            'name' => $this->string(255)->comment("Имя"),
            'middle_name' => $this->string(255)->comment("Отчество"),
            'phone' => $this->string(255)->comment("Телефон"),
            'region_id' => $this->integer()->comment("Область"),
            'district_id' => $this->integer()->comment("Район"),
            'address' => $this->text()->comment("Адрес"),
            'site' => $this->string(255)->comment("Сайт филиала"),
            'email' => $this->string(255)->comment("E-mail"),
            'company_id' => $this->integer()->comment("Компания"),
        ]);

        // creates index for column `region_id`
        $this->createIndex(
            '{{%idx-filials-region_id}}',
            '{{%filials}}',
            'region_id'
        );

        // add foreign key for table `{{%regions}}`
        $this->addForeignKey(
            '{{%fk-filials-region_id}}',
            '{{%filials}}',
            'region_id',
            '{{%regions}}',
            'id',
            'CASCADE'
        );

        // creates index for column `district_id`
        $this->createIndex(
            '{{%idx-filials-district_id}}',
            '{{%filials}}',
            'district_id'
        );

        // add foreign key for table `{{%districts}}`
        $this->addForeignKey(
            '{{%fk-filials-district_id}}',
            '{{%filials}}',
            'district_id',
            '{{%districts}}',
            'id',
            'CASCADE'
        );

        // creates index for column `company_id`
        $this->createIndex(
            '{{%idx-filials-company_id}}',
            '{{%filials}}',
            'company_id'
        );

        // add foreign key for table `{{%companies}}`
        $this->addForeignKey(
            '{{%fk-filials-company_id}}',
            '{{%filials}}',
            'company_id',
            '{{%companies}}',
            'id',
            'CASCADE'
        );
            $this->insert('{{%filials}}',array(
            'id' =>1 ,
            'filial_name'=>'Центральный офис',
            'region_id'=>13,
            'district_id'=>177,
            'address'=>'',
            'phone'=>'',
            'email'=>'',
            'company_id'=>1,
            'logo'=>'',
            'surname'=>'',
            'site'=>'',
            'middle_name'=>'',
            'name'=>'',
        ));
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%regions}}`
        $this->dropForeignKey(
            '{{%fk-filials-region_id}}',
            '{{%filials}}'
        );

        // drops index for column `region_id`
        $this->dropIndex(
            '{{%idx-filials-region_id}}',
            '{{%filials}}'
        );

        // drops foreign key for table `{{%districts}}`
        $this->dropForeignKey(
            '{{%fk-filials-district_id}}',
            '{{%filials}}'
        );

        // drops index for column `district_id`
        $this->dropIndex(
            '{{%idx-filials-district_id}}',
            '{{%filials}}'
        );

        // drops foreign key for table `{{%companies}}`
        $this->dropForeignKey(
            '{{%fk-filials-company_id}}',
            '{{%filials}}'
        );

        // drops index for column `company_id`
        $this->dropIndex(
            '{{%idx-filials-company_id}}',
            '{{%filials}}'
        );

        $this->dropTable('{{%filials}}');
    }
}
