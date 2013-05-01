<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Reservation information</h2>

		<div>
			User {{ $user->name }} ({{ $user->email }}) have just made reservation on 
			{{ $reservation->date }} at
			{{ $reservation->from }} for 
			{{ $reservation->microservice->name }}.
		</div>
	</body>
</html>