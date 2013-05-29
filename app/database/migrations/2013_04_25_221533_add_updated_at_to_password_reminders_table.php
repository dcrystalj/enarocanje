<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddUpdatedAtToPasswordRemindersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('password_reminders', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('password_reminders', function(Blueprint $table) {
            $table->dropColumn('updated_at');
            $table->dropColumn('id');
        });
    }

}
