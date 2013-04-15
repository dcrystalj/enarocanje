@extends('layouts.default')

@section('title')
    Manage Services
@stop

@section('content')
<?php
    $serviceCategories[0] = 'Nurse salon';
    $serviceCategories[1] = 'Massage salon';
    $serviceCategories[2] = 'Hair salon';
    $serviceCategories[3] = 'Beauty salon';

     $zipCode = ZIPcode::All();
     foreach ($zipCode as $z) {
         $codes[$z->id] = $z->ZIP_code;
     }
?>
    
     @if(isset($mac))
        {{ Former::open(URL::route('macro.update', $mac->id ))->method('PUT')->rules($rules) }}
        {{ Former::populate($mac) }}
    @else
        {{ Former::open(URL::route('macro.store'))->rules($rules) }}
    @endif
    {{ Former::select('name','Service:')->options($serviceCategories)->autofocus() }}
    {{ Former::select('ZIPcode','ZIP code:')->options($codes)}}
    {{ Former::text('address', 'City:')}}
    {{ Former::text('street','Street:')}}
    {{ Former::text('email','Email:')}}
    {{ Former::text('telN','Telephone Number:')}}
    {{ Former::text('SiteUrl','URL to your site:')}}
    {{ Former::textarea('description','Description')->rows(10)->columns(20) }}
    {{ Former::actions()->submit( isset($mac) ? 'Edit' : 'Add service' ) }}
    {{ Former::close() }}   

    <?php 
        $macroservice = Auth::user()->macroservices;
        $allActivated = []; 
        $allDeactivated = [];
        $i = 1; 
        foreach ($macroservice as $service){
            if($service->active==0 )
            {
                
        
                $allActivated[]= [
                    'id'          => $i, 
                    'name'        => $service->name, 
                    'description' => $service->description, 
                    'link'        => Html::link(URL::route('macro.edit', $service->id),'Edit'),
                    'deactivate'  => deactivate($service->id),
                    'micro' => Html::link( URL::route('macro.micro.create',$service->id), 'Add new actions')
                 ];
                 $i++;
            }
            else{
                
        
                $allDeactivated[] = [
                    'name'        => $service->name, 
                    'description' => $service->description, 
                    'activate'       => activate($service->id),
                    'micro' => Html::link( URL::route('macro.micro.create',$service->id), 'Add new actions')
                 ];
            }
        }
    ?>

    {{ Table::hover_open(["class"=>'sortable']) }}
    {{ Table::headers('#', 'Name', 'Description', '') }}
    {{ Table::body($allActivated) }}
    {{ Table::close() }}

    @if(count($allDeactivated)>0)
    </br>
    <h2>Deactivated:</h2>
    {{ Table::hover_open(["class"=>'sortable']) }}
    {{ Table::headers( 'Name', 'Description', '') }}
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
