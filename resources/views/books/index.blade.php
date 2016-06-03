@extends('layouts.master')


@section('title')
    All Books
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
    
@stop


@section('content')
	
	<h1>All the books</h1>
	
	<div class = 'book'>
		@foreach($books as $book)
			<h2>{{ $book->title}}</h2>
			<a href='/books/show/{{$book->id}}'><img src='{{ $book->cover }}' alt='Cover for {{ $book->title }}'></a>
			<a href='/books/edit/{{$book->id}}'>Edit</a>
		@endforeach
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    
@stop