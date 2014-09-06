<?php

class Useful extends Eloquent {

	protected $guarded = array('id');

	public static $rules = array(
        'name'	=> 'required'
  	);

	public function books()
	{
		return $this->belongsToMany('Book');
	}

	public function courses()
	{
		return $this->belongsToMany('Course');
	}

	public function directions()
	{
		return $this->belongsToMany('Direction');
	}
}