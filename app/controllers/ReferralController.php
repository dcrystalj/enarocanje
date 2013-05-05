<?php

class ReferralController extends BaseController {

    public $rules = array(
        'to'      => 'required|email',    
        'content' => 'max:1024', 
    );
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return "referral";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('referral.create')                   
                    ->with('rules',$this->rules)
                    ->with('errors',Session::get('errors'))
                    ->with('status',Session::get('status'))
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
     /*    $validation = Validator::make(Input::all(),$this->rules);

        if($validation->passes())
        {
            $input = Input::all();
            $user  = User::find($id);

            if($user->referral_code == '')
            {
                $token = UserLibrary::generateUuid(); 
                $user->referral_code = $token;
                $user->save();
            }

            $token = $user->refferal_code;
            Queue::getIron()->ssl_verifypeer = false;
            Mail::queue('emails.auth.referralWelcome', compact('token'), function($m) use ($input) 
            {
                $m  ->to($input['to'])
                    ->subject($input['content']);
            });               
            return Redirect::route('referral.create')
                                ->with('success','Referral successfully send');
            
        }
        return Redirect::back()
                        ->withErrors($validation)
                        ->withInput();;*/
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