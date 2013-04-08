<?php

class ManageServices extends BaseController {

	public $rules = array('name'      => 'required|max:20|alpha',
	                      'description'  => 'alpha|max:250',     
						  'price'        => 'numeric');

	public function index()
	{
	}

	public function create()
	{
		return View::make('Provider.ManageServices')->with('rules',$this->rules);
	}

	public function store()
	{
		$validation = Validator::make(Input::all(),$this->rules);
		if($validation->fails())
		{
			return Redirect::to('ManageServices/create')->withErrors($validation)->with('rules',$this->rules);
		}
		else
		{
			$micservice = new MicroService;
			$micservice->name 	= Input::get( 'name' );
			$micservice->length    = Input::get( 'length' );
			$micservice->description    = Input::get( 'description' );
			$micservice->price    = Input::get( 'price' );
			$micservice->save();
			return Redirect::to('ManageServices/create')->with('status','New service added')->with('rules',$this->rules);
		}
	}

	public function edit($id)
	{
		$service = MicroService::find($id);
		return View::make('Provider.EditService')->with('rules',$this->rules)->with('service',$service);
	}


	public function update($id)
	{
		if (($micservice = MicroService::find($id)))
		{
			$micservice->name 	= Input::get( 'name' );
			$micservice->length    = Input::get( 'length' );
			$micservice->description    = Input::get( 'description' );
			$micservice->price    = Input::get( 'price' );
			$micservice->save();
			return Redirect::to('ManageServices/create')->with('status','Service ' . $micservice->name . '');
		}
		else
		{
			return Redirect::to('ManageServices/create')->with('status','Service ' . $micservice->name . "couldn't be deleted!");
		}	
	}



	public function destroy($id)
	{
		if (($micservice = MicroService::find($id)))
		{
			$micservice->delete();
			return Redirect::to('ManageServices/create')->with('status','Service ' . $micservice->name . ' deleted!');
		}
		else
		{
			return Redirect::to('ManageServices/create')->with('status','Service ' . $micservice->name . "couldn't be deleted!");
		}
	}


	public function timetable($macro_id)
	{
		return View::make('Provider.TimeTable', array('id' => $macro_id));
	}

	public function breaks($macro_id) {
		return View::make('Provider.Breaks', array('id' => $macro_id));
	}
	
	public function submit_time($id) {
		$events = Input::get('events');
		$object = json_decode($events);
		print $events;
	}
}