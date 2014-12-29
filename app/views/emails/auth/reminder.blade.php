<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Password Reset</h2>

		<div>
			Для сброса пароля перейдите по ссылке: {{ URL::to('password/reset', array($token)) }}.<br/>
			Она доступна в течение {{ Config::get('auth.reminder.expire', 60) }} минут.
		</div>
	</body>
</html>
