<?php namespace app\SchoolApp;


use yii\db\ActiveRecord;

class Students extends ActiveRecord
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
     * Validation Rules
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['nama', 'jenis_kelamin', 'alamat', 'nomer_telepon'], 'required'],
        ];
    }
} 