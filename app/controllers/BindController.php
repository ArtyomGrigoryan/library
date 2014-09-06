<?php

class BindController extends BaseController {

	public function storeCourseDirection()
	{
		$course = Course::find(Input::get('course_id'));
		$direction = Direction::find(Input::get('direction_id'));

		$direction->courses()->attach(array($course->id));

		return Redirect::to('admin_section')->with('message', 'Вы успешно связали курс и направление подготовки!');
	}

	public function storeCourseUsefulDirection()
	{
		$course = Course::find(Input::get('course_id'));
		$direction = Direction::find(Input::get('direction_id'));
		$useful = Useful::whereName(Input::get('usefuls'))->first();

		if(!$useful) {
			$useful = new Useful;
			$useful->name = Input::get('usefuls');
			$useful->save();
		}

		$useful->courses()->attach(array($course->id));
		$useful->directions()->attach(array($direction->id));

		return Redirect::to('admin_section')->with('message', 'Вы успешно связали предмет с направлением подготовки и курсом!');
	}
}