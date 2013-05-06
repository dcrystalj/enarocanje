<div id="event-dialog" class="modal hide fade">
  <!-- dialog contents -->
  <div class="modal-body">
	From:&nbsp;
	<div class="timepicker input-append date">
	  <input data-format="hh:mm" type="time" placeholder="08:00" id="efrom"></input>
	  <span class="add-on">
		<i data-time-icon="icon-time">
		</i>
	  </span>
	</div>
<br />
	To: &nbsp;&nbsp;&nbsp;&nbsp;

	<div class="timepicker input-append date">
	  <input data-format="hh:mm" type="time" placeholder="16:00" id="eto"></input>
	  <span class="add-on">
		<i data-time-icon="icon-time">
		</i>
	  </span>
	</div>
  </div>
  <!-- dialog buttons -->
  <div class="modal-footer">
	<a href="#" class="b_cancel btn">Cancel</a>
	<a href="#" class="b_delete btn btn-danger">Delete</a>
	<a href="#" class="b_save btn btn-success">Submit</a>
  </div>
</div>
<script>
	$(function() {
		$('.timepicker').datetimepicker({
			pickDate: false,
			pickSeconds: false,
		});
	});
</script>
