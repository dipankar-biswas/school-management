@extends('frontend.layout.app')
@section("title","Contact")
@section("content")
@php
$setting = App\Models\setting::find(1);
@endphp

@php
$setting = App\Models\setting::find(1);
@endphp
<div class="content mt-4">
    <div class="form-wrap">
        <div class="heading mb-5">
            <h1 class="title text-body fw-bold">Contact</h1>
            <p>{{isset($setting->email) ? $setting->email : ''}}, {{isset($setting->phone) ? $setting->phone : ''}}, {{isset($setting->address) ? $setting->address : ''}}</p>
        </div>
        <!-- <div class="info">
            <div class="step">
                <div class="icon"></div>
                <h3 class="Title">Email</h3>
                <p>example@gmail.com</p>
            </div>
            <div class="step">
                <div class="icon"></div>
                <h3 class="Title">Phone</h3>
                <p>01646458765</p>
            </div>
            <div class="step">
                <div class="icon"></div>
                <h3 class="Title">Address</h3>
                <p>271-outer circler road Dhaka, BD</p>
            </div>
        </div> -->
        <form class="pb-4 border-bottom">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                        <input type="text" class="form-control fs-5 py-3" placeholder="Full Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-4">
                        <input type="text" class="form-control fs-5 py-3" placeholder="Phone Number">
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <input type="email" class="form-control fs-5 py-3" placeholder="example@gmail.com">
            </div>
            <div class="mb-4">
                <textarea name="" id="" rows="6" class="form-control fs-5 py-3" placeholder="Enter Your Message"></textarea>
            </div>
            <button type="button" class="custom-btn rounded-3 py-2 px-5 fw-bold">Send</button>
        </form>

        <div class="maps mt-5">
            {!! isset($setting->maps) ? $setting->maps : '' !!}
        </div>
    </div>
</div>
@endsection