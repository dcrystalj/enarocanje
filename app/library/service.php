<?php

class Service {

	/*private static $serviceCategories = array(
		'Nurse salon'   => 'Nurse salon',
		'Massage salon' => 'Massage salon',
		'Hair salon'    => 'Hair salon',
		'Beauty salon'  => 'Beauty salon',
	);*/

	/*private static $duration = array(
		'15'  => '15 min',
		'30'  => '30 min',
		'45'  => '45 min',
		'60'  => '1 h',
		'75'  => '1 h 15 min',
		'90'  => '1h 30 min',
		'105' => '1h 45 min',
		'120' => '2 h',
    );*/

	private static $services = array(
		'3' => array('Manicure', 
					 'Pedicure',
					 'Depilation',
					 'Solarium',
					 'Make-up',),
		'1' => array('Massage'),       
		'2' => array('Hair services'),
		'0' => array('Skin treatments'),
	);

	private static $sex = array(
        'U' => 'Unisex',
        'M' => 'Male',
        'W' => 'Female',
    );

    /*private static $absences = array(
    	'holiday' => 'Holiday', 
    	'absence' => 'Absence',
    );*/

    private static $length;

	/*public static function categories() {
		return self::$serviceCategories;
	}*/

	public static function categories(){
		$categories = Categories::all();
		foreach ($categories as $cat) {
       		$category[$cat->name] = $cat->name;
    	}
    	return $category;
	}

	public static function categoryId($serviceName) {
		$categories = Categories::all();
		foreach ($categories as $category)
		{
			if($category->name == $serviceName){
				return $category->id-1;
			}
		}
	}

	/*public static function duration() {
		return self::$duration;
	}*/

	public static function lengthMin($len) {
        if(substr($len,3,-4) == '0')
        {
            self::$length = substr($len,4,-3) . ' min';    
        }
        else
        {
            self::$length = substr($len,3,-3) . ' min';
        }
        return self::$length;
	}

	public static function lengthH($len) {
        if(substr($len,0,-7) == '0')
        {
            self::$length = substr($len,1,-6) . ' h ';    
        }
        else
        {
            self::$length = substr($len,0,-6) . ' h ';
        }
        return self::$length;
	}

	public static function micro($serviceName) {
		$srv = [];
		$categories = Categories::all();
		foreach ($categories as $cat) {
			if ($cat->name == $serviceName){
				return self::$services[$cat->id-1];
			}
		}
	}

	public static function gender() {
		return self::$sex;
	}

	/*public static function absence() {
		return self::$absences;
	}*/


	/*public static function services(){
		return self::$services;
	}*/	
	
	public static function serviceName($micid){
		$mic      = MicroService::find($micid);
		return $mic->title;
	}	

	public static function serviceName1($micid){
		$mic      = MicroService::find($micid);
		$category = $mic->category;
		$name     = Service::services()[$category][$mic->name];
		return $name;
	}	


	/*public static function zip() {
    	$zipCode = ZIPcode::All();
	    foreach ($zipCode as $z) {
	         $codes[$z->ZIP_code] = $z->ZIP_code . ' ' . $z->city;
	    }
     	return $codes;
	}*/

}