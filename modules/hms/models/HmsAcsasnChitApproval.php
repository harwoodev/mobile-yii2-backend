<?php

namespace app\modules\hms\models;

use Yii;

/**
 * This is the model class for table "hms_acsasn_chit_approval".
 *
 * @property int $id
 * @property int $emp_id
 * @property int $grp_id
 * @property string $date_from
 * @property string $date_to
 * @property int $is_active
 */
class HmsAcsasnChitApproval extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hms_acsasn_chit_approval';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_id', 'grp_id'], 'required'],
            [['emp_id', 'grp_id', 'is_active'], 'integer'],
            [['date_from', 'date_to'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'emp_id' => 'Emp ID',
            'grp_id' => 'Grp ID',
            'date_from' => 'Date From',
            'date_to' => 'Date To',
            'is_active' => 'Is Active',
        ];
    }
}
