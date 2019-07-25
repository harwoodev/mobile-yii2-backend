<?php

namespace app\modules\hms\models;

use Yii;

/**
 * This is the model class for table "hms_entitle_exception".
 *
 * @property int $ed_id
 * @property string $remarks
 * @property string $expiration_date
 */
class HmsEntitleException extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hms_entitle_exception';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ed_id'], 'required'],
            [['ed_id'], 'integer'],
            [['expiration_date'], 'safe'],
            [['remarks'], 'string', 'max' => 255],
            [['ed_id'], 'unique'],
            [['ed_id'], 'exist', 'skipOnError' => true, 'targetClass' => HsHrEmpDependents::className(), 'targetAttribute' => ['ed_id' => 'ed_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ed_id' => 'Ed ID',
            'remarks' => 'Remarks',
            'expiration_date' => 'Expiration Date',
        ];
    }
}
