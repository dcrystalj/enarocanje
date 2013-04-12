<?php

class MacroService extends Eloquent {

	protected $table = 'macservice';

	public function microServices()
    {
        return $this->hasMany('MicroService');
    }
}