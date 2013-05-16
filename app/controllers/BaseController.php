<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}

        Validator::extend('before_date', function($attribute, $value, $parameters)
        {
            return ( strtotime( $value ) < strtotime( Input::get($parameters[0]) ) );
        });

        Validator::extend('numeric_comma', function($attribute, $value, $parameters)
        {
        	$value = str_replace(',', '.', $value);
        	//$value = floatval($value);
        	return is_numeric($value);
        });
        Validator::extend('min_time', function($attribute, $value, $parameters)
        {
        	if( intval(str_replace(':','',$value) ) == 0)
        	{
        		return false;
        	}
        	return true;
        });
	}

}