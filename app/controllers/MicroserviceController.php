     <?php

class MicroserviceController extends BaseController {

	public $rules = array(
		'name'        => 'required',
		'title'       => 'required',
		'length'      => 'required|min_time',
		'description' => 'max:1024',     
		'price'       => 'numeric_comma|min:0',
  	);

	public function __construct() {
		$this->beforeFilter('auth',['except'=>['index','show']]);
		$this->beforeFilter('provider',['except'=>['index','show']]);
	}

	public function index($mac)
	{
		return View::make('micro.index')->with('mac',$mac);
	}

	public function create($mac)
	{
		return View::make('micro.create')					
					->with('rules',$this->rules)
					->with('mac', Auth::user()->macroservices()->find($mac))
					->with('errors',Session::get('errors'))
					->with('status',Session::get('status'))
					->with('error',Session::get('error'))
					->with('success',Session::get('success'));
	}

	public function store($mac)
	{

		$validation = Validator::make(Input::all(),$this->rules);

		if($validation->passes())
		{
			$macName  = MacroService::find($mac)->name;
			$category = Service::categoryId($macName);

			$micservice                = new MicroService;
			$micservice->name          = Input::get('name');
			$micservice->title         = Input::get('title');
			$micservice->length        = date('H:i', strtotime(Input::get('length')));
			$micservice->description   = Input::get( 'description' );
			$micservice->gender        = Input::get( 'gender' );
			$micservice->price         = floatval(str_replace(',', '.', Input::get( 'price' )));
			$micservice->category 	   = $category;
			$micservice->activefrom    = date("Y-m-d",strtotime("now"));
			$micservice->macservice_id = $mac;
			$micservice->save();

			if($micservice)
			{
				return Redirect::route('macro.micro.create',$mac)
								->with('success','successfully saved');
			}
		}
		return Redirect::back()
						->withErrors($validation)
						->withInput();
	}

	public function edit($mac,$mic)
	{
		$service = Auth::user()->macroservices()->find($mac)->microservices()->find($mic);
		if($service) //is macrosrevice in database
		{
			return View::make('micro.create')
							->with('mic',$service)
							->with('mac', Auth::user()->macroservices()->find($mac))
							->with('rules',$this->rules);
		}
		
		return Redirect::route('macro.micro.create',$mac)
						->with('error','Wrong service');
	}


	public function update($mac, $mic)
	{
		$micservice = Auth::user()->macroservices()->find($mac)->microservices()->find($mic);
		if(!$micservice) //is macrosrevice not in database
		{
			return App::abort(404);
		}
		
		$validation = Validator::make(Input::all(),$this->rules);

		if($validation->passes())
		{
			
		    $macName  = MacroService::find($mac)->name;
			$category = Service::categoryId($macName);

			$micservice->name          = Input::get( 'name' );
			$micservice->title         = Input::get( 'title');
			$micservice->length        = Input::get( 'length' );
			$micservice->description   = Input::get( 'description' );
			$micservice->gender        = Input::get( 'gender' );
			$micservice->price         = floatval(str_replace(',', '.', Input::get( 'price' )));
			$micservice->category 	   = $category;
			$micservice->activefrom    = date('Y-m-d',strtotime('now'));
			$micservice->macservice_id = $mac;
			$micservice->save();

			if($micservice){
				return Redirect::route('macro.micro.create',$mac)
								->with('success','Successfully edited');
			}
		}

		return Redirect::back()
						->withErrors($validation)
						->withInput();;

	}



	public function destroy($mac,$mic)
	{
		$macName = MacroService::find($mac)->name;
		$category = Service::categoryId($macName);

		if (($micservice = Auth::user()->macroservices()->find($mac)->microservices()->find($mic)))
		{
			$micservice->active     =-1;
			$micservice->activefrom =Input::get('date');
		
			$micservice->save();

			if(strtotime(Input::get('date')) <= strtotime(date('Y-m-d'))){
				return Redirect::route('macro.micro.create',$mac)
								->with('success','Service ' . Service::services()[$category][$micservice->name] . ' was deactivated!');
			}
			else
			{
				return Redirect::route('macro.micro.create',$mac)
								->with('success','Service ' . Service::services()[$category][$micservice->name] . ' will be  deactivated.');
			}
		}
		
		return Redirect::rotue('macro.micro.create',$mac)->with('error','Service ' . Service::services()[$category][$micservice->name] . " was not deactivated.\nPlease try again.");
	}

	public function getActivated($mac, $mic)
	{
		$macName = MacroService::find($mac)->name;
		$category = Service::categoryId($macName);

		if (($micservice = Auth::user()->macroservices()->find($mac)->microservices()->find($mic)))
		{
			$micservice->active     =0;
			$micservice->activefrom =Input::get('date');
			$micservice->save();
			if(strtotime(Input::get('date')) <= strtotime(date('Y-m-d'))){
				return Redirect::route('macro.micro.create',$mac)
								->with('success','Service ' . Service::services()[$category][$micservice->name] . ' was activated!');
			}
			else
			{
				return Redirect::route('macro.micro.create',$mac)
								->with('success','Service ' . Service::services()[$category][$micservice->name] . ' will be  activated.');
			}
		}
		
		return Redirect::rotue('macro.micro.create',$mac)->with('error','Service ' . Service::services()[$category][$micservice->name] . " was not activated.\nPlease try again.");
		
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
		$events = json_decode($events);
		DB::table('working_hour')->where('macservice_id', $id)->delete();
		foreach($events as $event) {
			$day = ((date('w', strtotime($event->start))-1 + 7*2) % 7); // Monday - day 0
			$start = date('G:i', strtotime($event->start));
			$end = date('G:i', strtotime($event->end));
			print "$day: $start ... $end\n";
			DB::table('working_hour')->insert(array(
												  'macservice_id' => $id,
												  'day' => $day,
												  'from' => $start,
												  'to' => $end,
											  ));
		}
	}

	public function submit_breaks($id) {
		$events = Input::get('events');
		$events = json_decode($events);
		DB::table('break')->where('macservice_id', $id)->delete();
		foreach($events as $event) {
			$day = ((date('w', strtotime($event->start))-1 + 7*2) % 7); // Monday - day 0
			$start = date('G:i', strtotime($event->start));
			$end = date('G:i', strtotime($event->end));
			print "$day: $start ... $end\n";
			DB::table('break')->insert(array(
										   'm
										   acservice_id' => $id,
										   'day' => $day,
										   'from' => $start,
										   'to' => $end,
									   ));
		}
	}

}