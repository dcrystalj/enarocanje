<dl class="dl-horizontal hidden-desktop" >
{{ Former::horizontal_open()->id('li') }}

<dt>Monday:</dt>
<dd>{{ Timepicker::from($errors,'00:00:00',1) }}</dd>
<dd>{{ Timepicker::to($errors,'00:00:00',2)}}</dd>
<dd>
	<div class="controls">
	{{ Button::link("#",'Same to friday',['id' => 'tofridaytime','class'=>'input-append']) }}
	</div>
</dd>

<dt>Tuesday:</dt> 
<dd>{{ Timepicker::from($errors,'00:00:00',3) }}</dd>
<dd>{{ Timepicker::to($errors,'00:00:00',4)}}</dd>


<dt>Wednesday:</dt>
<dd>{{ Timepicker::from($errors,'00:00:00',5) }}</dd>
<dd>{{ Timepicker::to($errors,'00:00:00',6) }}</dd>


<dt>Thursday:</dt>
<dd>{{ Timepicker::from($errors,'00:00:00',7) }}</dd>
<dd>{{ Timepicker::to($errors,'00:00:00',8)}}</dd>


<dt>Friday:</dt>
<dd>{{ Timepicker::from($errors,'00:00:00',9) }}</dd>
<dd>{{ Timepicker::to($errors,'00:00:00',10)}}</dd>


<dt>Saturday:</dt>
<dd>{{ Timepicker::from($errors,'00:00:00',11) }}</dd>
<dd>{{ Timepicker::to($errors,'00:00:00',12) }}</dd>


<dt>Sunday:</dt>

<dd>{{ Timepicker::from($errors,'00:00:00',13) }}</dd>
<dd>{{ Timepicker::to($errors,'00:00:00',14)}}</dd>

{{ Former::close() }}
</dl>
