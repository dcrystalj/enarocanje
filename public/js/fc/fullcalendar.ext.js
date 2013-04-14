var calendar;
function fc_init(opts, id) {
	if(typeof id == 'undefined')
		id='#calendar';
	calendar = $(id).fullCalendar($.extend(fc_defs, opts));
}
// Helper
function fc_insert(start, end, data)  {
	if(typeof data == 'undefined')
		data = {};
	calendar.fullCalendar('renderEvent',
						  $.extend({
							  title: 'Working day',
							  start: start,
							  end: end,
							  allDay: false,
						  }, data),
						  true // make the event "stick"
						 );
}
/*
Event:
    - fc event
    - date (== fcevent.start)
    - date of week [0-6] (==date.getDay())

Examples:
 cal_clear_day(calendar, 0);
 cal_clear_day(calendar, date);
 cal_clear_day(calendar, event);
*/
function cal_clear_day(cal, event) {
	var is_event = false;
	var start = event;
	if(typeof start['start'] !== 'undefined') {
		is_event=true;
		start = start.start;
	}
	if(typeof start['getDay'] !== 'undefined')
		start = start.getDay();

	var events = cal.fullCalendar('clientEvents');
	for(var i=0; i<events.length; i++) {
		if(events[i].start.getDay() == start && events[i] != event) {
			if(!events[i].disabled) {
				calendar.fullCalendar('removeEvents', events[i]._id);
			}
		}
	}
}

/*
Event:
    - event
    - [start, end]

Examples:
 cal_repair_event(calendar, [start, end]);
 cal_repair_event(calendar, event);
*/
function cal_repair_event(cal, event) {
	var start, end;
	if(typeof event[0] == 'undefined') {
		start = event.start;
		end = event.end;
	} else {
		start = event[0];
		end = event[0];
	}

	var events = calendar.fullCalendar('clientEvents');
	for(var i=0; i<events.length; i++) {
		if(events[i].start.getDay() == start.getDay()) {
			if(events[i].disabled) {
				// Set optimal start-end date
			}
		}
	}
}

function cal_show_dialog(event) {
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
}

/*
  Save selection.
*/
function cal_save(cal, url, callback, check) {
	var events = calendar.fullCalendar('clientEvents');
	var submit = [];
	for(var i=0; i<events.length; i++) {
		if(check) {
			if(check(events[i]))
				submit.push(cal_event_data(events[i]));
		} else {
			submit.push(cal_event_data(events[i]));
		}
	}
	$.post(url, {'events': JSON.stringify(submit)}, callback);
}

function cal_event_data(event) {
	return {
		start: getDate(event.start),
		end: getDate(event.end),
		title: event.title,
	};
}

function getHour(t) {
	var h = t.getHours();
	var m = t.getMinutes();
	if(h < 10) h = '0'+h;
	if(m < 10) m = '0'+m;
	return h+':'+m;
}
function getDate(t) {
	var y = t.getFullYear();
	var M = t.getMonth()+1;
	var d = t.getDate();
	if(M < 10) M = '0'+M;
	if(d < 10) d = '0'+d;
	return y+'-'+M+'-'+d+getHour(t);
}








//crystal.. =) ->
//----------------
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

	function fromTo(event){
		return event.start.getDate()+"-"+(event.start.getMonth()+1)+"-"+(event.start.getYear()+1900) + " from " + time(event.start) +" to "+time(event.end);
	}

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
