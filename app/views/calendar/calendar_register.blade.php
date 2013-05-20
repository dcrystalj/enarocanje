<div id="event-dialog" class="modal hide fade">
  <!-- dialog contents -->
  <div class="modal-body">
  {{trans('messages.enterInfo').':'}}<br />
  {{Former::open()->id('tempUserRegForm')}}
  {{Former::text('name',trans('general.name'))}}
  {{Former::email('email',trans('general.email'))}}
  {{Former::text('telephone',trans('general.telephoneNumber'))}}
  {{Former::close()}}
  </div>
  <!-- dialog buttons Cancel-->
  <div class="modal-footer">
  <a href="#" class="b_cancel btn">{{trans('general.cancel')}}</a>
  <a href="#" class="b_save btn btn-success">{{trans('general.submit')}}</a>
  </div>
</div>