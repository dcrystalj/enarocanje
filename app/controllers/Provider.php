<?php

class Provider extends BaseController {

	//rules for registering
	public $rules = array(
		'email'                 => 'required|email|unique:users',
		'password'              => 'same:password_confirmation|confirmed',
		'password_confirmation' => 'required',
    );

    public $rules2 = array(
		'name'     => 'required|max:20|alpha',
		'surname'  => 'required|max:20|alpha',
		'password' => 'same:password_confirmation|confirmed',
   	);

	public function __construct() {
		$this->beforeFilter('auth',		['only'=>['edit','update','logo','saveLogo','deleteLogo','pictures','savePictures','deletePictures']]);
		$this->beforeFilter('provider',	['only'=>['edit','update','logo','saveLogo','deleteLogo','pictures','savePictures','deletePictures']]);
		$this->beforeFilter('admin',	['only'=>['edit','update']]);
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
			foreach ($validation->messages()->get('email') as $message)
			{
			    if($message == Lang::get('messages.unique',array('attribute'=>'email')))
			    return View::make('app.login')
							->with('status', $message . trans('messages.pleaseLogin'))
							->with('email', Input::get('email'));
			}

			return Redirect::route('provider.create')
							->withErrors($validation)
							->withInput();
		}
		else
		{	
			//save user and send mail with confirmation link
			$code = Input::get('code');
			$referralU = User::where('referral_code', $code)->first();
			$user = new User;
			$user->email    = Input::get( 'email' );
			$user->password = Hash::make(Input::get('password'));
			$user->save();
		
			if ($code && $referralU)
			{
				$referrals = new Referrals;
				$referrals->referral_id = $referralU->id;
				$referrals->new_user_id = $user->id;
				$referrals->save(); 
			}

			$token = UserLibrary::generateUuid(); 
			$passwordReminder = new Passreminder;
			$passwordReminder->email = $user->email;
			$passwordReminder->token = $token;
			$passwordReminder->save();

			Queue::getIron()->ssl_verifypeer = false;
			Mail::send('emails.auth.welcome', compact('token'), function($m) use ($user)
			{
			    $m 	->to($user->email, $user->name)
				    ->subject(trans('general.welcome'));
			});
			
			return Redirect::home()->with('success',trans('messages.activationEmail'));
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

		    	return Redirect::back()->with('success',trans('messages.settingsSaved'));
		    }
		    else
		    {
		    	return Redirect::back()->with('error',trans('messages.settingsNotSaved'));
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

				return View::make('home')->with('success',trans('messages.registrationSuccess'));
			}
		}

		App::abort(404,trans('messages.fourOfour'));
	}

	public function logo()
	{	

		return View::make('logo')->with('rules', array('logo' => 'image'));

	}


	public function saveLogo()
	{	
		$imageRule = array(
		    'logo'     => 'image',
		);

		$image = 'logo';
		$filepath = 'image/logo';
		$filename = '';
		$validation = Validator::make(Input::all(),$imageRule);
		//if(true) echo(var_dump($validation));
        if($validation->fails())
        {

            return Redirect::back()->withErrors($validation)->withInput();
		} 
        //$imagetype = exif_imagetype('public/'.$path);
		//if(true) return $_FILES[$image]['type'];
		if ($_FILES[$image]["error"] > 0)
		{
			return Redirect::back()->with('Error',trans('messages.error'));
		}
		do {
			$extension = UserLibrary::getImageExtensionFromMime($_FILES[$image]['type']);
			if(in_array($extension,array('.jpg','.png','.gif')))
			{
				$filename = Str::random('20','alpha') . $extension;
			}
			else
			{
				return Redirect::back()->with('error',trans('messages.imageType'));
			}
		}
		while(File::exists($filepath . $filename));
				
		

		$macservice = Auth::user()->macroservices()->where('user_id','=',Auth::user()->id)->first();
		if($macservice->logo != '')
		{
			$this->deleteLogo();
		}
		$macservice->logo = $filepath . '/' . $filename;
		$macservice->save();
        Input::file($image)->move('' . $filepath,$filename);
		return Redirect::to('macro/create')->with('success',trans('messages.successfullySaved'));
	}
	public function deleteLogo()
	{	
		$macservice = Auth::user()->macroservices()->where('user_id','=',Auth::user()->id)->first();
		File::delete(''.$macservice->logo);
		$macservice->logo = '';
		$macservice->save();
		return Redirect::back()->with('success',trans('messages.logoDeleted'));
		
	}




		public function pictures()
	{	

		return View::make('pictures');

	}


	public function savePicture(){
		$imageRule = array(
		    'image' => 'image',
		);

		$image = 'picture';
		$filepath = 'image/pictures';
		$filename = '';
		if ($_FILES[$image]["error"] > 0)
		{
			return Redirect::back()->with('Error',trans('messages.error'));
		}
		do {
			$filename = Str::random('20','alpha') . UserLibrary::getImageExtensionFromMime($_FILES[$image]['type']);
		}
		while(File::exists($filepath . $filename));
		$wholepath = $filepath .'/'. $filename;
		$validation = Validator::make(Input::all(),$imageRule);

        if($validation->fails())
        {
            return Redirect::back()->withErrors($validation)->withInput();
		} 

		$macservice_id = Auth::user()->macroservices()->where('user_id','=',Auth::user()->id)->select('id')->first();
		DB::table('provider_pictures')->insert(array('macservice_id' => $macservice_id['id'],'path' => $wholepath));
        Input::file($image)->move('public/' . $filepath,$filename);
		return Redirect::back()->with('success',trans('messages.successfullySaved'));
	}
	public function deletePicture($path)
	{	
		DB::table('provider_pictures')->where('path','=',$path)->delete();
		File::delete('public/'.$path);
		return Redirect::to('providerPictures')->with('success',trans('messages.pictureDeleted'));
		
	}

}
