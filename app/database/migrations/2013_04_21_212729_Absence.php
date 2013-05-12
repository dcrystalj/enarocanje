<?php

use Illuminate\Database\Migrations\Migration;

class Absence extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('absence', function($table) {
		   $table->engine = 'InnoDB';
		   $table->increments('id');
		   $table->integer('macservice_id')->unsigned();
		   $table->datetime('from');
		   $table->datetime('to');
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
		Schema::table('absence', function($table) {
			$table->dropForeign('absence_macservice_id_foreign');
		});
		Schema::drop('absence');
	}

}
