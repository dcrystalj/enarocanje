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

<?php 

function timeToMinutes($time){
	list($hours, $minutes, $sec) = explode(':',$time); 
	$min = intval($hours) * 60 + intval($minutes); 
	return $min==0 ? 30 : $min;
}

$leng =  timeToMinutes(MicroService::find($mic)->length)

?>

<p>{{ Button::success_link('#','Reserve',array('id' => 'reserve')) }}</p>
<p>{{ Button::link(URL::current().'?gcal=1','Show google events') }}</p>
@if($reservation)
<p>{{ Button::link(URL::to('/google/export/reservations'), Lang::get('general.exportReservations')) }}</p>
@endif


<div id='calendar'></div>

<script>
@include('calendar.calendar_def')
var defaultLength = '{{ $leng }}';
fc_init({
	disableResizing: true,
	eventAfterRender: function(event, element, view) {
		var width = $(element).width()+12;
		$(element).css('width', width + 'px')
			.css('margin-left', '-2px')
			.css('font-size',10)
			.css('line-height',1)
			.css('padding-top','2px');

		//button show red
		
	},

	eventDrop: function(event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view) {

		if (isOverlapping(event.start, event.end)) { 
			revertFunc();
		}

		event.title = '{{ ($leng > 29) ? "Your choice: \\n" : ""}} from  '+time(event.start)+' to '+time(event.end);
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
				title: '{{ ($leng > 29) ? "Your choice: \\n" : ""}} from'+time(start)+' to '+time(end),
				eventType: 'reservation',
			});
		}
	},
	eventClick: function(event, jsEvent, view) {
		calendar.fullCalendar('removeEvents', -1);
		
		//delete reservation
		if(event.eventType == 'reservation'){
			
			if(event.start < new Date()){
				bootbox.alert("Cannot delete reservations on past days.");
				return;
			}

			bootbox.confirm(
			"Are you sure you want to delete reservation on " + fromTo(event) +" ?", function(result) {
		  	 	if(result){
					$.post('{{ URL::action("MicroserviceApiController@postDeletereservation", array($mic)) }}/'+event.id, {'event': event.id}, function(e){
						e = JSON.parse(e);
						$('#statusmessage').text(e.text).show();
						if(e.success){
							calendar.fullCalendar('removeEvents', function(e) {
								return e == event;
							});
						}
					});
		  	 	}
				return;
			});	
		}
	},
	eventDragStart: function( event, jsEvent, ui, view ) { 
		if(event.eventType == "reservation"){
			return false;
		}
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
			url: '{{ URL::action("MicroserviceApiController@getAbsences", array($mac)) }}',
			type: 'GET',
			error: cal_error,
			editable: false,
			color: "rgba(192,192,192, 0.5)",
			className: "termin"
		},
		@if(false)
		{			
			url: '{{ URL::action("MicroserviceApiController@getUsertimetable", array($mic)) }}',
			@if(Auth::check())
			error: 'cal_error',
			@endif
			type: 'GET',
			editable: false,
			color: "red",
		},
		@endif
		@if($calendar_id)
		{	
		  url: '{{ URL::action("GCal@getEvents", array($calendar_id)) }}',
				type: 'GET',
				error: cal_error,
				editable: false,
				color: "rgba(192,192,192, 0.5)",
				className: "termin"
				},
		@endif
	],
	@if($reservation)
	events: [<?php // Show reservation
		print json_encode(array_merge($reservation, array(
			'color' => 'red',
			'editable' => false,
		)));
	?>],
	@endif
	//check if data has been fetched
	loading: function(bool) {
		//if client hasnt already made reservation, then hide delete button
		if(!bool )
		{
			if(countClientEvents()>0) $('#delete').show();
			mergeOverlapping();
		}
	}, 
	
});
	
$(function() {	

	// Buttons
	$('#reserve').click(function(e) {
		e.preventDefault();
		var allevents = calendar.fullCalendar('clientEvents', -1);

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
						var submit =  {	
							start: getDate(allevents[0].start),
							end: getDate(allevents[0].end),
							title: allevents[0].title,
							data:{	
								'name' : $('#name').val(),
								'mail' : $('#mail').val(),
								'telephone': $('#telephone').val()
							}
						}

					$.post('{{ URL::action("MicroserviceApiController@postRegistration", array($mic)) }}' ,{'event': JSON.stringify(submit)} ,function(e){
						var js = JSON.parse(e);
						$('#statusmessage').text(js.text).show();
						if (js.success){
							calendar.fullCalendar('removeEvents', -1);
							calendar.fullCalendar( 'refetchEvents' );
							calendar.fullCalendar( 'rerenderEvents' );
							$('#delete').show();					
						}
						$('#event-dialog').modal('hide');
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
							calendar.fullCalendar('removeEvents', -1);
							calendar.fullCalendar( 'refetchEvents' );
							calendar.fullCalendar( 'rerenderEvents' );
							$('#delete').show();
						}
						$('#event-dialog').modal('hide');					
					});
		  		}
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

#delete{
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
