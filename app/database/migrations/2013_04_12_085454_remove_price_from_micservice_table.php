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
			$t->decimal('price');
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
		        $t->decimal('price');
			$t->dropColumn('price');
		});
	}

}