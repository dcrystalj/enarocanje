<div id="event-dialog" class="modal hide fade">
  <!-- dialog contents -->
  <div class="modal-body">
	{{trans('general.from')}}:&nbsp;
	<div id="tp1" class="timepicker input-append date">
	  <input data-format="hh:mm" type="time" placeholder="08:00" id="efrom"></input>
	  <span class="add-on">
		<i data-time-icon="icon-time">
		</i>
	  </span>
	</div>
<br />
	{{trans('general.to')}}:&nbsp;

	<div id="tp2" class="timepicker input-append date">
	  <input data-format="hh:mm" type="time" placeholder="16:00" id="eto"></input>
	  <span class="add-on">
		<i data-time-icon="icon-time">
		</i>
	  </span>
	</div>
  </div>
  <!-- dialog buttons -->
  <div class="modal-footer">
	<a href="#" class="b_cancel btn">{{trans('general.cancel')}}</a>
	<a href="#" class="b_delete btn btn-danger">{{trans('general.delete')}}</a>
	<a href="#" class="b_save btn btn-success">{{trans('general.submit')}}</a>
  </div>
</div>
<script>
	$(function() {
		$('.timepicker').datetimepicker({
			pickDate: false,
			pickSeconds: false,
		});
	});
	function setTimePicker(from, to) {
		from = from.split(/:/);
		to = to.split(/:/);
		var tp1 = $('#tp1').data('datetimepicker');
		var tp2 = $('#tp2').data('datetimepicker');
		tp1.setLocalDate(new Date(0, 0, 0, from[0], from[1]));
		tp2.setLocalDate(new Date(0, 0, 0, to[0], to[1]));
	}
</script>
