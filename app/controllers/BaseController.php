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
	}

}