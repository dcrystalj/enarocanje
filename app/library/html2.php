<?php

// Cache invalidation
class Html2 extends Html {
	public static function script($src) {
		$ts = substr(time(), 0, -4);
		return '<script src="'.URL::to($src).'?ts='.$ts.'"></script>'."\n";
	}
	public static function style($src) {
		$ts = substr(time(), 0, -4);
		return '<link media="all" type="text/css" rel="stylesheet" href="'.URL::to($src).'?ts='.$ts.'">'."\n";
	}
};
