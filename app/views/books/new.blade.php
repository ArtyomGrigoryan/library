@extends('layout')

@section('main')

<div class="col-md-7 col-md-offset-3">
	<h1>Создание новой книги</h1>

	<div class="form-horizontal">
		{{ Form::open(array('action' => 'BookController@store', 'files' => true, 'enctype' => 'multipart/form-data')) }}

			<div class="form-group">
				<div class="col-sm-6">
					{{ Form::label('name', 'Название') }}
					{{ Form::text('name', null, array('class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-6">
					{{ Form::label('authors', 'Автор') }}
					{{ Form::text('authors', null, array('class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-6">
					{{ Form::label('translators', 'Переводчик') }}
					{{ Form::text('translators', null, array('class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group"> 
				<div class="col-sm-6">
					{{ Form::label('pages', 'Страниц') }}
					{{ Form::text('pages', null, array('class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group"> 
				<div class="col-sm-6">
					{{ Form::label('publishers', 'Издательство') }}
					{{ Form::text('publishers', null, array('class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group"> 
				<div class="col-sm-6">
					{{ Form::label('date', 'Год') }}
					{{ Form::text('date', null, array('class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group"> 
				<div class="col-sm-6">
					{{ Form::label('ISBN', 'ISBN') }}
					{{ Form::text('ISBN', null, array('class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group"> 
				<div class="col-sm-6">
					{{ Form::label('quantity', 'Количество') }}
					{{ Form::text('quantity', null, array('class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-6">
					{{ Form::label('usefuls', 'Рекомендуется для') }}
					{{ Form::text('usefuls', null, array('class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group"> 
				<div class="col-sm-6">
					{{ Form::label('cover', 'Переплет') }}
					{{ Form::select('cover', array('Твердый' => 'Твердый', 'Мягкий' => 'Мягкий')) }}
				</div>
			</div>

			<?php 
				$categories = array(0 => 'Выберите категорию');
    			foreach(Category::get(array('id', 'name')) as $category) {
       				$categories[$category->id] = $category->name;
    			}
    		?>

    		<div class="form-group"> 
				<div class="col-sm-6">
    				{{ Form::label('category_id', 'Категория') }}
        			{{ Form::select('category_id', $categories) }}
        		</div>
			</div>

			{{ Form::label('picture', 'Обложка книги') }}
			{{ Form::file('picture') }}

			<img src="" id="thumb" style="max-width:300px; max-height: 200px; display: block;">

			{{ Form::hidden('image') }}

			{{ Form::file('images[]', array('multiple'=>true)) }}

			{{ Form::submit('Создать', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}

		@include('partials.errors', $errors)
	</div>

	<div class="error"></div>
</div>

<!-- Если пользователь неудачно заполнит форму, то ему не надо будет повторно выбирать изображение книги -->
<script>
	$(document).ready(function() {
		if($('input[name=image]').val() != "") {
			document.getElementById('thumb').setAttribute('src', $('input[name=image]').val());
		}
	});
</script>

@stop

@section('scripts')
@include('books.script')
@stop