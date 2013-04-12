@extends('layouts.default')

@section('title')
    Manage Services
@stop

@section('content')
    
 
    @if(isset($mac))
        {{ Former::open('macro/'. $mac->id)->method('PUT')->rules($rules) }}
        {{ Former::populate($mac) }}
    @else
        {{ Former::open('macro')->rules($rules) }}
    @endif
    {{ Former::text('name','Service name:')->autofocus() }}
    {{ Former::textarea('description','Description')->rows(10)->columns(20) }}
    {{ Former::textarea('contact','Contact:')->rows(5)->columns(50) }}
    {{ Former::actions()->submit( isset($mac) ? 'Edit' : 'Add service' ) }}
    {{ Former::close() }}   

    <?php 
        $macroservice = MacroService::all();
        $allActivated = []; 
        $allDeactivated = [];
        $i = 1; 
        foreach ($macroservice as $service){
            if($service->active==0)
            {
                $deactivate =    Form::open(array('method' => 'DELETE', 'url' => 'macro/' . $service->id));
                $deactivate .=    Form::submit('Deactivate');
                $deactivate .=    Form::close();
        
                $allActivated[]= [
                    'id'          => $i, 
                    'name'        => $service->name, 
                    'description' => $service->description, 
                    'link'        => Html::link('macro/' . $service->id . '/edit','Edit'),
                    'deactivate'  => $deactivate
                 ];
                 $i++;
            }
            else{
                $activate =    Form::open(array('method' => 'GET', 'url' => 'macro/' . $service->id . '/activate'));
                $activate .=    Form::submit('Activate');
                $activate .=    Form::close();
        
                $allDeactivated[] = [
                    'name'        => $service->name, 
                    'description' => $service->description, 
                    'link1'       => $activate
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
   
@stop
