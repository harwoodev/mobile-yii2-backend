<?php

namespace app\modules\hms\models;

use Yii;

/**
 * This is the model class for table "hms_app_print".
 *
 * @property int $id
 * @property int $app_id
 * @property string $type
 * @property int $emp_id
 * @property string $token
 */
class HmsAppPrint extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hms_app_print';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['app_id', 'emp_id'], 'required'],
            [['app_id', 'emp_id'], 'integer'],
            [['type'], 'string'],
            [['token'], 'string', 'max' => 255],
            [['app_id'], 'exist', 'skipOnError' => true, 'targetClass' => HmsApp::className(), 'targetAttribute' => ['app_id' => 'id']],
            [['emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => HsHrEmployee::className(), 'targetAttribute' => ['emp_id' => 'emp_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'app_id' => 'App ID',
            'type' => 'Type',
            'emp_id' => 'Emp ID',
            'token' => 'Token',
        ];
    }
}
