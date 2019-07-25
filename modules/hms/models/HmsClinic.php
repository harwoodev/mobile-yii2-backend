<?php

namespace app\modules\hms\models;

use Yii;

/**
 * This is the model class for table "hms_clinic".
 *
 * @property int $id
 * @property int $is_panel
 * @property string $name
 * @property int $region
 * @property string $tel_no
 * @property string $fax_no
 * @property string $addr_line_1
 * @property string $addr_line_2
 * @property string $addr_line_3
 * @property string $addr_line_4
 * @property int $is_discontinued
 * @property string $discontinued_remarks
 * @property int $has_pharmacy
 * @property string $addr_clinic_name
 */
class HmsClinic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hms_clinic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_panel', 'region', 'is_discontinued', 'has_pharmacy'], 'integer'],
            [['name', 'tel_no', 'fax_no', 'addr_line_1', 'addr_line_2', 'addr_line_3', 'addr_line_4', 'discontinued_remarks', 'addr_clinic_name'], 'string', 'max' => 255],
            [['region'], 'exist', 'skipOnError' => true, 'targetClass' => HmsRegion::className(), 'targetAttribute' => ['region' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'is_panel' => 'Is Panel',
            'name' => 'Name',
            'region' => 'Region',
            'tel_no' => 'Tel No',
            'fax_no' => 'Fax No',
            'addr_line_1' => 'Addr Line 1',
            'addr_line_2' => 'Addr Line 2',
            'addr_line_3' => 'Addr Line 3',
            'addr_line_4' => 'Addr Line 4',
            'is_discontinued' => 'Is Discontinued',
            'discontinued_remarks' => 'Discontinued Remarks',
            'has_pharmacy' => 'Has Pharmacy',
            'addr_clinic_name' => 'Addr Clinic Name',
        ];
    }
}
