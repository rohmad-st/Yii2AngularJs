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
        return 'employee';
    }

    /**
     * Set validation rules
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['name', 'gender', 'born', 'email', 'phone', 'address'], 'required'],
        ];
    }
}