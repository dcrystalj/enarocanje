@extends('layouts.default')

@section('title')
{{Lang::get('general.breaks')}}
@stop

@section('assets')
{{ Html::style('css/fc/fullcalendar.css') }}
{{-- Html::style('css/fc/fullcalendar.print.css') --}}
{{ Html::script('js/fc/fullcalendar.js') }}
{{ Html::script('js/fc/fullcalendar.ext.js') }}
@stop

@section('content')
@include('calendar.calendar_dialog')

<p>
{{ Button::danger_link('#',Lang::get('general.reset'),array('id' => 'reset')) }}
&nbsp;&nbsp;
{{ Button::link('#', Lang::get('general.back'), array('id' => 'back')) }}
&nbsp;&nbsp;
{{ Button::success_link("#",Lang::get('general.save'),array('id' => 'save')) }}
</p>

<div id='calendar'></div>
<form id="submit_form" method="post" action="{{ route("breaks_submit", array($id)) }}">
	<input type="hidden" name="events" id="events" value="<?php print htmlspecialchars(json_encode($events)); ?>" />
	<input type="hidden" name="breaks" id="breaks" />
</form>
<script>
@include('calendar.calendar_def')	
fc_init({
	eventAfterRender: function(event, element, view) {  
		var width = $(element).width()+8;
		$(element).css('width', width + 'px');
	},
	eventDrop: function(event, dayDelta, minDelta, allDay, rf) {
		if (isOverlapping(event.start, event.end))
			rf();
	},
	select: function(start, end, allDay) {
		//cal_clear_day(calendar, start);
		calendar.fullCalendar('unselect');
		if(!isOverlapping(start,end))
			fc_insert(start, end, {eventType: 'break'});
	},
	eventClick: cal_show_dialog,
	eventSources: [
		{
			url: '{{ URL::action("MicroserviceApiController@getBreaks", array($id)) }}',
			type: 'GET',
			error: cal_error,
			editable: true,
		},
	],
	events: <?php print json_encode($inverted); ?>
	});

$(function() {
	// Buttons
	$('#reset').click(function(e) {
		e.preventDefault();
		var events = calendar.fullCalendar('clientEvents');
		calendar.fullCalendar('removeEvents', function(e) {
			return (e.eventType == 'break');
		});
	});
	$('#back').click(function(e) {
		e.preventDefault();
		var form = document.getElementById('submit_form');
		form.action = '{{ route("timetable_back", array($id)) }}';
		form.submit();
	});
	$('#save').click(function(e) {
		e.preventDefault();
		var events = calendar.fullCalendar('clientEvents', function(e) {return e.editable !== false;});
		for(i=0; i<events.length; i++)
			 events[i] = cal_event_data(events[i]);
		document.getElementById('breaks').value = JSON.stringify(events);
		document.getElementById('submit_form').submit();
	});
});
</script>

<style>

.fc-header, .fc-agenda-allday, .termin .fc-event-time {
	display: none;
}

.busy {
	background-color: gray;
	border: none;
	border-radius: 0px !important;
	margin-left: -3px;
	width: 118px !important;
}
.busy div {
	display: none;
}

.fc-event {
	border:0px !important;
	width: 100% ;
}
table.em-calendar {
width: 100%;
}

.fc-agenda-slots tr * {
	height: 10px !important;
	line-height: 10px;
}
</style>

@stop
