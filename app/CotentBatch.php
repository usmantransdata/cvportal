<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CotentBatch extends Model
{
 
 protected $table = 'content_batch';

 public $timestamps = false;

  protected $fillable = [ 'batch_id', 'sf_id', 'first_name',	'last_name', 'company_name', 'title', 'email1', 'email2', 'email1', 'phone_number1', 'phone_number2', 'phone_number3', 'address1', 'address2', 'address3', 'city', 'state', 'zip', 'country', 'validation', 'disposition', 'is_email_verified', 'health_status', 'created_date', 'updated_date'];

public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

     public function batchDetail()
  {
    return $this->hasMany('App\BatchDetail');
  }
   
}
