@extends('layouts.default')

@section('title')
    {{trans('general.services')}}
@stop

@section('content')

    <?php 
        $mic = MacroService::find($mac)->microservices()->get();
        $filter = Service::gender();
    ?>

    @if(count($mic)==0)
        {{ Typography::warning(trans('messages.noServicesYet')) }}
    @else
        {{ Form::open(['method'=>'GET']) }}
        {{ Form::label('gender', trans('messages.filterByGender').':') }}
        {{ Form::select('gender', $filter,Input::get('gender')) }}
        {{ Form::submit(trans('general.filter')) }}
        {{ Form::close() }}

        <?php
        if (array_key_exists (Input::get('gender'),Service::gender()) && (Input::get('gender') != 'U'))
        {
            $mic = MacroService::find($mac)->microservices()->where(function($query){
                $query->where('gender', Input::get('gender'))
                      ->orWhere('gender','U');
            })->get();    
        }
        else{
            $mic = MacroService::find($mac)->microservices()->get();       
        }
        if ($mic){ 
        $tbody = []; 
        $i = 1; 
        $length = 0;
        foreach ($mic as $service){
            if($service->isActive())
            {
                if($service->price == 0){
                    $service->price = '/';
                }
                if(substr($service->length,0,-6) == '00')
                {
                    $length = Service::lengthMin($service->length);
                }    
                else
                {
                    $length = Service::lengthH($service->length);
                    $length .= Service::lengthMin($service->length);
                }
                $tbody[] = [
                //'id'     => $i, 
                'title'  => $service->title,
                'length' => $length, 
                'desc'   => strlen($service->description)>15 ? substr($service->description,0,20) .'...' : $service->description, 
                'price'  => $service->price, 
                'link'   => Button::link(URL::route('macro.micro.reservation.index',[$mac,$service->id]),trans('general.reservate'))
                ];
                $i++;
            }
        }
        }?>

        @if(count($tbody)>0)
        {{ Table::hover_open(["class"=>'sortable', 'id'=> 'mobileTable']) }}
        {{ Table::headers( trans('general.name'), trans('general.length'), trans('general.description'), trans('general.price').'(€)', '') }}
        {{ Table::body($tbody) }}
        {{ Table::close() }}
        @else
        {{ Typography::warning(trans('messages.noServicesForFilter')) }}
        @endif
    @endif
   
@stop
