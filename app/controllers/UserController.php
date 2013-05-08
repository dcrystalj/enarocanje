<?php

class UserController extends BaseController {

  public $rulesSettings = array(
    'name'     => 'required|max:20|regex:/[a-zščžćđA-ZŠČŽĆĐ]+/',  
    'surname'  => 'required|max:20|regex:/[a-zščžćđA-ZŠČŽĆĐ]+/',
    'timezone' => 'min:1',
    'language' => 'min:1',
  );

  public $rules = array(
    'name'     => 'required|max:20|regex:/[a-zščžćđA-ZŠČŽĆĐ]+/',  
    'surname'  => 'required|max:20|regex:/[a-zščžćđA-ZŠČŽĆĐ]+/',
    'email'    => 'required|email|unique:users',
    'password' => 'required',
    'repeat'   => 'required|same:password|between:4,30',
    'timezone' => 'min:1',
    'language' => 'min:1',
    );

    public function __construct() {
        $this->beforeFilter('auth',   ['except' =>['create','store','getConfirm']]);
        $this->beforeFilter('tmpuser',['only'   =>['show']]);
    }

    public function index()
    {
      return View::make('home')->with('success',Lang::get('messages.confirm'));
    }

    public function create()
    {
      return View::make('user.register')
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
        //if is taken redirect to login
        foreach ($validation->messages()->get('email') as $message)
        {
            if($message == Lang::get('messages.unique',array('attribute'=>'email')))
              return View::make('app.login')
                ->with('status', $message . ' Please login.')
                ->with('email', Input::get('email'));
        }

        Redirect::back()->with('rules',$this->rules)
                ->withErrors($validation)
                ->withInput();

      }
      else
      {
        $user            = new User;
        $user->name      = Input::get( 'name' );
        $user->surname   = Input::get( 'surname' );
        $user->email     = Input::get( 'email' );
        $user->password  = Hash::make(Input::get('password'));
        $user->time_zone = UserLibrary::getTimezoneIndex(Input::get( 'timezone' ));
        $user->language  = Input::get( 'language' );
        $user->confirmed = 0;
        $user->save();
        
        $token = UserLibrary::generateUuid(); 

        $passwordReminder = new Passreminder;
        $passwordReminder->email = $user->email;
        $passwordReminder->token = $token;
        $passwordReminder->save();

        Queue::getIron()->ssl_verifypeer = false;
        Mail::queue('emails.auth.userWelcome', compact('token'), function($m) use ($user)
        {
            $m  ->to($user->email, $user->name)
                ->subject(Lang::get('general.welcome'));
        });

        return Redirect::home()->with('success',Lang::get('messages.mailSent'));
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
      return View::make('user.profile')
        ->with('user',Auth::user())->with('rules',$this->rulesSettings);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
      return View::make('user.settings')
        ->with('rules',$this->rules)
        ->with('user',Auth::user())
        ->with('status',Session::get('status'))
        ->with('errors',Session::get('errors'))
        ->with('error',Session::get('error'))
        ->with('success',Session::get('success'));

    }

    public function update($id)
    {
        $validation = Validator::make(Input::all(),$this->rulesSettings);

        if($validation->fails())
        {
            return Redirect::back()
                        ->withErrors($validation)
                        ->withInput();


        }
        else
        {
            $user = Auth::user();
            $user->name      = Input::get( 'name' );
            $user->surname   = Input::get( 'surname' );
            $user->time_zone = UserLibrary::getTimezoneIndex(Input::get( 'timezone' ));
            $user->language  = Input::get( 'language' );
            $user->save();
            Session::set('language',
          UserLibrary::languageAbbrs(Auth::user()->language));
            return Redirect::to('user/show')->with('success',Lang::get('messages.settingsSuccess'));
        }

    }

  
    
  public function getConfirm($token)
  { 

    if( $remind = Passreminder::where('token', $token)->first())
    {
      if( $user   = User::where('email',$remind->email)->first())
      {
        $user->confirmed = 1;
        $user->status    = 1;
        $user->save();
        $remind->delete();

        Auth::loginUsingId($user->id);
        Session::put('user',$user);

        return View::make('home')->with('success',Lang::get('messages.registrationSuccess'));
      }
    }

    App::abort(404,Lang::get('messages.fourOfour'));
  }

}
