<?php

namespace app\modules\hms\models;

use Yii;

/**
 * This is the model class for table "hms_sickleave_record".
 *
 * @property int $id
 * @property int $app_id
 * @property int $type_id
 * @property string $num_days
 * @property string $date_from
 * @property string $date_to
 * @property string $remarks
 */
class HmsSickleaveRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hms_sickleave_record';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['app_id', 'type_id'], 'required'],
            [['app_id', 'type_id'], 'integer'],
            [['num_days'], 'number'],
            [['date_from', 'date_to'], 'safe'],
            [['remarks'], 'string', 'max' => 255],
            [['app_id'], 'exist', 'skipOnError' => true, 'targetClass' => HmsApp::className(), 'targetAttribute' => ['app_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => HmsApptreatment::className(), 'targetAttribute' => ['type_id' => 'id']],
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
            'type_id' => 'Type ID',
            'num_days' => 'Num Days',
            'date_from' => 'Date From',
            'date_to' => 'Date To',
            'remarks' => 'Remarks',
        ];
    }
}
