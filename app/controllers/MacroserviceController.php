<?php

class MacroserviceController extends BaseController {

	public $rules = array(
        'name'		=> 'required',
    );

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
			$mac = new MacroService;
			$mac->name = Input::get( 'name' );
			$mac->description = Input::get('description');
			$mac->save();

			if($mac){
				return Redirect::route('macro.create')
								->with('id',$mac->id)
								->with('success','successfully saved');
			}
		}

		return Redirect::route('macro.create');
	}



	public function show($id)
	{
		return "show";
		
	}


	public function edit($id)
	{
		$mac = MacroService::whereId($id)->first();
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
		$mac = MacroService::find($id);
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
		if (($macservice = MacroService::find($id)))
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
		if (($macservice = MacroService::find($id)))
		{
			$macservice->active=0;
			$macservice->save();
			return Redirect::route('macro.create')
							->with('success','Service ' . $macservice->name . ' was activated!');
		}
		
		return Redirect::rotue('macro.create')->with('error','Service ' . $macservice->name . " was not activated.\nPlease try again.");
		
	}
}