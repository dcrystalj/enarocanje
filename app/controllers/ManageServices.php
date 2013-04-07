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
			$micservice = new MicroService;
			$micservice->name 	= Input::get( 'name' );
			$micservice->length    = Input::get( 'length' );
			$micservice->description    = Input::get( 'cescription' );
			$micservice->price    = Input::get( 'price' );
			$micservice->save();
			return View::make('ManageServices/create')->with('status','New service added');
		}
	}

	public function edit($id)
	{
		
	}


	public function update($id)
	{
	
	}



	public function destroy($id)
	{
		//
	}


	public function timetable()
	{
		return View::make('Provider.TimeTable');
	}

	public function shoxw() {
	}

}