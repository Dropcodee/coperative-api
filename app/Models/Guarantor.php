<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guarantor extends Model
{
    protected  $fillable = [
        'first_name',
        'last_name',
        'address',
        'work_address',
        'current_emp_status',
        'monthly_income'
    ];
     public function user() {
        return $this->belongsTo('App\User');
    }
}
