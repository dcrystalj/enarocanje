@extends('layouts.default')

@section('title')
    {{trans('general.addAbsences')}}
@stop

@section('content')

<div class="row-fluid">
<div class="span5">

    @if(isset($abs))
        {{ Former::open(URL::route('macro.absence.update', [$mac->id, $abs->id] ))->method('PUT')->rules($rules) }}
        {{ Former::populate($abs) }}
    @else
        {{ Former::open(URL::route('macro.absence.store',$mac->id))->rules($rules) }}
    @endif
    
    {{ Former::text('title',trans('general.title').':')}}
    {{ Former::checkbox('repetable',trans('general.repeatable').':')}}

    @if($errors && $errors->has('from'))
        <div class="control-group error">
    @else
        <div class="control-group required">
    @endif
        {{--  in case of failure            Former::label('from','From:')->class('control-label')->for('datetimepicker')--}}
        {{ Former::label(trans('general.from').':','from')->class('control-label')->for('datetimepicker')}}
        <div class="controls">
        <div id="datetimepicker" class="input-append date">
            <input data-format="yyyy-MM-dd hh:mm" type="text" name="from" value="<?php if (isset($abs)) echo substr($abs->from,0,-3) ?>" ></input>
            <span class="add-on">
               <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
            </span>
        </div>
        @if($errors && $errors->has('from'))
            <span class="help-inline"> {{$errors->first('from')}}</span>
        @endif
        </div>
    </div>

    @if($errors && $errors->has('to'))
        <div class="control-group error">
    @else
        <div class="control-group required">
    @endif
        {{--in case of failure  Former::label('to','To:*')->class('control-label')->for('datetimepicker1')--}}
        {{ Former::label(trans('general.to').':')->class('control-label')->for('datetimepicker1')}}
        <div class="controls">
        <div id="datetimepicker1" class="input-append date">
            <input data-format="yyyy-MM-dd hh:mm" type="text" name="to" value="<?php if (isset($abs)) echo substr($abs->to,0,-3) ?>" >
            </input>



            <span class="add-on">
               <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
            </span>

        </div>
        @if($errors && $errors->has('to'))
            <span class="help-inline"> {{$errors->first('to')}}</span>
        @endif
		</div>
	</div>

    
    
	{{ Former::actions()->submit( isset($abs) ? trans('general.saveChanges') : trans('general.addAbsence') ) }}
    {{ Former::close() }}
	{{-- Button::link("/google/export", trans('general.export')) --}}
</div>
<div class="span5 offset2">

    {{ Button::large_link("/google/import", trans('general.gimport'), array('id' => 'google_import')) }}

</div>
</div>

<?php
   $absencesT = []; 
    $i = 1; 
    foreach ($absences as $absence){
        if($absence->repetable == 1){
            $repeat = '✔';
        } 
        else
        {
            $repeat = '✘';
        }   
        $absencesT[]= [
            'id'     => $i, 
            'title'   => $absence->title,
            'from'   => substr($absence->from,0,-3),
            'to'   => substr($absence->to,0,-3),
            'repeatable' => $repeat,
            'edit'  => Button::link(URL::route('macro.absence.edit', array($mac->id, $absence->id)),trans('general.edit')),
            'delete'  => delete($mac->id,$absence->id),
        ];
        $i++;
    }
?>
    @if(count($absencesT)>0)
        </br>
        <h2>{{trans('general.absences')}}</h2>
    {{ Table::hover_open(["class"=>'sortable', 'id'=> 'mobileTable']) }}
    {{ Table::headers('#', trans('general.title'),trans('general.from'),trans('general.to'), trans('general.repeat'),'') }}
    {{ Table::body($absencesT) }}
    {{ Table::close() }}

    @endif


    <?php 
        function delete($macId,$absId){
            $delete =   Form::open( array(
                                    'method' => 'DELETE', 
                                    'url'    => URL::route(
                                    'macro.absence.destroy',
                                    [$macId,$absId]),
                                    )
                        );
            $delete .= Form::submit(trans('general.delete'));
            $delete .= Form::close();
            return $delete;
        }
    ?>

@stop
