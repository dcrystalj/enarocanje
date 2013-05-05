<?php
class Absences extends Eloquent {
	protected $table = 'absence';


	public function macroservice()
    {
        return $this->belongsTo('MacroService','macservice_id');
    }
    protected $guarded = array();

    public static $rules = array();
}
