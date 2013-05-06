@extends('layouts.default')

@section('title')
    {{Lang::get('services.manageService')}}
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
                'link'   => Html::link(URL::route('macro.micro.index', $service->id),Lang::get('services.choose'))
             ];
             $i++;
        }
    ?>

    {{ Table::hover_open(["class"=>'sortable']) }}
    {{ Table::headers('#', Lang::get('services.name'),Lang::get('services.city'), Lang::get('services.email'), '') }}
    {{ Table::body($tbody) }}
    {{ Table::close() }}
   
@stop
