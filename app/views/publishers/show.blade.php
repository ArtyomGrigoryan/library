@extends('layout')

@section('main')

<h3>Просмотр книг по издательствам</h3>

@include('partials.show_books', $var)

@stop