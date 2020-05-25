<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    # fillable values
    protected $fillable = [ 'name', 'account_number', 'bvn_number'];

    public function user() {
        # every bank belongs to one user
        return $this->belongsTo('App\User', 'user_id');
    }
}
