<?php

class UserController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return "loll";
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return "lol";
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		echo "wat";
		$rules = array(
	      'Name'     => 'required|max:20|alpha',
	      'Surname'  => 'required|max:20|alpha',
	      'Email'    => 'required|email',
	      'password' => 'required|between:6,30',
	      'repeat' => 'required|same:password|min:6|between:6,30',
	      'Timezone' => 'min:1',
	      'Language' => 'min:1',
	    );

			//return View::make('home');->with('rules',$this->rules1);

		$validation = Validator::make(Input::all(),$this->$rules);
		if($validation->fails())
		{
			echo "fail";
			Input::flash(); //input data remains in form
            return View::make('user/registerUser')->withErrors($validation);
		}
		else
		{
			echo "uspešno";

			$user = new User;
			$user->name 	= Input::get( 'Name' );
			$user->surname    = Input::get( 'Surname' );
			$user->email 	= Input::get( 'Email' );
			$user->password = Hash::make(Input::get('password'));
			$user->timezone    = Input::get( 'Timezone' );
			$user->language 	= Input::get( 'Language' );
			$user->confirmed = 1;

			$user->save();
			return View::make('home');
			//return View::make('home')->with('message','Suksess');
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
/*
|--------------------------------------------------------------------------
| Confide Controller Template
|--------------------------------------------------------------------------
|
| This is the default Confide controller template for controlling user
| authentication. Feel free to change to your needs.
|
*/

}