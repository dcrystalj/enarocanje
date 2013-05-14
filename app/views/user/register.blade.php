@extends('layouts.default')

@section('title')
    {{Lang::get('general.userRegistration')}}
@stop

@section('content')
<script>


	var domains = ["gmail.com","hotmail.com","yahoo.com","live.com"];
	
	function checkEmail(e){
		var email = document.getElementById("email").value;
		
		e.preventDefault();
		if (validateEmail(email)){
			checkMostUsed(email);
		}
		else {
			alert("{{Lang::get('validation.email',array('attribute'=>'"+email+"'))}}");
		}
	}

	function validateEmail(email) {
		var re = /\S+@\S+\.\S+/;
		return re.test(email);
	} 

	function checkMostUsed(email) {
		var domain = email.split("@")[1];
		var name = email.split("@")[0];
		var min = 30;
		var temp = 0;
		var index = -1;
		//alert(domain);
		for (var i=0; i<domains.length;i++){
			if(domain == domains[i]){		
				index=-1;
				break;
			}
			temp = levenshtein(domain,domains[i]);
			if(temp<min && temp<4) {
				min = temp;
				index = i;
			}
		}
		if(index >= 0) {

			
				var correctedEmail=name+"@"+domains[index];
				bootbox.dialog("{{Lang::get('messages.emailSuggestion',array('email'=>'"+email+"','corrected'=>'"+correctedEmail+"'))}}", [{
				    "label" : "{{Lang::get('general.yes')}}",
				    "class" : "btn-success",
				    "callback": function() {
				        document.getElementById("email").value=correctedEmail;
				        $('#userRegForm').submit();
				    }
				}, {
				    "label" : "{{Lang::get('general.no')}}",
				    "class" : "btn-primary",
				    "callback": function() {
				        $('#userRegForm').submit();
				    }
				},]);
		}
		else {
			$('#userRegForm').submit();
		}

	}

	function levenshtein (s1, s2) {
	  // http://kevin.vanzonneveld.net
	  // +            original by: Carlos R. L. Rodrigues (http://www.jsfromhell.com)
	  // +            bugfixed by: Onno Marsman
	  // +             revised by: Andrea Giammarchi (http://webreflection.blogspot.com)
	  // + reimplemented by: Brett Zamir (http://brett-zamir.me)
	  // + reimplemented by: Alexander M Beedie
	  // *                example 1: levenshtein('Kevin van Zonneveld', 'Kevin van Sommeveld');
	  // *                returns 1: 3
	  if (s1 == s2) {
	    return 0;
	  }

	  var s1_len = s1.length;
	  var s2_len = s2.length;
	  if (s1_len === 0) {
	    return s2_len;
	  }
	  if (s2_len === 0) {
	    return s1_len;
	  }

	  // BEGIN STATIC
	  var split = false;
	  try {
	    split = !('0')[0];
	  } catch (e) {
	    split = true; // Earlier IE may not support access by string index
	  }
	  // END STATIC
	  if (split) {
	    s1 = s1.split('');
	    s2 = s2.split('');
	  }

	  var v0 = new Array(s1_len + 1);
	  var v1 = new Array(s1_len + 1);

	  var s1_idx = 0,
	    s2_idx = 0,
	    cost = 0;
	  for (s1_idx = 0; s1_idx < s1_len + 1; s1_idx++) {
	    v0[s1_idx] = s1_idx;
	  }
	  var char_s1 = '',
	    char_s2 = '';
	  for (s2_idx = 1; s2_idx <= s2_len; s2_idx++) {
	    v1[0] = s2_idx;
	    char_s2 = s2[s2_idx - 1];
	    for (s1_idx = 0; s1_idx < s1_len; s1_idx++) {
	      char_s1 = s1[s1_idx];
	      cost = (char_s1 == char_s2) ? 0 : 1;
	      var m_min = v0[s1_idx + 1] + 1;
	      var b = v1[s1_idx] + 1;
	      var c = v0[s1_idx] + cost;
	      if (b < m_min) {
	        m_min = b;
	      }
	      if (c < m_min) {
	        m_min = c;
	      }
	      v1[s1_idx + 1] = m_min;
	    }
	    var v_tmp = v0;
	    v0 = v1;
	    v1 = v_tmp;
	  }
	  return v0[s1_len];
	}	
</script>


{{Former::open(URL::route('user.store'))->rules($rules)->id('userRegForm')}}
{{Former::text('name',Lang::get('general.name'))->autofocus()}}
{{Former::text('surname',Lang::get('general.surname'))}}
{{Former::text('email',Lang::get('general.email'))}}
{{Former::password('password',Lang::get('general.password'))}}
{{Former::password('repeat',Lang::get('general.repeatPassword'))}}
{{Former::select('timezone',Lang::get('general.timezone'))
		->options(UserLibrary::timezones(),	'12') }}
{{Former::select('language',Lang::get('general.language'))->options(Lang::get('general.languages'))}}
{{Former::actions()->button(Lang::get('general.submit'))->onclick("checkEmail(event)")}}
{{Former::close()}}


@stop

