<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDispositionColumnToOrderBachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('order_batch', function (Blueprint $table) {
           $table->string('disposition')->after('validation');           
           $table->string('address1')->after('disposition');           
           $table->string('address2')->after('address1');           
           $table->string('health_status')->after('address2');           
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
            $table->dropColumn('disposition');
            $table->dropColumn('address1');
            $table->dropColumn('address2');
            $table->dropColumn('health_status');
        });
    }
}
