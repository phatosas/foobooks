@extends('layouts.master')


@section('title')
    Show book
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
    <link href="/css/books/show.css" type='text/css' rel='stylesheet'>
@stop


@section('content')
	<h1>{{ $book->title}}</h1>
	<h3>By {{ $book->author->first_name}} {{ $book->author->last_name}}</h3>
	<h3>{{ $book->published }}</h3>
	<div class = 'book'>
		<p><a href='{{ $book->purchase_link }}'>Purchase Link</a><p>
		<img src='{{ $book->cover }}' alt='Cover for {{ $book->title }}'><br>
		<a href='/books/edit/{{$book->id}}'>Edit</a> <a href='/books/delete/{{$book->id}}'>Delete</a>
    </div>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    <script src="/js/books/show.js"></script>
@stop
