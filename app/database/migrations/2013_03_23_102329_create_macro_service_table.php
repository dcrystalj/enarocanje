<?php

use Illuminate\Database\Migrations\Migration;

class CreateMacroServiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('macservice', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('location');
			$table->integer('telephone_number');
			$table->string('address');
			$table->integer('ZIP_code');
			$table->string('description');
			$table->string('working_hours');
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
		Schema::drop('macservice');
	}

}