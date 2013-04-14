<?php

class Provider extends BaseController {

	//rules for registering
	public $rules = array(
        'email'		=> 'required|email|unique:users',
        'password'		=> 'same:password_confirmation|between:4,20|confirmed',
    	'password_confirmation'		=> 'required',
    );

    public $rules2 = array(
    	'name'		=> 'required|max:20|alpha',
    	'surname'		=> 'required|max:20|alpha',
        'password'		=> 'same:password_confirmation|between:4,20|confirmed',
   	);

	public function index()
	{
		return Redirect::to('/');
	}

	public function create()
	{

		return View::make('Provider.registerP')
					->with('rules', $this->rules)
					->with('status',Session::get('status'))
					->with('errors',Session::get('errors'))
					->with('error',Session::get('error'))
					->with('success',Session::get('success'));
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
			$user->email    = Input::get( 'email' );
			$user->password = Hash::make(Input::get('password'));
			$user->save();

			//send mail

			Config::set('auth.reminder.email', 'emails.auth.welcome');
			Password::remind(['email' => $user->email ], function($m)
			{
			    $m->setCharset('UTF-8');
			});

			return Redirect::home()->with('success','Your activation mail was sent on email');
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

		return View::make('Provider.ProviderServiceSettings')->with('user',User::find($id))->with('rules',$this->rules2);
	}


	public function update($id)
	{
		$input = Input::all();
		$validation = Validator::make($input,$this->rules2);
		if($validation->fails())
		{
			return Redirect::to('provider/' . $id . '/edit')->withErrors($validation)->with('rules',$this->rules2)->with('user',User::find($id));
		}		
		else
		{
			$user = User::find($id);
			if(isset($user))
			{
		    	$user->name = $input['name'];	
		    	$user->surname = $input['surname'];
		    	$user->language = $input['language'];
		    	if($input['password']){
		    		$user->password = Hash::make($input['password']);	
		    	}
		    	$user->save();			
		    	return Redirect::to('provider/' . $id . '/edit')->with('message','Settings saved.')->with('user',User::find($id));
		    }
		    else
		    {
		    	return Redirect::to('provider/' . $id . '/edit')->with('message','Failed to save settings.');
		    }
		}
	}



	public function destroy($id)
	{
		//
	}

	public function getConfirm($token)
	{	
		//save
		$remind =  DB::table('password_reminders')->where('token', $token)->first();
		if($remind)	$user = User::where('email',$remind->email)->first();
		if(isset($user)){
		    $user->confirmed = 1;
		    $user->status = 2;
		    $user->save();
		    //Session::put('user',Auth::user());
		    Session::put('user',$user);
			return View::make('home')->with('success','Registration successfully completed.');
	    }
	    App::abort(404, 'Page not found');
	}

	/*public function postConfirm($token)
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
		    $user->status = 2;
		    $user->save();
			return View::make('home')->with('message','Success');
			//return Redirect::to('provider/' . $user->id . '/edit');
	    }
	    return Redirect::to('provider/confirm/' . $token)
	    				->with('status','Wrong token')
	    				->with('rules',$this->rules1);
	}*/
}
