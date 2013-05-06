<?php

class AppController extends BaseController
{
	private $rules = array(
		'email'    => 'required|email',
		'password' => 'required'
	);

	public function getLogin(){	
		return View::make('app.login')
					->with('rules',$this->rules)
					->with('status',Session::get('status'))
					->with('errors',Session::get('errors'))
					->with('error',Session::get('error'))
					->with('success',Session::get('success'));
	}

	public function postLogin(){

		$input = Input::all();
		$validation = Validator::make($input, $this->rules);

		if($validation->fails())
		{
			return  Redirect::back()->withErrors($validation)->withInput();
		}
		else
		{
			$input['confirmed'] = 1;
			if(Auth::attempt($input,true))
			{
				Session::put('user',Auth::user());
				Cookie::forever('user',Auth::user());
				if(Auth::user()->language == null)
				{
					Session::set('language','en');
				}
				else
				{
					Session::set('language',
					UserLibrary::languageAbbrs(Auth::user()->language));
				}
				return Redirect::route('home')->with('success', 'Sucessfully logged in.'); 
			}
			else
			{
				return  Redirect::back()
					 	->with('error','Could not login, please try again')
					 	->with('rules',$this->rules);
			}
		}
	}

	public function getLogout(){
		Auth::logout();
		Session::forget('user');
		Cookie::forget('user');
		return Redirect::route('home')->with('status', 'Sucessfully logged out.');
	}

}
