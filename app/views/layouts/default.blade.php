<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="enarocanje">
	<meta name="author" content="TPO">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>ecommerce</title>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet"/>
	
</head>
<body>
	<header>
		<nav>
			<ul class="nav nav-pills" >
				<li {{ (Request::is('home') ? 'class="active"' : '') }}>
					<a href="{{ URL::to('home') }}" >Home</a>
				</li>
				<li {{ (Request::is('find') ? 'class="active"' : '') }}>
					<a href="{{ URL::to('find') }}">Find</a>
				</li>
				<li {{ (Request::is('register') ? 'class="active"' : '') }}>
					<a href="{{ URL::to('register') }}">Register</a>
				</li>

				@if (Auth::check())
					<li class="navbar-text">Logged in as {{ Auth::user()->fullName() }}</li>
					<li class="divider-vertical"></li>
					<li {{ (Request::is('account') ? 'class="active"' : '') }}>
						<a href="{{ URL::to('account') }}}">Account</a>
					</li>
					<li>
						<a href="{{ URL::to('account/logout') }}">Logout</a>
					</li>
				@else
					<li {{ (Request::is('account/login') ? 'class="active"' : '') }}>
						<a href="{{ URL::to('account/login') }}}">Login</a>
					</li>
					<li {{ (Request::is('account/register') ? 'class="active"' : '') }}>
						<a href="{{ URL::to('account/register') }}">Register</a>
					</li>
				@endif

			</ul>

	</header>	
	
	<div class="container">		

		<h1>Hello Majster</h1>


		@yield('content')




	</div>

	<script src="js/main.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
