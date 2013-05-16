<?php

use Illuminate\Database\Migrations\Migration;

class CreateReservationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservation', function($table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->time('from');
			$table->time('to');
			$table->integer('day');
			$table->integer('microservice');
			$table->integer('user')->unsigned()->index();
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
		Schema::drop('reservation');
	}

}
