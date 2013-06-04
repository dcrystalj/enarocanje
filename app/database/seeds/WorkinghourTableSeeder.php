<?php

class WorkinghourTableSeeder extends Seeder {

	public function run()
	{
		/*$working_hour = array(
			['macservice_id'=>1,'day'=>1,'from'=>'8:00','to'=>'18:00'],
			['macservice_id'=>1,'day'=>2,'from'=>'8:00','to'=>'18:00']
		);*/

		for ($i=100; $i <151 ; $i++) { 
			for ($j=1; $j <6 ; $j++) { 
            	$working_hour[] = ['macservice_id' => $i, 'day'=>$j,'from'=>'8:00','to'=>'18:00'];
        	}
        }
		// Uncomment the below to run the seeder
		DB::table('working_hour')->insert($working_hour);
	}

}
