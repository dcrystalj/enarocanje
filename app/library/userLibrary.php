<?php

class UserLibrary {
	private static $languageArray = array(
		"english",
		"slovenian",
		"italian",
		"german"
	);
	private static $timezoneArray = array(
		"-11","-10","-9","-8","-7","-6","-5","-4",
		"-3","-2","-1","UTC","+1","+2","+3","+4",
		"+5","+6","+7","+8","+9","+10","+11","+12"
	);


	public static function lang($i) {
		return self::$languageArray[$i];
	}
	public static function timezone($i) {
		return self::$timezoneArray[$i];
	}
}