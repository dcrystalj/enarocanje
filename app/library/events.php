<?php

class Events {
	private static $day_to_num = array(
		'Monday'    => 0,
		'Tuesday'   => 1,
		'Wednesday' => 2,
		'Thursday'  => 3,
		'Friday'    => 4,
		'Saturday'  => 5,
		'Sunday'    => 6,
	);
	private static $num_to_day = array(
		'Monday',
		'Tuesday',
		'Wednesday',
		'Thursday',
		'Friday',
		'Saturday',
		'Sunday',
	);

	public static function invert($from, $to, $events) {
		$from = date('Y-m-d', $from);
		$to = date('Y-m-d', $to);

		// Day -> event
		$days = array();
		foreach($events as $event) {
			// Compatibility: database <-> fullcalendar
			if(isset($event->from)) {
				$event->start = $event->from;
				$event->end = $event->to;
				$day = $event->day;
			} else {
				// Hash
				$day = self::stringToDay(date("l",strtotime($event->start))); //get from 0 to 6 what day is it
			}
			$days[$day] = $event;
		}

		$inverted = array();
		$i = 0;
		// TODO: Invering algoirtem -> library
		while($from != $to) {
			$day = self::stringToDay(date("l",strtotime($from))); //get from 0 to 6 what day is it
			//is not day off?
			if(isset($days[$day])) {
				$event = $days[$day];
				$hour_begin = date('H:i', strtotime($event->start));
				$hour_end = date('H:i', strtotime($event->end));
			
				// Before - after
				if($hour_begin != '00:00')
					$inverted[] = Events::getDisabled($from.' 00:00:00', $from.' '.$hour_begin, 'inverted_'.$i++);
				if($hour_end != '23:59')
					$inverted[] = Events::getDisabled($from.' '.$hour_end, $from.' 23:59:59', 'inverted_'.$i++);
			}else{
				//is day off
				$inverted[] = Events::getDisabled($from.' 00:00:00', $from.' 23:59:59', 'inverted_'.$i++);
			}
			$from =  date("Y-m-d", strtotime("$from +1 day"));
		}
		return $inverted;
	}

	// Get disabled event
	public static function getDisabled($from, $to, $id, $title='') {
		return array(
			'id' => $id,
			'title' => $title,
			'start' => $from,
			'end' => $to,
			'allDay' => false,
			'className' => 'termin',
			'color' => 'rgba(192,192,192,0.5)',
			'editable' => false,
		);
	}
	public static function dayToString($i){
		return isset(self::$num_to_day[$i])?self::$num_to_day[$i]:null;
	}
	public static function stringToDay($i){
		return isset(self::$day_to_num[$i])?self::$day_to_num[$i]:null;
	}

	// Reservation from database -> event for google
	// Sync - synchronizate with google
	public static function reservation_to_event($reservation, $sync=false) {
	  $u = User::find($reservation->user_id);
	  $serviceName = Service::serviceName($reservation->micservice_id);
	  if($u->name) 
	    {
	      $name = $u->name.' '.$u->surname;
	    } else 
	    {
	      $name = $u->email;
	    }
	  
	  $ev = array(
	    'from' => $reservation->date.' '.$reservation->from,
	    'to' => $reservation->date.' '.$reservation->to,
	    'title' => trans('general.reservation').': '.$name.' '.trans('general.reservation').' '.$serviceName
	  );
	  if($sync)
	    $ev['model'] = $reservation;
	  return $ev;
	}
};
