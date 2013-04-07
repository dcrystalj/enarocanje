<?php

class Provider extends BaseController {

	//rules for registering
	public $rules = array(
		'sname'		=> 'required|max:20|alpha',
        'email'		=> 'required|email|unique:users',
    );

    public $rules1 = array(
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
			$user->name 	= Input::get( 'sname' );
			$user->email    = Input::get( 'email' );
			$user->save();

			//send mail

			Config::set('auth.reminder.email', 'emails.auth.welcome');
			return Password::remind(['email' => $user->email ], function($m)
			{
			    $m->setCharset('UTF-8');
			}) ;
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
		$rules = array('Service Name:'     		=>  'required|max:20|alpha',
                       'E-mail:'    			=>  'email',
                       'Change password:'   	=>  'confirmed');

		$validation = Validator::make(Input::all(),$rules);
		if($validation->fails())
		{
			return Redirect::to('provider/edit')->withErrors($validation);
		}
		else
		{
			return View::make('find');
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

/*
		$user  = User::where('confirmation_code','=',$uuid)->first();
		if($user){
				$user->confirmed = 1;
				$user->password = Hash::make(Input::get('pass1'));
				$user->save();
				return Redirect::to('provider/' . $user->id . '/edit');

		}

		return View::make('Provider.registerP')
					->with('rules',$this->rules1)
					->with('status','Something went wrong, please try again');
		*/			
		//save
		$remind =  DB::table('password_reminders')->where('token', Input::get('token'))->first();
		if($remind)	$user = User::where('email',$remind->email)->first();
		if(isset($user)){
		    $user->password = Hash::make(Input::get('password'));
		    $user->confirmed = 1;
		    $user->save();
			return View::make('home')->with('message','Success');
	    }
	    return Redirect::to('provider/confirm/' . $token)
	    				->with('status','Wrong token')
	    				->with('rules',$this->rules1);
	}

	//-------------------------------------
	//custom helpers
	//-------------------------------------
	protected function sendmail($mail, $data)
	{
		$uuid['code'] = $data; 
		Mail::send('emails.welcome', $uuid, function($m)use($mail)
		{
		    $m->to( $mail , 'John Smith')->subject('Welcome!')->setCharset('UTF-8');;
		});
	}

	protected function generateUuid()
    {
        // Generate Uuid
        $uuid = Uuid::v4(false);
        // Check that it is unique
        $currentConfirmationCode = User::where('confirmation_code','=',$uuid)->first();

        if($currentConfirmationCode != NULL) {
           $uuid =  $this->generateUuid($table, $field);
        }

        return $uuid;
    }

}