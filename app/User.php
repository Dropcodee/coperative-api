<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
     public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function  apiformat() {
        return [
            'userId' => $this->id,
            'userEmail' => $this->email,
        ];
    }
     public function  format() {
        return [
            'userId' => $this->id,
            'userEmail' => $this->email,
        ];
    }

    # database relationships
    public function bank() {
        return $this->hasOne('App\Models\Bank');
    }
    public function employment() {
        return $this->hasOne('App\Models\Employment');
    }
    public function guarantor() {
        return $this->hasOne('App\Models\Guarantor');
    }
}
