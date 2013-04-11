<!DOCTYPE Html>

<Html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="enarocanje">
	<meta name="author" content="TPO">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>
		@yield('title')
	</title>

	{{ Html::script('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js') }}
	{{ Html::script('http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js') }}
	
	{{ Html::style('bootstrap/css/bootstrap.min.css') }}
	{{ Html::style('bootstrap/css/bootstrap-responsive.min.css') }}
	{{ Html::style('css/style.css') }}

    @yield('assets')
	
</head>
<body>
	<header>
		<nav>
			<!-- using bootstrapper design -->
			<!--	['Provider settings',URL::to('provider/' . $user->id . '/edit'),Request::is('provider/' . $user->id . '/edit')], -->
			{{ Navigation::pills(
				Navigation::links([
					['Home', URL::to('home'), (Request::is('home') || Request::is('/'))],
					['Find', URL::to('find'), Request::is('find')],	
					['Provider registration',URL::to('provider/create'),Request::is('provider/create')],
					['User registration',URL::to('user/create'),Request::is('user/create')],
					['ManageServices',URL::to('ManageServices/create'),Request::is('ManageServices/create')],
					['Login',URL::to('app/login'),Request::is('app/login')],
					['Logout',URL::to('app/logout'),Request::is('app/logout')],
					['Profile',URL::to('profile'),Request::is('profile')],
					['Working Hours',URL::to('service/1/time'),Request::is('service/1/time')],
					['Reservation',URL::to('ureservation'),Request::is('ureservation')],
				])
			)}}
		</nav>
		<div>
			
		</div>
	</header>	
	
	<div class="container">		

		<h1>
			@yield('title')
		</h1>
		<div id="statusmessage" class="alert-warning alert" style="display:none;"></div>
		@if (isset($status))
		<p>{{ Alert::warning( $status) }}</p>
		@endif

		@if (isset($error))
		<p>{{ Alert::error( $error) }}</p>
		@endif

		@yield('content')

	</div>

	{{ Html::script("js/main.js") }}
	{{ Html::script("bootstrap/js/bootstrap.min.js") }}
	{{ Html::script('js/bootbox.min.js') }}
	{{ Html::script('js/sorttable.js') }}
	
</body>
</Html>
