<?php

use Illuminate\Database\Migrations\Migration;

class RemovePriceFromMicserviceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('micservice', function($t) 
		{
			$t->dropColumn('price');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('micservice', function($t) {
			$t->dropColumn('price');
		});
	}

}