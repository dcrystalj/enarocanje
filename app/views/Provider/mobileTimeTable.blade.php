<dl class="dl-horizontal hidden-desktop" >
{{ Former::horizontal_open()->id('li') }}

<dt>{{trans('general.mon')}}:</dt>
<dd>{{ Timepicker::from($errors,'00:00:00',1) }}</dd>
<dd>{{ Timepicker::to($errors,'00:00:00',2)}}</dd>


<dt>{{trans('general.tue')}}:</dt> 
<dd>{{ Timepicker::from($errors,'00:00:00',3) }}</dd>
<dd>{{ Timepicker::to($errors,'00:00:00',4)}}</dd>


<dt>{{trans('general.wed')}}:</dt>
<dd>{{ Timepicker::from($errors,'00:00:00',5) }}</dd>
<dd>{{ Timepicker::to($errors,'00:00:00',6) }}</dd>


<dt>{{trans('general.thu')}}:</dt>
<dd>{{ Timepicker::from($errors,'00:00:00',7) }}</dd>
<dd>{{ Timepicker::to($errors,'00:00:00',8)}}</dd>


<dt>{{trans('general.fri')}}:</dt>
<dd>{{ Timepicker::from($errors,'00:00:00',9) }}</dd>
<dd>{{ Timepicker::to($errors,'00:00:00',10)}}</dd>


<dt>{{trans('general.sat')}}:</dt>
<dd>{{ Timepicker::from($errors,'00:00:00',11) }}</dd>
<dd>{{ Timepicker::to($errors,'00:00:00',12) }}</dd>


<dt>{{trans('general.sun')}}:</dt>

<dd>{{ Timepicker::from($errors,'00:00:00',13) }}</dd>
<dd>{{ Timepicker::to($errors,'00:00:00',14)}}</dd>

{{ Former::close() }}
</dl>
