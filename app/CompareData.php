<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompareData extends Model
{
    protected $table = 'compare_data';

 public $timestamps = false;

  protected $fillable = ['id', 'batch_id', 'first_name',	'last_name', 'title', 'phone_number', 'validation', 'disposition','organization',  'address1', 'address2', 'health_status', 'is_email_verified'];

}
