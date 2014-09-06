<?php

class AuthorController extends BaseController {

	public function show($id)
	{
		$author = Author::find($id);

		if(!$author) {
			return Redirect::route('home.showWelcome')->with('message', 'Такого автора не существует!');
		}

		return View::make('authors.show')->with('var', $author);
	}
}