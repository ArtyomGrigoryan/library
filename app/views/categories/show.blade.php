@extends('layout')

@section('main')

<h3>Просмотр книг по категории "{{ $var->name }}"</h3>

@include('partials.show_books', $var)

@stop