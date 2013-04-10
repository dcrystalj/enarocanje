<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Set Password</h2>

		<div>
			To set your new password, complete this form: {{ URL::to('user/confirm', array($token)) }}.
		</div>
	</body>
</html>