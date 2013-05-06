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
    

    <div class="control-group">

        {{ Former::label('from','From:')->class('control-label')->for('datetimepicker')}}
        <div class="controls">
        <div id="datetimepicker" class="input-append date">
            <input data-format="yyyy-MM-dd hh:mm" type="text" name="from" value="<?php if (isset($abs)) echo substr($abs->from,0,-3) ?>" ></input>
            <span class="add-on">
               <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
            </span>
        </div>
        </div>
    </div>





    <div class="control-group">

        {{ Former::label('to','To:')->class('control-label')->for('datetimepicker1')}}
        <div class="controls">
        <div id="datetimepicker1" class="input-append date">
            <input data-format="yyyy-MM-dd hh:mm" type="text" name="to" value="<?php if (isset($abs)) echo substr($abs->to,0,-3) ?>" ></input>
            <span class="add-on">
               <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
            </span>
        </div>
        </div>
    </div>

    {{ Former::actions()->submit( isset($abs) ? 'Save changes' : 'Add absence' ) }}
    {{ Former::close() }}   

    <?php 
        $absences = Absences::where('macservice_id',$mac->id)->get();
        $tbody = []; 
        $i = 1; 
        foreach ($absences as $absence){    
            $tbody[]= [
                'id'     => $i, 
                'title'   => $absence->title,
                'from'   => substr($absence->from,0,-3),
                'to'   => substr($absence->to,0,-3),
                'edit'  => Button::link(URL::route('macro.absence.edit', array($mac->id, $absence->id)),'Edit'),
                'delete'  => delete($mac->id,$absence->id),
             ];
             $i++;
        }
    ?>

    {{ Table::hover_open(["class"=>'sortable']) }}
    {{ Table::headers('#', 'Title','From','To', '') }}
    {{ Table::body($tbody) }}
    {{ Table::close() }}


    <?php 
        function delete($macId,$absId){
            $delete =   Form::open( array(
                                    'method' => 'DELETE', 
                                    'url'    => URL::route(
                                    'macro.absence.destroy',
                                    [$macId,$absId]),
                                    )
                        );
            $delete .= Form::submit('Delete');
            $delete .= Form::close();
            return $delete;
        }
    ?>

@stop
