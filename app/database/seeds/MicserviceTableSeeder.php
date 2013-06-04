<?php

class MicserviceTableSeeder extends Seeder {

	public function run()
	{
		/*$micservice = array( 

			array('name' => 'Žensko strizenje',
							 'length' => '40',
							 'description' => 'strizenje bla bla',
							 'price' => '25'),	

			array('name' => 'Moško strizenje',
							 'length' => '20',
							 'description' => 'strizenje',
							 'price' => '10')

		);*/

		for ($i=100; $i <151 ; $i++) { 
			for ($j=1; $j <101 ; $j++) { 
				if($i < 140)
            		$micservice[] = ['macservice_id' => $i, 'title'=> 'ime'.$i.''.$j, 'name'=>'Skin treatment', 'gender' => 'U', 'length' => '60', 'price' => '10', 'category'=>1];
            	else	
            		$micservice[] = ['macservice_id' => $i, 'title'=> 'ime'.$i.''.$j, 'name'=>'Massage', 'gender' => 'U', 'length' => '60', 'price' => '10', 'category'=>8];
        	}
        }

        //nurse->skin

		// Uncomment the below to run the seeder
	    DB::table('micservice')->insert($micservice);
	}

}
