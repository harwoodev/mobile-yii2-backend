<?php

namespace app\modules\hms\models;

use Yii;

/**
 * This is the model class for table "hms_running_letter".
 *
 * @property int $id
 * @property int $number
 * @property string $type
 * @property string $year
 * @property string $region
 */
class HmsRunningLetter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hms_running_letter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number'], 'integer'],
            [['year'], 'safe'],
            [['type', 'region'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'type' => 'Type',
            'year' => 'Year',
            'region' => 'Region',
        ];
    }
}
