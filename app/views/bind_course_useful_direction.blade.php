@extends('layout')

@section('main')

<div class="col-md-7 col-md-offset-3">
	<h1>Связать курс, предмет, направление подготовки</h1>

	<div class="form-horizontal">
		{{ Form::open(array('action' => 'BindController@storeCourseUsefulDirection')) }}

			<?php 
				$courses = array(0 => 'Выберите курс');
    			foreach(Course::get(array('id', 'name')) as $course) {
       				$courses[$course->id] = $course->name;
    			}
    		?>

    		<div class="form-group"> 
				<div class="col-sm-6">
    				{{ Form::label('course_id', 'Курс') }}
        			{{ Form::select('course_id', $courses) }}
        		</div>
			</div>

            <?php 
                $directions = array(0 => 'Выберите направление подготовки');
                foreach(Direction::get(array('id', 'name')) as $direction) {
                    $directions[$direction->id] = $direction->name;
                }
            ?>

            <div class="form-group"> 
                <div class="col-sm-6">
                    {{ Form::label('direction_id', 'Направление подготовки') }}
                    {{ Form::select('direction_id', $directions) }}
                </div>
            </div>

    		<div class="form-group">
                <div class="col-sm-6">
                    {{ Form::label('usefuls', 'Предмет') }}
                    {{ Form::text('usefuls', null, array('class' => 'form-control')) }}
                </div>
            </div>

			{{ Form::submit('Связать', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}

		@include('partials.errors', $errors)
	</div>
</div>

@stop