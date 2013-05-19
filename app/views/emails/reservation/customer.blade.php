<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>{{trans('general.reservationInformation')}}</h2>

		<div>
			{{trans('messages.youMadeReservation')}} 
			{{ $date }} {{trans('general.at')}}
			{{ $from }} {{trans('general.for')}}
			{{ $name }}.
		</div>
	</body>
</html>