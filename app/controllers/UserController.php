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
    'password' => 'required|between:4,30',
    'repeat'   => 'required|same:password|between:4,30',
    'timezone' => 'min:1',
    'language' => 'min:1',
    );
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct() {
        $this->beforeFilter('auth',['except'=>['create','store','getConfirm']]);
        //
      }

    public function index()
    {
      return View::make('home')->with('success',Lang::get('user.confirm'));
    }

    /**
     * Show the form for creating a new resource.
     *e
     * @return Response
     */
    public function create()
    {
      return View::make('user.register')
      ->with('rules', $this->rules)
      ->with('status',Session::get('status'))
      ->with('errors',Session::get('errors'))
      ->with('error',Session::get('error'))
      ->with('success',Session::get('success'));

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

            Redirect::back()->with('rules',$this->rules)->withErrors($validation);

            return Redirect::to('user/create')
            ->withErrors($validation);


          }
          else
          {

            
            $user = new User;
            $user->name      = Input::get( 'name' );
            $user->surname   = Input::get( 'surname' );
            $user->email     = Input::get( 'email' );
            $user->password  = Hash::make(Input::get('password'));
            $user->time_zone = Input::get( 'timezone' );
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
                    ->subject(Lang::get('user.welcome'))
                    ->setCharset('UTF-8');
            });

            return Redirect::home()->with('success',Lang::get('user.mailSent'));
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
            $user->time_zone = Input::get( 'timezone' );
            $user->language  = Input::get( 'language' );
            $user->save();
            return Redirect::to('profile')->with('success',Lang::get('user.settingsSuccess'));
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

        return View::make('home')->with('success',Lang::get('user.registrationSuccess'));
      }
    }

    App::abort(404,Lang::get('user.fourOfour'));
  }

}
