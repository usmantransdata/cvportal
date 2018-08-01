<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

	public $timestamps = false;
	
     protected $table = 'client';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'organization_name', 'contact_first_name',	'contact_last_name', 'contact_person_email', 'contact__person_phoneNumber', 'address', 'created_at'];


	public function user()
  {
    return $this->hasMany('App\User');
  }


  public function batchDetial()
  {
    return $this->hasMany('App\BatchDetial');
  }


   public function CompanyManager()
    {
        return $this->hasOne('App\CompanyManager');
    }

    
}