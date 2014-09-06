<?php

Route::get('/', array('uses' => 'HomeController@showWelcome', 'as' => 'home.showWelcome'));

Route::get('/logout', array('uses' => 'SessionController@logout', 'as' => 'session.logout'));

// если пользователь авторизовался, то он не может войти на эти страницы
Route::group(array('before' => 'un_auth'), function() 
{
	Route::resource('session', 'SessionController');
	Route::resource('user', 'UserController');
});

// загрузка изображений
Route::post('upload', array('uses' => 'BookController@uploadPicture'));
Route::post('uploadDirectionImage', array('uses' => 'DirectionController@uploadPicture'));

// если пользователь авторизовался, то он может войти на эти страницы
Route::group(array('before' => 'auth'), function() 
{
	Route::resource('search', 'SearchController');
	Route::get('book/{id}', array('uses' => 'BookController@show', 'as' => 'book.show'))->where('id', '[0-9]+');
	Route::get('publisher/{id}', array('uses' => 'PublisherController@show', 'as' => 'publisher.show'))->where('id', '[0-9]+');
	Route::get('author/{id}', array('uses' => 'AuthorController@show', 'as' => 'author.show'))->where('id', '[0-9]+');
	Route::get('translator/{id}', array('uses' => 'TranslatorController@show', 'as' => 'translator.show'))->where('id', '[0-9]+');
	Route::get('category/{id}', array('uses' => 'CategoryController@show', 'as' => 'category.show'))->where('id', '[0-9]+');
	Route::get('useful/{id}', array('uses' => 'UsefulController@show', 'as' => 'useful.show'))->where('id', '[0-9]+');
	Route::get('course/{id}', array('uses' => 'CourseController@show', 'as' => 'course.show'))->where('id', '[0-9]+');
	Route::get('direction/{id}', array('uses' => 'DirectionController@show', 'as' => 'direction.show'))->where('id', '[0-9]+');
	Route::get('direction/{direction_id}/course/{course_id}', array('uses' => 'DirectionCourseController@show', 'as' => 'directioncourse.show'))->where('id', '[0-9]+');
	//Route::resource('category', 'CategoryController', array('only' => array('show')));
});

// если пользователь админ, то он может войти на эти страницы
Route::group(array('before' => 'admin_auth'), function() 
{
	Route::resource('book', 'BookController');
	Route::resource('publisher', 'PublisherController');
	Route::resource('author', 'AuthorController');
	Route::resource('translator', 'TranslatorController');
	Route::resource('category', 'CategoryController');
	Route::resource('useful', 'UsefulController');
	Route::resource('direction', 'DirectionController');
	Route::resource('course', 'CourseController');
	Route::resource('direction.course', 'DirectionCourseController');

	Route::get('admin_section', function() {
		return View::make('admin_section');
	});

	Route::get('bind_course_direction', function() {
		return View::make('bind_course_direction');
	});

	Route::get('bind_course_useful_direction', function() {
		return View::make('bind_course_useful_direction');
	});

	Route::post('bind_course_direction', array('uses' => 'BindController@storeCourseDirection'));
	Route::post('bind_course_useful_direction', array('uses' => 'BindController@storeCourseUsefulDirection'));
});

Route::get('activate/{userId}/{activationCode}', array('uses' => 'UserController@getActivate'));