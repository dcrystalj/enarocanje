<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddAddressToMacroservice extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('macservice', function(Blueprint $table) {
            $table->dropColumn('telephone_number');
            $table->dropColumn('location');
            $table->dropColumn('address');
        });
        Schema::table('macservice', function(Blueprint $table) {
            $table->string('city');           
            $table->string('street');           
            $table->string('site_url');
            $table->string('email');
            $table->string('telephone_number');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('macservice', function(Blueprint $table) {
            $table->dropColumn('telephone_number');
            $table->dropColumn('street');
            $table->dropColumn('site_url');
            $table->dropColumn('email');
            $table->dropColumn('city');
        });
        Schema::table('macservice', function(Blueprint $table) {
            $table->integer('telephone_number');
            $table->string('address');
            $table->string('location');
        });
    }

}
