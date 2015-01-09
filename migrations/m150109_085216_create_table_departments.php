<?php

use yii\db\Schema;
use yii\db\Migration;

class m150109_085216_create_table_departments extends Migration
{
    /**
     * Create a new migration table departments, table schema according by the link below
     * https://foundationdb.com/layers/sql/documentation/GettingStarted/employees.tutorial.html
     *
     */
    public function up()
    {
        $this->createTable('departments', [
            'dept_no'   => 'pk',
            'dept_name' => Schema::TYPE_DATE . ' NOT NULL', // todo unique
        ]);
    }

    /**
     *
     */
    public function down()
    {
        $this->dropTable('departments');
    }
}
