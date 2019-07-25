<?php

namespace app\modules\hms\models;

use Yii;

/**
 * This is the model class for table "hms_app_gl".
 *
 * @property int $app_id
 * @property int $is_sent
 * @property string $adm_date
 * @property string $created_date
 */
class HmsAppGl extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hms_app_gl';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['app_id'], 'required'],
            [['app_id', 'is_sent'], 'integer'],
            [['adm_date', 'created_date'], 'safe'],
            [['app_id'], 'unique'],
            [['app_id'], 'exist', 'skipOnError' => true, 'targetClass' => HmsApp::className(), 'targetAttribute' => ['app_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'app_id' => 'App ID',
            'is_sent' => 'Is Sent',
            'adm_date' => 'Adm Date',
            'created_date' => 'Created Date',
        ];
    }
}
