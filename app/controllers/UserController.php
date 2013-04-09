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
        return "index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('user.registerUser')
                    ->with('rules',$this->rules);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        

            //return View::make('home');->with('rules',$this->rules1);

        $validation = Validator::make(Input::all(),$this->rules);
        if($validation->fails())
        {
            //echo "fail";
            Input::flash(); //input data remains in form
            return Redirect::to('user/create')
                        ->withErrors($validation)
                        ->with('rules',$this->rules);
        }
        else
        {
            //return "uspešno";

            $user = new User;
            $user->name     = Input::get( 'name' );
            $user->surname    = Input::get( 'surname' );
            $user->email    = Input::get( 'email' );
            $user->password = Hash::make(Input::get('password'));
            $user->time_zone    = Input::get( 'timezone' );
            $user->language     = Input::get( 'language' );
            $user->confirmed = 0;
            //$user->confirmed = 1;

            $user->save();
            Config::set('auth.reminder.email', 'emails.auth.userWelcome');
            return Password::remind(['email' => $user->email ], function($m)
            {
                $m->setCharset('UTF-8');
            }) ;
            //return View::make('home');
            return View::make('home')->with('message','Suksess');
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
        $remind =  DB::table('password_reminders')->where('token', Input::get('token'))->first();
        if($remind) $user = User::where('email',$remind->email)->first();
        if(isset($user)){
            $user->confirmed = 1;
            $user->save();
            return View::make('user.registerUserSuccess');
        }
        return Redirect::to('user/confirm/' . $token)
                        ->with('status','Wrong token')
                        ->with('rules',$this->rules1);

    }
    public function postConfirm($token)
    {
        return View::make('find');
    }
}