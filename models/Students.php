<?php namespace app\models;

use yii\db\ActiveRecord;


/**
 * This is the model class for table "students".
 *
 * @property integer $id
 * @property string  $nama
 * @property string  $kelas
 * @property integer $umur
 */
class Students extends ActiveRecord
{
    /**
     * The table associated with the model.
     *
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * Validation rules
     *
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'umur', 'kelas'], 'required'],
            ['umur', 'integer']
        ];
    }
}
