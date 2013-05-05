<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Welcome to e-commerce</h2>

		<div>
			Join us on e-commerce, click on this link and register:  {{ URL::to('provider/create', array($token)) }}
		</div>
	</body>
</html>