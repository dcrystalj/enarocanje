<?php

class MicroService extends Eloquent {

	protected $table = 'micservice';

	public function macroservice()
    {
        return $this->belongsTo('MacroService','macservice_id');
    }

    public function reservations()
    {
        return $this->hasMany('Reservation', 'micservice_id');
    }

    /**
     * 0 now  activeted od zdej naprej
	 * 0 now deactivated, ju3  activated od ju3 naprej
	 * -1 now deactivated od zdej naprej
	 * -1 activated, deactavated od ju3 naprej
	*/
    public function isActive()
    {
    	return 	$this->active == 0 && 
    			strtotime($this->activefrom) <= strtotime(date("Y-m-d")) 
    			||
    			$this->active == -1 && 
    			strtotime($this->activefrom) > strtotime(date("Y-m-d"));
    }

}