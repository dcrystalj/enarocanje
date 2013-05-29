<?php

use Illuminate\Database\Migrations\Migration;

class AddMacserviceIdToMicserviceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('micservice', function($table) {
			$table->integer('macservice_id');
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
			$table->dropColumn('macservice_id');
		});
	}

}