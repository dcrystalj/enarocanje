@extends('layouts.default')

@section('title')
TimeTable
@stop

@section('assets')
{{ Html::style('css/fc/fullcalendar.css') }}
{{-- Html::style('css/fc/fullcalendar.print.css') --}}
{{ Html::script('js/fc/fullcalendar.js') }}
{{ Html::script('js/fc/fullcalendar.ext.js') }}
@stop

@section('content')
{{ "macroservice : ".$mac }}
{{ "microservice : ".$mic }}
<p>{{ Button::success_link('/service/123/breaks','Reserve',array('id' => 'reserve')) }}</p>
<p>{{ Button::danger_link('/service/123/breaks','Delete reservation',array('id' => 'delete')) }}</p>

<div id='calendar'></div>
<script>
@include('calendar_def')
var defaultLength = 45;
fc_init({
	disableResizing: true,
	eventAfterRender: function(event, element, view) {
		var width = $(element).width()+12;
		$(element).css('width', width + 'px')
			.css('margin-left', '-2px')
			.css('font-size',10)
			.css('line-height',1)
			.css('padding-top','2px');
	},
	eventDrop: function(event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view) {
		event.title = 'Your choice: \nfrom  '+time(event.start)+' to '+time(event.end);
		if (isOverlapping(event.start, event.end)) { revertFunc();	}
	},
	select: function(start, end, allDay) {
		//cal_clear_day(calendar, start);
				
		calendar.fullCalendar('unselect');
		calendar.fullCalendar('removeEvents', -5);
		// Helper
		end = new Date(start);
        end.setMinutes(start.getMinutes() + defaultLength);

		if(!isOverlapping(start,end)){
			fc_insert(start, end, {
				id: -5,
				title: 'Your choice: \nfrom  '+time(start)+' to '+time(end),
			});
		}
	},
	eventClick: function(event, jsEvent, view) {
		calendar.fullCalendar('removeEvents', function(event){
			return event.editable;
		});
	},
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
		//if client hasnt already made reservation, then hide delete button
		if(!bool && countClientEvents()==0)
		{
			$('#delete').hide();
		}
	}, 
	
});
	
$(function() {		
		// Buttons
		$('#reserve').click(function(e) {
			e.preventDefault();
			var allevents = calendar.fullCalendar( 'clientEvents',-5);

			if(countClientEvents()){
				bootbox.alert("You have already made reservation. Please delete it first." + countClientEvents());
				return;
			}

			bootbox.confirm("Are you sure you want to make reservation on " + fromTo(allevents[0]) +" ?", function(result) {
		  	 	if(result){
					var submit = cal_event_data(allevents[0]);
					$.post('/microserviceapi/reservation/4', {'event': JSON.stringify(submit)}, function(){
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
				"Are you sure you want to delete reservation on " + fromTo(allevents[0]) +" ?", function(result) {
		  	 	if(result){
					$.post('/microserviceapi/deletereservation/4', {'event': allevents[0].id}, function(e){
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
