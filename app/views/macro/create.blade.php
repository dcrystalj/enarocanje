@extends('layouts.default')

@section('title')
    {{Lang::get('services.manageService')}}
@stop

@section('content')
<?php

     $zipCode = ZIPcode::All();
     foreach ($zipCode as $z) {
         $codes[$z->ZIP_code] = $z->ZIP_code . ' ' . $z->city;
     }
?>
    
     @if(isset($mac))
        {{ Former::open(URL::route('macro.update', $mac->id ))->method('PUT')->rules($rules) }}
        {{ Former::populate($mac) }}
    @else
        {{ Former::open(URL::route('macro.store'))->rules($rules) }}
    @endif
    {{ Former::select('name',Lang::get('services.name').': ')->options(Service::categories())->autofocus() }}
    {{ Former::select('ZIP_code',Lang::get('services.zipCode').':')->options($codes)}}
    {{ Former::text('street',Lang::get('services.').': ')}}
    {{ Former::text('email',Lang::get('services.email').': ')->value(Auth::user()->email)}}
    {{ Former::text('telephone_number',Lang::get('services.telephoneNumber').': ')}}
    {{ Former::text('site_url',Lang::get('services.urlToYourSite').': ')}}
    {{ Former::textarea('description',Lang::get('services.description').': ')->rows(10)->columns(20) }}
    {{ Former::actions()->submit( isset($mac) ? Lang::get('services.saveChanges') : Lang::get('services.addService')) }}
    {{ Former::close() }}   

    <?php 
        $macroservice = Auth::user()->macroservices()->get();

        $allActivated = []; 
        $allDeactivated = [];
        $i = 1; 
        foreach ($macroservice as $service)
        {
            if($service->active==0 )
            {
                $allActivated[]= [
                    'id'          => $i, 
                    'name'        => $service->name, 
                    'edit'        => Button::link(URL::route('macro.edit', $service->id),Lang::get('services.edit')),
					'timetable'   => Button::link(URL::route('timetable', $service->id), Lang::get('services.timetable')),
                    'absence'     => Button::link(URL::route('macro.absence.create', $service->id), Lang::get('services.addAbsences')),
                    'deactivate'  => deactivate($service->id),
                    'micro' => Button::info_link( URL::route('macro.micro.create',$service->id), Lang::get('services.addEdit'))
                 ];
                 $i++;
            }else 
            {
                $allDeactivated[] = [
                    'name'        => $service->name, 
                    'activate'       => activate($service->id),
                    'micro' => Button::info_link( URL::route('macro.micro.create',$service->id), Lang::get('services.addEdit'))
                ];
            }
        }
    ?>

    {{ Table::hover_open(["class"=>'sortable']) }}
    {{ Table::headers('#', 'Name', '') }}
    {{ Table::body($allActivated) }}
    {{ Table::close() }}

    @if(count($allDeactivated)>0)
    </br>
    <h2>Deactivated:</h2>
    {{ Table::hover_open(["class"=>'sortable']) }}
    {{ Table::headers( 'Name', '') }}
    {{ Table::body($allDeactivated) }}
    {{ Table::close() }}
    @endif

    <?php 
    function deactivate($serviceId)
    {
        $deactivate =    Form::open(array('method' => 'DELETE', 
                                            'url' => URL::route('macro.destroy',$serviceId)));
        $deactivate .=    Form::submit(Lang::get('services.deactivate'));
        $deactivate .=    Form::close();
        return $deactivate;
    }
    
    function activate($serviceId)
    {
        $activate = Form::open(array('method' => 'GET', 
                                        'url' => URL::route('macroactivate',$serviceId)));
        $activate .= Form::submit(Lang::get('services.activate'));
        $activate .= Form::close();
        return $activate;
    } 
    ?>
@stop
