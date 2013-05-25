var calendar;
var removed = [];
var numofbreaks = new Array(1,1,1,1,1,1,1);

function fc_init(opts, id) {
        if(typeof id == 'undefined')
                id='#calendar';
        $(function() {
         calendar = $(id).fullCalendar($.extend(fc_defs, opts));
        });
}
// Helper
function fc_insert(start, end, data)  {
	if(typeof data == 'undefined')
		data = {};
	if(!data['eventType'])
		alert('Event type is missing!!!!');
	if(start < end)
		calendar.fullCalendar('renderEvent',
			  $.extend({
				  title: 'Working day',
				  start: start,
				  end: end,
				  allDay: false,
				  editable: true,
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
	if(typeof event.source.editable != 'undefined' && !event.source.editable) return;
	var begin = getHour(event.start);
	var end = getHour(event.end);
	$('#efrom').val(begin);
	$('#eto').val(end);
	setTimePicker(begin, end);
	$('#event-dialog').modal({
		backdrop: 'static',
		keyboard: true,
		show: true,
	});

	$('#event-dialog a.b_delete').click(function() {
		calendar.fullCalendar('removeEvents', event._id);
		$('#event-dialog').modal('hide');
		$('#event-dialog .btn').unbind();
		fillFields(calendar);
	});
	$('#event-dialog a.b_cancel').click(function() {
		$('#event-dialog').modal('hide');
		$('#event-dialog .btn').unbind();

		fillFields(calendar);
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
		$('#event-dialog .btn').unbind();

		fillFields(calendar);
	});
	$('#event-dialog').on('hide', function() {
		$('#event-dialog').off('click');

		fillFields(calendar);
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

function cal_error() {
	bootbox.dialog(trans('messages.fetchingError'), [{
		"label" : ":(",
		"class" : "btn-danger",
		}]);
}

function cal_event_data(event) {
	return {
	    start: getDate(event.start),
	    end: getDate(event.end),
	    title: event.title,
	    allDay: false,
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
	return y+'-'+M+'-'+d+' '+getHour(t);
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

function getOverlapping(event){
	var array = allWithoutRemoved();
	for(i in array){
		if( array[i] != event ){ 
		if(	event.start >= array[i].start && event.start < array[i].end && event.end > array[i].start && event.end <= array[i].end ||
			event.start >= array[i].start && event.start < array[i].end && event.end > array[i].start && event.end >= array[i].end ||
			event.start < array[i].start && event.start< array[i].end && event.end > array[i].start && event.end < array[i].end ||
			event.start < array[i].start && event.start< array[i].end && event.end >= array[i].start && event.end >= array[i].end ){
				return event;
		}}
	}
	return false;
};

function mergeOverlapping(){
	while(areConflicts()){
		var all = allWithoutRemoved();
		for(i in all){
			var conflict = getOverlapping(all[i]);
			if(conflict){
				if(conflict.start < all[i].start){
					if(conflict.end < all[i].end){
						conflict.end = all[i].end;					
					}
					remove(all[i]);
				}else{
					if(all[i].end < conflict.end){
						all[i].end = conflict.end;
					}
					remove(conflict);
				}
				break;
			}
		}
	}

}

function remove(event){
	calendar.fullCalendar('removeEvents',event.id);
	removed.push(event.id);
}
function allWithoutRemoved(){
	return calendar.fullCalendar('clientEvents',function(e){
		return removed.indexOf(e) == -1;
	});
}
function areConflicts(){
	var all = allWithoutRemoved();
	for(i in all){
		if(getOverlapping(all[i])){
			return true;
		}
	}
	return false;
}

//responsive
function fillFields(calendar){
	//clear filds
	for(i=1;i<=14;i++){
		$('#datetimepick'+i+' input').val('00:00');
	}

	var events = calendar.fullCalendar('clientEvents');
	var temp = []
	for(i=0; i<events.length; i++){
		temp[i] = cal_event_data(events[i]);
		day = new Date(temp[i].start).getDay();
		if (day==0) day=7;
		$('#datetimepick'+(day*2-1)+' input').val(getHour(new Date(temp[i].start)));
		$('#datetimepick'+day*2+' input').val(getHour(new Date(temp[i].end)));
	}
}
function newDate(s,i){
	var start = new Date();
	start.setYear('2013');
	start.setMonth('3');
	start.setDate(i);
	var test = 	s.substr(0,2);
	test = parseInt(test,10);
	start.setHours(parseInt(s.substr(0,2),10) || 0);
	start.setMinutes(parseInt(s.substr(3,2),10) || 0);
	return start;
}

function fillCalendar(calendar){
	var events = calendar.fullCalendar('clientEvents');
	for(var i=0; i<events.length; i++)
		calendar.fullCalendar('removeEvents', events[i]._id);

	for(i=1;i<=7;i++){
		var start 	= newDate($('#datetimepick'+(i*2-1)+' input').val(), i);
		var end 	= newDate($('#datetimepick'+(i*2)+' input').val(), i);
		fc_insert(start, end, {eventType: 'work'});
	}
}

function fillCalendarWithBreaks(calendar){
	var events = calendar.fullCalendar('clientEvents', function(e) {
		return e.editable !== false;
	});

	for(var i=0; i<events.length; i++)
		calendar.fullCalendar('removeEvents', events[i]._id);

	for(i=1;i<=7;i++){
		var j = 1;
		while( j <= numofbreaks[i-1]){
			var start 	= newDate($('#datetimepick'+i+''+j+' input').val(), i);
			var end 	= newDate($('#datetimepick'+i+''+(j+1)+' input').val(), i);
			
			if(!isOverlapping(start,end))
				fc_insert(start, end, {eventType: 'break'});

			j+=2;
		}
	}
}

function fillBreakFields(calendar){
	//clear filds
	for(var i=1;i<=7;i++){
		for(var j=1; j<=2; j++)
			$('#datetimepick'+i+''+j+' input').val('00:00');
	}

	var events = calendar.fullCalendar('clientEvents', function(e) {
		return e.eventType == 'break';
	});

	var temp = []
	for(i=0; i<events.length; i++){
		temp[i] = cal_event_data(events[i]);
		var day = new Date(temp[i].start).getDay();
		if (day==0) day=7;

		var num = numofbreaks[day-1];
		$('#datetimepick'+day+''+num+' input').val(getHour(new Date(temp[i].start)));
		$('#datetimepick'+day+''+(num+1)+' input').val(getHour(new Date(temp[i].end)));

		numofbreaks[day-1]+=2;
		insertBreakField(day);
	}
	
	//remove unnecessary fields
	for(var i=1; i<=7; i++){
		num = numofbreaks[i-1];
		if(num > 1){
			$('#datetimepick'+i+''+num).parent().parent().remove();
			$('#datetimepick'+i+''+(num+1)).parent().parent().remove();
			numofbreaks[i-1]-=2;
		}
	}	

}

function insertBreakField(day){
	var num = numofbreaks[day-1];
	$('#day'+day).append('<dd>'+insertFrom(day,num)+'</dd>');
	$('#day'+day).append('<dd>'+insertTo(day,(num+1))+'</dd>');
	$('#datetimepick'+day+''+num).datetimepicker({
	      language: 'pt-BR',
	      pickSeconds: false,
	      pickDate: false,
	      maskInput:false,
    });
    $('#datetimepick'+day+''+(num+1)).datetimepicker({
	      language: 'pt-BR',
	      pickSeconds: false,
	      pickDate: false,
	      maskInput:false,
    });
}


function insertFrom(i, j){
	var str = '<div class="control-group required"><label for="datetimepick'+i+j+'" class="control-label">From:</label><div class="controls">';
    str += '<div id="datetimepick'+i+j+'" class="input-append date dtp">';
	str += ' <input data-format="hh:mm" type="text" name="from" value="00:00" class="input-small">';
	str += '<span class="add-on">';
    str += '<i data-time-icon="icon-time" data-date-icon="icon-calendar" class="icon-time"></i>';
	str += '</span>';
    str += '</div></div>';
	str += '</div>';
	return str;
}

function insertTo(i, j){
	var str = '<div class="control-group required"><label for="datetimepick'+i+j+'" class="control-label">To:</label><div class="controls">';
    str += '<div id="datetimepick'+i+j+'" class="input-append date dtp">';
	str += ' <input data-format="hh:mm" type="text" name="to" value="00:00" class="input-small">';
	str += '<span class="add-on">';
    str += '<i data-time-icon="icon-time" data-date-icon="icon-calendar" class="icon-time"></i>';
	str += '</span>';
    str += '</div></div>';
	str += '</div>';
	return str;
}

$(function(){

	for (var i=1; i<=7; i++){

		//firstime
		for(var j=1; j<=2; j++) {
			$('#datetimepick'+i+''+j).datetimepicker({
			      language: 'pt-BR',
			      pickSeconds: false,
			      pickDate: false,
			      maskInput:false,
		    });
		}

		$('#insert'+i).click(function(e){
			i = e.target.id.substr(-1,10);
			e.preventDefault();
			numofbreaks[i-1]+=2;
			var breaks = numofbreaks[i-1];
			$('#day'+i).append("<dd>"+insertFrom(i,breaks)+"</dd><dd>"+insertTo(i,breaks+1)+"</dd>");
			
			for(var j=0; j<=1; j++) {
				$('#datetimepick'+i+''+(parseInt(breaks)+j)).datetimepicker({
			      language: 'pt-BR',
			      pickSeconds: false,
			      pickDate: false,
			      maskInput:false,
			   });
			}
		});

		$('#remove'+i).click(function(e){
			i = e.target.id.substr(-1,10);
			e.preventDefault();
			var breaks = numofbreaks[i-1];
			numofbreaks[i-1]-=2;
			$('#datetimepick'+i+''+(parseInt(breaks)+1)).parent().parent().remove();
			$('#datetimepick'+i+''+breaks).parent().parent().remove();
			
			
		});
	}
});

///////
function fromTo(event){
	//return (event.start.getYear()+1900)+"-"+(event.start.getMonth()+1)+"-"+event.start.getDate() + " from " + time(event.start) +" to "+time(event.end);
	return trans('general.fromTo',{y:(event.start.getYear()+1900),m:(event.start.getMonth()+1),d:event.start.getDate(),s:time(event.start),e:time(event.end)});
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
			return (e.eventType=='reservation' && e.id != -1);}).length;

};
