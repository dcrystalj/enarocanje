<?php

class CustomerReservation extends BaseController {

	public function __construct() {
		$this->beforeFilter('auth',['only'=>['show']]);
		$this->beforeFilter('provider',['only'=>['show']]);
	}

	public function index($mac,$mic)
	{
		return View::make('reservation.show')
					->with('mac',$mac)
					->with('mic',$mic);
	}
	public function show($mac,$mic)
	{
		return View::make('reservation.all')
					->with('mac',$mac)
					->with('mic',$mic);
	}
}