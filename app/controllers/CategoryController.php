<?php

class CategoryController extends BaseController {

	public function create()
	{
		return View::make('categories.new');
	}

	public function store()
	{
		$validator = Validator::make(Input::all(), Category::$rules);

		if($validator->fails()) {
			return Redirect::back()->withErrors($validator);
		}

		if(Category::whereName(Input::get('name'))->first()) {
			return Redirect::back()->with('message', 'Такая категория уже существует!');
		}

		$category = new Category;
		$category->name = Input::get('name');
		$category->save();

		return Redirect::to('admin_section')->with('message', 'Вы успешно создали категорию!');
	}

	public function show($id)
	{
		$category = Category::find($id);

		if(!$category) {
			return Redirect::route('home.showWelcome')->with('message', 'Такой категории не существует!');
		}

		return View::make('categories.show')->with('var', $category);
	}
}