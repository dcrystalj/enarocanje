<?php

class CustomerReservation extends BaseController {

	public function __construct() {
		$this->beforeFilter('auth',['only'=>['show']]);
		$this->beforeFilter('provider',['only'=>['show']]);
	}

	public function index($mac,$mic)
	{
		$fetch_gcal = Input::get('gcal');
		if($fetch_gcal) {
			$gcal = new GoogleApi();
			if(!$gcal->isLoggedIn())
				return Redirect::to($gcal->getUrl());
			return $gcal->selectCalendar();
		}
		$calendar_id = Input::get('calendar_id', false);

		// Load reservation
		$reservation = null;
		if($user = Auth::user()) {
			$r = Reservation::where('micservice_id',$mic)
				->where('user_id',$user->id)
				->where('date','>=',Input::get('start'))
				->first(); // only one
			if($r) {
				$date  = $r->date;
				$title = "From: ";
				$title .= date('G:i',strtotime($r->from)) ." to ";
				$title .= date('G:i',strtotime($r->to));
				$reservation = array(
					'id' => $r->id,
					'title' => $title,
					'start' => $date.' '.$r->from,
					'end' => $date.' '.$r->to,
					'allDay' => false,
					'eventType' => 'reservation',

				);
			}
		}

		return View::make('reservation.show')
			->with('mac',$mac)
			->with('mic',$mic)
			->with('calendar_id', $calendar_id)
			->with('reservation', $reservation);
	}
	public function show($mac,$mic)
	{
		return View::make('reservation.all')
					->with('mac',$mac)
					->with('mic',$mic);
	}
}
