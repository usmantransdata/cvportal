<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesForceAuthenticate extends Model
{
    protected $table = 'sales_force_authenticate';

    public $timestamps = false;

     protected $fillable = ['consumerKey', 'consumerSecret', 'user_id', 'code', 'access_token', 'signature', 'id_token', 'instance_url', 'url_id', 'issued_at'];
}
