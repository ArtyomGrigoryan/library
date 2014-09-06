<?php

class PublisherController extends BaseController {

	public function show($id)
	{
		$publisher = Publisher::find($id);

		if(!$publisher) {
			return Redirect::route('home.showWelcome')->with('message', 'Такого издательства не существует!');
		}

		return View::make('publishers.show')->with('var', $publisher);
	}
}