<?php

class UserLibrary {
	private static $languageArray = array(
		"english",
		"slovenian",
		"italian",
		"german"
	);

	public static function lang($i) {
		return self::$languageArray[$i];
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