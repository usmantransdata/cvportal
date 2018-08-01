<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BatchLog extends Model
{
    protected $table = 'batch_log';

    	public $timestamps = false;

    protected $fillable = [ 'batch_status_id', 'batch_id', 'status_change_date'];
}
