<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>{{trans('messages.welcomeToECommerce')}}</h2>

		<div>
			{{trans('messages.confirmEmail')}}: {{ URL::to('provider/confirm', array($token)) }}
			{{trans('messages.ignoreEmail')}}
		</div>
	</body>
</html>