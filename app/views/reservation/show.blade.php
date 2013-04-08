@extends('layouts.default')

@section('title')
TimeTable
@stop

@section('assets')
{{ Html::style('css/fc/fullcalendar.css') }}
<!-- {{ Html::style('css/fc/fullcalendar.print.css') }} -->
{{ Html::script('js/fc/fullcalendar.js') }}
{{ Html::script('js/fc/fullcalendar.ext.js') }}
@stop

@section('content')
<a href="#" id="clear_callendar">[Clear]</a>
<a href="/service/123/breaks" id="insert_breaks">[Insert breaks]</a>
<div id='calendar'></div>
	<script>
	var calendar;
	$(document).ready(function() {
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		calendar = $('#calendar').fullCalendar({
			columnFormat: {
				week: 'ddd', // Mon 9/7
			},
			selectable: true,
			selectHelper: true,
			defaultView: 'agendaWeek',
			eventDrop: function(event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view) {
				cal_clear_day(calendar, event);
			},
			select: function(start, end, allDay) {
				cal_clear_day(calendar, start);
				calendar.fullCalendar('unselect');

				// Helper
				function insert(start, end)  {
					calendar.fullCalendar('renderEvent',
										  {
											  title: 'Working day',
											  start: start,
											  end: end,
											  allDay: allDay,
										  },
										  true // make the event "stick"
										 );
				}

				if(first) {
					start.setDate(start.getDate()-start.getDay()); // First day in week
					end.setDate(end.getDate()-end.getDay()); // Same day
					for(var day=0; day<7; day++) {
						var s = new Date(start.getTime()+1000*3600*24*day);
						var e = new Date(end.getTime()+1000*3600*24*day);
						insert(s, e);
					}
					first = false;
				} else {
					insert(start, end);
				}
			},
			eventClick: function(event, jsEvent, view) {
				var from = prompt("From").split(':');
				var to = prompt("To").split(':');
				event.start.setHours(parseInt(from[0]));
				if(from.length == 2)
					event.start.setMinutes(parseInt(from[1]));
				event.end.setHours(parseInt(to[0]));
				if(to.length == 2)
					event.end.setMinutes(parseInt(to[1]));
				calendar.fullCalendar('updateEvent', event);
			},
			editable: true,
			slotMinutes: 15,
			events: [
				{
					title: 'test',
					start: '2013-04-6 10:00:00',
					end: '2013-04-6 12:00:00',
					allDay: false,
					editable: false,
					className: 'busy',
					disabled: true,
				}
			]
		});

		// Buttons
		$('#clear_callendar').click(function(e) {
			e.preventDefault();
			var events = calendar.fullCalendar('clientEvents');
			for(var i=0; i<events.length; i++)
				calendar.fullCalendar('removeEvents', events[i]._id);
			first = true;
		});
		$('#insert_breaks').click(function(e) {
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
	width: 118px !important;
}
.busy div {
	display: none;
}
</style>

@stop
