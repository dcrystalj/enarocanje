<?php

class Ulibrary {
	private static $languageArray = array(
		"english",
		"slovenian",
		"italian",
		"german"
	);

	public static function lang($i) {
		return self::$languageArray[$i];
	}
}
