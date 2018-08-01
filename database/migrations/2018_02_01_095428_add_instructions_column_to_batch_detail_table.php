<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInstructionsColumnToBatchDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('batch_details', function (Blueprint $table) {
          $table->string('instructions')->after('batch_name');              
          $table->timestamp('due_date')->after('instructions');              
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_batch', function (Blueprint $table) {
            $table->dropColumn('instructions');
            $table->dropColumn('due_date');
        });
    }
}
