<?php

class UserController extends BaseController {

	public function create()
	{
		return View::make('users.new');
	}

	public function store()
	{
		$validator = Validator::make(Input::all(), User::$rules);

		if($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		if(Input::get('code') != '2qerv3') {
			return Redirect::back()->withInput()->withErrors($validator)->with('message', 'Вы ввели неверный код регистрации!');;
		}

		$user = new User(Input::all());
		$id = $user->register();

		return Redirect::route('home.showWelcome')->with('message', 'Вы успешно зарегистрировались! Для активации аккаунта проверьте ваш почтовый ящик.');
	}

	public function getActivate($userId, $activationCode)
	{
		$user = User::find($userId);

		if(!$user) {
			return Redirect::route('home.showWelcome')->with('message', 'Неверная ссылка на активацию аккаунта!');
		}

		if($user->activate($activationCode)) {
			Auth::loginUsingId($user->id, true);

			return Redirect::route('home.showWelcome')->with('message', 'Аккаунт активирован!');
		}

		return Redirect::route('home.showWelcome')->with('message', 'Что-то пошло не так!');
	}
}