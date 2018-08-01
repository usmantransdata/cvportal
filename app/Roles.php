<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Roles extends Model
{
  	use Notifiable;
  

    protected $table = 'users_roles';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'role'];



     public function user()
  {
    return $this->hasOne('App\User');
  }
}
