@extends('layouts.default')

@section('title')
    {{Lang::get('general.userRegistration')}}
@stop
<script type="text/javascript">
	function validateEmail(email) { 
	    var re = /\S+@\S+\.\S+/;
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
		var emailElement = document.getElementById("email");
		var email = emailElement.value;

		alert(email);
		if(validateEmail(email)){
			alert("tr00"));
		}
		else {
			alert("false, dude");
		}
	}


</script>
@section('content')
{{Former::open(URL::route('user.store'))->onsubmit("check2()")}}

{{Former::text('email',Lang::get('general.email'))}}

{{Former::actions()->submit(Lang::get('general.submit'))}}
{{Former::close()}}

@stop