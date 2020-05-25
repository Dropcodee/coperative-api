<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    protected  $fillable = [
        'employment_type',
        'monthly_income',
        'employment_idcard',
        'employer_phone_number',
        'employment_docs',
        'company_address',
        'employer_address',
        'staff_number',
        'student_monthly_allowance',
        'student_year_admission',
        'student_matric_number',
        'student_institution',
        'student_admission_letter',
    ];
    public function user() {
        return $this->belongsTo('App\User');
    }
}
