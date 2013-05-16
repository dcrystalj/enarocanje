<div id="event-dialog" class="modal hide fade">
  <!-- dialog contents -->
  <div class="modal-body">
  Enter your info:<br />
  {{Former::text('name')}}
  {{Former::email('mail')}}
  {{Former::text('telephone')}}
  </div>
  <!-- dialog buttons -->
  <div class="modal-footer">
  <a href="#" class="b_cancel btn">Cancel</a>
  <a href="#" class="b_save btn btn-success">Submit</a>
  </div>
</div>