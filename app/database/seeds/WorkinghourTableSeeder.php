<?php

class WorkinghourTableSeeder extends Seeder {

	public function run()
	{
		$working_hour = array(
			['macservice_id'=>1,'day'=>1,'from'=>'8:00','to'=>'18:00'],
			['macservice_id'=>1,'day'=>2,'from'=>'8:00','to'=>'18:00']
		);

		// Uncomment the below to run the seeder
		DB::table('working_hour')->insert($working_hour);
	}

}
