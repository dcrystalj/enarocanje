<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>{{trans('general.reservationInformation')}}</h2>

		<div>
			{{trans('general.user')}} {{ $username }} ({{ $useremail }}) {{trans('messages.hasMadeReservation')}}
			{{ $date }} {{trans('general.at')}}
			{{ $from }} {{trans('general.for')}}
			{{ $name }}.
		</div>
	</body>
</html>