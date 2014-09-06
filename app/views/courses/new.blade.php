@extends('layout')

@section('main')

<div class="col-md-7 col-md-offset-3">
	<h1>Создание нового курса</h1>

	<div class="form-horizontal">
		{{ Form::open(array('action' => 'CourseController@store')) }}

			<div class="form-group">
				<div class="col-sm-6">
					{{ Form::label('name', 'Номер курса') }}
					{{ Form::text('name', null, array('class' => 'form-control')) }}
				</div>
			</div>

			{{ Form::submit('Создать', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}

		@include('partials.errors', $errors)
	</div>
</div>

@stop