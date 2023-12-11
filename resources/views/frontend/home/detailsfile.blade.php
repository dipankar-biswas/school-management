@extends('frontend.layout.app')
@section("title", $widgetLink->name)
@section("content")
@php
$setting = App\Models\setting::find(1);
@endphp

<div class="notice-details">
    <h2>{{ $widgetLink->name }}</h2>
    <a href="{{ asset($widgetLink->targetdata) }}" class="download" download><i class="fa fa-file-pdf-o" aria-hidden="true"></i> {{ substr($widgetLink->slug, 0, 80) }}</a>
    <div class="file">
        <iframe src="{{ asset($widgetLink->targetdata) }}" 
                width="100%"
                height="650">
        </iframe>
    </div>
</div>

@endsection