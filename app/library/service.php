<?php

class Service {

	private static $serviceCategories = array(
		'Nurse salon'   => 'Nurse salon',
		'Massage salon' => 'Massage salon',
		'Hair salon'    => 'Hair salon',
		'Beauty salon'  => 'Beauty salon'
	);

	private static $duration = array(
		'15'  => '15 min',
		'30'  => '30 min',
		'45'  => '45 min',
		'60'  => '1 h',
		'75'  => '1 h 15 min',
		'90'  => '1h 30 min',
		'105' => '1h 45 min',
		'120' => '2 h',
    );

	private static $services = array(
		'Manicure'        => 'Manicure',
		'Pedicure'        => 'Pedicure',
		'Depilation'      => 'Depilation',
		'Solarium'        => 'Solarium',
		'Make-up'         => 'Make-up',
		'Massage'         => 'Massage',
		'Hair services'   => 'Hair services',
		'Solarium'        => 'Solarium',
		'Skin treatments' => 'Skin treatments',
	);

	private static $sex = array(
        'U' => 'Unisex',
        'M' => 'Man',
        'W' => 'Woman',
    );

    private static $absences = array(
    	'holiday' => 'Holiday', 
    	'absence' => 'Absence',
    );

	public static function categories() {
		return self::$serviceCategories;
	}

	public static function duration() {
		return self::$duration;
	}	

	public static function micro() {
		return self::$services;
	}	

	public static function gender() {
		return self::$sex;
	}

	public static function absence() {
		return self::$absences;
	}
	
	public static function zip() {
    	$zipCode = ZIPcode::All();
	    foreach ($zipCode as $z) {
	         $codes[$z->ZIP_code] = $z->ZIP_code . ' ' . $z->city;
	    }
     	return $codes;
	}

}