@extends('layouts.default')

@section('title')
    Manage Services
@stop

@section('content')
    <?php 
            $duration[0]="15 min";
            $duration[1]="30 min";
            $duration[2]="45 min";
            $duration[3]="1 h";
            $duration[4]="1 h 15 min";
            $duration[5]="1h 30 min";
            $duration[6]="1h 45 min";
            $duration[7]="2 h";
    ?>  
    {{ Former::open('ManageServices') }}
    {{ Former::text('Name:')->autofocus() }}
    {{ Former::select('Length:')->options($duration, 1) }} 
    {{ Former::text('Description:') }}
    {{ Former::Number('Price:') }}
    {{ Former::actions()->submit('Add service') }}
    {{ Former::close() }}   
   
@stop