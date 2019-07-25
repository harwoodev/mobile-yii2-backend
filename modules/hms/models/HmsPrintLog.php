<?php

namespace app\modules\hms\models;

use Yii;

/**
 * This is the model class for table "hms_print_log".
 *
 * @property int $id
 * @property int $app_id
 * @property string $date
 */
class HmsPrintLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hms_print_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['app_id'], 'integer'],
            [['date'], 'safe'],
            [['app_id'], 'exist', 'skipOnError' => true, 'targetClass' => HmsApp::className(), 'targetAttribute' => ['app_id' => 'id']],
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
            'date' => 'Date',
        ];
    }
}
