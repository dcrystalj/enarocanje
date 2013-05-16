<?php

class ManageServices extends BaseController {

	public $rules = array('name'      => 'required|max:20|alpha',
	                      'description'  => 'alpha|max:250',     
						  'price'        => 'numeric');

	public function __construct() {
		$this->beforeFilter('auth');
		$this->beforeFilter('provider');
	}

	// public function create()
	// {
	// 	return View::make('Provider.ManageServices')->with('rules',$this->rules);
	// }

	// public function store()
	// {
	// 	$validation = Validator::make(Input::all(),$this->rules);

	// 	if($validation->passes())
	// 	{
	// 		$micservice              = new MicroService;
	// 		$micservice->name        = Input::get( 'name' );
	// 		$micservice->length      = Input::get( 'length' );
	// 		$micservice->description = Input::get( 'description' );
	// 		$micservice->price       = Input::get( 'price' );
	// 		$micservice->save();

	// 		return Redirect::back()->with('status','New service added')->with('rules',$this->rules);
	// 	}

	// 	return Redirect::back()
	// 					->withErrors($validation)
	// 					->with('rules',$this->rules)
	// 					->withInput();
	// }

	// public function edit($id)
	// {
	// 	$service = MicroService::find($id);
		
	// 	return View::make('Provider.EditService')
	// 				->with('rules',$this->rules)
	// 				->with('service',$service)
	// 				->withInput();
	// }


	// public function update($id)
	// {
	// 	if (($micservice = MicroService::find($id)))
	// 	{
	// 		$micservice->name        = Input::get( 'name' );
	// 		$micservice->length      = Input::get( 'length' );
	// 		$micservice->description = Input::get( 'description' );
	// 		$micservice->price       = Input::get( 'price' );
	// 		$micservice->save();
	// 		return Redirect::back()->with('status','Service ' . $micservice->name . 'updated.');
	// 	}
	// 	else
	// 	{
	// 		return Redirect::back()->with('status','Service ' . $micservice->name . "couldn't be updated!");
	// 	}	
	// }



	// public function destroy($id)
	// {
	// 	if (($micservice = MicroService::find($id)))
	// 	{
	// 		$micservice->delete();
	// 		return Redirect::to('ManageServices/create')->with('status','Service ' . $micservice->name . ' deleted!');
	// 	}
	// 	else
	// 	{
	// 		return Redirect::to('ManageServices/create')->with('status','Service ' . $micservice->name . "couldn't be deleted!");
	// 	}
	// }


	public function timetable($macro_id) {
		return View::make('Provider.TimeTable', array('id' => $macro_id));
	}
	public function breaks($macro_id) {
		$events = Input::get('events');
		$events = json_decode($events);
		$one_day = 3600*24;
		$start = strtotime(Input::get('start'))+$one_day; // Ugly: First day = monday
		$end   = strtotime(Input::get('end'))+$one_day;

		$inverted = Events::invert($start, $end, $events);
		return View::make('Provider.Breaks',
			array(
				'id' => $macro_id,
				'events' => $events,
				'inverted' => $inverted,
			));
	}
	
	/*
	 * Old function for submit event time.
	 * (Look timetable())
	 * */
	public function submit_time($id) {
		$events = Input::get('events');
		$events = json_decode($events);
		Whours::where('macservice_id', $id)->delete();

		foreach($events as $event) {
			$day = ((date('w', strtotime($event->start))-1 + 7*2) % 7); // Monday - day 0
			$start = date('G:i', strtotime($event->start));
			$end = date('G:i', strtotime($event->end));
			DB::table('working_hour')->insert(array(
												  'macservice_id' => $id,
												  'day' => $day,
												  'from' => $start,
												  'to' => $end,
											  ));
		}
	}

	// TODO: Rename -> submit()
	public function submit_breaks($id) {
	       // Get events
		$events = json_decode(urldecode(Input::get('events')));
		$breaks = json_decode(urldecode(Input::get('breaks')));

		// Clean table
		Whours::where('macservice_id', $id)->delete();
		Breakt::where('macservice_id', $id)->delete();

		foreach($breaks as $break) {
			$day = ((date('w', strtotime($break->start))-1 + 7*2) % 7); // Monday - day 0
			$start = date('G:i', strtotime($break->start));
			$end = date('G:i', strtotime($break->end));
			DB::table('break')->insert(array(
				'macservice_id' => $id,
				'day' => $day,
				'from' => $start,
				'to' => $end,
			));
		}
		foreach($events as $event) {
			$day = ((date('w', strtotime($event->start))-1 + 7*2) % 7); // Monday - day 0
			$start = date('G:i', strtotime($event->start));
			$end = date('G:i', strtotime($event->end));
			DB::table('working_hour')->insert(array(
				'macservice_id' => $id,
				'day' => $day,
				'from' => $start,
				'to' => $end,
			));
		}
		return Redirect::to('macro/create')->with('success', 'Timetable was submited.');
	}

}
