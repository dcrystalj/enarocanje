@extends('layouts.default')

@section('title')
    User registration
@stop

@section('content')
<?php
    for ($i=-11;$i<=12;$i++) {
        if($i<0) $timezone[$i] = $i;
        else if($i>0) $timezone[$i] = "+".$i;
        else $timezone[$i] =  "UTC";
    }
?>
{{Former::register("unique_name","http://localhost/app/controllers/RegisterusController.php")}}
{{Former::open()->rules(array(
  'Name'     => 'required|max:20|alpha',
  'Surname'  => 'required|max:20|alpha',
  'Email'    => 'email',
  'Password' => 'password',
  'Timezone' => 'min:1',
  'Language' => 'min:1',
));}}
{{Former::text('Name')->class('myclass')->autofocus()}}
{{Former::text('Surname')->class('myclass')}}
{{Former::text('Email')}}
{{Former::password('Password')}}
{{Former::password('Password')}}
{{Former::select('timezone')->options($timezone,11)}}
	{{ "Timezone " }}
	{{ "<select>" }}
	for ($i=-11;$i<=12;$i++) {
		if($i<0) echo "<option value='$i'>$i</option>";
		else if($i>0) echo "<option value='+$i'>$i</option>";
		else echo "<option selected='selected' value='$i'>UTC</option>";
	}
	{{ "</select> <br />"; }}
    {{ "Language "; }}
    {{ "  <select>"; }}
    {{ "      <option value='english'>English</option>"; }}
    {{ "      <option value='slovenian'>Slovenian</option>"; }}
    {{ "      <option value='italian'>Italian</option>"; }}
    {{ "      <option value='german'>German</option>"; }}
    {{ "  </select>"; }}
{{Former::actions()->submit('Submit')}}
{{Former::close()}}

@stop