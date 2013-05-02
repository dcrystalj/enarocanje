<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Reservation information</h2>

		<div>
			You have just made reservation on 
			{{ $reservation->date }} at
			{{ $reservation->from }} for 
			{{ $reservation->microservice->name }}.
		</div>
	</body>
</html>