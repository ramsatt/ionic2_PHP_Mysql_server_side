<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "members".
 *
 * @property integer $mem_mid
 * @property string $mem_first_name
 * @property string $mem_last_name
 * @property string $mem_email
 * @property string $mem_mobile
 * @property string $mem_city
 * @property string $mem_state
 * @property string $mem_country
 * @property string $mem_postal_code
 */
class Members extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'members';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mem_first_name', 'mem_last_name', 'mem_email', 'mem_mobile', 'mem_city', 'mem_state', 'mem_country', 'mem_postal_code'], 'required'],
            [['mem_email'], 'string'],
            [['mem_first_name', 'mem_last_name', 'mem_city', 'mem_state', 'mem_country'], 'string', 'max' => 50],
            [['mem_mobile'], 'string', 'max' => 13],
            [['mem_postal_code'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mem_mid' => 'Mem Mid',
            'mem_first_name' => 'Mem First Name',
            'mem_last_name' => 'Mem Last Name',
            'mem_email' => 'Mem Email',
            'mem_mobile' => 'Mem Mobile',
            'mem_city' => 'Mem City',
            'mem_state' => 'Mem State',
            'mem_country' => 'Mem Country',
            'mem_postal_code' => 'Mem Postal Code',
        ];
    }
}
