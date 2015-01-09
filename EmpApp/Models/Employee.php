<?php
namespace app\EmpApp\Models;

use yii\db\ActiveRecord;

class Employee extends ActiveRecord
{

    /**
     * The table associated with the model
     *
     * @return string
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * Set validation rules
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['birth_date', 'first_name', 'last_name', 'gender', 'hire_date'], 'required'],
        ];
    }
}