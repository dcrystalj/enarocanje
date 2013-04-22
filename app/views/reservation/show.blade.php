@extends('layouts.default')

@section('title')
Reservation
@stop

@section('assets')
{{ Html::style('css/fc/fullcalendar.css') }}
{{-- Html::style('css/fc/fullcalendar.print.css') --}}
{{ Html::script('js/fc/fullcalendar.js') }}
{{ Html::script('js/fc/fullcalendar.ext.js') }}
@stop

@section('content')
@include('calendar.calendar_register')

<p>{{ Button::success_link('/service/123/breaks','Reserve',array('id' => 'reserve')) }}</p>
<p>{{ Button::danger_link('/service/123/breaks','Delete reservation',array('id' => 'delete')) }}</p>

<div id='calendar'></div>

<script>
@include('calendar.calendar_def')
var defaultLength = '{{ MicroService::find($mic)->first()->length }}';
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

		if (isOverlapping(event.start, event.end)) { 
			revertFunc();
			event.title = 'Your choice: \nfrom  '+time(event.start)+' to '+time(event.end);
		}
	},
	select: function(start, end, allDay) {
		//cal_clear_day(calendar, start);
				
		calendar.fullCalendar('unselect');
		calendar.fullCalendar('removeEvents', -1);
		// Helper
		end =  new Date(start.getTime() + defaultLength*60000);

		if(!isOverlapping(start,end)){
			fc_insert(start, end, {
				id: -1,
				title: 'Your choice: \nfrom  '+time(start)+' to '+time(end),
				eventType: 'reservation',
			});
		}
	},
	eventClick: function(event, jsEvent, view) {
		calendar.fullCalendar('removeEvents', -1);
	},
	eventSources: [
		{
			url: '{{ URL::action("MicroserviceApiController@getTimetable", array($mac)) }}',
			type: 'GET',
			error: cal_error,
			editable: false,
			color: "rgba(192,192,192, 0.5)",
			className: "termin"
		},
		{
			url: '{{ URL::action("MicroserviceApiController@getBreaks", array($mac)) }}',
			type: 'GET',
			error: cal_error,
			editable: false,
			color: "rgba(192,192,192, 0.5)",
			className: "termin"
		},
		{
			@if(Auth::check())
			
			url: '{{ URL::action("MicroserviceApiController@getUsertimetable", array($mic)) }}',
			error: 'cal_error',
			type: 'GET',
			editable: false,
			color: "red"
			
			@endif
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
		var allevents = calendar.fullCalendar('clientEvents', -1);

		if(countClientEvents()){
			bootbox.alert("You have already made reservation. Please delete it first." + countClientEvents());
			return;
		}

		bootbox.confirm("Are you sure you want to make reservation on " + fromTo(allevents[0]) +" ?", function(result) {

		  	if(result){	
		  		if(!'{{ Auth::check() }}'){
			  		$('#event-dialog').modal({
						backdrop: 'static',
						keyboard: true,
						show: true,
					});
					$('#event-dialog a.b_cancel').click(function() {
						$('#event-dialog').modal('hide');
					});
					$('#event-dialog a.b_save').click(function() {
						var submit =  {	start: getDate(allevents[0].start),
										end: getDate(allevents[0].end),
										title: allevents[0].title,
										data:{	'name' : $('#name').val(),
												'mail' : $('#mail').val()
										}}

						$.post('{{ URL::action("MicroserviceApiController@postRegistration", array($mic)) }}' ,{'event': JSON.stringify(submit)} ,function(e){
							var js = JSON.parse(e);
							$('#statusmessage').text(js.text).show();

							if (js.success){

								window.location.reload();
							}
							else{
								$('#event-dialog').modal('hide');
							}
						});

						
					});
					$('#event-dialog').on('hide', function() {
						$('#event-dialog').off('click');
					});		
		  		}
		  		else{
		  			var submit = cal_event_data(allevents[0]);
	  				$.post('{{ URL::action("MicroserviceApiController@postReservation", array($mic)) }}' ,{'event': JSON.stringify(submit)} ,function(e){
						var js = JSON.parse(e);
						$('#statusmessage').text(js.text).show();

						if (js.success){
							window.location.reload();
						}
						else{
							$('#event-dialog').modal('hide');
						}
					});
		  		}
		  	}
			return;
		});			
	});

	$('#delete').click(function(e) {
		e.preventDefault();
		var allevents = calendar.fullCalendar('clientEvents', function(e){
			return e.eventType=="reservation";
		});

		bootbox.confirm(
			"Are you sure you want to delete reservation on " + fromTo(allevents[0]) +" ?", function(result) {
		  	 	if(result){
					$.post('{{ URL::action("MicroserviceApiController@postDeletereservation", array($mic)) }}', {'event': allevents[0].id}, function(e){
						e = JSON.parse(e);
						$('#statusmessage').text(e.text).show();
						if(e.success){
							$('#delete').hide();
							calendar.fullCalendar('removeEvents', function(e) {
								return e.eventType == 'reservation';
							});
						}
					});
		  	 	}
				return;
			});			
	});
});
</script>

<style>

.fc-agenda-allday, .fc-event-time, .fc-agenda-gutter{
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
