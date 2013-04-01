<?php

class ProviderServiceSettings extends BaseController {

	public function index()
	{
	}

	public function create()
	{
		return View::make('Provider.ProviderServiceSettings');
	}

	public function store()
	{
		$rules = array('Service Name:'     => 'required|max:20|alpha',
                       'E-mail:'    => 'email',
                       'Change password:'    =>  'confirmed');

		$validation = Validator::make(Input::all(),$rules);
		if($validation->fails())
		{
			return Redirect::to('providerSettings/create')->withErrors($validation);
		}
		else
		{
			return View::make('find');
		}
	}



}