<?php

namespace app\modules\hms\models;

use Yii;

/**
 * This is the model class for table "hms_sys_notice".
 *
 * @property int $id
 * @property string $title
 * @property string $desc
 * @property string $createdate
 * @property int $createby
 */
class HmsSysNotice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hms_sys_notice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['desc'], 'string'],
            [['createdate'], 'safe'],
            [['createby'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['createby'], 'exist', 'skipOnError' => true, 'targetClass' => HsHrEmployee::className(), 'targetAttribute' => ['createby' => 'emp_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'desc' => 'Desc',
            'createdate' => 'Createdate',
            'createby' => 'Createby',
        ];
    }
}
