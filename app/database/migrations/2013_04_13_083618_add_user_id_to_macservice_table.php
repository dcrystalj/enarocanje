<?php

use Illuminate\Database\Migrations\Migration;

class AddUserIdToMacserviceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('macservice', function($table) {
			$table->integer('user_id');
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
			$table->dropColumn('user_id');
		});
	}

}