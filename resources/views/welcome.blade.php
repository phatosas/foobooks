@extends('layouts.master')


@section('title')
    Foobooks
@stop

@section('head')

	   <link href='/css/welcome.css' rel='stylesheet'>
@stop

@section('content')
	<div class="container">
		<div class="content">
			<div class="title">Welcome to Foobooks</div>
		</div>
	</div>
@stop

{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop
