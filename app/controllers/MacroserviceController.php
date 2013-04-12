<?php

class MacroserviceController extends BaseController {

	public $rules = array(
        'name'		=> 'required',
    );
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$macservice = MacroService::all();
		return View::make('macro.index')->with('macroservice',$macroservice);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('macro.create')
					->with('rules',$this->rules)
					->with('status',Session::get('status'))
					->with('error',Session::get('error'))
					->with('success',Session::get('success'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
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
								->with('rules',$this->rules)
								->with('success','successfully saved');
			}
		}

		return Redirect::route('macro.create')
							->with('rules',$this->rules)
							->withErrors($validation);
	}

	/** display for all users about this service
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	
	public function show($id)
	{

		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$mac = MacroService::whereId($id)->first();
		if($mac) //is macrosrevice in database
		{
			return View::make('macro.create')
						->with('mac',$mac)
						->with('rules',$this->rules);
		}
		
		return Redirect::route('macro.create')
						->with('rules',$this->rules);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$mac = MacroService::whereId($id)->first();
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
								->with('id',$mac->id)
								->with('success','Successfully edited');
			}
		}

		return Redirect::route('macro.create')
							->with('rules',$this->rules)
							->withErrors($validation);
	}

	/**
	 * not realy realy delete but deactivATE
	 */
	 
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