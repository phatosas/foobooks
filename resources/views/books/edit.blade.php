@extends('layouts.master')

@section('title')
	Edit book {{ $book->title }}
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')

@stop


@section('content')

	<h1>Edit book {{ $book->title }}</h1>
	
	<form method='POST' action='/books/edit'>
		
		<input type='hidden' name='id' value='{{ $book->id }}'>
	
		{{ csrf_field() }}
	
		<div class='form-group'>
			<label>Title:</label>
			<ul class='errors'>
			<li>{{ $errors->first('title') }}</li><br>
			</ul>
			<input
				type='text'
				id='title'
				name='title'
				value='{{ $book->title }}'
			>
		</div>
		
		<div class='form-group'>
			<label>Author:</label>
			<ul class='errors'>
			<li>{{ $errors->first('author') }}</li><br>
			</ul>
			<input
				type='text'
				id='author'
				name='author'
				value='{{ $book->author }}'
			>
		</div>

		<div class='form-group'>
			<label>Published (YYYY):</label>
			<ul class='errors'>
			<li>{{ $errors->first('published') }}</li><br>
			</ul>
			<input
				type='text'
				id='published'
				name='published'
				value='{{ $book->published }}'
			>
		</div>
		
		<div class='form-group'>
			<label>URL of cover image:</label>
			<ul class='errors'>
			<li>{{ $errors->first('cover') }}</li><br>
			</ul>
			<input
				type='text'
				id='cover'
				name='cover'
				value='{{ $book->cover }}'
			>
		</div>
		
		<div class='form-group'>
			<label>URL to purchase this book:</label>
			<ul class='errors'>
			<li>{{ $errors->first('purchase_link') }}</li><br>
			</ul>
			<input
				type='text'
				id='purchase_link'
				name='purchase_link'
				value='{{ $book->purchase_link }}'
			>
		</div>
		
		<button type="submit" class="btn btn-primary">Save Changes</button><br>
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
