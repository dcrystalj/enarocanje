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
<p>{{ Button::success_link('/service/123/breaks','Reserve',array('id' => 'reserve')) }}</p>

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
	var defaultLength = 45;
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
			unselectAuto: true,
			selectHelper: true,
			defaultView: 'agendaWeek',
			firstDay: 1,
			disableResizing: true,
			eventAfterRender: function(event, element, view) {  
			  var width = $(element).width()+8;
			  $(element).css('width', width + 'px');
			},
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
				calendar.fullCalendar('removeEvents', -5);
				// Helper
				end = new Date(start);
        		end.setMinutes(start.getMinutes() + defaultLength);

				function insert(start, end)  {
					calendar.fullCalendar('renderEvent',
										  {
										  	  id: '-5',
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
				calendar.fullCalendar('removeEvents', function(event){
					return event.editable;
				});
			},
			//editable: true,
			slotMinutes: 15,
			eventSources: [

        // when not working
        {
            url: 'http://localhost:8000/microserviceapi/timetable/4',
            type: 'GET',
            error: function() {
                alert('there was an error while fetching events!');
            },
            editable: false,
            //color: rgba(192,192,192, 0.6) // a non-ajax option
            color: "rgba(192,192,192, 0.5)",
            className: "termin"
        }

        // any other sources...

    ]
		});

		// Buttons
		$('#reserve').click(function(e) {
			e.preventDefault();
			//var allevents = calendar.fullCalendar( 'clientEvents' ,-5 );

			 bootbox.confirm("Are you sure you want to make reservation on ? ", function(result) {
			   return
			}); 
			
		});
	});
	</script>

<style>

.fc-header, .fc-agenda-allday, .fc-event-time{
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
</style>

@stop
