<?php

class MicroService extends Eloquent {

	protected $table = 'micservice';

	public function macroservice()
    {
        return $this->belongsTo('MacroService');
    }
}