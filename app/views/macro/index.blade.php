@extends('layouts.default')

@section('title')
    {{Lang::get('general.providers')}}
@stop

@section('content')


    <?php 
        $macroService = MacroService::whereActive(0)->get();
        $tbody = []; 
        $i = 1; 
        foreach ($macroService as $service){    
            $tbody[] = [
                'id'     => $i, 
                'name'   => $service->name,
                'City'   => $service->city . '<br>' . $service->street, 
                'Email'  => $service->email,
                'link'   => Html::link(URL::route('macro.micro.index', $service->id),Lang::get('general.choose'))
             ];
             $i++;
        }
    ?>

    {{ Table::hover_open(["class"=>'sortable', 'id'=> 'mobileTable']) }}
    {{ Table::headers('#', Lang::get('general.name'),Lang::get('general.city'), Lang::get('general.email'), '') }}
    {{ Table::body($tbody) }}
    {{ Table::close() }}
   
@stop
