<?php

class Provider extends BaseController {

	//rules for registering
	public $rules = array(
		'name'		=> 'required|max:20|alpha',
        'email'		=> 'required|email|unique:users',
    );

    public $rules1 = array(
    	'password'		=> 'same:password_confirmation|between:4,20|confirmed',
    	'password_confirmation'		=> 'required',
    );

    public $rules2 = array(
    	'name'		=> 'required|max:20|alpha',
        'email'		=> 'required|email|unique:users',	
        'password'		=> 'same:password_confirmation|between:4,20|confirmed',
    	'password_confirmation'		=> 'required',
   	);
	public function index()
	{
		return Redirect::to('/');
	}

	public function create()
	{

		return View::make('Provider.registerP')->with('rules', $this->rules);
	}

	public function store()
	{

		$validation = Validator::make(Input::all(),$this->rules);

		if($validation->fails())
		{
			Input::flash(); //input data remains in form
			return Redirect::to('provider/create')->withErrors($validation);
		}
		else
		{	
			//save user and send mail with confirmation link
			$user = new User;
			$user->name 	= Input::get( 'name' );
			$user->email    = Input::get( 'email' );
			$user->save();

			//send mail

			Config::set('auth.reminder.email', 'emails.auth.welcome');
			return Password::remind(['email' => $user->email ], function($m)
			{
			    $m->setCharset('UTF-8');
			})->with('status','Confirmation email sent.') ;
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	public function edit($id)
	{

		return View::make('Provider.ProviderServiceSettings')->with('user',User::find($id));
	}


	public function update($id)
	{
		$input = Input::all();
		$validation = Validator::make($input,$this->rules);
		if($validation->fails())
		{
			return Redirect::to('provider/' . $id . '/edit')->withErrors($validation)->with('rules',$this->rules)->with('user',User::find($id));
		}		
		else
		{
			$user = User::find($id);
			if(isset($user))
			{
		    	if(($input->name))
		    	{
		    		$user->name = $input->name;	
		    	}
		    	if($input->email){
		    		$user->email = $input->email;		
		    	}
		    	if($input->password){
		    		$user->password = Hash::make($input->password);	
		    	}
		    	$user->save();			
		    }
		    return Redirect::to('provider/' . $id . '/edit')->with('status','Settings saved.')->with('user',User::find($id));
		}
	}



	public function destroy($id)
	{
		//
	}

	public function getConfirm($token)
	{
		return View::make('Provider.confirmation')
					->with('rules',$this->rules1)
					->with('token',$token);
	}

	public function postConfirm($token)
	{
		//validation
		$validation = Validator::make(Input::all(),$this->rules1);
		if($validation->fails())
		{
			return Redirect::to('provider/confirm/' . $token)->withErrors($validation)->with('rules',$this->rules1);
		}		
		//save
		$remind =  DB::table('password_reminders')->where('token', Input::get('token'))->first();
		if($remind)	$user = User::where('email',$remind->email)->first();
		if(isset($user)){
		    $user->password = Hash::make(Input::get('password'));
		    $user->confirmed = 1;
		    $user->save();
			//return View::make('home')->with('message','Success');
			return Redirect::to('provider/' . $user->id . '/edit');
	    }
	    return Redirect::to('provider/confirm/' . $token)
	    				->with('status','Wrong token')
	    				->with('rules',$this->rules1);
	}
}
