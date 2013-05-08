<?php

class AbsenceController extends BaseController {


    public $rules = array(
        'title' => 'required',
        'from' => 'required|before_date:to',     
        'to'   => 'required',
    );

    public function __construct() {
        $this->beforeFilter('auth');
        $this->beforeFilter('provider');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($mac)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($mac)
    {
        return View::make('absence.create')                   
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
            $checkbox = Input::get( 'repetable' );
            if($checkbox == null){
                $checkbox = 0;
            }
            $absence                = new Absences;
            $absence->title         = Input::get( 'title' );
            $absence->abs_type      = Input::get( 'abs_type' );
            $absence->repetable     = $checkbox;
            $absence->from          = date('Y/m/d H:i', strtotime(Input::get('from')));
            $absence->to            = date('Y/m/d H:i', strtotime(Input::get('to')));
            //$absence->google_id     =
            $absence->macservice_id = $mac;
            $absence->save();

            if($absence)
            {
                return Redirect::route('macro.absence.create',$mac)
                                ->with('success',Lang::get('messages.successfullySaved'));
            }
        }
        return Redirect::back()
                        ->withErrors($validation)
                        ->withInput();
    }


    public function edit($mac,$abs)
    {
        $absence = Auth::user()->macroservices()->find($mac)->absences()->find($abs); 
        if($absence) //is macrosrevice in database
        {
            return View::make('absence.create')
                            ->with('abs',$absence)
                            ->with('mac', Auth::user()->macroservices()->find($mac))
                            ->with('rules',$this->rules);
        }
        return Redirect::route('macro.absence.create',$mac)
                        ->with('error',Lang::get('messages.wrongAbsence'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($mac,$abs)
    {
        $absence = Auth::user()->macroservices()->find($mac)->absences()->find($abs);
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
            $absence->from           = date('Y/m/d H:i', strtotime(Input::get('from')));
            $absence->to             = date('Y/m/d H:i', strtotime(Input::get('to')));
            //$absence->google_id      
            $absence->macservice_id  = $mac;
            $absence->save();

            if($absence){
                return Redirect::route('macro.absence.create',$mac)
                                ->with('success',Lang::get('messages.successfullyEdited'));
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
    public function destroy($mac,$abs)
    {
        $absence = Auth::user()->macroservices()->find($mac)->absences()->find($abs);
        if($absence)
        {
            $absence->delete();
            return Redirect::route('macro.absence.create',$mac)
                            ->with('success',Lang::get('messages.successfullyDeleted'));
        }
        return Redirect::route('macro.absence.create',$mac)
                                ->with('error',Lang::get('messages.absenceNotFound'));    
    }

}