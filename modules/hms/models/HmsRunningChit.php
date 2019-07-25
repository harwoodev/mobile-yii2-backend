<?php

namespace app\modules\hms\models;

use Yii;

/**
 * This is the model class for table "hms_running_chit".
 *
 * @property int $id
 * @property int $number
 * @property string $year
 * @property string $region
 */
class HmsRunningChit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hms_running_chit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number'], 'integer'],
            [['year'], 'safe'],
            [['region'], 'string', 'max' => 3],
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
            'year' => 'Year',
            'region' => 'Region',
        ];
    }
}
