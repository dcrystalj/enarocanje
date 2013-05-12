<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddConstraintsFixes extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
    {
        Schema::table('users', function( Blueprint $table) {
            $table->dropColumn('gcalendar');
        });
        
        Schema::table('reservation', function(Blueprint $table) {
            $table->index('user_id');
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
            $table->drop_foreign('reservation_user_id_foreign');  
            $table->drop_index('user_id');
        });
        Schema::table('users', function(Blueprint $table) {
            $table->string('gcalendar');
        });
         
    }

}
