@extends('layouts.default')
@section('title')
	{{trans('general.timetable')}}
@stop

@section('assets')
{{ Html2::style('css/fc/fullcalendar.css') }}
{{-- Html2::style('css/fc/fullcalendar.print.css') --}}
{{ Html2::script('js/fc/fullcalendar.js') }}
{{ Html2::script('js/fc/fullcalendar.ext.js') }}
@stop

@section('content')
@include('calendar.calendar_dialog')
<p>
{{ Button::danger_link('#',trans('general.reset'),array('id' => 'reset')) }}
&nbsp;&nbsp;
{{-- Button::link("/service/$id/breaks", trans('general.breaks'), array('id' => 'breaks')) --}}
{{-- Button::success_link("#", trans('general.save'), array('id' => 'save')) --}}
{{ Button::success_link("#", trans('general.next'), array('id' => 'continue')) }}
</p>


@include('Provider.mobileTimeTable')

<div id='calendar' class="visible-desktop"></div>
{{ Former::open(route('breaks', array($id)))->id('submit_form') }}
{{ Former::hidden('start')->id('start') }}
{{ Former::hidden('end')->id('end') }}
{{ Former::hidden('events')->id('events') }}
{{ Former::close() }}


<script>

@include('calendar.calendar_def')

fc_init({
	// Remove existing event
	eventDrop: function(event) {
		cal_clear_day(calendar, event);
		fillFields(calendar);
	},

	// Insert event
	select: function(start, end, allDay) {
		cal_clear_day(calendar, start);
		calendar.fullCalendar('unselect');

		if(!calendar.fullCalendar('clientEvents').length) {

			start.setDate(start.getDate()-start.getDay()); // First day in week
			end.setDate(end.getDate()-end.getDay()); // Same day
			for(var day=1; day<=7; day++) {
				var s = new Date(start.getTime()+1000*3600*24*day);
				var e = new Date(end.getTime()+1000*3600*24*day);
				fc_insert(s, e, {eventType: 'work'});
			}
		} else {
			fc_insert(start, end, {eventType: 'work'});
		}
		fillFields(calendar);
	},

	// Show edit dialog
	eventClick: function(event){
		cal_show_dialog(event);
	},

	// Load events
	@if(sizeof($events))
	events: <?php print json_encode($events); ?>,
	@else
	eventSources: [
		{
			url: '{{ URL::action("MicroserviceApiController@getWorkinghours", array($id)) }}',
			type: 'GET',
			error: function() { alert("{{trans('messages.fetchingError')}}") },
			editable: true,
		}
	],
	@endif

	loading: function(bool) {
		if(!bool )
		{
			fillFields(calendar);
		}
	}, 
});

$(function() {
	calendar.fullCalendar('render');

	fillFields(calendar);
	
	//hide for mobile
	$('#calendar').addClass('visible-desktop');

	// Buttons
	$('#reset').click(function(e) {
		e.preventDefault();
		var events = calendar.fullCalendar('clientEvents');
		for(var i=0; i<events.length; i++)
			calendar.fullCalendar('removeEvents', events[i]._id);
	});
	$('#save,#continue').click(function(e) {
		e.preventDefault();
		// $('body').append($('#datetimepick'+1*2).val().getTime());
		//mobile
		if( $('#calendar').css('display') == 'none' ) {

			fillCalendar(calendar);
		}

		var events = calendar.fullCalendar('clientEvents');
		for(i=0; i<events.length; i++)
			 events[i] = cal_event_data(events[i]);
		document.getElementById('events').value = JSON.stringify(events);
		document.getElementById('start').value = calendar.fullCalendar('getView').start.toISOString();
		document.getElementById('end').value = calendar.fullCalendar('getView').end.toISOString();
		document.getElementById('submit_form').submit();
		
	});
});



</script>


<style>
/* Hide unnecessary things */
.fc-header, .fc-agenda-allday {
	display: none;
}

.busy {
	background-color: gray;
	border: none;
	border-radius: 0px !important;
	margin-left: -3px;
	width: 157px !important;
}
.busy div {
	display: none;
}
.fc-agenda-slots tr * {
	height: 10px !important;
	line-height: 10px;
}

.form-horizontal .control-group {
	margin-bottom: 5px;
}

.dl-horizontal {
	margin-left: auto;
	margin-right: auto;
}
dt {
	margin-top: 10px;
}
</style>

@stop
