<?php 
	class ProviderRegistrationHandler extends BaseController {
	
	public function action_registerP(){
		if(ProviderRegistrationVal::validateName() && ProviderRegistrationVal::validateEmail()){
			return View::make('home');
		}
		else{
			echo "Error registering provider!";
		}
	}
}
