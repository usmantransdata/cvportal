<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BatchStatus extends Model
{
     protected $table = 'batch_status';


      public function batchDetail()
    {
        return $this->hasOne('App\batchDetail');
    }
}
