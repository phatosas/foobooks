@extends('layouts.master')


@section('title')
    Delete Employee {{$employee->first_name}}
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
    
@stop


@section('content')

	<h1>Delete employee from the work force</h1>
	@if(count($errors) > 0)
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif
	<form method='POST' action='/employees/delete'>
		<input type='hidden' name='id' value='{{$employee->id}}'>
		{{ csrf_field() }}
		<p> Are you sure you want to delete {{$employee->first_name}} {{$employee->last_name}} ?</p>
		<a href='/employees'>&larr; Return back to previous page</a> <br><br>
		<button name="name" value="value" type="submit">delete</button>
		<br><br><br><br><br>
	</form>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    
@stop