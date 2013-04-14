<?php

use Illuminate\Database\Migrations\Migration;

class AddForeignkeyToTempusersTableReservations extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reservation', function($table) {
			$table->integer('tmpuser_id');
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
			$table->dropColumn('tmpuser_id');
		});
	}

}