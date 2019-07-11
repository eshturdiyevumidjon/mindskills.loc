<?php

use yii\db\Migration;

/**
 * Class m190702_153922_add_foreign_keys
 */
class m190702_153922_add_foreign_keys extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('idx-courses-subject_id', 'courses', 'subject_id', false);
        $this->addForeignKey("fk-courses-subject_id", "courses", "subject_id", "subjects", "id");

        $this->createIndex('idx-courses-user_id', 'courses', 'user_id', false);
        $this->addForeignKey("fk-courses-user_id", "courses", "user_id", "user", "id");

        $this->createIndex('idx-courses-company_id', 'courses', 'company_id', false);
        $this->addForeignKey("fk-courses-company_id", "courses", "company_id", "companies", "id");

        $this->createIndex('idx-courses-filial_id', 'courses', 'filial_id', false);
        $this->addForeignKey("fk-courses-filial_id", "courses", "filial_id", "filials", "id");

        $this->createIndex('idx-subjects-company_id', 'subjects', 'company_id', false);
        $this->addForeignKey("fk-subjects-company_id", "subjects", "company_id", "companies", "id");

        $this->createIndex('idx-subjects-filial_id', 'subjects', 'filial_id', false);
        $this->addForeignKey("fk-subjects-filial_id", "subjects", "filial_id", "filials", "id");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-courses-subject_id','courses');
        $this->dropIndex('idx-courses-subject_id','courses');

        $this->dropForeignKey('fk-courses-user_id','courses');
        $this->dropIndex('idx-courses-user_id','courses');

        $this->dropForeignKey('fk-courses-company_id','courses');
        $this->dropIndex('idx-courses-company_id','courses');

        $this->dropForeignKey('fk-courses-filial_id','courses');
        $this->dropIndex('idx-courses-filial_id','courses');

        $this->dropForeignKey('fk-subjects-company_id','subjects');
        $this->dropIndex('idx-subjects-company_id','subjects');

        $this->dropForeignKey('fk-subjects-filial_id','subjects');
        $this->dropIndex('idx-subjects-filial_id','subjects');
    }
}
