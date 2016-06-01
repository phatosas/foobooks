@extends('layouts.master')

@section('title')
	Add a new book
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')

@stop


@section('content')

	<h1>Add a new book</h1>
	
	<form method='POST' action='/books/create'>
	
		{{ csrf_field() }}
	
		<div class='form-group'>
			<label>* Title:</label>
			<ul class='errors'>
			<li>{{ $errors->first('title') }}</li><br>
			</ul>
			<input
				type='text'
				id='title'
				name='title'
				value={{ old('title') }}
			>
		</div>
		
		<div class='form-group'>
			<label>* Author:</label>
			<ul class='errors'>
			<li>{{ $errors->first('author') }}</li><br>
			</ul>
			<input
				type='text'
				id='author'
				name='author'
				value={{ old('author') }}
			>
		</div>
	
		<button type="submit" class="btn btn-primary">Add book</button><br>
		<ul class='errors'>
		@if(count($errors) > 0)
			<li>Please correct the errors above and try again.</li>
		@endif
		</ul>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop
