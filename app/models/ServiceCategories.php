<?php
class ServiceCategories extends Eloquent {
	protected $table = 'servicecat';

    protected $guarded = array();

    public static $rules = array();

    public function providercat()
    {
        return $this->belongsTo('Categories','providercat_id');
    }
}
