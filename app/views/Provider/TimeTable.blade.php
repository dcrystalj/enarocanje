@extends('layouts.default')

@section('title')
{{Lang::get('general.timetable')}}
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
{{ Button::link("/service/$id/breaks", Lang::get('general.breaks'), array('id' => 'breaks')) }}
&nbsp;&nbsp;
{{ Button::success_link("#", Lang::get('general.save'), array('id' => 'save')) }}
{{ Button::success_link("#", Lang::get('general.save.new'), array('id' => 'continue')) }}
</p>

<div id='calendar'></div>
<form id="submit_form" method="post" action="{{ route("breaks", array($id)) }}">
	<input type="hidden" name="events" id="events" />
</form>
<script>
@include('calendar.calendar_def')

fc_init({
	// Remove existing event
	eventDrop: function(event) {
		cal_clear_day(calendar, event);
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
	},

	// Show edit dialog
	eventClick: cal_show_dialog,

	// Load events
	eventSources: [
		{
			url: '{{ URL::action("MicroserviceApiController@getWorkinghours", array($id)) }}',
			type: 'GET',
			error: function() { alert("{{Lang::get('messages.fetchingError')}}") },
			editable: true,
		}
	],
});

$(function() {
	// Buttons
	$('#reset').click(function(e) {
		e.preventDefault();
		var events = calendar.fullCalendar('clientEvents');
		for(var i=0; i<events.length; i++)
			calendar.fullCalendar('removeEvents', events[i]._id);
	});
	$('#save,#continue').click(function(e) {
		e.preventDefault();
		var events = calendar.fullCalendar('clientEvents');
		var x = document.getElementById('events').value = JSON.stringify(events);
		alert(x);
		document.getElementById('submit_form').submit();
		return;
		cal_save(calendar, '{{ route("breaks", array($id)) }}', function(data) {
			bootbox.alert("Timetable saved.", function() {
				window.location = '{{ route("breaks", array($id) )}}';
			});
		});
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
</style>

@stop
