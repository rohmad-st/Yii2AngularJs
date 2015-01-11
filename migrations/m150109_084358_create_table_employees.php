<?php

use yii\db\Schema;
use yii\db\Migration;

class m150109_084358_create_table_employees extends Migration
{
    /**
     * Create a new migration table employees
     *
     */
    public function up()
    {
        $this->createTable('employee', [
            'id'      => 'pk',
            'name'    => Schema::TYPE_STRING . ' NOT NULL',
            'gender'  => Schema::TYPE_STRING . ' NOT NULL',
            'born'    => Schema::TYPE_DATE . ' NOT NULL',
            'email'   => Schema::TYPE_STRING . ' NOT NULL',
            'phone'   => Schema::TYPE_STRING . ' NOT NULL',
            'address' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    /**
     *
     */
    public function down()
    {
        $this->dropTable('employee');
    }
}
