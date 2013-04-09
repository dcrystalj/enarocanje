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
	alert(JSON.stringify(submit));
	$.post(url, {'events': JSON.stringify(submit)}, callback);
}

function cal_event_data(event) {
	return {
		start: d(event.start),
		end: d(event.end),
		title: event.title,
	};
}

function d(t) {
	var y = t.getFullYear();
	var M = t.getMonth()+1;
	var d = t.getDate();
	var h = t.getHours();
	var m = t.getMinutes();
	if(M < 10) M = '0'+M;
	if(d < 10) d = '0'+d;
	if(h < 10) h = '0'+h;
	if(m < 10) m = '0'+m;
	return y+'-'+M+'-'+d+' '+h+':'+m;
}
