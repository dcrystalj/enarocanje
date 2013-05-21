<?php

// Cache invalidation
class Html2 extends Html {
	public static $scripts = array();

	public static function script($src) {
		$ts = substr(time(), 0, -4);
		self::$scripts[] = $src;
		return '<script src="'.URL::to($src).'?ts='.$ts.'"></script>'."\n";
	}
	public static function style($src) {
		$ts = substr(time(), 0, -4);
		return '<link media="all" type="text/css" rel="stylesheet" href="'.URL::to($src).'?ts='.$ts.'">'."\n";
	}

	public static function get_translates() {
		$translates = array();
		foreach(self::$scripts as $script)
		  if(isset(self::$translates[$script]))
		    foreach(self::$translates[$script] as $translate)
		      $translates[$translate] = trans($translate);
		return json_encode($translates);
	}
	private static $translates = array(
		'js/main.js' => array(
			'general.next',
			'messages.activateServicesFrom',
			'validation.email',
			'messages.emailSuggestion',
			'general.yes',
			'general.no'

		),
		'js/fc/fullcalendar.ext.js' => array(
			'messages.eventMissing',
			'general.workingDay',
			'messages.fetchingError',
			'general.fromTo'
		),
		'js/passStrength.js' => array(
			'general.veryWeak',
			'general.weak',
			'general.medium',
			'general.strong',
			'general.veryStrong',
			'messages.unsafePassword'

		)
	);
};
