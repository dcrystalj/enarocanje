@extends('layouts.default')

@section('title')
    Micro Services
@stop

@section('content')

    <?php 
    
        $duration = Service::duration();
        $mic = MacroService::find($mac)->microservices()->whereActive(0)->get();
    ?>

    @if(count($mic)==0)
        {{ Typography::warning('No services avaliable yet') }}
    @else
        {{ Form::open(['method'=>'GET']) }}
        {{ Form::label('gender', 'Filter services by gender:') }}
        {{ Form::select('gender', Service::gender()) }}
        {{ Form::submit('Filter') }}
        {{ Form::close() }}
        <?php
        if (in_array(Input::get('gender'),Service::gender()) && (Input::get('gender') != 'U'))
        {
            $mic = MacroService::find($mac)->microservices()->whereActive(0)->where('gender', Input::get('gender'))->get();    
        }
        else{
            $mic = MacroService::find($mac)->microservices()->whereActive(0)->get();       
        }
        if ($mic){ 
        $tbody = []; 
        $i = 1; 
        foreach ($mic as $service){
            $tbody[]= [
                'id'     => $i, 
                'name'   => $service->name, 
                'length' => array_key_exists($service->length, $duration) ? $duration[$service->length] : $service->length, 
                'desc'   => $service->description, 
                'price'  => $service->price, 
                'link'   => Html::link(URL::route('macro.micro.reservation.index',[$mac,$service->id]),'Reservate')
             ];
             $i++;
        }
        }?>

        {{ Table::hover_open(["class"=>'sortable']) }}
        {{ Table::headers('#', 'Name', 'Length', 'Description', 'Price', '') }}
        {{ Table::body($tbody) }}
        {{ Table::close() }}
    @endif
   
@stop
