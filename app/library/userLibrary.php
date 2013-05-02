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
		"-11","-10","-9","-8","-7","-6","-5","-4",
		"-3","-2","-1","UTC","+1","+2","+3","+4",
		"+5","+6","+7","+8","+9","+10","+11","+12"
	);


	public static function languages() {
		return self::$languageArray;
	}
	public static function language($i) {
		return self::$languageArray[$i];
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
