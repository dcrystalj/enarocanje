<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ChangeReferralCodeInTableUsers extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('referral_code');
           
        });
        Schema::table('users', function(Blueprint $table) {
            $table->string('referral_code');           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('referral_code');
        });

         Schema::table('users', function(Blueprint $table) {
            $table->integer('referral_code');
        });
    }

}
