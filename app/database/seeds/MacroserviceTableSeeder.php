<?php

class MacroserviceTableSeeder extends Seeder {

	public function run()
	{
		$macroservice = array(
			['name'=>'strizenje','location'=>'slovenia','telephone_number'=>041535150,'address'=>'vrhpolje 141','ZIP_code'=>5271,'description'=>'super ql strizenje za ful dnarja']
		);

		// Uncomment the below to run the seeder
		DB::table('macservice')->insert($macroservice);
	}

}
