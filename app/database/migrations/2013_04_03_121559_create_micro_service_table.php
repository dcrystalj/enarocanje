<?php

use Illuminate\Database\Migrations\Migration;

class CreateMicroServiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('service', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('length');
			$table->string('description');
			$table->integer('price');
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
		Schema::drop('service');
	}

}