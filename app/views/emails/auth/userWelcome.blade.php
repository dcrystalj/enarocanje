<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>{{trans('general.registrationConfirmation')}}</h2>

		<div>
			<p>{{trans('messages.thankYouForRegistration')}}</p>
			{{ URL::to('user/confirm', array($token)) }}
			{{trans('messages.ignoreEmail')}}
		</div>
	</body>
</html>