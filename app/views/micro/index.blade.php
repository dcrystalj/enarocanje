@extends('layouts.default')

@section('title')
    Micro Services
@stop

@section('content')

    <?php 
        $duration[15]="15 min";
        $duration[30]="30 min";
        $duration[45]="45 min";
        $duration[60]="1 h";
        $duration[75]="1 h 15 min";
        $duration[90]="1h 30 min";
        $duration[105]="1h 45 min";
        $duration[120]="2 h";

        $mic = MacroService::find($mac)->microservices()->whereActive(0)->get();
    ?>

    @if(count($mic)==0)
        {{ Typography::warning('No services avaliable yet') }}
    @else
        <?php 
        $tbody = []; 
        $i = 1; 
        foreach ($mic as $service){
            $tbody[]= [
                'id'     => $i, 
                'name'   => $service->name, 
                'length' => array_key_exists($service->length, $duration) ? $duration[$service->length] : $service->length  , 
                'desc'   => $service->description, 
                'price'  => $service->price, 
                'link'   => Html::link(URL::route('macro.micro.reservation.index',[$mac,$service->id]),'Reservate')
             ];
             $i++;
        }?>

        {{ Table::hover_open(["class"=>'sortable']) }}
        {{ Table::headers('#', 'Name', 'Length', 'Description', 'Price', '') }}
        {{ Table::body($tbody) }}
        {{ Table::close() }}
    @endif
   
@stop
