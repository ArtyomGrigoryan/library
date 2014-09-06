<?php

class Direction extends Eloquent {

	protected $guarded = array('id');

	public static $rules = array(
        'name'	=> 'required'
  	);

	public function courses()
  	{
  		return $this->belongsToMany('Course');
  	}

  	public function usefuls()
  	{
  		return $this->belongsToMany('Useful');
  	}
}