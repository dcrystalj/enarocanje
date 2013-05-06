<?php
class GCal extends BaseController {
	public function auth() {
		$gcal = new GoogleApi();
		$gcal->auth(Input::Get('code'));
		$state = json_decode(urldecode(Input::get('state')));
		return Redirect::to($state->redirect);
	}

	public function exportReservations($mic) {
		$gcal = new GoogleApi();
		if(!$gcal->isLoggedIn())
			return Redirect::to($gcal->getUrl());
		
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
			   	'model' => $absence,
			);

		$this->exportToGcal($user->gcalendar, $events, 'E-narocanje');
		return Redirect::to("/macro/$mac/absence/create")->with('success', 'Absences sucessfully exported.');
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

		$calendar_id = $user->gcalendar;
		if($calendar_id) {
			$cid = null;
			foreach($gcal->listCalendars() as $id=>$item) {
				if($id == $calendar_id) {
					$cid = $id;
					break;
				}
			}
			$calendar_id = $cid;
		}
		if(!$calendar_id)
			die("Nothing to import.");

		$events = $gcal->listEvents($calendar_id);
		Absences::where('abs_type', 'absence')
			->where('macservice_id', $mac)->delete();
		foreach($events as $event) {
			DB::table('absence')->insert(array(
											 'macservice_id' => $mac,
											 'from' => $event['start'],
											 'to' => $event['stop'],
											 'title' => $event['summary'],
											 'repetable' => false, // TODO
											 'google_id' => $event['id'],
											 'abs_type' => 'absence',
										 ));
		}
		return Redirect::to("/macro/$mac/absence/create")->with('success', 'Absences sucessfully imported.');
	}

	public function exportUserReservations() {
		if(!($user = Auth::user())) return;
		$reservations = array();
		foreach(Reservation::where('user_id', $user->id)->get() as $reservation)
			$reservations[] = array(
				'from' => $reservation->from,
				'to' => $reservation->to,
				'title' => 'Reservation: '.$reservation->microservice->name,
			);

		$r = $this->exportToGcal('select', $reservations);
		if($r !== true)
			return $r;
		return Redirect::to('/user/'.$user->id)->with('success', 'Reservations sucessfully exported.');
	}

	public function exportServiceReservations() {
		$user = Auth::user();
		if(!($user && $user->isProvider())) return;
		$reservations = array();
		$services = $user->macroservices->first()->microservices;
		foreach($services as $service) {
			foreach($service->reservations as $reservation) {
				$u = User::find($reservation->user_id);
				$name = '';
				if($u->name) {
					$name = $u->name.' '.$u->surname;
				} else {
					$name = $u->email;
				}
				$reservations[] = array(
					'from' => $reservation->from,
					'to' => $reservation->to,
					'title' => 'Reservation: '.$name,
					/* 'model' => $reservation, */
				);
			}
		}
		$r = $this->exportToGcal('select', $reservations);
		if($r !== true)
			return $r;
		return Redirect::to('/macro/create')->with('success', 'Reservations sucessfully exported.');
				
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

		// Select calendar
		if($calendarId == 'select') {
			if($id = Input::get('calendar_id')) {
				$calendarId = $id;
			} else {
				$list = $gcal->listCalendars();
				return View::Make('gcal.select')->with('calendars', $list);
			}
		}

		$list = $gcal->listCalendars();
		if(!isset($list[$calendarId])) {
			if(!$calendarTitle)
				die("Undefined calendar title.");
			$cal = $gcal->createCalendar($calendarTitle);
			$user = Auth::user();
			$user->gcalendar = $calendarId = $cal['id'];
			$user->save();
		}
		
		$gcal->add_or_update($calendarId, $events);
		return true;
	}

}