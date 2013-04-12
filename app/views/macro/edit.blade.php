@extends('layouts.default')

@section('title')
    All Services
@stop

@section('content')

    @if(is_null($macroservice))
        {{ "No services available yet, please try again" }}
    @else
        <?php
        $tbody = []; 
        $i = 1; 
        foreach ($macroservice as $service){    
            $tbody[]= [
                'id'     => $i, 
                'name'   => $service->name, 
                'description'   => $service->description
             ];
             $i++;
        }
        ?>

        {{ Table::hover_open(["class"=>'sortable']) }}
        {{ Table::headers('#', 'Name', 'Description') }}
        {{ Table::body($tbody) }}
        {{ Table::close() }}
    @endif
   
@stop
