@extends('layout')

@section('main')

<h1>Секция администратора</h1>

<a href="{{ URL::to('category/create') }}">Добавить категорию</a><br>
<a href="{{ URL::to('book/create') }}">Добавить книгу</a><br>
<a href="{{ URL::to('direction/create') }}">Добавить направление подготовки</a><br>
<a href="{{ URL::to('course/create') }}">Добавить курс</a><br>
<a href="{{ URL::to('bind_course_direction') }}">Связать курс и направление подготовки</a><br>
<a href="{{ URL::to('bind_course_useful_direction') }}">Связать предмет с курсом и направлением подготовки</a><br>

@stop