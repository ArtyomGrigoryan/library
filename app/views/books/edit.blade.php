@extends('layout')

@section('main')

<div class="col-md-7 col-md-offset-3">
	<h1>Редактирование книги</h1>

	<div class="form-horizontal">
		{{ Form::model($book, array('method' => 'PATCH', 'route' => array('book.update', $book->id), 'files' => true, 'enctype' => 'multipart/form-data')) }}

			<div class="form-group">
				<div class="col-sm-6">
					{{ Form::label('name', 'Название') }}
					{{ Form::text('name', $book->name, array('class' => 'form-control')) }}
				</div>
			</div>

			<?php
			$authors = "";
			foreach($book->authors as $author) {
				$authors .= $author->name.", ";
			}
			?>

			<div class="form-group">
				<div class="col-sm-6">
					{{ Form::label('authors', 'Автор') }}
					{{ Form::text('authors', rtrim($authors, ', '), array('class' => 'form-control')) }}
				</div>
			</div>

			<?php
			$translators = "";
			foreach($book->translators as $translator) {
				$translators .= $translator->name.", ";
			}
			?>

			<div class="form-group">
				<div class="col-sm-6">
					{{ Form::label('translators', 'Переводчик') }}
					{{ Form::text('translators', rtrim($translators, ', '), array('class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group"> 
				<div class="col-sm-6">
					{{ Form::label('pages', 'Страниц') }}
					{{ Form::text('pages', $book->pages, array('class' => 'form-control')) }}
				</div>
			</div>

			<?php
			$publishers = "";
			foreach($book->publishers as $publisher) {
				$publishers .= $publisher->name.", ";
			}
			?>

			<div class="form-group"> 
				<div class="col-sm-6">
					{{ Form::label('publishers', 'Издательство') }}
					{{ Form::text('publishers', rtrim($publishers, ', '), array('class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group"> 
				<div class="col-sm-6">
					{{ Form::label('date', 'Год') }}
					{{ Form::text('date', $book->date, array('class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group"> 
				<div class="col-sm-6">
					{{ Form::label('ISBN', 'ISBN') }}
					{{ Form::text('ISBN', $book->ISBN, array('class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group"> 
				<div class="col-sm-6">
					{{ Form::label('cover', 'Переплет') }}
					{{ Form::select('cover', array('Твердый' => 'Твердый', 'Мягкий' => 'Мягкий'), $book->cover) }}
				</div>
			</div>

			<?php
			$usefuls = "";
			foreach($book->usefuls as $useful) {
				$usefuls .= $useful->name.", ";
			}
			?>

			<div class="form-group">
				<div class="col-sm-6">
					{{ Form::label('usefuls', 'Рекомендуется для') }}
					{{ Form::text('usefuls', rtrim($usefuls, ', '), array('class' => 'form-control')) }}
				</div>
			</div>

			<?php 
				$categories = array(0 => $book->category->name);
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

			{{ Form::label('picture', 'Изображение') }}
			{{ Form::file('picture') }}

			<img src="{{ URL::to($book->picture) }}" id="thumb" style="max-width:300px; max-height: 200px; display: block;">
			
			{{ Form::hidden('image', $book->picture) }}

			{{ Form::submit('Редактировать', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}

		@include('partials.errors', $errors)
	</div>

	<div class="error"></div>
</div>

@stop

@section('scripts')
@include('books.script')
@stop