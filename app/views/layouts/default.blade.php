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
			<!-- using bootstrapper design -->
			{{ Navigation::pills(
				Navigation::links([
					['Home', URL::to('home'), (Request::is('home') || Request::is('/'))],
					['Find', URL::to('find'), Request::is('find')],	
					['Provider registration',URL::to('provider/create'),Request::is('provider/create')],
					['User registration',URL::to('registerUser'),Request::is('registerUser')],
					['Settings',URL::to('provider/edit'),Request::is('provider/edit')],									
					['ManageServices',URL::to('ManageServices/create'),Request::is('ManageServices/create')],
				])
			)}}
		</nav>
		<div>
			@if ( ! Auth::check() )
				{{ Navigation::pills(
					Navigation::links([
						['Login', URL::to('account/login'), Request::is('account/login')], 
						['Register', URL::to('register'), Request::is('register')],
					])
				)}}	
			@else
				<li class="navbar-text">
					Logged in as {{ HTML::to(URL::to('user'), Auth::user()->fullName()) }}
				</li>
				<li {{ (Request::is('find') ? 'class="active"' : '') }}>
					{{ HTML::to( URL::to('find'), 'Find') }}
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

			@endif
		</div>
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
