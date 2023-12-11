@extends('frontend.layout.app')
@section("title", $member->name)
@section("meta")
	<meta name="author" content="{{isset($member->description) ? $member->description : ''}}">
@endsection
@section("content")
{!!$member->description!!}
@endsection