<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		// $this->call('UserTableSeeder');

		// $this->call('MicserviceTableSeeder');
		// $this->call('MacroserviceTableSeeder');
		// $this->call('WorkinghourTableSeeder');

		//$this->call('ZipcodeTableSeeder');
		$this->call('UsersTableSeeder');
	}

}