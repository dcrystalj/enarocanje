@extends('layouts.default')

@section('title')
    Manage Services
@stop

@section('content')

    {{ Former::open() }}
    {{ Former::text('name','Service name:')->autofocus() }}
    {{ Former::textarea('description','Description')->rows(10)->columns(20) }}
    {{ Former::textarea('contact','Contact:')->rows(5)->columns(50) }}
    {{ Former::actions()->submit('Add service') }}
    {{ Former::close() }}   

    <?php 
        $MicroService = MacroService::All();
        $tbody = []; 
        $i = 1; 
        foreach ($MicroService as $service){
            $link1  =    Form::open(array('method' => 'DELETE', 'url' => 'macro/' . $service->id));
            $link1 .=    Form::submit('Delete');
            $link1 .=    Form::close();
    
            $tbody[]= [
                'id'     => $i, 
                'name'   => $service->name, 
                'link'   => Html::link('macro/' . $service->id . '/edit','Edit') ,
                'link1'  => $link1
             ];
             $i++;
        }
    ?>

    {{ Table::hover_open(["class"=>'sortable']) }}
    {{ Table::headers('#', 'Name', 'Description', '') }}
    {{ Table::body($tbody) }}
    {{ Table::close() }}
   
@stop
