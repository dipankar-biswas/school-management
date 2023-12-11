@extends('frontend.layout.app')
@section("title", $page->name)
@section("meta")
	<meta name="author" content="{{isset($page->description) ? $page->description : ''}}">
@endsection
@section("content")
{!!$page->description!!}
@endsection