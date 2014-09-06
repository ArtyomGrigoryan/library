<?php

class BookController extends BaseController {

	public function create()
	{
		return View::make('books.new');
	}

	public function uploadPicture()
	{
		$destinationPath = 'uploads/books_images/';
        $filename = str_random(12).'.jpg';
		Input::file('picture')->move(public_path().'/'.$destinationPath, $filename);

		return Response::json(array('filelink' => '/'.$destinationPath.$filename));
	}

	public function store()
	{
		$validator = Validator::make(Input::all(), Book::$rules);

		if($validator->fails()) {
			return Redirect::back()->WithInput()->withErrors($validator);
		}

		Book::saveBook();

		return Redirect::to('admin_section')->with('message', 'Вы успешно сохранили книгу!');
	}

	public function show($id)
	{
		$book = Book::find($id);

		if(!$book) {
			return Redirect::route('home.showWelcome')->with('message', 'Извините, но такой книги не существует!');
		}

		return View::make('books.show')->with('book', $book);
	}

	public function edit($id)
	{
		$book = Book::find($id);

		if(!$book) {
			return Redirect::route('home.showWelcome')->with('message', 'Извините, но такой книги не существует!');
		}

		return View::make('books.edit')->with('book', $book);
	}

	public function update($id)
	{
		$validator = Validator::make(Input::all(), Book::$rules);

		if($validator->fails()) {
			return Redirect::back()->WithInput()->withErrors($validator);
		}

		Book::updateBook($id);

		return Redirect::to('admin_section')->with('message', 'Вы успешно обновили книгу!');
	}

	public function destroy($id) 
	{
		$book = Book::find($id);

		if(!$book) {
			return Redirect::back()->with('message', 'Такой книги не существует!');
		}

		$book->delete();

		return Redirect::to('admin_section')->with('message', 'Вы успешно удалил книгу!');
	}
}