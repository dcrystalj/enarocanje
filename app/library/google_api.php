<?php
require_once 'google_lib/Google_Client.php';
require_once 'google_lib/contrib/Google_CalendarService.php';

class GoogleApi {
	private $client;
	private $cal;

	public function __construct() {
		$this->client = new Google_Client();
		$this->client->setApplicationName('e-narocanje');
		$this->cal = new Google_CalendarService($this->client);
		if($token = Session::get('gtoken'))
			$this->client->setAccessToken($token);
	}

	public function isLoggedIn() {
		return Session::get('gtoken');
	}

	public function getUrl() {
		$this->client->setRedirectUri(URL::to('google/auth'));
		$this->client->setState(json_encode(array('redirect' => urlencode(URL::full()))));
		return $this->client->createAuthUrl();
	}

	public function auth($code) {
		$this->client->authenticate($code);
		Session::put('gtoken', $this->client->getAccessToken());
	}

	public function listCalendars() {
		$list = $this->cal->calendarList->listCalendarList();
		$r = array();
		foreach($list['items'] as $item)
			$r[$item['id']] = $item;
		return $r;
	}

	public function createCalendar($summary) {
		$calendar = new Google_Calendar();
		$calendar->setSummary($summary);
		$calendar->setTimeZone('Europe/Ljubljana');
		return $this->cal->calendars->insert($calendar);
	}

	public function listEvents($calendar_id) {
		$events = $this->cal->events->listEvents($calendar_id);
		$r = array();
		if(!isset($events['items'])) return $r;
		foreach($events['items'] as $event) {
			$start = $event['start'];
			$start = isset($start['date'])?$start['date']:$start['dateTime'];
			$end = $event['end'];
			$end = isset($end['date'])?$end['date']:$end['dateTime'];
			$f = 'Y-m-d H:i:s';
			$event['start'] = date($f, strtotime($start));
			$event['stop'] = date($f, strtotime($end));
			$r[] = $event;
		}
		return $r;
	}

	private function getEvent($e, &$event=null) {

		$timezone = 'Europe/Ljubljana';
		if($event === null)
			$event = new Google_Event();
		$event->setSummary($e['title']);
		$start = new Google_EventDateTime();
		$start->setDateTime((new DateTime($e['from']))->format('c'));
		$start->setTimeZone($timezone);
		$event->setStart($start);
		$end = new Google_EventDateTime();
		$end->setDateTime((new DateTime($e['to']))->format('c'));
		$end->setTimeZone($timezone);
		$event->setEnd($end);
		//$event->setRecurrence(array('RRULE:FREQ=WEEKLY;UNTIL=20110701T100000-07:00'));
		return $event;
	}
	public function add_or_update($cId, $events) {
		$existings = array();
		foreach($this->listEvents($cId) as $e)
			$existings[$e['id']] = $e;

		foreach($events as $event) {
			if($event->google_id && isset($existings[$event->google_id])) { // Update
				$ev = $this->getEvent($event);
				$e = $this->cal->events->update($cId, $event->google_id, $ev);
				/* $event->google_id = $e['id']; // remove */
				/* $event->save(); // remove */
				unset($existings[$event->google_id]);
			} else { // Insert
				$ev = $this->getEvent($event);
				$e = $this->cal->events->insert($cId, $ev);
				$event->google_id = $e['id'];
				$event->save();
			}
		}
		foreach($existings as $id=>$item)
			$this->cal->events->delete($cId, $id);
	}
	public function addEvents($cId, $events) {
		
	}
/* try { */
/* 	$from = '2013-04-29T10:00:00.000-07:00'; */
/* 	$to = '2013-04-29T11:00:00.000-07:00'; */
/* 	print "Event: ".addEvent('matijja24@gmail.com', 'Testni event', $from, $to); */
/* } catch(Google_ServiceException $e) { */
/* 	print $e->getMessage(); */
/*   } */
}
