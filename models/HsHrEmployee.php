<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "hs_hr_employee".
 *
 * @property int $emp_id
 * @property int $emp_number
 * @property string $emp_lastname
 * @property string $emp_firstname
 * @property string $emp_icnum
 * @property string $emp_epf
 * @property string $emp_bankno
 * @property string $emp_socsonum
 * @property string $emp_wrkpermit
 * @property string $emp_tbghaji
 * @property string $emp_asnasb
 * @property string $emp_passport
 * @property string $emp_incometax
 * @property string $emp_taxbranch
 * @property string $emp_middle_name
 * @property string $emp_nick_name
 * @property int $emp_smoker
 * @property int $emp_birthplace
 * @property int $religion_id
 * @property int $ethnic_race_code
 * @property string $emp_birthday
 * @property string $emp_stayfrom
 * @property string $emp_stayto
 * @property int $nation_code
 * @property int $emp_gender
 * @property string $emp_marital_status
 * @property int $emp_numchild
 * @property string $emp_ismarrige
 * @property string $emp_ssn_num
 * @property string $emp_sin_num
 * @property string $emp_other_id
 * @property string $emp_dri_lice_num
 * @property string $emp_dri_lice_exp_date
 * @property string $emp_military_service
 * @property int $emp_status
 * @property string $emp_statusdt
 * @property int $job_title_code
 * @property int $job_band_code
 * @property int $eeo_cat_code
 * @property int $work_station_unit
 * @property int $work_station
 * @property int $position_id
 * @property string $emp_street1
 * @property string $emp_street2
 * @property string $city_code
 * @property string $coun_code
 * @property string $provin_code
 * @property string $emp_zipcode
 * @property string $emp_hm_telephone
 * @property string $emp_mobile
 * @property string $emp_mobile2
 * @property string $emp_work_telephone
 * @property int $emp_age
 * @property string $emp_work_email
 * @property string $sal_grd_code
 * @property string $joined_date
 * @property string $confirm_date
 * @property string $emp_oth_email
 * @property int $termination_id
 * @property string $createdt
 * @property int $createby
 * @property string $updatedt
 * @property int $updateby
 * @property int $dept_id
 * @property int $work_station_sub
 * @property string $is_active
 * @property string $is_employee
 */
class HsHrEmployee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hs_hr_employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_number'], 'required'],
            [['emp_number', 'emp_smoker', 'emp_birthplace', 'religion_id', 'ethnic_race_code', 'nation_code', 'emp_gender', 'emp_numchild', 'emp_status', 'job_title_code', 'job_band_code', 'eeo_cat_code', 'work_station_unit', 'work_station', 'position_id', 'emp_age', 'termination_id', 'createby', 'updateby', 'dept_id', 'work_station_sub'], 'integer'],
            [['emp_birthday', 'emp_stayfrom', 'emp_stayto', 'emp_dri_lice_exp_date', 'emp_statusdt', 'joined_date', 'confirm_date', 'createdt', 'updatedt'], 'safe'],
            [['emp_lastname', 'emp_firstname', 'emp_icnum', 'emp_epf', 'emp_bankno', 'emp_socsonum', 'emp_wrkpermit', 'emp_tbghaji', 'emp_asnasb', 'emp_passport', 'emp_incometax', 'emp_taxbranch', 'emp_middle_name', 'emp_nick_name', 'emp_ssn_num', 'emp_sin_num', 'emp_other_id', 'emp_dri_lice_num', 'emp_military_service', 'emp_street1', 'emp_street2', 'city_code', 'coun_code', 'provin_code'], 'string', 'max' => 100],
            [['emp_marital_status', 'emp_zipcode'], 'string', 'max' => 20],
            [['emp_ismarrige', 'is_active', 'is_employee'], 'string', 'max' => 1],
            [['emp_hm_telephone', 'emp_mobile', 'emp_mobile2', 'emp_work_telephone', 'emp_work_email', 'emp_oth_email'], 'string', 'max' => 50],
            [['sal_grd_code'], 'string', 'max' => 13],
            [['eeo_cat_code'], 'exist', 'skipOnError' => true, 'targetClass' => HrJobCategory::className(), 'targetAttribute' => ['eeo_cat_code' => 'id']],
            [['nation_code'], 'exist', 'skipOnError' => true, 'targetClass' => HrNationality::className(), 'targetAttribute' => ['nation_code' => 'id']],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => HsHrEmpPositions::className(), 'targetAttribute' => ['position_id' => 'po_id']],
            [['createby'], 'exist', 'skipOnError' => true, 'targetClass' => HsUser::className(), 'targetAttribute' => ['createby' => 'id']],
            [['updateby'], 'exist', 'skipOnError' => true, 'targetClass' => HsUser::className(), 'targetAttribute' => ['updateby' => 'id']],
            [['work_station_unit'], 'exist', 'skipOnError' => true, 'targetClass' => HrUnit::className(), 'targetAttribute' => ['work_station_unit' => 'id']],
            [['religion_id'], 'exist', 'skipOnError' => true, 'targetClass' => HrReligion::className(), 'targetAttribute' => ['religion_id' => 'id']],
            [['ethnic_race_code'], 'exist', 'skipOnError' => true, 'targetClass' => HrRace::className(), 'targetAttribute' => ['ethnic_race_code' => 'id']],
            [['emp_birthplace'], 'exist', 'skipOnError' => true, 'targetClass' => HrBirthPlace::className(), 'targetAttribute' => ['emp_birthplace' => 'id']],
            [['dept_id'], 'exist', 'skipOnError' => true, 'targetClass' => HrDepartment::className(), 'targetAttribute' => ['dept_id' => 'id']],
            [['work_station_sub'], 'exist', 'skipOnError' => true, 'targetClass' => HrLocation::className(), 'targetAttribute' => ['work_station_sub' => 'id']],
            [['job_band_code'], 'exist', 'skipOnError' => true, 'targetClass' => HrJobBand::className(), 'targetAttribute' => ['job_band_code' => 'id']],
            [['job_title_code'], 'exist', 'skipOnError' => true, 'targetClass' => HrJobCode::className(), 'targetAttribute' => ['job_title_code' => 'id']],
            [['emp_status'], 'exist', 'skipOnError' => true, 'targetClass' => HsHrEmpStatus::className(), 'targetAttribute' => ['emp_status' => 'id']],
            [['work_station'], 'exist', 'skipOnError' => true, 'targetClass' => HrLocation::className(), 'targetAttribute' => ['work_station' => 'id']],
            [['termination_id'], 'exist', 'skipOnError' => true, 'targetClass' => HrEmpTermination::className(), 'targetAttribute' => ['termination_id' => 'id']],
        ];
    }
    
    public function getFullname() {
        return trim(trim($this->emp_firstname) . ' ' . trim($this->emp_lastname));
    }

    public static function getImage($emp_id=null) {
        // I changed "Yii::$app->user->id" to get the emp_id instead of id in hs_user (mobile-yii2-backend project)
        if (empty($emp_id)) $emp_id = Yii::$app->user->id; 
        $default = '/uploads/noimage2.jpg';

        $att_img = (new \yii\db\Query())
            ->select(["eattach_attachment AS img"])
            ->from(['hs_hr_emp_attachment'])
            ->andWhere([
                'and',
                ['eattach_selected' => 'Y'],
                ['emp_id' => $emp_id]
            ])
            ->orderBy([
                'eattach_id' => SORT_DESC
            ])
            ->one();
        
        $img = (empty($att_img) ? $default : $att_img['img']);
        return "http://apps.harwood.my/harwood/hris{$img}";
    }
}