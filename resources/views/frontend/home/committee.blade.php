@extends('frontend.layout.app')
@section("title", "Committees List")
@section("content")
@php
$setting = App\Models\setting::find(1);
@endphp

<div class="teacher-list-inner">
    <h2>আমাদের ম্যানেজিং কমিটি</h2>
    @if(isset($committees) && $committees != null)
    <div class="items">
        @foreach($committees as $key=>$item)
        <div class="item">
            <div class="bgc" style="background: linear-gradient(106.32deg, #{{ substr(rand(1000000000,900000000), 1, 6) }} 14.23%, rgba(255, 25, 25, 0) 139.97%)"></div>
            <div class="content">
                <div class="image">
                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                </div>
                <div class="info">
                    <h2 class="name">{{ $item->name }}</h2>
                    <h5 class="designation">{{ $item->designation }}</h5>
                    <a class="phone" href="tel:{{ $item->mobail }}"><i class="fa fa-phone" aria-hidden="true"></i> {{ $item->mobail }}</a>
                    <a class="mail" href="mailto:{{ $item->email }}"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{ $item->email }}</a>
                    <p class="address"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $item->address }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
        <div>Data Not Found!!</div>
    @endif
</div>

@endsection
