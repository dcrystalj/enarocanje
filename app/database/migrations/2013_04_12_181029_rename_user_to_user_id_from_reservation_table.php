<?php

use Illuminate\Database\Migrations\Migration;

class RenameUserToUserIdFromReservationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reservation', function($table) {
			$table->dropColumn('user');
			$table->dropColumn('microservice');
			$table->integer('user_id');
			$table->integer('micservice_id');			
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
			$table->integer('user');
			$table->integer('microservice');
			$table->dropColumn('user_id');
			$table->dropColumn('micservice_id');
		});
	}

}
