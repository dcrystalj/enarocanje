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
    {{ Former::checkbox('repetable','Repeatable:')}}

    @if($errors && $errors->has('from'))
        <div class="control-group error">
    @else
        <div class="control-group required">
    @endif

        {{ Former::label('from','From:')->class('control-label')->for('datetimepicker')}}
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

        {{ Former::label('to','To:*')->class('control-label')->for('datetimepicker1')}}
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

    
    
	{{ Former::actions()->submit( isset($abs) ? 'Save changes' : 'Add absence' ) }}
    {{ Former::close() }}
	{{-- Button::link("/google/export", Lang::get('general.export')) --}}
    {{ Button::link("/google/import", Lang::get('general.gimport'), array('id' => 'google_import')) }}
@if(sizeof($absences))
<script>
	$('#google_import').click(function(e) {
		e.preventDefault();
		var button = this;
		bootbox.confirm("All old absences will be deleted.<br />Do you want to continue?", function(r) {
			if(r)
				window.location = button.href;
		});
	});
</script>
@endif
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
                'edit'  => Button::link(URL::route('macro.absence.edit', array($mac->id, $absence->id)),'Edit'),
                'delete'  => delete($mac->id,$absence->id),
            ];
            $i++;
        }
    ?>
    @if(count($absencesT)>0)
        </br>
        <h2>Absences:</h2>
    {{ Table::hover_open(["class"=>'sortable']) }}
    {{ Table::headers('#', 'Title','From','To', '') }}
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
            $delete .= Form::submit('Delete');
            $delete .= Form::close();
            return $delete;
        }
    ?>

@stop
