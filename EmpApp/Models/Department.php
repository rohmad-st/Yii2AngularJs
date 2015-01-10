<?php
namespace app\EmpApp\Models;

use yii\db\ActiveRecord;

class Department extends ActiveRecord
{

    /**
     * The table associated with the model
     *
     * @return string
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * Set validation rules
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['dept_name'], 'required'],
        ];
    }
}