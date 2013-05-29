<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {


	protected $table = 'users';
	protected $hidden = array('password');


	


	public function macroservices()
    {
        return $this->hasMany('MacroService', 'user_id');
    }

	
	public function getAuthIdentifier()
	{
		return $this->email;
	}


	public function getAuthPassword()
	{
		return $this->password;
	}


	public function getReminderEmail()
	{
		return $this->email;
	}




	public function isAdmin()
	{
		return $this->status == 5;
	}

	public function isTmpuser()
	{
		return $this->status == -1;
	}

	public function isProvider()
	{
		return $this->status == 2;
	}

	public function isCostomer()
	{
		return $this->status == 1;
	}

	
}
