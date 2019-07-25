<?php

namespace app\modules\hms\models;

use Yii;

/**
 * This is the model class for table "hms_apptreatment_rules".
 *
 * @property int $id
 * @property int $type
 * @property int $treatment
 * @property string $is_public
 */
class HmsApptreatmentRules extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hms_apptreatment_rules';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'treatment'], 'integer'],
            [['is_public'], 'string', 'max' => 1],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => HmsApptype::className(), 'targetAttribute' => ['type' => 'id']],
            [['treatment'], 'exist', 'skipOnError' => true, 'targetClass' => HmsApptreatment::className(), 'targetAttribute' => ['treatment' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'treatment' => 'Treatment',
            'is_public' => 'Is Public',
        ];
    }
}
