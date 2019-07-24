<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hs_user".
 *
 * @property int $id
 * @property int $emp_id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class HsUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hs_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'created_at', 'updated_at'], 'required'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => HsHrEmployee::className(), 'targetAttribute' => ['emp_id' => 'emp_id']],
        ];
    }
}
