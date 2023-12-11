@php
    $setting = App\Models\setting::find(1);
@endphp

@extends('frontend.layout.app')
@section("title", isset($setting->name) ? $setting->name : '')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="pm">
            <a href="{{isset($setting->bannerlink) ? $setting->bannerlink : url('/')}}" title="Ads Bannar">
                <img src="{{isset($setting->banner) ? $setting->banner : ''}}" width="100%" align="banner" alt="Ads Image" />
            </a>
        </div>
    </div>
</div>

@if(App\Models\scrollnotice::where("status", 1)->count() > 0)

<div class="row">
    <div class="col-sm-12">
        <div class="lates-news">
            <marquee behavior="scroll" direction="left" onmouseover="this.stop()" onmouseout="this.start()">
                <div class="marquee-item">
                    @foreach(App\Models\scrollnotice::orderby("priority","ASC")->where("status", 1)->get() as $snoticeData)

                    <a href="{{$snoticeData->link}}"> <span class="marquee__seperator"></span>{{$snoticeData->name}}</a>
                    @endforeach
                </div>
            </marquee>
        </div>
    </div>
</div>
@endif

@if(App\Models\notice::where("status", 1)->count() > 0)

<div class="row">
    <div class="col-sm-12">
        <div id="notice-board">
            <div class="notice-item">
                <div class="notice-title">
                    <h4>নোটিশ</h4>
                </div>
                <div class="notice-inner">
                    @foreach(App\Models\notice::orderby("id","DESC")->where("status", 1)->limit(5)->get() as $noticeData)
                    <div class="notice-widget">
                        <div class="notice-contant">
                            <p class="text">
                                <a href="{{ route('notice.details',$noticeData->slug) }}">{{Str::of($noticeData->name)->substr(0, 70)}}..</a>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="notice-btn">
                    <a href="{{ route('view.notice') }}"> সকল নোটিশ</a>
                </div>
            </div>
            <!-- Notice End -->
        </div>
    </div>
</div>

@endif


<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="widget-inner">
            <div class="row">

                @if($widget != null)
                @foreach($widget as $widgetData)
                <div class="col-sm-6">
                    <div class="widget">
                        <h4>{{$widgetData->name}}</h4>
                        <div class="widget-item">
                            <div class="widget-left">
                                <img src="{{asset($widgetData->image)}}" alt="{{$widgetData->name}}" />
                            </div>
                            <div class="widget-right">
                                <ul class="caption fade-caption" style="margin: 0;">
                                    @foreach($widgetData->widgetLink as $wdlinkData)
                                    <li><a href="
                                        @if($wdlinkData->target == 0)
                                            {{$wdlinkData->targetdata}}
                                        @elseif($wdlinkData->target == 1)
                                            {{Route('detailsread.details_read', $wdlinkData->slug)}}
                                        @elseif($wdlinkData->target == 2)
                                            {{Route('details.details_widget', $wdlinkData->slug)}}
                                        @endif
                                    " target="@if($wdlinkData->linkstatus == 1) _blank @endif">{{$wdlinkData->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif



            </div>
        </div>
    </div>
</div>
@endsection