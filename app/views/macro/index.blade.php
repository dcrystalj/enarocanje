@extends('layouts.default')

@section('title')
    {{trans('general.providers')}}
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
                'City'   => $service->city . ' <br>' . $service->street, 
                'Email'  => $service->email,
                'link'   => Button::link(URL::route('macro.micro.index', $service->id),trans('general.choose'))
             ];
             $i++;
        }
    ?>

    {{ Table::hover_open(["class"=>'sortable', 'id'=> 'mobileTable']) }}
    {{ Table::headers('#', trans('general.name'),trans('general.city'), trans('general.email'), '') }}
    {{ Table::body($tbody) }}
    {{ Table::close() }}
   
@stop
