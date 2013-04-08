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
<style> 
.fc-event, .fc-event-vert, .fc-event-draggable, .fc-event-start, .fc-event-end, .ui-draggable, .ui-resizable {
	background	: rgba(192,192,192, 0.6) !important;
}
.fc-event-time {
	display: none;
}
</style>
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
				
			},
			select: function(start, end, allDay) {
				//cal_clear_day(calendar, start);
				calendar.fullCalendar('unselect');

				// Helper
				function insert(start, end)  {
					calendar.fullCalendar('renderEvent',
										  {
											  title: 'Working day',
											  start: start,
											  end: end,
											  allDay: false,
										  },
										  true // make the event "stick"
										 );
				}

				 insert(start, end);
			},
			eventClick: function(event, jsEvent, view) {
				calendar.fullCalendar('removeEvents', [event._id]);
			},
			editable: true,
			slotMinutes: 15,
			eventSources: [

        // your event source
        {
            url: 'http://localhost:8000/microserviceapi/timetable/4',
            type: 'GET',
            error: function() {
                alert('there was an error while fetching events!');
            },
            
            textColor: 'grey' // a non-ajax option
        }

        // any other sources...

    ]
		});

		// Buttons
		$('#clear_callendar').click(function(e) {
			e.preventDefault();
			
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
