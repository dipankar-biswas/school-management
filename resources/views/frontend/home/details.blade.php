@extends('frontend.layout.app')
@section("title", $widgetLink->name)
@section("content")
@php
$setting = App\Models\setting::find(1);
@endphp

{!!$widgetLink->targetdata!!}

@endsection