<div id="event-dialog" class="modal hide fade">
  <!-- dialog contents -->
  <div class="modal-body">
  Enter your info:<br />
  {{Former::open()->id('tempUserRegForm')}}
  {{Former::text(trans('general.name'))}}
  {{Former::email(trans('general.email'))}}
  {{Former::text(trans('general.telephone'))}}
  {{Former::actions()->button(Lang::get('general.submit'))->onclick("alert('neki')")}}
  {{Former::close()}}
  </div>
  <!-- dialog buttons -->
  <div class="modal-footer">
  <a href="#" class="b_cancel btn">Cancel</a>
  <a href="#" class="b_save btn btn-success">Submit</a>
  </div>
</div>