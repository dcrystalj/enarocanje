<?php

class UserSettingsController extends BaseController {
    public $rules = array(
          //'name'     => 'required|max:20|alpha','match:/[a-z]+/'
          'name'     => 'required|max:20|regex:/[a-zščžćđA-ZŠČŽĆĐ]+/',  
          'surname'  => 'required|max:20|regex:/[a-zščžćđA-ZŠČŽĆĐ]+/',
          'email'    => 'required|email|unique:users',
          'password' => 'required|between:6,30',
          'repeat' => 'required|same:password|min:6|between:6,30',
          'timezone' => 'min:1',
          'language' => 'min:1',
        );
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('user.settings')
		->with('user',Auth::user())
			
	}->before('auth');

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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