@extends('layouts.default')

@section('title')
{{trans('general.selectCalendar')}}
@stop

@section('content')
<ul>
<?php foreach($calendars as $id=>$data): ?>
	<li><a href="<?= URL::current().'?calendar_id='.urlencode($id) ?>"><?= $data['summary'] ?></a></li>
<?php endforeach; ?>
</ul>
@stop
