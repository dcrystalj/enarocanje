@extends('layouts.default')

@section('title')
    Manage Services
@stop

@section('content')


    <?php 
        $macroService = MacroService::whereActive(0)->get();
        $tbody = []; 
        $i = 1; 
        foreach ($macroService as $service){    
            $tbody[]= [
                'id'     => $i, 
                'name'   => $service->name, 
                'link'   => Html::link(URL::route('macro.micro.index', $service->id),'Choose')
             ];
             $i++;
        }
    ?>

    {{ Table::hover_open(["class"=>'sortable']) }}
    {{ Table::headers('#', 'Name', '') }}
    {{ Table::body($tbody) }}
    {{ Table::close() }}
   
@stop
