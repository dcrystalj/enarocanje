<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>{{trans('messages.welcomeToECommerce')}}</h2>

		<div>
			{{trans('messages.joinUs')}}:  {{ URL::to('provider/create?code='.$token) }}
		</div>
	</body>
</html>