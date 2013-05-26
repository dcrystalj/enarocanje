<dl class="dl-horizontal hidden-desktop" >

<div id="breakfield">

<dl class="dl-horizontal hidden-desktop" >
{{-- Former::horizontal_open()->id('li') --}}

<div class="day">
<dt>Monday:</dt>
<div id="day1">
	<dd>{{ Timepicker::from($errors,'00:00:00','11') }}</dd>
	<dd>{{ Timepicker::to($errors,'00:00:00','12')}}</dd>
</div>
<dd>
	<div class="controls">
	{{ Button::link("#",'+',['id' => 'insert1','class'=>'input-append']) }}
	{{ Button::link("#",'-',['id' => 'remove1','class'=>'input-append']) }}
	</div>
</dd>
</div>

<div class="day">
<dt>Tuesday:</dt> 
<div id="day2">
	<dd>{{ Timepicker::from($errors,'00:00:00','21') }}</dd>
	<dd>{{ Timepicker::to($errors,'00:00:00','22')}}</dd>
</div>
<dd>
	<div class="controls">
	{{ Button::link("#",'+',['id' => 'insert2','class'=>'input-append']) }}
	{{ Button::link("#",'-',['id' => 'remove2','class'=>'input-append']) }}
	</div>
</dd>
</div>

<div class="day">
<dt>Wednesday:</dt> 
<div id="day3">
	<dd>{{ Timepicker::from($errors,'00:00:00','31') }}</dd>
	<dd>{{ Timepicker::to($errors,'00:00:00','32')}}</dd>
</div>
<dd>
	<div class="controls">
	{{ Button::link("#",'+',['id' => 'insert3','class'=>'input-append']) }}
	{{ Button::link("#",'-',['id' => 'remove3','class'=>'input-append']) }}
	</div>
</dd>
</div>

<div class="day">
<dt>Thursday:</dt> 
<div id="day4">
	<dd>{{ Timepicker::from($errors,'00:00:00','41') }}</dd>
	<dd>{{ Timepicker::to($errors,'00:00:00','42')}}</dd>
</div>
<dd>
	<div class="controls">
	{{ Button::link("#",'+',['id' => 'insert4','class'=>'input-append']) }}
	{{ Button::link("#",'-',['id' => 'remove4','class'=>'input-append']) }}
	</div>
</dd>
</div>

<div class="day">
<dt>Friday:</dt> 
<div id="day5">
	<dd>{{ Timepicker::from($errors,'00:00:00','51') }}</dd>
	<dd>{{ Timepicker::to($errors,'00:00:00','52')}}</dd>
</div>
<dd>
	<div class="controls">
	{{ Button::link("#",'+',['id' => 'insert5','class'=>'input-append']) }}
	{{ Button::link("#",'-',['id' => 'remove5','class'=>'input-append']) }}
	</div>
</dd>
</div>

<div class="day">
<dt>Saturday:</dt> 
<div id="day6">
	<dd>{{ Timepicker::from($errors,'00:00:00','61') }}</dd>
	<dd>{{ Timepicker::to($errors,'00:00:00','62')}}</dd>
</div>
<dd>
	<div class="controls">
	{{ Button::link("#",'+',['id' => 'insert6','class'=>'input-append']) }}
	{{ Button::link("#",'-',['id' => 'remove6','class'=>'input-append']) }}
	</div>
</dd>
</div>

<div class="day">
<dt>Sunday:</dt> 
<div id="day7">
	<dd>{{ Timepicker::from($errors,'00:00:00','71') }}</dd>
	<dd>{{ Timepicker::to($errors,'00:00:00','72')}}</dd>
</div>
<dd>
	<div class="controls">
	{{ Button::link("#",'+',['id' => 'insert7','class'=>'input-append']) }}
	{{ Button::link("#",'-',['id' => 'remove7','class'=>'input-append']) }}
	</div>
</dd>
</div>

{{-- Former::close() --}}

</dl>
</div>
</dl>


<script>

<<<<<<< HEAD
$(function(){
	$('#insertb').click(function(e){
		e.preventDefault();
		var i = parseInt($('#numofbreaks').val(),10);
		$('#breakfield').append("<dt>"+trans('general.break')+" "+i+"</dt><dd>"+insertFrom(i)+"</dd><dd>"+insertTo(i)+"</dd>");
	});
});
=======
>>>>>>> 2fd5049d47315505a7a0467283a11d320092a441


</script>

<style>
.day {
	margin-bottom: 15px;
}
</style>
