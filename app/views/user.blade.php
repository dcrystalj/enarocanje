@extends('layouts.default')

@section('title')
    wrong Form  =)
@stop

@section('content')
	<h1>User registration</h1>
    <form method="POST" action="http://localhost:8000/app/controllers/UserRegValidationController.php" accept-charset="UTF-8">
    <!-- username field -->
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <label for="surname">Surname</label>
    <input type="text" name="surname" id="surname">
    <label for="email">Email address</label>
    <input type="text" name="email" id="email">
    <?php 
    #$timeZone = -new Date().getTimezoneOffset()/60; 
    $time = date('e');
    #echo $time;
    echo "<br />";
    #echo "<p>$time->hours</p>"	
    ?>
    <label type="text">Timezone</label>
    <?php 
    	echo "<select>";
    	for ($i=-11;$i<=12;$i++) {
    		if($i<0) echo "<option value='$i'>$i</option>";
    		else if($i>0) echo "<option value='+$i'>$i</option>";
    		else echo "<option selected='selected' value='$i'>UTC</option>";

    	}
    	echo "</select>";
    ?>
    <label for=!"language">Language</label>
    <select>
    	<option value="english">English</option>	
    	<option value="slovenian">slovenian</option>
    	<option value="italian">Italian</option>
    	<option value="german">German</option>

    </select>
    <!-- password field -->
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <label for="password">Repeat password</label>
    <input type="password" name="password2" id="password2">
    <!-- login button -->	
    <br />
    <input type="submit" value="Register">
</form>
@stop