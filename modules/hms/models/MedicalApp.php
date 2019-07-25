<?php

namespace app\modules\hms\models;

use Yii;

class MedicalApp extends \yii\base\Model
{
    public $emp_id,
    $ed_id,
    $type_id,
    $category_id,
    $clinic_id,
    $doctor_id,
    $attend_date;

    function __construct(){
        parent::__construct();

        $this->emp_id = Yii::$app->user->id;
    }

    public function rules()
    {
        return [
            [['emp_id', 'ed_id', 'clinic_id', 'clinic_location', 'clinic_panel', 'doctor_id'], 'integer'],
            [['attend_date', 'type_id', 'category_id'], 'safe'],
            [['emp_id', 'clinic_id', 'attend_date', 'type_id', 'category_id'], 'required'],
        ];
    }
}