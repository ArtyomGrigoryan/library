<?php

class TranslatorController extends BaseController {

	public function show($id)
	{
		$translator = Translator::find($id);

		if(!$translator) {
			return Redirect::route('home.showWelcome')->with('message', 'Такого переводчика не существует!');
		}

		return View::make('translators.show')->with('var', $translator);
	}
}