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
	<b>Количество</b>:
	@if($book->quantity == 0)
		Нет в наличии
	@else
		{{ $book->quantity }}
		@if(Auth::user()->role_id != 1)
			<br>
		@endif
	@endif

	@if(Auth::user()->role_id == 1)
		<div class="row">
			{{ Form::open(array('method' => 'POST', 'url' => array('/changeQuantityBook', $book->id))) }}

				<div class="form-group"> 
					<div class="col-xs-2">
						<input type="number" name="quantity" step="1" min="0" value="{{ $book->quantity }}" class="form-control">
					</div>
				</div>

				{{ Form::submit('Сохранить', array('class' => 'btn btn-primary')) }}
			{{ Form::close() }}<br>
		</div>
	@endif

	<b>Рекомендуется для следующих дисциплин:</b>
	@foreach($book->usefuls as $useful)
		{{ link_to_route('useful.show', $useful->name, array($useful->id)) }}
	@endforeach

	@if($book->picture)
		<div class="row">
	  		<div class="col-md-2">
				<a class="fancybox" rel="group" href="{{ $book->picture }}">
					<img src="{{ $book->picture }}" style="max-width:300px; max-height: 200px; display: block;">
				</a>
			</div>
		</div>
	@endif

	@if($book->images)
		<div class="row">
			@foreach(json_decode($book->images) as $image)
		  		<div class="col-md-1">
					<a class="fancybox" rel="group" href="{{ $image }}">
						<img src="{{ $image }}" style="max-width:50px; max-height: 100px; display: block;">
					</a>
				</div>	
			@endforeach
		</div>
	@endif

	@if(Auth::user()->role_id == 1)	
		{{ link_to_route('book.edit', 'Редактировать книгу', array($book->id)) }}<br>

		{{ Form::open(array('method' => 'DELETE', 'route' => array('book.destroy', $book->id))) }}
        	{{ Form::submit('Удалить', array('class' => 'btn btn-danger')) }}
        {{ Form::close() }}
	@endif
</div>

{{ HTML::style('/css/jquery.fancybox.css') }}
{{ HTML::style('/css/jquery.fancybox-buttons.css') }}
{{ HTML::script('/scripts/jquery.fancybox.pack.js') }}
{{ HTML::script('/scripts/jquery.fancybox-buttons.js') }}

<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>

@stop

