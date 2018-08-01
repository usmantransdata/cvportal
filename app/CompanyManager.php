<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyManager extends Model
{
    protected $table = 'company_managers';

 public $timestamps = 'timestamps';

 	
 	 protected $fillable = [ 'user_id', 'client_id'];


  public function client()
    {
        return $this->belongsTo('App\Client', 'client_id');
    }


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }



}
