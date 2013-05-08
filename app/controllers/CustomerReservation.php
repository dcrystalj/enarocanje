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
		return View::make('reservation.show')
			->with('mac',$mac)
			->with('mic',$mic)
			->with('calendar_id', $calendar_id);
	}
	public function show($mac,$mic)
	{
		return View::make('reservation.all')
					->with('mac',$mac)
					->with('mic',$mic);
	}
}