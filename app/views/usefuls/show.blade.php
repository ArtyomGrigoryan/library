@extends('layout')

@section('main')

<h3>Список книг, рекомендованных для подготовки к дисцилине "{{ $var->name }}"</h3>

@include('partials.show_books', $var)

@stop