@extends('layouts.default')

@section('title')
    {{Lang::get('provider.manageServices')}}
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

        $MicroService = Microservice::All();
    ?>  

    {{ Former::open('ManageServices')->rules($rules) }}
    {{ Former::text('name',Lang::get('provider.name').': ')->autofocus() }}
    {{ Former::select('length',Lang::get('provider.duration').': ')->options($duration) }} 
    {{ Former::Number('price',Lang::get('provider.price').': ') }}
    {{ Former::textarea('description',Lang::get('provider.description').': ')->rows(10)->columns(20) }}
    {{ Former::actions()->submit(Lang::get('provider.addService')) }}
    {{ Former::close() }}   

    <?php 
    $tbody = []; 
    $i = 1; 
    foreach ($MicroService as $service){
        $link1  =    Form::open(array('method' => 'DELETE', 'url' => 'ManageServices/' . $service->id));
        $link1 .=    Form::submit(Lang::get('provider.delete'));
        $link1 .=    Form::close();

        $tbody[]= [
            'id'     => $i, 
            'name'   => $service->name, 
            'length' => array_key_exists($service->length, $duration) ? $duration[$service->length] : $service->length  , 
            'desc'   => $service->description, 
            'price'  => $service->price, 
            'link'   => Html::link('ManageServices/' . $service->id . '/edit','Edit') ,
            'link1'  => $link1
         ];
         $i++;
    }?>
    
    {{ Table::hover_open(["class"=>'sortable']) }}
    {{ Table::headers('#', 'Name', 'Length', 'Description', 'Price', '') }}
    {{ Table::body($tbody) }}
    {{ Table::close() }}
   
@stop
