<?php

class UserController extends BaseController {
    public $rules = array(
          'name'     => 'required|max:20|alpha',
          'surname'  => 'required|max:20|alpha',
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
        return View::make('home')->with('success','Please confirm the registration trough email link, which should be delivered shortly');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('user.registerUser')
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
            return Redirect::to('user/create')
                            ->withErrors($validation);

            //return Redirect::to('user/create')->with_input();
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
            Config::set('auth.reminder.email', 'emails.auth.userWelcome');
            Password::remind(['email' => $user->email ], function($m)
            {
                $m->setCharset('UTF-8');
            }) ;

            return Redirect::home()->with('success','Your activation mail was sent on email');
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

    public function getConfirm($token)
    {
        $remind =  DB::table('password_reminders')->where('token', $token)->first();

        if($remind) $user = User::where('email',$remind->email)->first();
        
        if(isset($user))
        {
            $user->confirmed = 1;
            $user->save();
            Session::put('user',$user);
            return View::make('home')->with('success','Registration successfully completed.');
        }
        return Redirect::to('home')
                        ->with('status','Wrong token');

    }
    public function postConfirm($token)
    {
        return View::make('find');
    }
}