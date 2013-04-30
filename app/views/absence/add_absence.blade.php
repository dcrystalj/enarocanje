@extends('layouts.default')

@section('title')
    Add absences
@stop

@section('content')
    <?php
        $abs = Absence::find($id);
    ?>
        @if(isset($abs))
            {{ Former::open(URL::route('macro.absence.update', [$mac->id, $mic->id] ))->method('PUT')->rules($rules) }}
            {{ Former::populate($abs) }}
        @else
            {{ Former::open(URL::route('macro.micro.store',$mac->id))->rules($rules) }}
        @endif
    
    {{ Former::text('title','Title:')}}
    {{ Former::select('abs_type','Absence type:')->options(array('holiday' => 'Holiday', 'absence' => 'Absence'))}}
    {{ Former::checkbox('repetable','Repeatable every year:') }}
    {{ Former::text('from','From date:')}}
    {{ Former::text('to','To date:')}}
    {{ Former::actions()->submit( isset($abs) ? 'Edit' : 'Add service' ) }}
    {{ Former::close() }}   

        <?php 
        $absences = Absence::All();
        $tbody = []; 
        $i = 1; 
        foreach ($absences as $absence){    
            $tbody[]= [
                'id'     => $i, 
                'title'   => $absence->title,
                'from'   => $absence->from,
                'to'   => $absence->to,
                'edit'  => Button::link(URL::route('absence.edit', $absence->id),'Edit'),
             ];
             $i++;
        }
    ?>

    {{ Table::hover_open(["class"=>'sortable']) }}
    {{ Table::headers('#', 'Title','From','To', '') }}
    {{ Table::body($tbody) }}
    {{ Table::close() }}

@stop
