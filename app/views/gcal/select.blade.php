@extends('layouts.default')

@section('title')
Select calendar
@stop

@section('content')
<ul>
<?php foreach($calendars as $id=>$data): ?>
	<li><a href="<?= URL::full().'?calendar_id='.urlencode($id) ?>"><?= $data['summary'] ?></a></li>
<?php endforeach; ?>
</ul>
@stop
