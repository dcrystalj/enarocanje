<?php

use Illuminate\Database\Migrations\Migration;

class Breaks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('break',
  	    function($table) {
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
		$table->drop_foreign('break_macservice_id_foreign');
		Schema::drop('break');
	}

}