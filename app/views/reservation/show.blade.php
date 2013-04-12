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
<p>{{ Button::danger_link('/service/123/breaks','Delete reservation',array('id' => 'delete')) }}</p>

<div id='calendar'></div>
	<script>

	function isOverlapping(start, end){
		var array = calendar.fullCalendar('clientEvents');
		for(i in array){
			if(array[i].start != start && array[i].end != end){ 
			if(	start >= array[i].start && start < array[i].end && end > array[i].start && end <= array[i].end ||
				start >= array[i].start && start < array[i].end && end > array[i].start && end >= array[i].end ||
				start < array[i].start && start < array[i].end && end > array[i].start && end < array[i].end ||
				start < array[i].start && start < array[i].end && end >= array[i].start && end >= array[i].end ){
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

	function countClientEvents(){
			return calendar.fullCalendar('clientEvents',function(e){
				return !e.test && e.id!=-5;}).length;

	};

	var calendar;
	var defaultLength = 45;
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
			disableResizing: true,
			minTime: 6,
			maxTime: 21,
			firstDay: 1,
			axisFormat: 'HH:mm',
			eventAfterRender: function(event, element, view) {  
			  var width = $(element).width()+8;
			  $(element).css('width', width + 'px').css('font-size',10).css('line-height',1).css('padding-top','2px');
			},
			eventDrop: function(event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view) {
				event.title = 'Your choice: \nfrom  '+time(event.start)+' to '+time(event.end);
			 	if (isOverlapping(event.start, event.end)) {
			 		//$(".alert").alert("Timetable overlapps");
			 		revertFunc();
			 		
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
											  editable: true
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
				{
					url: 'http://localhost:8000/microserviceapi/timetable/4',
					type: 'GET',
					error: function() {
						alert('there was an error while fetching events!');
					},
					editable: false,
					color: "rgba(192,192,192, 0.5)",
					className: "termin"
				},
				{
					url: 'http://localhost:8000/microserviceapi/breaks/1',
					type: 'GET',
					error: function() {
						alert('there was an error while fetching events!');
					},
					editable: false,
					color: "rgba(192,192,192, 0.5)",
					className: "termin"
				},
				{
					url: 'http://localhost:8000/microserviceapi/usertimetable/4',
					type: 'GET',
					editable: false,
					//color: rgba(192,192,192, 0.6) // a non-ajax option
					color: "red",
					test: "test"
				}

		    ],
		    //check if data has been fetched
		    loading: function(bool) {
		    	//if client has'nt already made reservation hide delete button
				if(!bool && countClientEvents()==0)
				{
					$('#delete').hide();
				}
		    }, 
			
		});
	
		
		// Buttons
		$('#reserve').click(function(e) {
			e.preventDefault();
			var allevents = calendar.fullCalendar( 'clientEvents',-5);

			if(countClientEvents()){
				bootbox.alert("You have already made reservation. Please delete it first." + countClientEvents());
				return;
			}

			bootbox.confirm(
				"Are you sure you want to make reservation on " + allevents[0].start.getDate()+"-"+(allevents[0].start.getMonth()+1)+"-"+(allevents[0].start.getYear()+1900) + " from " + time(allevents[0].start) +" to "+time(allevents[0].end)+" ?", function(result) {
		  	 	if(result){
					var submit = cal_event_data(allevents[0]);
					$.post('http://localhost:8000/microserviceapi/reservation/4', {'event': JSON.stringify(submit)}, function(){
							window.location.reload();
						}
					);

		  	 	}
				return;
			});			
			
		});

		$('#delete').click(function(e) {
			e.preventDefault();
			var allevents = calendar.fullCalendar( 'clientEvents',function(e){
				return !e.test;
			});

			bootbox.confirm(
				"Are you sure you want to delete reservation on " + allevents[0].start.getDate()+"-"+(allevents[0].start.getMonth()+1)+"-"+(allevents[0].start.getYear()+1900) + " from " + time(allevents[0].start) +" to "+time(allevents[0].end)+" ?", function(result) {
		  	 	if(result){
					$.post('http://localhost:8000/microserviceapi/deletereservation/4', {'event': allevents[0].id}, function(e){
						e = JSON.parse(e);
						$('#statusmessage').text(e.text).show();
						if(e.success){
							calendar.fullCalendar('removeEvents', allevents[0].id);
						}
					});
		  	 	}
				return;
			});			
			
		});


	});
	</script>

<style>

.fc-agenda-allday, .fc-event-time{
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
