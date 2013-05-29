<?php

use Illuminate\Database\Migrations\Migration;

class WorkingHour extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('working_hour', function($table) {
		   $table->engine = 'InnoDB';
		   $table->increments('id');
		   $table->integer('macservice_id')->unsigned();
		   $table->integer('day');
		   $table->time('from');
		   $table->time('to');
		   $table->timestamps();

		   $table->foreign('macservice_id')->references('id')->on('macservice')->on_delete('cascade');
	   });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('working_hour', function($table) {
			$table->dropForeign('working_hour_macservice_id_foreign');
		});
		Schema::drop('working_hour');
	}

}
