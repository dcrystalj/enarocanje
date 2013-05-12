<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	// DB::table('users')->delete();

        $users = array(
        	['email'=>'admin@admin.com','password'=>Hash::make('admin'),'status'=>5,'confirmed'=>1],
        );

        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }

}