@extends('layouts.default')

@section('title')
    Manage Services
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
    {{ Former::select('name','Service:')->options(Service::categories())->autofocus() }}
    {{ Former::select('ZIP_code','ZIP code:')->options($codes)}}
    {{ Former::text('street','Street:')}}
    {{ Former::text('email','Email:')->value(Auth::user()->email)}}
    {{ Former::text('telephone_number','Telephone Number:')}}
    {{ Former::text('site_url','URL to your site:')}}
    {{ Former::textarea('description','Description:')->rows(10)->columns(20) }}
    {{ Former::actions()->submit( isset($mac) ? 'Save changes' : 'Add service' ) }}
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
                    'edit'        => Button::link(URL::route('macro.edit', $service->id),'Edit'),
					'timetable'   => Button::link(URL::route('timetable', $service->id), 'Timetable'),
                    'timetable'   => Button::link(URL::route('macro.absence.add_absence', $service->id), 'Add absences'),
                    'deactivate'  => deactivate($service->id),
                    'micro' => Button::info_link( URL::route('macro.micro.create',$service->id), 'Add, edit subservices')
                 ];
                 $i++;
            }else 
            {
                $allDeactivated[] = [
                    'name'        => $service->name, 
                    'activate'       => activate($service->id),
                    'micro' => Button::info_link( URL::route('macro.micro.create',$service->id), 'Add, edit subservices')
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
        $deactivate .=    Form::submit('Deactivate');
        $deactivate .=    Form::close();
        return $deactivate;
    }
    
    function activate($serviceId)
    {
        $activate = Form::open(array('method' => 'GET', 
                                        'url' => URL::route('macroactivate',$serviceId)));
        $activate .= Form::submit('Activate');
        $activate .= Form::close();
        return $activate;
    } 
    ?>
@stop
