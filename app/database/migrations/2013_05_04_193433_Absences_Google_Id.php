<?php

use Illuminate\Database\Migrations\Migration;

class AbsencesGoogleId extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('absence', function($table) {
			$table->dropColumn('google_id');
		});
		Schema::table('absence', function($table) {
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
		Schema::table('absence', function($table) {
			$table->dropColumn('google_id');
		});
		Schema::table('absence', function($table) {
			$table->integer('google_id');
		});
	}

}
