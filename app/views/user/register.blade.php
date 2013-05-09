@extends('layouts.default')

@section('title')
    {{Lang::get('general.userRegistration')}}
@stop
<script type="text/javascript">
	function validateEmail(email) { 
	    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\
	".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA
	-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	    return re.test(email);
	} 
	function check(email) {
		if(validateEmail(email)){
			email = email.split("@")[1];

		}
		else {
			alert("Validation failed");
		}
	}
	function check2(){

		alert("actionsd");
	}


</script>
@section('content')
{{Former::open(URL::route('user.store'))->rules($rules)->onsubmit("return this.check2();")}}
{{Former::text('name',Lang::get('general.name'))->autofocus()}}
{{Former::text('surname',Lang::get('general.surname'))}}
{{Former::text('email',Lang::get('general.email'))}}
{{Former::password('password',Lang::get('general.password'))}}
{{Former::password('repeat',Lang::get('general.repeatPassword'))}}
{{Former::select('timezone',Lang::get('general.timezone'))->options(UserLibrary::timezones(),"UTC+1",true)}}
{{Former::select('language',Lang::get('general.language'))->options(Lang::get('general.languages'))}}
{{Former::actions()->submit(Lang::get('general.submit'))}}
{{Former::close()}}

@stop