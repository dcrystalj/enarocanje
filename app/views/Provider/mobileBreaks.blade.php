<dl class="dl-horizontal hidden-desktop" >
<div id="numofbreaks" style="diplay: hidden;">5</div>
<div id="breakfield">

<dt>{{trans('general.break1')}}</dt>
<dd>{{ Timepicker::from($errors,'00:00:00',1) }}</dd>
<dd>{{ Timepicker::to($errors,'00:00:00',2)}}</dd>

<dt>{{trans('general.break1')}}</dt>
<dd>{{ Timepicker::from($errors,'00:00:00',3) }}</dd>
<dd>{{ Timepicker::to($errors,'00:00:00',4)}}</dd>

</div>


{{ Button::link("#",trans('general.insert'),['id' => 'insertb']) }}

</dl>
<script>

$(function(){
	$('#insertb').click(function(e){
		e.preventDefault();
		var i = parseInt($('#numofbreaks').val(),10);
		$('#breakfield').append("<dt>Break "+i+"</dt><dd>"+insertFrom(i)+"</dd><dd>"+insertTo(i)+"</dd>");
	});
});

</script>