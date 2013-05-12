<?php

use Illuminate\Database\Migrations\Migration;

class Fixes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table) {
			$table->dropColumn('gcalendar');
		});
		Schema::table('reservation', function($table) {
			$table->index('user_id');
		});
		Schema::table('reservation', function($table) {
			$table->foreign('user_id')->references('id')->on('users')->on_delete('cascade');
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
			$table->dropForeign('reservation_user_id_foreign');  
			$table->dropIndex('user_id');
		});
		Schema::table('users', function($table) {
			$table->string('gcalendar');
		});
	}

}
