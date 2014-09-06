@extends('layout')

@section('main')

<div class="col-md-9 col-md-offset-1">
	<b>Название</b>: {{ $book->name }}<br>

	<b>Авторы</b>:
	@foreach($book->authors as $author)
		{{ link_to_route('author.show', $author->name, array($author->id)) }}
	@endforeach

	@if($book->translators->count())
		<br>
		<b>Переводчик</b>:
    	@foreach($book->translators as $translator)
        	{{ link_to_route('translator.show', $translator->name, array($translator->id)) }}
    	@endforeach
	@endif

	<br>
	<b>Издательство</b>: 
	@foreach($book->publishers as $publisher)
		{{ link_to_route('publisher.show', $publisher->name, array($publisher->id)) }}
	@endforeach

	<br>
	<b>Страниц</b>: {{ $book->pages }}<br>
	<b>Год</b>: {{ $book->date }}<br>
	<b>Переплет</b>: {{ $book->cover }}<br>
	<b>ISBN</b>: {{ $book->ISBN }}<br>

	<b>Рекомендуется для следующих дисциплин:</b>
	@foreach($book->usefuls as $useful)
		{{ link_to_route('useful.show', $useful->name, array($useful->id)) }}
	@endforeach
	<img src="{{ $book->picture }}" style="max-width:300px; max-height: 200px; display: block;"><br>

	@if(Auth::user()->role_id == 2)	
		{{ link_to_route('book.edit', 'Редактировать книгу', array($book->id)) }}<br>

		{{ Form::open(array('method' => 'DELETE', 'route' => array('book.destroy', $book->id))) }}
        	{{ Form::submit('Удалить', array('class' => 'btn btn-danger')) }}
        {{ Form::close() }}
	@endif
</div>

@stop