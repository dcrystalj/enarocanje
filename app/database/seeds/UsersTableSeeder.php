<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	// DB::table('users')->delete();

        $users[] =      	['email'=>'admin@admin.com','password'=>Hash::make('admin'),'status'=>5,'confirmed'=>1];
        
        /*for ($i=100; $i <151 ; $i++) { 
            $users[] = ['id' => $i, 'email'=>'test'. $i . '@test.com','password'=>Hash::make('test'),'status'=>2,'confirmed'=>1];
        }*/

        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }

}