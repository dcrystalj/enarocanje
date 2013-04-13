<?php

use Illuminate\Database\Migrations\Migration;

class AddActiveAndActivefromToMicservice extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('micservice', function($table) {
			$table->integer('active');
			$table->date('activefrom');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('micservice', function($table) {
			$table->dropColumn('active');
			$table->dropColumn('activefrom');
		});
	}

}