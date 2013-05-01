<?php

class Provider extends BaseController {

	//rules for registering
	public $rules = array(
		'email'                 => 'required|email|unique:users',
		'password'              => 'same:password_confirmation|between:4,20|confirmed',
		'password_confirmation' => 'required',
    );

    public $rules2 = array(
		'name'     => 'required|max:20|alpha',
		'surname'  => 'required|max:20|alpha',
		'password' => 'same:password_confirmation|between:4,20|confirmed',
   	);

	public function __construct() {
		$this->beforeFilter('auth',		['only'=>['edit','update']]);
		$this->beforeFilter('provider',	['only'=>['edit','update']]);
	}

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

			$token = UserLibrary::generateUuid(); 

			$passwordReminder = new Passreminder;
			$passwordReminder->email = $user->email;
			$passwordReminder->token = $token;
			$passwordReminder->save();

			Queue::getIron()->ssl_verifypeer = false;
			Mail::later(5, 'emails.auth.welcome', compact('token'), function($m) use ($user)
			{
			    $m 	->to($user->email, $user->name)
				    ->subject('Welcome!');
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

		return View::make('Provider.ProviderServiceSettings')
					->with('rules',$this->rules2);
	}


	public function update($id)
	{
		$input = Input::all();
		$validation = Validator::make($input,$this->rules2);
		
		if( $validation->passes() )
		{
			if( $id==Auth::user()->id )
			{
				$user           = Auth::user();
				$user->name     = $input['name'];	
				$user->surname  = $input['surname'];
				$user->language = $input['language'];

		    	if($input['password'])
		    	{
		    		$user->password = Hash::make($input['password']);	
		    	}

		    	$user->save();	

		    	return Redirect::back()->with('success','Settings saved.');
		    }
		    else
		    {
		    	return Redirect::bakc()->with('error','Failed to save settings.');
		    }
			
		}		
		return Redirect::back()
						->withErrors($validation)
						->with('rules',$this->rules2);

	}


	public function getConfirm($token)
	{	

		if( $remind = Passreminder::where('token', $token)->first())
		{
			if( $user   = User::where('email',$remind->email)->first())
			{
				$user->confirmed = 1;
				$user->status    = 2;
			    $user->save();
				$remind->delete();

				Auth::loginUsingId($user->id);
			    Session::put('user',$user);

				return View::make('home')->with('success','Registration successfully completed.');
			}
		}

		App::abort(404,'Page not found');
	}
}
