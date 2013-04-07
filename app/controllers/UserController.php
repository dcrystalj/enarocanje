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
	      'Name'     => 'required|min:11|max:20|alpha',
	      'Surname'  => 'required|min:1|max:20|alpha',
	      'Email'    => 'email',
	      'Password' => 'size:5',
	      'Password2' => 'size:5',
	      'Timezone' => 'min:1',
	      'Language' => 'min:1',
	    );

			//return View::make('home');

		$validation = Validator::make(Input::all(),$rules);
		if($validation->fails())
		{
			echo "fail";
			//return Redirect::to('user/create')->withErrors($validation);
			return View::make('registerUserError');
			//return View::make('home');
		}
		else
		{
			echo "uspešno";
			//return View::make('home');
			return View::make('home');
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

}