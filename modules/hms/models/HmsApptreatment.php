<?php

namespace app\modules\hms\models;

use Yii;

/**
 * This is the model class for table "hms_apptreatment".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 */
class HmsApptreatment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hms_apptreatment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
        ];
    }
}
