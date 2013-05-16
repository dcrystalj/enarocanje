<div id="event-dialog" class="modal hide fade">
  <!-- dialog contents -->
  <div class="modal-body">
  Enter your info:<br />
  {{Former::open(URL::route('CustomerReservation'))->id('tempUserRegForm')}}
  {{Former::text(trans('general.name'))}}
  {{Former::email('email',trans('general.email'))}}
  {{Former::text(trans('general.telephoneNumber'))}}
  {{Former::actions()->button(Lang::get('general.submit'))->onclick("checkEmail(event,'#tempUserRegForm')")}}
  {{Former::close()}}
  </div>
  <!-- dialog buttons -->
  <div class="modal-footer">
  <a href="#" class="b_cancel btn">Cancel</a>
  <a href="#" class="b_save btn btn-success">Submit</a>
  </div>
</div>