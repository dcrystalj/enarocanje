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
<a href="/service/<?=$id ?>/breaks" id="insert_breaks">[Insert breaks]</a>
<a href="#" id="save">[Save]</a>
<div id='calendar'></div>
	<script>
	var calendar;
    var first = true;
	$(document).ready(function() {
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		calendar = $('#calendar').fullCalendar({
			minTime: 6,
			maxTime: 21,
			firstDay: 1,
			axisFormat: 'HH:mm',
			ignoreTimezone: false,
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
						for(var day=1; day<=7; day++) {
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
			eventSources: [
				{
					url: 'http://localhost:8000/microserviceapi/workinghours/<?= $id ?>',
					type: 'GET',
					error: function() { alert('there was an error while fetching events!'); },
					editable: true,
				}
			],
		});

		// Buttons
		$('#clear_callendar').click(function(e) {
			e.preventDefault();
			var events = calendar.fullCalendar('clientEvents');
			for(var i=0; i<events.length; i++)
				calendar.fullCalendar('removeEvents', events[i]._id);
			first = true;
		});
		// $('#insert_breaks').click(function(e) {
		// });
		$('#save').click(function(e) {
			cal_save(calendar, "/service/<?=$id ?>/time/submit", function(data) {
						alert("Timetable saved.")
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
</style>

@stop
