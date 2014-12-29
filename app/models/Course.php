<?php

class Course extends Eloquent {

    protected $guarded = array('id');

  	public static $rules = array(
        'name'	=> 'required'
    );

  	public function directions()
    {
        return $this->belongsToMany('Direction');
    }

    public function usefuls()
    {
    	return $this->belongsToMany('Useful');
    }
}