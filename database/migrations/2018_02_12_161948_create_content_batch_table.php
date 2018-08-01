<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentBatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_batch', function (Blueprint $table) {
           $table->increments('id');
            $table->integer('batch_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name');
            $table->string('title');
            $table->string('email1');
            $table->string('email2');
            $table->string('email3');
            $table->integer('phone_number1');
            $table->integer('phone_number2');
            $table->integer('phone_number3');
            $table->string('address1');
            $table->string('address2');
            $table->string('address3');
            $table->string('city');
            $table->string('state');
            $table->integer('zip');
            $table->string('country');
            $table->string('disposition');
            $table->string('validation');
            $table->string('health_status');
            $table->timestamp('created_date')->default(DB::raw('CURRENT_TIMESTAMP(0)'));
            $table->timestamp('updated_date')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_batch');
    }
}
