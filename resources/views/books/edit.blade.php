@extends('layouts.master')


@section('title')
    Edit Employee {{$employee->first_name}}
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
    
@stop


@section('content')

	<h1>Add a new employee to the work force</h1>
	@if(count($errors) > 0)
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif
	<form method='POST' action='/employees/edit'>
		<input type='hidden' name='id' value='{{$employee->id}}'>
		{{ csrf_field() }}
		<div class='form-group'>
			<label>* First Name:</label>  <input type='text' name='first_name' value ='{{$employee->first_name}}'> 
			<label>* Last Name:</label>  <input type='text' name='last_name' value ='{{$employee->last_name}}'> <br><br>
		</div>
		<div class='form-group'>
			<label>* Position:</label>   
				<input type='text' name='position' value ='{{$employee->position}}'> 
			</select>
			<br><br>
		</div>
		<div class='form-group'>
			<label>* Date of Birth:</label>
			<input type='text' name='month' value ='{{$employee->month}}'> 
			<input type='text' name='day' value ='{{$employee->day}}'> 
			<input type='text' name='year' value ='{{$employee->year}}'> 
			</select>
		</div>
	
	<input type='submit' value='Submit'>
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