<?php

use Illuminate\Database\Migrations\Migration;

class RemoveDayFromReservationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reservation', function($t) {
			$t->dropColumn('day');
			$t->string('date');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('reservation', function($t) {			
			$t->string('day');
			$t->dropColumn('date');
		});
	}

}
