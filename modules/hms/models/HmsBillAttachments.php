<?php

namespace app\modules\hms\models;

use Yii;

/**
 * This is the model class for table "hms_bill_attachments".
 *
 * @property int $id
 * @property int $app_id
 * @property string $type
 * @property string $attachment_number
 * @property double $total_amount
 * @property string $date
 */
class HmsBillAttachments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hms_bill_attachments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['app_id'], 'required'],
            [['app_id'], 'integer'],
            [['type'], 'string'],
            [['total_amount'], 'number'],
            [['date'], 'safe'],
            [['attachment_number'], 'string', 'max' => 255],
            [['attachment_number'], 'unique'],
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
            'type' => 'Type',
            'attachment_number' => 'Attachment Number',
            'total_amount' => 'Total Amount',
            'date' => 'Date',
        ];
    }
}
