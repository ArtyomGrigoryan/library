@extends('layout')

@section('main')

<h3>Просмотр предметов</h3>

@foreach($usefuls as $useful)
	{{ link_to_route('useful.show', $useful->name, array($useful->id)) }}<br>	
@endforeach

@stop