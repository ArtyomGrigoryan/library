<?php

class SearchController extends BaseController {

	public function store() 
	{
		$query = Input::get('query');
		
		$authors = Author::whereRaw("MATCH(name) AGAINST('*$query*' IN BOOLEAN MODE)")->get();
		$books = Book::whereRaw("MATCH(name) AGAINST('*$query*' IN BOOLEAN MODE)")->get();

		return View::make('search.show')->with(array('authors' => $authors, 'books' => $books));
	}
}