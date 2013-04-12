<?php

class MicroService extends Eloquent {

	protected $table = 'micservice';

	public function macroService()
    {
        return $this->belongsTo('MacroService');
    }
}