@extends('layouts.default')

@section('title')
    Services
@stop

@section('content')

    <?php 
        $duration = Service::duration();
        $mic = MacroService::find($mac)->microservices()->get();
    ?>

    @if(count($mic)==0)
        {{ Typography::warning('No services avaliable yet') }}
    @else
        {{ Form::open(['method'=>'GET']) }}
        {{ Form::label('gender', 'Filter services by gender:') }}
        {{ Form::select('gender', Service::gender(),Input::get('gender')) }}
        {{ Form::submit('Filter') }}
        {{ Form::close() }}
        <?php
        if (array_key_exists (Input::get('gender'),Service::gender()) && (Input::get('gender') != 'U'))
        {
            $mic = MacroService::find($mac)->microservices()->where('gender', Input::get('gender'))->get();    
        }
        else{
            $mic = MacroService::find($mac)->microservices()->get();       
        }
        if ($mic){ 
        $tbody = []; 
        $i = 1; 
        $macroName = MacroService::find($mac)->name;
        $category = Service::categoryId($macroName);
        foreach ($mic as $service){
            echo $service->name;
            if($service->isActive())
            {
                if($service->price == 0){
                    $service->price = '/';
                }
                $tbody[] = [
                'id'     => $i, 
                'name'   => Service::services()[$category][$service->name], 
                'length' => array_key_exists($service->length, $duration) ? $duration[$service->length] : $service->length, 
                'desc'   => $service->description, 
                'price'  => $service->price, 
                'link'   => Html::link(URL::route('macro.micro.reservation.index',[$mac,$service->id]),'Reservate')
                ];
                $i++;
            }
        }
        }?>

        @if(count($tbody)>0)
        {{ Table::hover_open(["class"=>'sortable']) }}
        {{ Table::headers('#', 'Name', 'Length', 'Description', 'Price', '') }}
        {{ Table::body($tbody) }}
        {{ Table::close() }}
        @else
        {{ Typography::warning('No services avaliable yet for this filter') }}
        @endif
    @endif
   
@stop
