<?php
class GCal extends BaseController {
	public function auth() {
		$gcal = new GoogleApi();
		$gcal->auth(Input::Get('code'));
		$state = json_decode(urldecode(Input::get('state')));
		return Redirect::to($state->redirect);
	}

	// Sync: Absences -> google calendar
	public function exportAbsences() {
		$user = Auth::user();
		if(!$user || !$user->isProvider())
			return;
		$mac = $user->macroservices()->first()->id;
		$calendar_id = $user->gcalendar;
		$absences = Absences::where('macservice_id', $mac)
			->where('abs_type', 'absence')->get();

		$events = array();
		foreach($absences as $absence)
			$events[] = array(
				'from' => $absence->from,
				'to' => $absence->to,
				'title' => $absence->title,
				'repetable' => $absence->repetable,
			   	'model' => $absence,
			);

		try {
			$r = $this->exportToGcal($user->gcalendar, $events, 'E-narocanje');
			if($r !== true)
				return $r;
		} catch(Exception $e) {
			return Redirect::to("/macro/$mac/absence/create")->with('error', $e->getMessage());
		}

		return Redirect::to("/macro/$mac/absence/create")->with('success', trans('messages.absencesSuccessfullyExported'));
	}


	// Sync: Google calendar -> absences
	public function importAbsences() {
		$user = Auth::user();
		if(!$user || !$user->isProvider())
			return;
		$mac = $user->macroservices()->first()->id;

		$gcal = new GoogleApi();
		if(!$gcal->isLoggedIn())
			return Redirect::to($gcal->getUrl());

		$calendar_id = Input::get('calendar_id');
		if(!$calendar_id)
			return $gcal->selectCalendar();

		$events = $gcal->listEvents($calendar_id);

		foreach($events as $event) {
			$yearly = false;
			if(isset($event['recurrence'])) {
				foreach($event['recurrence'] as $rec) {
					if($rec == 'RRULE:FREQ=YEARLY') {
						$yearly = true;
						break;
					}
				}
			}

			DB::table('absence')->insert(array(
				 'macservice_id' => $mac,
				 'from' => $event['start'],
				 'to' => $event['stop'],
				 'title' => isset($event['summary']) ? $event['summary']:trans('general.undef'),
				 'repetable' => $yearly?1:0,
				 'google_id' => $event['id'],
				 'abs_type' => 'absence',
			 ));
		}
		return Redirect::to("/macro/$mac/absence/create")->with('success', trans('messages.absencesSuccessfullyImported'));
	}

	public function exportUserReservations() {
		if(!($user = Auth::user())) return;
		$reservations = array();
		foreach(Reservation::where('user_id', $user->id)->get() as $reservation) 
		{
			$serviceName = Service::serviceName($reservation->microservice->id);

			$reservations[] = array(
				'from' => $reservation->date.' '.$reservation->from,
				'to' => $reservation->date.' '.$reservation->to,
				'title' => trans('general.reservation').': '.$serviceName,
			);
		}

		$r = $this->exportToGcal('select', $reservations);
		if($r !== true)	return $r;
		return Redirect::to('/user/'.$user->id)->with('success', trans('messages.reservationSuccessfullyExported'));
	}

	public function exportServiceReservations() {
		$user = Auth::user();
		if(!($user && $user->isProvider())) return;

		$calendar_id = 'select';
		if($gtoken = $user->getGtoken()) {
		  Session::put('gtoken', $gtoken);
		  $calendar_id = $user->getGcalendar();
		}

		$reservations = array();
		$services = $user->macroservices->first()->microservices;
		foreach($services as $service) {
			foreach($service->reservations as $reservation) 
			{
				$u = User::find($reservation->user_id);
				$serviceName = Service::serviceName($service->id);
				if($u->name) 
				{
					$name = $u->name.' '.$u->surname;
				} else 
				{
					$name = $u->email;
				}

				$reservations[] = array(
					'from' => $reservation->date.' '.$reservation->from,
					'to' => $reservation->date.' '.$reservation->to,
					'title' => trans('general.reservation').': '.$name.' '.trans('general.reservation').' '.$serviceName
					/* 'model' => $reservation, */
				);
			}
		}
		try {
			$r = $this->exportToGcal($calendar_id, $reservations);
		} catch(Exception $e) {
			return Redirect::to('/macro/create')->with('error', $e->getMessage());
		}
		if($r !== true)
			return $r;

		// Save provider calendar id
		$user->setGtoken(Session::get('gtoken'));
		$user->setGcalendar(Session::get('gcalendar'));
		$user->save();
		
		return Redirect::to('/macro/create')->with('success', trans('messages.reservationSuccessfullyExported'));
				
	}

	public function importHolidays() {
		$gcal = new GoogleApi();
		if(!$gcal->isLoggedIn())
			return Redirect::to($gcal->getUrl());

		$events = array();
		foreach($gcal->listCalendars() as $id=>$item) {
			if(strpos($id, 'holiday') != null) {
				$events = $gcal->listEvents($id);
				break;
			}
		}

		$mac = 58;
		// FIXME: user_id
		Absences::where('abs_type', 'holiday')->where('macservice_id', $mac)->delete();
		foreach($events as $event) {
			DB::table('absence')->insert(array(
											 'macservice_id' => $mac,
											 'from' => $event['start'],
											 'to' => $event['stop'],
											 'title' => $event['summary'],
											 'repetable' => false, // TODO
											 'google_id' => $event['id'],
											 'abs_type' => 'holiday',
										 ));
		}
	}

	private function exportToGcal($calendarId, $events, $calendarTitle='') {
		$gcal = new GoogleApi();
		if(!$gcal->isLoggedIn())
			return Redirect::to($gcal->getUrl());

		// Select existing calendar
		if($calendarId == 'select') {
			if($id = Input::get('calendar_id')) {
				$calendarId = $id;
			} else {
				return $gcal->selectCalendar();
			}
		}

		$list = $gcal->listCalendars();

		// Create calendar if not exist
		if(!isset($list[$calendarId])) {
			if(!$calendarTitle)
				die(trans('messages.undefinedCalendar'));
			$cal = $gcal->createCalendar($calendarTitle);
			$user = Auth::user();
			$user->gcalendar = $calendarId = $cal['id'];
			$user->save();
		}
		Session::put('gcalendar', $calendarId);

		// Push events to calendar
		$gcal->add_or_update($calendarId, $events);
		return true;
	}

	public function getEvents($calendar_id) {
		$gcal = new GoogleApi();
		$events = $gcal->listEvents($calendar_id);
		$r = array();
		foreach($events as $event) {
			$r[] = array(
				'id' => $event['id'],
				'title' => $event['summary'],
				'start' => $event['start'],
				'end' => $event['stop'],
				'allDay' => false,
				'eventType' => 'break',
			);
		}
		return Response::json($r);
	}
}
