@php
$setting = App\Models\setting::find(1);
@endphp

<div class="container">
    <div class="head_section">
        <div class="logo">
            <a href="{{ route('home-page') }}"> <img src="{{isset($setting->logo) ? asset($setting->logo) : ''}}" alt="{{isset($setting->name) ? $setting->name : ''}}"> </a>
        </div>
        <div class="title">
            <div class="main_title">{{isset($setting->name) ? $setting->name : ''}}</div>
            <div class="sub_title">{{isset($setting->address) ? $setting->address : ''}}</div>
        </div>
    </div>
</div>


@if(App\Models\scrollnotice::where("status", 1)->count() > 0)
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="news-marquee">
                <div class="news">News:</div>
                <div class="lates-news">
                    <marquee behavior="scroll" direction="left" onmouseover="this.stop()" onmouseout="this.start()">
                        <div class="marquee-item">
                            @foreach(App\Models\scrollnotice::orderby("priority","ASC")->where("status", 1)->get() as $snoticeData)
                            <a href="{{$snoticeData->link}}"> <span class="marquee__seperator"></span>{{$snoticeData->name}}</a>
                            @endforeach
                        </div>
                    </marquee>
                </div>
                <div class="all-news"></div>
            </div>
        </div>
    </div>
</div>
@endif