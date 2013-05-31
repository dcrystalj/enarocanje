<?php

use Illuminate\Database\Migrations\Migration;

class CreateZIPCodeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('zip_code', function($table) {
			$table->increments('id');
			$table->integer('ZIP_code');
			$table->string('city');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('zip_code');
	}

}