<?php

class AbsenceController extends BaseController {


    public $rules = array(
        'title'      => 'required',
        'from'  => 'required',     
        'to'        => 'required'
    );

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($mac)
    {
        //return View::make('absence.add_absence')->with('mac',$mac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($mac)
    {
        return View::make('absence.add_absence')                   
                    ->with('rules',$this->rules)
                    ->with('mac', Auth::user()->macroservices()->find($mac))
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
    public function store($mac)
    {
        $validation = Validator::make(Input::all(),$this->rules);

        if($validation->passes())
        {
            
            $absence                = new MicroService;
            $absence->title         = Input::get( 'title' );
            $absence->abs_type      = Input::get( 'abs_type' );
            $absence->repetable     = Input::get( 'repetable' );
            $absence->from          = Input::get( 'from' );
            $absence->to            = Input::get( 'to' );
            //$absence->google_id     =
            $absence->macservice_id = $mac;
            $absence->save();

            if($absence)
            {
                return Redirect::route('macro.absence.add_absence',$mac)
                                ->with('success','successfully saved');
            }
        }
        return Redirect::back()
                        ->withErrors($validation)
                        ->withInput();;
    }


    public function edit($mac,$abs)
    {
        $absence = Auth::user()->macroservices()->find($mac)->absence()->find($abs);
        if($absence) //is macrosrevice in database
        {
            return View::make('absence.add_absence')
                            ->with('abs',$absence)
                            ->with('mac', Auth::user()->macroservices()->find($mac))
                            ->with('rules',$this->rules);
        }
        
        return Redirect::route('macro.absence.add_absence',$mac)
                        ->with('error','Wrong absence');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($mac,$abs)
    {
        $absence = Auth::user()->macroservices()->find($mac)->absence()->find($abs);
        if(!$absence) //is macrosrevice not in database
        {
            return App::abort(404);
        }
        
        $validation = Validator::make(Input::all(),$this->rules);

        if($validation->passes())
        {
            
            $absence->title          = Input::get( 'title' );
            $absence->abs_type       = Input::get( 'abs_type' );
            $absence->repetable      = Input::get( 'repetable' );
            $absence->from           = Input::get( 'from' );
            $absence->to             = Input::get( 'to' );
            //$absence->google_id      
            $absence->macservice_id  = $mac;
            $absence->save();

            if($micservice){
                return Redirect::route('macro.absence.add_absence',$mac)
                                ->with('success','Successfully edited');
            }
        }

        return Redirect::back()
                        ->withErrors($validation)
                        ->withInput();;
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