@extends('layouts.default')

@section('title')
    Edit service    
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

    ?>  

    {{ Former::open('ManageServices/' . $service->id)->rules($rules)->method('PUT') }}
    {{ Former::populate($service) }}
    {{ Former::text('name',Lang::get('provider.name').': ')->autofocus() }}
    {{ Former::select('length',Lang::get('provider.duration').': ')->options($duration) }} 
    {{ Former::text('description',Lang::get('provider.description').': ') }}
    {{ Former::Number('price',Lang::get('provider.price')': ') }}
    {{ Former::actions()->submit(Lang::get('provider.saveChanges')) }}
    {{ Former::close() }} 

@stop