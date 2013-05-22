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

	{{ Html2::script('js/jquery/jquery191.js') }}
	{{ Html2::script('js/jquery/jqueryui-1103.custom.min.js') }}
	
	{{ Html2::style('bootstrap/css/bootstrap.min.css') }}
	{{ Html2::style('bootstrap/css/bootstrap-responsive.min.css') }}
	{{ Html2::style('css/style.css') }}
	{{ Html2::style('css/bootstrap-datetimepicker.min.css') }}

    @yield('assets')
	
</head>
<body>
	<header>
		<nav>
			 {{ Navbar::create()
			    ->with_brand('E-commerce', URL::to('home'))
			    ->with_menus(
			        Navigation::links([
						//['Home', URL::to('home'), (Request::is('home') || Request::is('/')),
						//	false,null,'home'],
	 					!Auth::check() ?: 
	 					[trans('general.manageService'),URL::to('macro/create'), Request::is('macro/create'),
	 						false,null,null,(Auth::user()->status == 2)],
						[trans('general.services'),URL::to('macro')],
						!Auth::check() ?:
						[trans('general.referrals'),URL::route('referral.index'),Request::is('referral.index'),
	 						false,null,null,(Auth::user()->isAdmin())],
	 					!Auth::check() ?:
						['Categories',URL::route('category.create'),Request::is('category.create'),
	 						false,null,null,(Auth::user()->isAdmin())],
					]),
					['style' => 'height: auto']

					)

				->with_menus(
					Navigation::links( 
			     		Auth::check() ?
			      		[	
							[trans('general.profile'),URL::action('UserController@show',[Auth::user()->id])],
							[Navigation::VERTICAL_DIVIDER],
							[trans('general.logout'),URL::to('app/logout')],
						] 
						:
			       		[
			       	 		[trans('general.login'),URL::to('app/login')],		     
			       	 		[trans('general.register'),'#',false,false,[		       	 		
								[trans('general.userRegistration'),URL::to('user/create')],
								[trans('general.providerRegistration'),URL::to('provider/create')],				
							]]
						]),
			      	['class' => 'pull-right'] )
			    ->with_menus(
			     	Navigation::links([
			     		//Za namene razvoja
			     		//Auth::check() ?:   
		       			//[Trans('general.language'),'#',false,false,[		       	 		
							[trans('general.englishCapital'), URL::to('lang/en')],
							[trans('general.slovenianCapital'), URL::to('lang/si')],							
						//]],
						
						[Navigation::VERTICAL_DIVIDER],
					]),
					['class' => 'pull-right'] )
		   		->collapsible();
	   	 	}}
		</nav>
		<div>
			
		</div>
	</header>	
	
	<div class="container">		

		<h1>
			@yield('title')
		</h1>

		<!-- this is shown only with javascript, for example in calendar view -->
		<div id="statusmessage" class="alert-warning alert" style="display:none;"></div>
		
		@if (isset($success))
		<p>{{ Alert::success( $success) }}</p>
		@endif

		@if (isset($status))
		<p>{{ Alert::warning( $status) }}</p>
		@endif

		@if (isset($error))
		<p>{{ Alert::error( $error) }}</p>
		@endif

		@yield('content')

	</div>

	{{ Html2::script("js/main.js") }}
	{{ Html2::script("bootstrap/js/bootstrap.min.js") }}
	{{ Html2::script("js/bootstrap-datetimepicker.min.js") }}
	{{ Html2::script('js/bootbox.min.js') }}
	{{ Html2::script('js/sorttable.js') }}
	{{ Html2::script('js/passStrength.js') }}
	{{ Html2::script('js/stacktable.js') }}

<script>
var _trans = {{ Html2::get_translates() }};
function trans(trans) {
  trans = ((typeof(_trans[trans])) === 'undefined')?trans:_trans[trans];
  if(typeof arguments[1] === 'object' && typeof arguments[0] === 'string') {
    var key;
    for(key in arguments[1]) {
      var val = arguments[1][key];
      key = ':'+key;
      while(trans.indexOf(key) !== -1)
	trans = trans.replace(key, val);
    }
  }
  return trans;
}
</script>
</body>
</Html>
