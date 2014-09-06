<?php

class HomeController extends BaseController {

	public function showWelcome()
	{
		$categories = Category::all();
		$directions = Direction::all();

		return View::make('main')->with(array('categories' => $categories, 'directions' => $directions));
	}

}
