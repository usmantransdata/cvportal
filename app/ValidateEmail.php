<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValidateEmail extends Model
{
   	protected $table = 'validate_email';
   	
public $timestamps = false;

   	  protected $fillable = ['email', 'order_id'];

}
