<?php

use Illuminate\Database\Migrations\Migration;

class AddActiveToMacserviceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('macservice', function($table) {
			$table->integer('active');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('macservice', function($table) {
			$table->dropColumn('active');
		});
	}

}