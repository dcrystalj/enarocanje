<?php
require_once 'google_lib/Google_Client.php';
require_once 'google_lib/contrib/Google_CalendarService.php';

class GoogleApi {
	private $client;
	private $cal;
	private $ret = null;

	public function __construct($user=null) {
		$this->client = new Google_Client();
		$this->client->setApplicationName('e-narocanje');
		$this->cal = new Google_CalendarService($this->client);

		// Get token
		$gtoken = Session::get('gtoken');
		if($user && $user->gtoken) {
		  $this->renew($user);
		  $gtoken = $user->gtoken;
		}

		if($gtoken)
		    $this->client->setAccessToken($gtoken);
		$this->client->setRedirectUri(URL::to('google/auth'));
	}

	protected function renew($user) {
	  $token = json_decode($user->gtoken);
	  $diff = time()-$token->created;

	  // If expire after 2min
	  if($diff > ($token->expires_in-120)) {
	    $this->client->refreshToken($token->refresh_token);

	    $user->gtoken = $new_token = $this->client->getAccessToken();
	    $user->save();
	    Session::put('gtoken', $new_token);
	  }
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
			$start = substr($start, 0, -6);
			$end = substr($end, 0, -6);
			$event['start'] = date($f, strtotime($start));
			$event['stop'] = date($f, strtotime($end));
			$r[] = $event;
		}
		return $r;
	}

	private function getEvent($e, &$event=null) {

		$timezone = 'Europe/Ljubljana';
		$t = new DateTimeZone('Europe/Ljubljana');
		$timezone = 'UTC';
		if($event === null)
			$event = new Google_Event();
		$event->setSummary($e['title']);
		$start = new Google_EventDateTime();
		$start->setDateTime((new DateTime($e['from'], $t))->format('c'));
		$start->setTimeZone($timezone);
		$event->setStart($start);
		$end = new Google_EventDateTime();
		$end->setDateTime((new DateTime($e['to'], $t))->format('c'));
		$end->setTimeZone($timezone);
		$event->setEnd($end);
		if(isset($e['repetable']) && $e['repetable'])
			$event->setRecurrence(array('RRULE:FREQ=YEARLY'));
		return $event;
	}
	public function add_or_update($cId, $events) {
		$existings = array();
		foreach($this->listEvents($cId) as $e)
			$existings[$e['id']] = $e;

		foreach($events as $event) {
			$model = isset($event['model'])?$event['model']:null;
			if(false && $model && isset($existings[$model->google_id])) { // Update
				$gid = $model->google_id;
				$ev = $this->getEvent($event);
				$e = $this->cal->events->update($cId, $gid, $ev);
				unset($existings[$gid]);
			} else { // Insert
				$ev = $this->getEvent($event);
				$e = $this->cal->events->insert($cId, $ev);
				if($model) {
					$model->google_id = $e['id'];
					$model->save();
				}
			}
		}

		//foreach($existings as $id=>$item)
		//	$this->cal->events->delete($cId, $id);
	}

	
	public function removeEvent($calendar_id, $event_id) {
	  $this->cal->events->delete($calendar_id, $event_id);
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
		$list = $this->listCalendars();
		return View::Make('gcal.select')->with('calendars', $list);
	}

	/* +++ */
	function exportToGcal($calendarId, $events, $warn=false) {
		if($calendarId == 'select') {
			$calendarId = $this->selectCalendar($warn);
			if(!$calendarId)
				return;
		}
	}
}
