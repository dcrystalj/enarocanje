<?php
require_once 'google_lib/Google_Client.php';
require_once 'google_lib/contrib/Google_CalendarService.php';

class GoogleApi {
	private $client;
	private $cal;
	private $ret = null;

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
		if(isset($e['repetable']) && $e['repetable'])
			$event->setRecurrence(array('RRULE:FREQ=YEARLY'));//';UNTIL=20110701T100000-07:00'));
		return $event;
	}
	public function add_or_update($cId, $events) {
		$existings = array();
		foreach($this->listEvents($cId) as $e)
			$existings[$e['id']] = $e;

		foreach($events as $event) {
			$model = isset($event['model'])?$event['model']:null;
			if($model && isset($existings[$model->google_id])) { // Update
				print "Update<br />";
				$gid = $model->google_id;
				$ev = $this->getEvent($event);
				$e = $this->cal->events->update($cId, $gid, $ev);
				unset($existings[$gid]);
			} else { // Insert
				print "Insert<br />";
				$ev = $this->getEvent($event);
				$e = $this->cal->events->insert($cId, $ev);
				if($model) {
					$model->google_id = $e['id'];
					$model->save();
				}
			}
		}

		foreach($existings as $id=>$item)
			$this->cal->events->delete($cId, $id);
	}

	/* Helper */
	public  function r($r=null) {
		if($r === null)
			$this->ret = $r;
		else
			return $this->ret;
	}

	/* --- */
	function selectCalendar() {
		if($id = Input::get('calendar_id'))
			return $id;
		$list = $this->cal->calendarList->listCalendarList();
		$this->r(View::Make('gcal.select')->with('calendars', $list));
	}

	/* +++ */
	function exportToGcal($calendarId, $events) {
		if($calendarId == 'select') {
			$calendarId = $this->selectCalendar();
			if(!$calendarId)
				return;
		}
	}
}
