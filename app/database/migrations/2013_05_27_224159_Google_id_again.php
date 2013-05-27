<?php

use Illuminate\Database\Migrations\Migration;

class GoogleIdAgain extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	  Schema::table('reservation', function($table) {
	      $table->string('google_id');
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	  Schema::table('reservation', function($table) {
	      $table->dropColumn('google_id');
	    });
	}

}