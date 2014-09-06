@extends('layout')

@section('main')

<div class="col-md-7 col-md-offset-3">
	<h1>Создание нового направления подготовки</h1>

	<div class="form-horizontal">
		{{ Form::open(array('action' => 'DirectionController@store', 'files' => true, 'enctype' => 'multipart/form-data')) }}

			<div class="form-group">
				<div class="col-sm-6">
					{{ Form::label('name', 'Название направления подготовки') }}
					{{ Form::text('name', null, array('class' => 'form-control')) }}
				</div>
			</div>

			{{ Form::label('picture', 'Изображение') }}
			{{ Form::file('picture') }}

			<img src="" id="thumb" style="max-width:300px; max-height: 200px; display: block;">
			
			{{ Form::hidden('image') }}

			{{ Form::submit('Создать', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}

		@include('partials.errors', $errors)
	</div>

	<div class="error"></div>
</div>

@stop

@section('scripts')
@include('directions.script')
@stop