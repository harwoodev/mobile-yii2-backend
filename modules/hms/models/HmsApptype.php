<?php

namespace app\modules\hms\models;

use Yii;

/**
 * This is the model class for table "hms_apptype".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $is_public
 * @property int $is_editable
 */
class HmsApptype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hms_apptype';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_editable'], 'integer'],
            [['code', 'name'], 'string', 'max' => 255],
            [['is_public'], 'string', 'max' => 1],
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
            'is_public' => 'Is Public',
            'is_editable' => 'Is Editable',
        ];
    }
}
