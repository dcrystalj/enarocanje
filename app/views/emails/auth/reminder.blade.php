<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>{{trans('general.resetPassword')}}</h2>

		<div>
			{{trans('general.toResetPassword')}}: {{ URL::action('AppController@getResetpassword', array($token)) }}
		</div>
	</body>
</html>