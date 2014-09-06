@extends('layout')

@section('main')

<h3>Просмотр книг по авторам</h3>

@include('partials.show_books', $var)

@stop