<?php

class MacroserviceTableSeeder extends Seeder {

	public function run()
	{
		// $macroservice = array(
		// 	['name'=>'strizenje', 'telephone_number'=>041535150, 'ZIP_code'=>5271,'description'=>'super ql strizenje za ful dnarja']
		// );

		for ($i=100; $i <151 ; $i++) { 
			if($i < 140)
            	$macroservice[] = ['id' => $i, 'user_id' => $i, 'title'=> 'ime'.$i, 'name'=>'Nurse salon', 'telephone_number'=>041041041, 'ZIP_code'=>5271,'description'=>'super ql za ful dnarja'];
            else	
            	$macroservice[] = ['id' => $i, 'user_id' => $i, 'title'=> 'ime'.$i, 'name'=>'Massage salon', 'telephone_number'=>041041041, 'ZIP_code'=>5271,'description'=>'super ql za ful dnarja'];
        }
        //nurse -> Depilation
        //massage -> massage

		// Uncomment the below to run the seeder
		DB::table('macservice')->insert($macroservice);
	}

}
