<?php

class Calendar {
	private static $opts = array(
		'unselectAuto' => true,
		'editable' => true,
		'slotMinutes' => 15,
		'minTime' => 6,
		'maxTime' => 21,
		'firstDay' => 1,
		'axisFormat' => 'HH:mm',
		'columnFormat' => array(
			'week' => 'ddd', // Mon 9/7
		),
		'selectable'=> true,
		'defaultView'=> 'agendaWeek',
		'selectHelper'=> true,	
		'buttonText' => [
    		'prev' =>     '&lsaquo;', // <
    		'next' =>     '&rsaquo;', // >
    		'prevYear' => '&laquo;',  // <<
    		'nextYear' => '&raquo;',  // >>
    		'today' =>    'today',
    		'month' =>    'month',
    		'week' =>     'week',
    		'day' =>      'day',
		],
	);

	public static function defs() {
		return self::$opts;
	}
}
