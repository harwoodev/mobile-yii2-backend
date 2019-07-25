<?php

namespace app\modules\hms\models;

use Yii;

/**
 * This is the model class for table "hms_acsgrp_chit_approval".
 *
 * @property int $id
 * @property int $job_id
 * @property int $location_id
 * @property int $deptgroup_id
 * @property int $emp_id
 * @property int $dept_id
 */
class HmsAcsgrpChitApproval extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hms_acsgrp_chit_approval';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['job_id', 'location_id', 'deptgroup_id', 'emp_id', 'dept_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'job_id' => 'Job ID',
            'location_id' => 'Location ID',
            'deptgroup_id' => 'Deptgroup ID',
            'emp_id' => 'Emp ID',
            'dept_id' => 'Dept ID',
        ];
    }
}
