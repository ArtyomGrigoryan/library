@extends('layout')

@section('main')

<h1><b>Главная</b></h1>                           

<b>Категории</b><br>

@foreach($categories as $category)
	{{ link_to_route('category.show', $category->name, array($category->id)) }}<br>
@endforeach

<b>Направления подготовки</b><br>

@foreach($directions as $direction)
	<div class="col-sm-6 col-md-3">
		<a href="{{ URL::route('direction.show', array($direction->id)) }}"><img src="{{ $direction->picture }}" style="width:139px; height: 175px; display: block;"></a>
	</div>
@endforeach

@stop
