@extends('layouts.default')

@section('title')
    Add absences
@stop

@section('content')

        @if(isset($abs))
            {{ Former::open(URL::route('macro.absence.update', [$mac->id, $abs->id] ))->method('PUT')->rules($rules) }}
            {{ Former::populate($abs) }}
        @else
            {{ Former::open(URL::route('macro.absence.store',$mac->id))->rules($rules) }}
        @endif
    
    {{ Former::text('title','Title:')}}
    {{ Former::select('abs_type','Absence type:')->options(Service::absence())}}
    {{ Former::checkbox('repetable','Repeatable every year:') }}
    <div id="datetimepicker" class="input-append date">
    <input data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>
    <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span>
  </div>
    
    {{ Former::actions()->submit( isset($abs) ? 'Save changes' : 'Add service' ) }}
    {{ Former::close() }}   

    <?php 
        $absences = Absences::all();
        $tbody = []; 
        $i = 1; 
        foreach ($absences as $absence){    
            $tbody[]= [
                'id'     => $i, 
                'title'   => $absence->title,
                'from'   => $absence->from,
                'to'   => $absence->to,
                'edit'  => Button::link(URL::route('macro.absence.edit', array($mac->id, $absence->id)),'Edit'),
                'delete'  => Button::link(URL::route('macro.absence.destroy', array($mac->id, $absence->id)),'Delete'),
             ];
             $i++;
        }
    ?>

    {{ Table::hover_open(["class"=>'sortable']) }}
    {{ Table::headers('#', 'Title','From','To', '') }}
    {{ Table::body($tbody) }}
    {{ Table::close() }}

@stop
