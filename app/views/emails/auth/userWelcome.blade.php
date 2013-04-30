<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Registration confirmation</h2>

		<div>
			<p>Thank you for your registration. Please click the following link to complete your registration.</p>
			{{ URL::to('user/confirm', array($token)) }}
		</div>
	</body>
</html>