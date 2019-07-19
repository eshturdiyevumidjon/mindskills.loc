<?php

use yii\db\Migration;

/**
 * Class m190719_135551_add_foreign_keys
 */
class m190719_135551_add_foreign_keys extends Migration
{
    public function safeUp()
    {
     $this->createIndex('idx-classroom-company_id', 'classroom', 'company_id', false);
     $this->addForeignKey('fk-classroom-company_id', 'classroom', 'company_id', 'companies', 'id','CASCADE');

     $this->createIndex('idx-classroom-filial_id', 'classroom', 'filial_id', false);
     $this->addForeignKey('fk-classroom-filial_id', 'classroom', 'filial_id', 'filials', 'id','CASCADE');

      $this->createIndex('idx-schedule-company_id', 'schedule', 'company_id', false);
     $this->addForeignKey('fk-schedule-company_id', 'schedule', 'company_id', 'companies', 'id','CASCADE');

     $this->createIndex('idx-schedule-filial_id', 'schedule', 'filial_id', false);
     $this->addForeignKey('fk-schedule-filial_id', 'schedule', 'filial_id', 'filials', 'id','CASCADE');

     $this->createIndex('idx-schedule-subject_id', 'schedule', 'subject_id', false);
     $this->addForeignKey('fk-schedule-subject_id', 'schedule', 'subject_id', 'subjects', 'id','CASCADE');

     $this->createIndex('idx-schedule-teacher_id', 'schedule', 'teacher_id', false);
     $this->addForeignKey('fk-schedule-teacher_id', 'schedule', 'teacher_id', 'user', 'id','CASCADE');

     $this->createIndex('idx-schedule_graph-schedule_id', 'schedule_graph', 'schedule_id', false);
     $this->addForeignKey('fk-schedule_graph-schedule_id', 'schedule_graph', 'schedule_id', 'schedule', 'id','CASCADE');

     $this->createIndex('idx-schedule_graph-classroom_id', 'schedule_graph', 'classroom_id', false);
     $this->addForeignKey('fk-schedule_graph-classroom_id', 'schedule_graph', 'classroom_id', 'classroom', 'id','CASCADE');

     $this->createIndex('idx-schedule_users-schedule_id', 'schedule_users', 'schedule_id', false);
     $this->addForeignKey('fk-schedule_users-schedule_id', 'schedule_users', 'schedule_id', 'schedule', 'id','CASCADE');

     $this->createIndex('idx-schedule_users-pupil_id', 'schedule_users', 'pupil_id', false);
     $this->addForeignKey('fk-schedule_users-pupil_id', 'schedule_users', 'pupil_id', 'user', 'id','CASCADE');
    }

    public function safeDown()
    {
     $this->dropForeignKey('fk-classroom-company_id','classroom');
     $this->dropIndex('idx-classroom-company_id','classroom');

     $this->dropForeignKey('fk-classroom-filial_id','classroom');
     $this->dropIndex('idx-classroom-filial_id','classroom');

     $this->dropForeignKey('fk-schedule-company_id','schedule');
     $this->dropIndex('idx-schedule-company_id','schedule');

     $this->dropForeignKey('fk-schedule-filial_id','schedule');
     $this->dropIndex('idx-schedule-filial_id','schedule');

     $this->dropForeignKey('fk-schedule-subject_id','schedule');
     $this->dropIndex('idx-schedule-subject_id','schedule');

     $this->dropForeignKey('fk-schedule-teacher_id','schedule');
     $this->dropIndex('idx-schedule-teacher_id','schedule');

     $this->dropForeignKey('fk-schedule_graph-schedule_id','schedule_graph');
     $this->dropIndex('idx-schedule_graph-schedule_id','schedule_graph');

     $this->dropForeignKey('fk-schedule_graph-classroom_id','schedule_graph');
     $this->dropIndex('idx-schedule_graph-classroom_id','schedule_graph');

     $this->dropForeignKey('fk-schedule_users-schedule_id','schedule_users');
     $this->dropIndex('idx-schedule_users-schedule_id','schedule_users');

     $this->dropForeignKey('fk-schedule_users-pupil_id','schedule_users');
     $this->dropIndex('idx-schedule_users-pupil_id','schedule_users'); 
    }
}
