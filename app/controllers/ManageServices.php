<?php

class ManageServices extends BaseController {

	public $rules = array('name'      => 'required|max:20|alpha',
	                      //'lenght'    => 'alpha',
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
		
	}


	public function update($id)
	{
		
	}



	public function destroy($id)
	{
		/*if (($micservice = MircroService::find($id)))
		{
			$micservice->delete();
			return Redirect::to('ManageServices/create')->with('status','Service ' . $micservice->name . 'deleted!');
		}
		else
		{
			return Redirect::to('ManageServices/create')->with('status','Service ' . $micservice->name . "couldn't be deleted!");
		}*/
	}


	public function timetable()
	{
		return View::make('Provider.TimeTable');
	}

	public function shoxw() {
	}

}