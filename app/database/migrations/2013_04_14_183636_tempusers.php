<?php

use Illuminate\Database\Migrations\Migration;

class Tempusers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tempusers', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('mail');
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
		Schema::drop('tempusers');
	}

}