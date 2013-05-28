<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableProviderPictures extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('provider_pictures', function($table) {
			$table->increments('id');
		    $table->integer('macservice_id')->unsigned();
			$table->foreign('macservice_id')->references('id')->on('macservice');
			$table->string('path');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('provider_pictures');
	}

}