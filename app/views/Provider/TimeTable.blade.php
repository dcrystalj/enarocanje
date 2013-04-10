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
<div id="event-dialog" class="modal hide fade">
  <!-- dialog contents -->
  <div class="modal-body">
	  From: <input type="time" placeholder="08:00" id="efrom" /><br />
	  To: &nbsp;&nbsp;&nbsp;&nbsp;<input type="time" placeholder="16:00" id="eto" />
  </div>
  <!-- dialog buttons -->
	<div class="modal-footer">
	<a href="#" class="b_cancel btn">Cancel</a>
	  <a href="#" class="b_delete btn btn-danger">Delete</a>
	  <a href="#" class="b_save btn btn-success">Submit</a>
	</div>
</div>

<p>
{{ Button::danger_link('#','Reset',array('id' => 'reset')) }}
&nbsp;&nbsp;
{{ Button::link("/service/$id/breaks", 'Breaks', array('id' => 'breaks')) }}
&nbsp;&nbsp;
{{ Button::success_link("#", 'Save', array('id' => 'save')) }}
</p>

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
				$('#efrom').val(getHour(event.start));
				$('#eto').val(getHour(event.end));
				$('#event-dialog').modal({
					backdrop: 'static',
					keyboard: true,
					show: true,
				});
				$('#event-dialog a.b_delete').click(function() {
					calendar.fullCalendar('removeEvents', event._id);
					$('#event-dialog').modal('hide');
				});
				$('#event-dialog a.b_cancel').click(function() {
					$('#event-dialog').modal('hide');
				});
				$('#event-dialog a.b_save').click(function() {
					var from = $('#efrom').val().split(':');
					var to = $('#eto').val().split(':');
					event.start.setHours(parseInt(from[0], 10));
					event.start.setMinutes(parseInt(from[1], 10));
					event.end.setHours(parseInt(to[0], 10));
					event.end.setMinutes(parseInt(to[1], 10));
					calendar.fullCalendar('updateEvent', event);
					$('#event-dialog').modal('hide');
				});
				$('#event-dialog').on('hide', function() {
					$('#event-dialog').off('click');
				});
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
		$('#reset').click(function(e) {
			e.preventDefault();
			var events = calendar.fullCalendar('clientEvents');
			for(var i=0; i<events.length; i++)
				calendar.fullCalendar('removeEvents', events[i]._id);
			first = true;
		});
		$('#save').click(function(e) {
			e.preventDefault();
			cal_save(calendar, "/service/<?=$id ?>/time/submit", function(data) {
				window.location = "/service/<?=$id ?>/breaks";
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
