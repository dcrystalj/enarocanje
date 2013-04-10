@extends('layouts.default')

@section('title')
Breaks
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
{{ Button::link("/service/$id/time", 'Back') }}
&nbsp;&nbsp;
{{ Button::success_link("#",'Save',array('id' => 'save')) }}
</p>

<div id='calendar'></div>
	<script>

	function isOverlapping(start, end){
		var array = calendar.fullCalendar('clientEvents');
		for(i in array){
			if(array[i].start != start && array[i].end != end){ 
			if(	start >= array[i].start && start < array[i].end && end > array[i].start && end <= array[i].end ||
				start >= array[i].start && start < array[i].end && end > array[i].start && end >= array[i].end ||
				start < array[i].start && start < array[i].end && end > array[i].start && end < array[i].end ||
				start < array[i].start && start < array[i].end && end > array[i].start && end > array[i].end ){
					return true;
			}}
		}
		return false;
	};

	function time(str){
		var currentTime = str;
		var hours = currentTime.getHours()
		var minutes = currentTime.getMinutes()
		if (minutes < 10){
		minutes = "0" + minutes
		}
		return hours + ":" + minutes + " ";

	};

	var calendar;
	var before_resize;
	$(document).ready(function() {
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		calendar = $('#calendar').fullCalendar({
			minTime: 6,
			maxTime: 21,
			axisFormat: 'HH:mm',
			columnFormat: {
				week: 'ddd', // Mon 9/7
			},
			selectable: true,
			unselectAuto: true,
			selectHelper: true,
			defaultView: 'agendaWeek',
			firstDay: 1,
			eventAfterRender: function(event, element, view) {  
			  var width = $(element).width()+8;
			  $(element).css('width', width + 'px');
			},
			/* eventResizeStart: function(event, jsEvent, ui, view) { */
			/* 	before_resize = event.end; */
			/* }, */
			/* eventResizeStop: function(event, jsEvent, ui, view) { */
			/* 	if (isOverlapping(event.start, event.end)) { */
			/* 		alert('no'); */
			/*  		$(".alert").alert("Timetable overlapps"); */
			/* 		event.end = before_resize; */
			/*  	} */
			/* 	alert('yes'); */
			/* }, */
			eventDrop: function(event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view) {
			
			 	if (isOverlapping(event.start, event.end)) {
			 		$(".alert").alert("Timetable overlapps");
			 		revertFunc();
			 		// calendar.fullCalendar('removeEvents',event.id);
			 	}
			},

			select: function(start, end, allDay) {
				//cal_clear_day(calendar, start);
				
				calendar.fullCalendar('unselect');

				function insert(start, end)  {
					calendar.fullCalendar('renderEvent',
										  {
											  title: 'Your choice: \nfrom  '+time(start)+' to '+time(end),
											  start: start,
											  end: end,
											  allDay: false,
											  editable: true,
										  },
										  true // make the event "stick"
										 );
					
				};
				if(!isOverlapping(start,end)){
					insert(start, end);
				}
				
			},
			eventClick: function(event, jsEvent, view) {
				if(!event.editable) return;
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
			//editable: true,
			slotMinutes: 15,
			eventSources: [
				{
					url: 'http://localhost:8000/microserviceapi/breaks/<?= $id ?>',
					type: 'GET',
					error: function() {
						alert('there was an error while fetching events!');
					},
					editable: true,
					//color: rgba(192,192,192, 0.6) // a non-ajax option
				},
				{
					url: 'http://localhost:8000/microserviceapi/timetable/<?= $id ?>',
					type: 'GET',
					error: function() {
						alert('there was an error while fetching events!');
					},
					editable: false,
					//color: rgba(192,192,192, 0.6) // a non-ajax option
					color: "rgba(192,192,192, 0.5)",
					className: "termin"
				}
			]
		});

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
			cal_save(calendar, '/service/<?= $id ?>/breaks/submit', function(d) {
				bootbox.alert("Breaks saved.");
			}, function(ev) {
				return ev.editable;
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
