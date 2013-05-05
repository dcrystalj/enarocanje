<?php

class UserLibrary {
	private static $languageArray = array(
		// Lang::get('user.english'),
		// Lang::get('user.slovenian'),
		// Lang::get('user.italian'),
		// Lang::get('user.german'),
		'english',	
		'slovenian',	
		'italian',	
		'german',	
	);
	private static $timezoneArray = array(
		"UTC-11","UTC-10","UTC-9","UTC-8","UTC-7","UTC-6",
		"UTC-5","UTC-4",
		"UTC-3","UTC-2","UTC-1","UTC (United Kingdom)",
		"UTC+1 (Slovenia, Spain, Germany, Poland)",
		"UTC+2 (Ukraine)","UTC+3","UTC+4",
		"UTC+5","UTC+6","UTC+7","UTC+8","UTC+9","UTC+10","UTC+11","UTC+12"
	);


	public static function languages() {
		//return array("asd","ooo");
		return Lang::get('user.languages');
		//return self::$languageArray;
	}
	public static function language($i) {
		//return "asd";
		return Lang::get('languages')[$i];
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
