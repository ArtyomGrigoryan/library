<?php

class DirectionController extends BaseController {

	public function create()
	{
		return View::make('directions.new');
	}

	public function uploadPicture()
	{
		$destinationPath = 'uploads/directions_images/';
        $filename = str_random(12).'.jpg';
		Input::file('picture')->move(public_path().'/'.$destinationPath, $filename);

		return Response::json(array('filelink' => '/'.$destinationPath.$filename));
	}

	public function store()
	{
		$validator = Validator::make(Input::all(), Direction::$rules);

		if($validator->fails()) {
			return Redirect::back()->withErrors($validator);
		}

		if(Direction::whereName(Input::get('name'))->first()) {
			return Redirect::back()->with('message', 'Такое направление подготовки уже существует!');
		}

		$direction = new Direction;
		$direction->name = Input::get('name');
		$direction->picture = Input::get('image');
		$direction->save();

		return Redirect::to('admin_section')->with('message', 'Вы успешно создали направление подготовки!');
	}

	public function show($id)
	{
		$direction = Direction::find($id);

		if(!$direction) {
			return Redirect::back()->with('message', 'Такого направления подготовки не существует!');
		}

		return View::make('directions.show')->with('direction', $direction);
	}
}
