<?php

class DirectionCourseController extends BaseController {

	public function show($direction_id, $course_id)
	{
		$usefuls_id = DB::select('select distinct course_useful.useful_id from course_useful join direction_useful on course_useful.course_id=? and direction_useful.direction_id=?', array($course_id, $direction_id));

		/*$usefuls_id = DB::table('course_useful')->join('department_useful', 'department_useful.department_id', '=', 1, 'course_useful', 'course_useful.course_id', '=', 3)->select('course_useful.useful_id')->distinct()->get();*/

		// если у кафедры нет предметов, то перенаправляем пользователя
		if(!$usefuls_id) {
			return Redirect::back()->with('message', 'У выбранного вами курса нет предметов!');
		}

		foreach($usefuls_id as $key => $value)
		{
    		$usefuls[$value->useful_id] = $value->useful_id;
		}	

		$usefuls = Useful::whereIn('id', $usefuls)->get();

		return View::make('courses.show')->with('usefuls', $usefuls);
	}	
}
