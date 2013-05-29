<?php

class Reservation extends Eloquent {
	
	protected $table = 'reservation';

	public function microservice()
    {
        return $this->belongsTo('MicroService','micservice_id');
    }

}