@extends('frontend.layout.app')
@section("title", $notice->name)
@section("meta")
    <meta name="author" content="{{$notice->name}}">
@endsection
@section("content")
<div class="notice-details">
    <h2>{{ $notice->name }}</h2>
    <a href="{{ asset($notice->file) }}" class="download" download><i class="fa fa-file-pdf-o" aria-hidden="true"></i> {{ $notice->name }}</a>
    <div class="file">
        <iframe src="{{ asset($notice->file) }}" 
                width="100%"
                height="650">
        </iframe>
    </div>
</div>

@endsection