@extends('frontend.layout.app')
@section("title","About Us")
@section("content")
@php
$setting = App\Models\setting::find(1);
@endphp

@php
$setting = App\Models\setting::find(1);
@endphp
<div class="about-us mt-4">
    @if(isset($setting) && $setting != null)
    {!! $setting->about !!}
    @endif
</div>
@endsection