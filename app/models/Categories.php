<?php
class Categories extends Eloquent {
	protected $table = 'categories';

    protected $guarded = array();

    public static $rules = array();

    public function servicecat()
    {
        return $this->hasMany('ServiceCategories', 'providercat_id');
    }
}
