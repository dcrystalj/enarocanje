<?php

class MacroserviceController extends BaseController {

	public $rules = array(
		'street'           => 'required|between:2,50',
		'ZIP_code'         => 'required|numeric',
		'city'			   => 'required|between:2,50',
		'email'            => 'required|email', 
		'telephone_number' => 'between:9,15',
		'site_url'         => 'between:4,35',
		'description'      => 'max:1024'
    );

	public function __construct() {
		$this->beforeFilter('auth',['except'=>['index','show']]);
		$this->beforeFilter('provider',['except'=>['index','show']]);
	}

	public function index()
	{
		return View::make('macro.index');
	}


	public function create()
	{
		return View::make('macro.create')
					->with('rules',$this->rules)
					->with('status',Session::get('status'))
					->with('errors',Session::get('errors'))
					->with('error',Session::get('error'))
					->with('success',Session::get('success'));
	}


	public function store()
	{

		$validation = Validator::make(Input::all(),$this->rules);

		if($validation->passes())
		{
			//save user and send mail with confirmation link
				
			$mac                   = new MacroService;
			$mac->name             = Input::get( 'name' );
			$mac->title 		   = Input::get( 'title');
			$mac->ZIP_code         = Input::get( 'ZIP_code');
			$mac->city             = Input::get( 'city');
			$mac->street           = Input::get( 'street');
			$mac->email            = Input::get( 'email');
			$mac->telephone_number = Input::get( 'telephone_number');
			$mac->site_url         = Input::get( 'site_url');
			$mac->description      = Input::get('description');
			$mac->user_id          = Auth::user()->id;
			$mac->save();

			if($mac){
				return Redirect::route('macro.create')
								->with('success',trans('messages.successfullySaved'));
			}
		}

		return Redirect::back()
						->withErrors($validation)
						->withInput();
	}



	public function show($id)
	{
		return "show";
		
	}


	public function edit($id)
	{
		$mac = Auth::user()->macroservices()->find($id);
		if($mac) //is macrosrevice in database
		{
			return View::make('macro.create')
						->with('rules',$this->rules)
						->with('mac',$mac);
		}
		
		return Redirect::route('macro.create');
	}



	public function update($id)
	{
		$mac = Auth::user()->macroservices()->find($id);
		if(!$mac) //is macrosrevice not in database
		{
			return App::abort(404);
		}
		
		$validation = Validator::make(Input::all(),$this->rules);

		if($validation->passes())
		{
			$zip = ZIPcode::where('ZIP_code', Input::get('ZIP_code'))->first();

			$mac->title 		   = Input::get( 'title');
			$mac->ZIP_code         = Input::get( 'ZIP_code');
			$mac->city             = Input::get( 'city');
			$mac->street           = Input::get( 'street');
			$mac->email            = Input::get( 'email');
			$mac->telephone_number = Input::get( 'telephone_number');
			$mac->site_url         = Input::get('site_url');
			$mac->description      = Input::get('description');
			$mac->user_id          = Auth::user()->id;
			$mac->save();

			if($mac){
				return Redirect::route('macro.create')
								->with('success',trans('messages.successfullyEdited'));
			}
		}

		return Redirect::back()
						->withErrors($validation)
						->withInput();
	}


	 
	public function destroy($id)
	{
		if ($macservice = Auth::user()->macroservices()->find($id))
		{
			foreach ($macservice->microservices()->get() as $micro)
			{
				Reservation::where('micservice_id', $micro->id)->delete();
			}
			$macservice->microservices()->delete();
			$macservice->absences()->delete();
			Whours::where('macservice_id',$macservice->id)->delete();
			Breakt::where('macservice_id',$macservice->id)->delete();
			DB::table('provider_pictures')->where('macservice_id', $id)->delete();
			$macservice->delete();

			return Redirect::route('macro.create')
							->with('status',trans('messages.servicesSuccessfullyDeleted'));
		}
		
		return Redirect::route('macro.create')->with('error',trans('messages.servicesUnsuccessfullyDeleted'));
		
	}

	public function getActivated($id)
	{
		if ($macservice = Auth::user()->macroservices()->find($id))
		{
			$macservice->active=0;
			$macservice->save();
			return Redirect::route('macro.create')
							->with('success',trans('general.service').' '.$macservice->name . trans('messages.wasActivated'));
		}
		
		return Redirect::rotue('macro.create')->with('error',trans('general.service').' '.$macservice->name . trans('messages.wasNotActivated'));
		
	}


}