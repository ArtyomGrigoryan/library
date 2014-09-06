@extends('layout')

@section('main')

<h3>Просмотр книг по переводчикам</h3>

@include('partials.show_books', $var)

@stop