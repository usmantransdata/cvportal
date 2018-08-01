<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email','verified', 'acount_status', 'password', 'role_id','client_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


     public function client()
  {
    return $this->belongsTo('App\Client');
  }


   public function roles()
  {
    return $this->belongsTo('App\Roles', 'role_id');
  }

    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }


     public function CompanyManager()
    {
        return $this->hasOne('App\CompanyManager');
    }
}
