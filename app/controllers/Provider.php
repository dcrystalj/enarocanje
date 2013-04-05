<?php

class Provider extends BaseController {

	//rules for registering
	public $rules = array(
		'sname'		=> 'required|max:20|alpha',
        'email'		=> 'required|email|unique:users',
    );

    public $rules1 = array(
    	'pass1'		=> 'same:pass2|between:4,20',
    	'pass2'		=> 'required',
    );

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return 'asd';
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		return View::make('Provider.registerP')->with('rules', $this->rules);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
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
			//save mail and send mail with confirmation link
			$user = new User;
			$user->name 	= Input::get( 'sname' );
			$user->email    = Input::get( 'email' );
			$user->confirmation_code = $this->generateUuid();	
			$user->save();

			//send mail
			try{
				$this->sendmail( $user->email, $user->confirmation_code );
			}
			catch(Exception $e)
			{
				$user->delete();
				return $e;
				return Redirect::to('provider/create')->with('status','mail was not sent, please retry \n');
			}

	        return View::make('home')->with('message','Success, mail sent');
			
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

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('Provider.ProviderServiceSettings');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
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


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getConfirm($uuid)
	{
		//get user to confirm
		$user  = User::where('confirmation_code','=',$uuid)->first();

		if($user) //if code exists render password view
		{ 
			return View::make('Provider.confirmation',compact('uuid'))->with('rules',$this->rules1);
		}

		return View::make('Provider.registerP')
					->with('rules',$this->rules1)
					->with('status','Something went wrong, please try again');
	}

	public function postConfirm($uuid)
	{

		$validation = Validator::make(Input::all(),$this->rules1);
		if($validation->fails())
		{
			Input::flash(); //input data remains in form
			return Redirect::to('provider/confirm/' . $uuid)->withErrors($validation);
		}

		$user  = User::where('confirmation_code','=',$uuid)->first();
		if($user){
				$user->confirmed = 1;
				$user->password = Hash::make(Input::get('pass1'));
				$user->save();
				return "successfully confirmed";			
		}

		return View::make('Provider.registerP')
					->with('rules',$this->rules1)
					->with('status','Something went wrong, please try again');
	}














	//-------------------------------------
	//custom helpers
	//-------------------------------------
	protected function sendmail($mail, $data)
	{
		$uuid['code'] = $data; 

		Mail::send('emails.welcome', $uuid, function($m)
		{
		    $m->to('dcrystalj@gmail.com', 'John Smith')->subject('Welcome!');
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