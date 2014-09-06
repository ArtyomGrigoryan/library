<?php

class CourseController extends BaseController {

	public function create()
	{
		return View::make('courses.new');
	}

	public function store()
	{
		$validator = Validator::make(Input::all(), Course::$rules);

		if($validator->fails()) {
			return Redirect::back()->withErrors($validator);
		}

		$course = new Course;
		$course->name = Input::get('name');
		$course->save();

		return Redirect::to('admin_section')->with('message', 'Вы успешно создали курс!');
	}

	public function show($id)
	{
		$course = Course::find($id);

		if(!$course) {
			return Redirect::back()->with('message', 'Такого курса не существует!');
		}

		return View::make('courses.show')->with('course', $course);
	}
}
