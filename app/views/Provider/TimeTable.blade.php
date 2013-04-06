@extends('layouts.default')

@section('title')
TimeTable
@stop

@section('assets')
{{ Html::style('css/fc/fullcalendar.css') }}
<!-- {{ Html::style('css/fc/fullcalendar.print.css') }} -->
{{ Html::script('js/fc/fullcalendar.js') }}
@stop

@section('content')
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
			header: {
				left: '',
				center: 'title',
				right: '',
			},
			selectable: true,
			selectHelper: true,
			defaultView: 'agendaWeek',
			date: '2',
			select: function(start, end, allDay) {
				// Check this day
				var events = calendar.fullCalendar('clientEvents');
				for(var i=0; i<events.length; i++) {
					if(events[i].start.getDay() == start.getDay()) {
						if(events[i].disabled) {
							// Preveri ure - premakni/ne-dodaj
						} else {
							calendar.fullCalendar('removeEvents', events[i]._id);
						}
					}
				}

				calendar.fullCalendar('unselect');
				if(first) {
					start.setDate(start.getDate()-start.getDay()); // First day in week
					end.setDate(end.getDate()-end.getDay()); // Same day
					for(var day=0; day<7; day++) {
						var s = new Date(start.getTime()+1000*3600*24*day);
						var e = new Date(end.getTime()+1000*3600*24*day);

						calendar.fullCalendar('renderEvent',
											  {
												  title: 'Working day',
												  start: s,
												  end: e,
												  allDay: allDay,
											  },
											  true // make the event "stick"
											 );
					}
					first = false;
				} else {
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
					start: '2013-04-1 10:00:00',
					end: '2013-04-1 12:00:00',
					allDay: false,
					editable: false,
					className: 'busy',
					disabled: true,
				}
			]
		});
		function addCalButton(where, text, id, cb) {
			var my_button = '<span id="'+id+'" class="fc-button fc-button-month fc-state-default fc-corner-left fc-corner-right" unselectable="on">'+text+'</span>';
			var space = '<span class="fc-header-space"></span>';
			if(where == 'left')
				my_button = space+my_button;
			else if(where == 'right')
				my_button += space;

			$("td.fc-header-" + where).append(my_button);
			if(cb) $('#'+id).click(cb);
//			$("#" + id).button();
		}

		addCalButton("right", "Insert breaks", "insert_breaks");
		addCalButton("left", "Reset", "reset_callendar", function() {
			var events = calendar.fullCalendar('clientEvents');
			for(var i=0; i<events.length; i++)
				calendar.fullCalendar('removeEvents', events[i]._id);
			first = true;
		});

	});

</script>
<style>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		}

	#wrapper {
	width: 900px;
	   margin: 0 auto;
	}
	#calendar {
		}

	.fc-agenda-allday {
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