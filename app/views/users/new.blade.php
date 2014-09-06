@extends('layout')

@section('main')

<div class="col-md-7 col-md-offset-3">
	<h1>Регистрация</h1>

	<div class="form-horizontal">
		{{ Form::open(array('action' => 'UserController@store')) }}

			<div class="form-group">
				<div class="col-sm-6">
					{{ Form::label('name', 'Имя') }}
					{{ Form::text('name', null, array('class' => 'form-control')) }}
				</div>
			</div>

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

			<div class="form-group"> 
				<div class="col-sm-6">
					{{ Form::label('password_confirmation', 'Подтверждение пароля') }}
					{{ Form::password('password_confirmation', array('class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group"> 
				<div class="col-sm-6">
					{{ Form::label('code', 'Секретный код') }}
					{{ Form::password('code', array('class' => 'form-control')) }}
				</div>
			</div>

			{{ Form::submit('Регистрация', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}

		@include('partials.errors', $errors)
	</div>

	<div class="error"></div>
</div>

@stop