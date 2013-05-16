<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Fixes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
 	public function up()
 	{
		Schema::table('reservation', function(Blueprint $table) {
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->on_delete('cascade');
		});
 	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('reservation', function(Blueprint $table) {
			$table->dropForeign('reservation_user_id_foreign');  
		});
 	}

 }
