@extends('layout')

@section('main')

<div class="col-md-7 col-md-offset-3">
	<h1>Вход</h1>

	<div class="form-horizontal">
		{{ Form::open(array('action' => 'SessionController@store')) }}

			<div class="form-group"> 
				<div class="col-sm-6">
					{{ Form::label('email', 'Email') }}
					{{ Form::text('email', null, array('class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-6">
					{{ Form::label('password', 'Пароль') }}
					{{ Form::password('password', array('class' => 'form-control')) }}
				</div>
			</div>

			{{ Form::submit('Войти', array('class' => 'btn btn-primary')) }}

		{{ Form::close() }}
	</div>
</div>

@stop