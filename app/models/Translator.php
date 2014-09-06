<?php

class Translator extends Eloquent {

	protected $guarded = array('id');

	public static $rules = array(
        'name'	=> 'required'
  	);

	public function books()
	{
		return $this->belongsToMany('Book');
	}
}