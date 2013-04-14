@extends('layouts.default')

@section('title')
Breaks
@stop

@section('assets')
{{ Html::style('css/fc/fullcalendar.css') }}
{{-- Html::style('css/fc/fullcalendar.print.css') --}}
{{ Html::script('js/fc/fullcalendar.js') }}
{{ Html::script('js/fc/fullcalendar.ext.js') }}
@stop

@section('content')
@include('calendar_dialog')

<p>
{{ Button::danger_link('#','Reset',array('id' => 'reset')) }}
&nbsp;&nbsp;
{{ Button::link("/service/$id/time", 'Back') }}
&nbsp;&nbsp;
{{ Button::success_link("#",'Save',array('id' => 'save')) }}
</p>

<div id='calendar'></div>
<script>
@include('calendar_def')	
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
			url: '{{ route("api_mic_breaks", array($id)) }}',
			type: 'GET',
			error: cal_error,
			editable: true,
		},
		{
			url: '{{ route("api_mic_timetable", array($id)) }}',
			type: 'GET',
			error: cal_error,
			editable: false,
			color: "rgba(192,192,192, 0.5)",
			className: "termin"
		}
	]
	});

$(function() {
	// Buttons
	$('#reset').click(function(e) {
		e.preventDefault();
		var events = calendar.fullCalendar('clientEvents');
		for(var i=0; i<events.length; i++)
			if(events[i].editable)
				calendar.fullCalendar('removeEvents', events[i]._id);
	});
	$('#save').click(function(e) {
		e.preventDefault();
		cal_save(calendar, '{{ route("breaks_submit", array($id)) }}', function(d) {
			bootbox.alert("Breaks saved.");
		}, function(ev) {
			return (ev.eventType == 'break');
		});
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
