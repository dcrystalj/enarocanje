<?php

class Provider extends BaseController {

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
		return View::make('Provider.registerP');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array('sname'     		=> 'required|max:20|alpha',
                       'email'    			=> 'required|email',);
		$validation = Validator::make(Input::all(),$rules);
		if($validation->fails())
		{
			Input::flash();
			return Redirect::to('provider/create')->with_errors($validation)->with_input();
		}
		else
		{
			/*
			send mail
			 */
			
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
	public function edit()
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

}