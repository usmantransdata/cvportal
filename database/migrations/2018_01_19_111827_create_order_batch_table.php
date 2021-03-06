<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderBatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_batch', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('batch_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('title');
            $table->string('phone_number');
            $table->string('calling_status');
            $table->string('validation');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_batch');
    }
}
