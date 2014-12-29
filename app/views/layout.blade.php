<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        {{ HTML::script('scripts/jquery-2.1.1.min.js') }}
        {{ HTML::script('scripts/bootstrap.min.js') }}
        {{ HTML::style('css/bootstrap.min.css') }}
    </head>

    <body>
    	<nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ URL::to('') }}">Библиотека РГУИТП</a>

                    {{ Form::open(array('action' => 'SearchController@store', 'class' => 'navbar-form navbar-left nav')) }}
                        <div class="form-group">
                            {{ Form::text('query', null, array('placeholder' => 'Искать...', 'class' => 'form-control' )) }}
                        </div>

                        {{ Form::submit('Искать', array('class' => 'btn btn-default')) }}
                    {{ Form::close() }}

                    <p class="navbar-text">
                        @if(Auth::user())
                            Здравствуйте, {{ Auth::user()->name }}! | <a href="/logout">Выйти</a>
                            @if(Auth::user()->role_id == 1)
                                <a class="navbar-text" href="{{ URL::to('admin_section') }}">Секция администратора</a>
                            @endif
                        @else
                            <a href="{{ URL::to('session/create') }}">Войти</a> | <a href="{{ URL::to('user/create') }}">Зарегистрироваться</a> | <a href="{{ URL::to('password/remind') }}">Забыли пароль?</a>
                        @endif
                    </p>
                </div>
            </div>
        </nav>

    	<div class="container"> 
            <div class="row">
                @if(Session::has('message'))
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p>{{ Session::get('message') }}</p>
                    </div>
                @endif                  

                @yield('main')
            </div>
        </div>

    	@yield('scripts')
    </body>
</html>