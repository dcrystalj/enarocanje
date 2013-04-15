<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Welcome to e-commerce</h2>

		<div>
			To confirm your email, complete this form: {{ URL::to('provider/confirm', array($token)) }}.
		</div>
	</body>
</html>