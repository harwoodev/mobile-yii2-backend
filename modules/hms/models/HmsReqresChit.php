<?php

namespace app\modules\hms\models;

use Yii;

/**
 * This is the model class for table "hms_reqres_chit".
 *
 * @property int $id
 * @property int $app_id
 * @property int $approver_id
 * @property string $approve_date
 * @property int $approve_status
 */
class HmsReqresChit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hms_reqres_chit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['app_id', 'approver_id'], 'required'],
            [['app_id', 'approver_id', 'approve_status'], 'integer'],
            [['approve_date'], 'safe'],
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
            'approver_id' => 'Approver ID',
            'approve_date' => 'Approve Date',
            'approve_status' => 'Approve Status',
        ];
    }
}
