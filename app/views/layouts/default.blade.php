<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="enarocanje">
	<meta name="author" content="TPO">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>
		@yield('title')
	</title>

	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js') }}
	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js') }}

	{{ HTML::style('bootstrap/css/bootstrap.min.css') }}
	{{ HTML::style('bootstrap/css/bootstrap-responsive.min.css') }}
	{{ HTML::style('css/style.css') }}
	
</head>
<body>
	<header>
		<nav>
			<ul class="nav nav-pills" >
				<li {{ (Request::is('home') || Request::is('/') ? 'class="active"' : '') }}>
					{{ HTML::to( URL::to('home'), 'Home') }}
				</li>
				<li {{ (Request::is('find') ? 'class="active"' : '') }}>
					{{ HTML::to( URL::to('find'), 'Find') }}
				</li>
				<li {{ (Request::is('registerP') ? 'class="active"' : '') }}>
					{{ HTML::to( URL::to('registerP'), 'Register') }}
				</li>

				<li {{ (Request::is('ProviderServiceSettings') ? 'class="active"' : '') }}>
					{{ HTML::to( URL::to('ProviderServiceSettings'), 'Settings') }}
				</li>
				<li {{ (Request::is('ManageServices') ? 'class="active"' : '') }}>
					{{ HTML::to( URL::to('ManageServices'), 'ManageServices') }}
				</li>

				@if ( Auth::check() )
					<li class="navbar-text">Logged in as {{ Auth::user()->fullName() }}</li>
					<li class="divider-vertical"></li>
					<li {{ (Request::is('account') ? 'class="active"' : '') }}>
						{{ HTML::to( URL::to('account'), 'Account') }}
					</li>
					<li>
						{{ HTML::to( URL::to('account/logout'), 'Logout' ) }}
					</li>
				@else
					<li {{ (Request::is('account/login') ? 'class="active"' : '') }}>
						{{ HTML::to( URL::to('account/login'), 'Login' ) }}
					</li>
				@endif

			</ul>

	</header>	
	
	<div class="container">		

		<h1>
			@yield('title')
		</h1>


		@yield('content')

	</div>

	{{ HTML::script("js/main.js") }}
	{{ HTML::script("bootstrap/js/bootstrap.min.js") }}
</body>
</html>
