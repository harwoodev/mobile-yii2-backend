<?php

namespace app\modules\hms\models;

use Yii;

/**
 * This is the model class for table "hms_region".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 */
class HmsRegion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hms_region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['code', 'name'], 'string', 'max' => 255],
            [['code'], 'unique'],
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
