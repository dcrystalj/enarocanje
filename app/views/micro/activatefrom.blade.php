<div id="event-dialog" class="modal hide fade">
        <!-- dialog contents -->
  <div class="modal-body">
    <span id="spanfrom">From:</span>
    <input type="date"
          value="{{ date('Y-m-d',strtotime('now')) }}" 
          id="efrom" 
          min="{{ date('Y-m-d',strtotime('now')) }}"
    />

  </div>
          <!-- dialog buttons -->
  <div class="modal-footer">
      <a href="#" class="b_cancel btn">Cancel</a>
      <a href="#" class="b_save btn btn-success">Submit</a>
  </div>
</div>