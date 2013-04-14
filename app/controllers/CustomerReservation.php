<?php

class CustomerReservation extends BaseController {

	public function __construct() {
		//$this->beforeFilter('auth');
	}

	public function index($mac,$mic)
	{
		return View::make('reservation.show')
					->with('mac',$mac)
					->with('mic',$mic);
	}


}