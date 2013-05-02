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
			$r[$item['id']] = $item['summary'];
		return $r;
	}

	public function listEvents($calendar_id) {
		$events = $this->cal->events->listEvents($calendar_id);
		$r = array();
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
}
