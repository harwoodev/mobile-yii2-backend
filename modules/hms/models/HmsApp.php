<?php

namespace app\modules\hms\models;

use Yii;

/**
 * This is the model class for table "hms_app".
 *
 * @property int $id
 * @property int $is_void
 * @property int $type_id
 * @property int $category_id
 * @property int $emp_id
 * @property int $ed_id
 * @property int $clinic_id
 * @property int $doctor_id
 * @property string $remarks
 * @property string $attend_date
 * @property int $created_by
 * @property string $created_date
 * @property int $updated_by
 * @property string $updated_date
 * @property int $ref__exist
 * @property int $ref__hod_approved
 * @property int $ref__admin_approved
 * @property int $ref__gm_approved
 * @property string $bill__expenses
 * @property string $bill__ttl_expenses
 * @property string $bill__ins_cover
 * @property int $bill__report_m
 * @property string $bill__report_y
 * @property string $running__num
 * @property string $running__date
 * @property string $__ed_name
 * @property string $bill__invoice_no
 * @property string $bill__entry_date
 */
class HmsApp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hms_app';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_void', 'type_id', 'category_id', 'emp_id', 'ed_id', 'clinic_id', 'doctor_id', 'created_by', 'updated_by', 'ref__exist', 'ref__hod_approved', 'ref__admin_approved', 'ref__gm_approved', 'bill__report_m'], 'integer'],
            [['type_id', 'category_id', 'emp_id', 'clinic_id', 'attend_date', 'created_by'], 'required'],
            [['attend_date', 'created_date', 'updated_date', 'bill__report_y', 'running__date', 'bill__entry_date'], 'safe'],
            [['bill__expenses', 'bill__ttl_expenses', 'bill__ins_cover'], 'number'],
            [['remarks', 'running__num', '__ed_name', 'bill__invoice_no'], 'string', 'max' => 255],
            [['running__num'], 'unique'],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => HmsApptype::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => HmsApptreatment::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['clinic_id'], 'exist', 'skipOnError' => true, 'targetClass' => HmsClinic::className(), 'targetAttribute' => ['clinic_id' => 'id']],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => HmsDoctor::className(), 'targetAttribute' => ['doctor_id' => 'id']],
            [['ed_id'], 'exist', 'skipOnError' => true, 'targetClass' => HsHrEmpDependents::className(), 'targetAttribute' => ['ed_id' => 'ed_id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => HsHrEmployee::className(), 'targetAttribute' => ['created_by' => 'emp_id']],
            [['emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => HsHrEmployee::className(), 'targetAttribute' => ['emp_id' => 'emp_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'is_void' => 'Is Void',
            'type_id' => 'Type ID',
            'category_id' => 'Category ID',
            'emp_id' => 'Emp ID',
            'ed_id' => 'Ed ID',
            'clinic_id' => 'Clinic ID',
            'doctor_id' => 'Doctor ID',
            'remarks' => 'Remarks',
            'attend_date' => 'Attend Date',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'ref__exist' => 'Ref Exist',
            'ref__hod_approved' => 'Ref Hod Approved',
            'ref__admin_approved' => 'Ref Admin Approved',
            'ref__gm_approved' => 'Ref Gm Approved',
            'bill__expenses' => 'Bill Expenses',
            'bill__ttl_expenses' => 'Bill Ttl Expenses',
            'bill__ins_cover' => 'Bill Ins Cover',
            'bill__report_m' => 'Bill Report M',
            'bill__report_y' => 'Bill Report Y',
            'running__num' => 'Running Num',
            'running__date' => 'Running Date',
            '__ed_name' => 'Ed Name',
            'bill__invoice_no' => 'Bill Invoice No',
            'bill__entry_date' => 'Bill Entry Date',
        ];
    }
}
