<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ChangeColumnLengthInMicserviceTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('micservice', function(Blueprint $table) {
            $table->dropColumn('length');
        });
        Schema::table('micservice', function(Blueprint $table) {
            $table->time('length');
            $table->string('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('micservice', function(Blueprint $table) {
            $table->dropColumn('length');
            $table->dropColumn('title');
        });
        Schema::table('micservice', function(Blueprint $table) {
            $table->integer('length');
        });
    }

}
