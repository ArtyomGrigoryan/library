<?php

class SessionController extends BaseController {
	
	public function create()
	{
		return View::make('session.login');	
	}

	public function store()
	{
		$user = User::where('email', '=', Input::get('email'))->first();

		if(!$user) {
			return Redirect::back()->WithInput(Input::except('password'))->with('message', 'Вы ввели неверные данные!');
		}

		if($user->isActive == 0) {
			return Redirect::route('home.showWelcome')->with('message', 'Вы еще не активировали свой аккаунт!');
		}

		if(Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))) {
			return Redirect::route('home.showWelcome')->with('message', 'Вы успешно вошли!');
		}

		return Redirect::back()->WithInput(Input::except('password'))->with('message', 'Вы ввели неверные данные!');
	}

	public function logout()
	{
		Auth::logout();

		return Redirect::route('home.showWelcome')->with('message', 'Вы успешно вышли!');
	}
}