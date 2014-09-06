@extends('layout')

@section('main')

<h3>Просмотр курсов</h3>

@foreach($direction->courses as $course) 
	{{ link_to_route('direction.course.show', $course->name, array($direction->id, $course->id)) }}<br>
@endforeach

@stop