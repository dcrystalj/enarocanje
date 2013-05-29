<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ModifyAbsenceTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('absence', function(Blueprint $table) {
            $table->string('title');
            $table->integer('repetable');
            $table->integer('google_id');
            $table->string('abs_type');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('absence', function(Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('repetable');
            $table->dropColumn('google_id');
            $table->dropColumn('abs_type');
            
        });
    }

}
