<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderBatch extends Model
{
 
 protected $table = 'order_batch';

 public $timestamps = false;

  protected $fillable = [ 'batch_id', 'first_name',	'last_name', 'title', 'phone_number', 'validation', 'disposition', 'address1', 'address2', 'health_status', 'is_email_verified'];


   

}
