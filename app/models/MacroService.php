<?php

class MacroService extends Eloquent {

	protected $table = 'macservice';

	public function microservices()
    {
        return $this->hasMany('MicroService', 'macservice_id');
    }
}