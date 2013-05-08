<?php

class UserLibrary {
	private static $languageArray = array(
		'english',	
		'slovenian',	
		'italian',	
		'german',	
	);
	private static $languageAbbrsArray = array(
		'en',	
		'si',	
		'it',	
		'ge',	
	);

	private static $timezoneArray = array(
		"UTC-11","UTC-10","UTC-9","UTC-8","UTC-7","UTC-6",
		"UTC-5","UTC-4","UTC-3","UTC-2","UTC-1",
		"UTC (United Kingdom)",
		"UTC+1 (Slovenia, Spain, Germany, Poland)",
		"UTC+2 (Ukraine)","UTC+3","UTC+4","UTC+5","UTC+6",
		"UTC+7","UTC+8","UTC+9","UTC+10","UTC+11","UTC+12"
	);


	//returns translated languages array
	public static function languages() {
		return Lang::get('general.languages');
	}
	//returns translated language
	public static function language($i) {
		return Lang::get('general.languages')[$i]; 
	}
	public static function languageAbbrs($i) {
		return self::$languageAbbrsArray[$i];
	}
	public static function getTimezoneIndex($i) {
		return array_search($i,self::$timezoneArray);
	}
	public static function timezones() {
		return self::$timezoneArray	;
	}
	public static function timezone($i) {
		return self::$timezoneArray[$i];
	}


	public static function generateUuid()
    {
        // Generate Uuid
        $uuid = Uuid::v4(false);
        // Check that it is unique
        $currentConfirmationCode = Passreminder::where('token', $uuid)->first();

        if($currentConfirmationCode != NULL) {
           $uuid =  $this->generateUuid($table, $field);
        }

        return $uuid;
    }
}
