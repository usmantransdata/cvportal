<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddress1ColumnToClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('client', function (Blueprint $table) {
           $table->string('address1')->after('contact__person_phoneNumber');           
           $table->string('address2')->after('address1');        
           $table->string('zip')->after('state');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client', function (Blueprint $table) {
           $table->dropColumn('address1'); 
           $table->dropColumn('address2'); 
           $table->dropColumn('zip'); 
        });
    }
}
