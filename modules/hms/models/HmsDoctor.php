<?php

namespace app\modules\hms\models;

use Yii;

/**
 * This is the model class for table "hms_doctor".
 *
 * @property int $id
 * @property string $name
 * @property int $clinic
 */
class HmsDoctor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hms_doctor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clinic'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['clinic'], 'exist', 'skipOnError' => true, 'targetClass' => HmsClinic::className(), 'targetAttribute' => ['clinic' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'clinic' => 'Clinic',
        ];
    }
}
