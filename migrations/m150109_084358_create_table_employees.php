<?php

use yii\db\Schema;
use yii\db\Migration;

class m150109_084358_create_table_employees extends Migration
{
    /**
     * Create a new migration table employees, table schema according by the link below
     * https://foundationdb.com/layers/sql/documentation/GettingStarted/employees.tutorial.html
     *
     */
    public function up()
    {
        $this->createTable('employees', [
            'emp_no'     => 'pk',
            'birth_date' => Schema::TYPE_DATE . ' NOT NULL',
            'first_name' => Schema::TYPE_STRING . ' NOT NULL',
            'last_name'  => Schema::TYPE_STRING . ' NOT NULL',
            'gender'     => Schema::TYPE_STRING . ' NOT NULL',
            'hire_date'  => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    /**
     *
     */
    public function down()
    {
        $this->dropTable('employees');
    }
}
