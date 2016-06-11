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
			<label for title>* Title:</label>
			<ul class='errors'>
			<li>{{ $errors->first('title') }}</li><br>
			</ul>
			<input
				type='text'
				id='title'
				name='title'
				value='{{ old('title') }}'
			>
		</div>
		
		<div class='form-group'>
			<label for='author_id'>Author:</label>
			<ul class='errors'>
			<li>{{ $errors->first('author_id') }}</li><br>
			</ul>
			<select id='author_id' name='author_id'>
				@foreach($authors_for_dropdown as $author_id => $author_name)
					<option value='{{$author_id}}'>
						{{$author_name}}
					</option>
				@endforeach			
			</select>
		</div>

		<div class='form-group'>
			<label for published>* Published (YYYY):</label>
			<ul class='errors'>
			<li>{{ $errors->first('published') }}</li><br>
			</ul>
			<input
				type='text'
				id='published'
				name='published'
				value='{{ old('published') }}'
			>
		</div>
		
		<div class='form-group'>
			<label>* URL of cover image:</label>
			<ul class='errors'>
			<li>{{ $errors->first('cover') }}</li><br>
			</ul>
			<input
				type='text'
				id='cover'
				name='cover'
				value='{{ old('cover') }}'
			>
		</div>
		
		<div class='form-group'>
			<label>* URL to purchase this book:</label>
			<ul class='errors'>
			<li>{{ $errors->first('purchase_link') }}</li><br>
			</ul>
			<input
				type='text'
				id='purchase_link'
				name='purchase_link'
				value='{{ old('purchase_link') }}'
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
