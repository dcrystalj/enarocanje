@extends('layouts.default')

@section('title')
 {{ trans('general.reservation') }}
@stop

@section('assets')
{{ Html2::style('css/fc/fullcalendar.css') }}
{{-- Html2::style('css/fc/fullcalendar.print.css') --}}
{{ Html2::script('js/fc/fullcalendar.js') }}
{{ Html2::script('js/fc/fullcalendar.ext.js') }}
@stop

@section('content')
@include('calendar.calendar_register')

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

		
		event.title = "{{trans('messages.yourChoice')}} : {{trans('general.from')}} " +time(event.start)+' {{trans('general.to')}} '+time(event.end);

		if (isOverlapping(event.start, event.end)) { 
			revertFunc();
			event.title = "{{trans('messages.yourChoice')}} {{trans('general.from')}} " +time(event.start)+' {{trans("general.to")}} '+time(event.end);
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
				title: "{{trans('messages.yourChoice')}} {{trans("general.from")}} " +time(start)+' {{trans("general.to")}} '+time(end),
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
			url: '{{ URL::action("MicroserviceApiController@getAbsences", array($mac)) }}',
			type: 'GET',
			error: cal_error,
			editable: false,
			color: "rgba(192,192,192, 0.5)",
			className: "termin"
		},
		{			
			url: '{{ URL::action("MicroserviceApiController@getAllreservation", array($mic)) }}',
			type: 'GET',
			error: cal_error,
			editable: false,
			color: "red"
		}
		
	],
	//check if data has been fetched
	loading: function(bool) {
		//if client hasnt already made reservation, then hide delete button
		if(!bool )
		{
			if(countClientEvents()==0) $('#delete').hide();
			mergeOverlapping();
		}
	}, 
	
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
