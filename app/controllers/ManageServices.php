<?php

class ManageServices extends BaseController {

	public function index()
	{
	}

	public function create()
	{
		return View::make('Provider.ManageServices');
	}

	public function store()
	{
		$rules = array('Name:'      => 'required|max:20|alpha',
                       'Description:'    => 'alpha',
                       'Price:'       => 'numeric');
		$validation = Validator::make(Input::all(),$rules);
		if($validation->fails())
		{
			return Redirect::to('ManageServices/create')->withErrors($validation);
		}
		else
		{
			return View::make('home');
		}
	}

	public function timetable()
	{
		return View::make('Provider.TimeTable');
	}

	public function shoxw() {
	}

}