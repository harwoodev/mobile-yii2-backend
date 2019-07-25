<?php

namespace app\modules\hms\models;

use Yii;

/**
 * This is the model class for table "hms_reqpen_chit".
 *
 * @property int $id
 * @property int $app_id
 * @property int $grp_id
 * @property string $token
 */
class HmsReqpenChit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hms_reqpen_chit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['app_id', 'grp_id'], 'required'],
            [['app_id', 'grp_id'], 'integer'],
            [['token'], 'string', 'max' => 255],
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
            'grp_id' => 'Grp ID',
            'token' => 'Token',
        ];
    }
}
