<?php

class MacroService extends Eloquent {

	protected $table = 'macservice';

	public function microservices()
    {
        return $this->hasMany('MicroService', 'macservice_id');
    }

	public function user()
    {
        return $this->belongsTo('User','user_id');
    }
}