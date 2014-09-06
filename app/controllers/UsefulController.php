<?php

class UsefulController extends BaseController {

	public function show($id)
	{
		$useful = Useful::find($id);

		if(!$useful) {
			return Redirect::route('home.showWelcome')->with('message', 'Такого предмета не существует!');
		}

		return View::make('usefuls.show')->with('var', $useful);
	}
}