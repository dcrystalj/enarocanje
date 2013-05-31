<?php

class MicserviceTableSeeder extends Seeder {

	public function run()
	{
		$micservice = array( 

			array('name' => 'Žensko strizenje',
							 'length' => '40',
							 'description' => 'strizenje bla bla',
							 'price' => '25'),	

			array('name' => 'Moško strizenje',
							 'length' => '20',
							 'description' => 'strizenje',
							 'price' => '10')

		);

		// Uncomment the below to run the seeder
	    DB::table('micservice')->insert($micservice);
	}

}
