<?php

use Illuminate\Database\Migrations\Migration;

class RemovedToken extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($t){
			$t->dropColumn('confirmation_code');
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$t->string('confirmation_code');
	}

}