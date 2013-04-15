<?php

class MacroserviceController extends BaseController {

	public $rules = array(
        'name'		=> 'required',
        'address'   => 'required|alpha',
        'street'    => 'regex:/[^a-zA-Z0-9 ]/',
        'ZIPcode'   => 'required|numeric',
        'email' 	=> 'required|email',
        'telN' 		=> 'regex:/[^0-9+()]/',
        'SiteUrl'   => 'active_url',
        'description' => 'max:1024'
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
			//$mac = MacroService::create(Input::all());
			$mac = new MacroService;
			$mac->name = Input::get( 'name' );
			$mac->ZIP_code = Input::get( 'ZIPcode');
			$mac->address = Input::get( 'address');
			//$mac->street = Input::get( 'street');
			//$mac->email = Input::get( 'email');
			$mac->telephone_number = Input::get( 'telN');
			//$mac-> = Input::get( 'SiteUrl');
			$mac->description = Input::get('description');
			$mac->user_id = Auth::user()->id;
			$mac->save();

			if($mac){
				return Redirect::route('macro.create')
								->with('id',$mac->id)
								->with('success','successfully saved');
			}
		}

		return Redirect::route('macro.create')->withErrors($validation);
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
			
			$mac->name = Input::get( 'name' );
			$mac->description = Input::get('description');
			$mac->save();

			if($mac){
				return Redirect::route('macro.create')
								->with('success','Successfully edited');
			}
		}

		return Redirect::route('macro.create');
	}


	 
	public function destroy($id)
	{
		if ($macservice = Auth::user()->macroservices()->find($id))
		{
			$macservice->active=-1;
			$macservice->save();

			return Redirect::route('macro.create')
							->with('status','Service ' . $macservice->name . ' was deactivated!');
		}
		
		return Redirect::rotue('macro.create')->with('error','Service ' . $macservice->name . " was not deactivated.\nPlease try again.");
		
	}

	public function getActivated($id)
	{
		if ($macservice = Auth::user()->macroservices()->find($id))
		{
			$macservice->active=0;
			$macservice->save();
			return Redirect::route('macro.create')
							->with('success','Service ' . $macservice->name . ' was activated!');
		}
		
		return Redirect::rotue('macro.create')->with('error','Service ' . $macservice->name . " was not activated.\nPlease try again.");
		
	}
}