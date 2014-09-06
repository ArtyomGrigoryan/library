@extends('layout')

@section('main')

@if($authors->count() and $books->count())
	Отсортировать по: 
	<div id="link_authors">
		<a href="#">авторам</a>
	</div>
	<div id="link_books">
		<a href="#">названиям</a>
	</div>
@endif

@if($books->count())
	<div id="books_name">
		<h3>Книги по названию</h3>
		<div class="row">
			@foreach($books as $book)
		 		<div class="col-sm-6 col-md-3">
		 			<a href="{{ URL::route('book.show', array($book->id)) }}">
			    		<div class="thumbnail" style="height:367px;">
			      			<img src="{{ $book->picture }}" style="max-width:300px; max-height: 200px; display: block;">
			      			<div class="caption">
			        			<h4>{{ $book->name }}</h4>
			       				<b>Авторы</b>:
								@foreach($book->authors as $author)
									{{ link_to_route('author.show', $author->name, array($author->id)) }}
								@endforeach
			      			</div>
			    		</div>
			    	</a>
		  		</div>
			@endforeach
		</div>
	</div>
@endif

@if($authors->count())
	<div id="authors">
		<h3>Книги по автору</h3>
		@foreach($authors as $var)
			@include('partials.show_books', $var)
		@endforeach
	</div>
@endif

@stop

@section('scripts')
@include('search.script')
@stop