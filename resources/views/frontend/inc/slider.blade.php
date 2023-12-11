<section class="slider-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="border-section">
                    <div class="under"></div>
                </div>
                <div class="callbacks_container">

                    <div id="main-slide" class="owl-carousel owl-theme">
                        @if(App\Models\slider::where("status", 1)->count() > 0)
                        @foreach(App\Models\slider::where("status", 1)->get() as $sliderData)
                        <div class="item">
                            <div class="slide-img" style="background-image:url('{{asset($sliderData->image)}}');">
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>

                    <div class="header-site-info" id="header-site-info">
                        <div class="header-site-inner">

                            <div id="logo">
                                <a title="" href="{{ route('home-page') }}">
                                    <img alt="Logo" src="{{isset($setting->logo) ? asset($setting->logo) : ''}}" />
                                </a>
                            </div>
                            <div class="clearfix" id="site-name-wrapper">
                                <span id="site-name">
                                    <a href="{{ route('home-page') }}">{{isset($setting->name) ? $setting->name : ''}}</a>
                                </span>
                                <span id="slogan">{{isset($setting->address) ? $setting->address : ''}}</span>
                            </div>
                            <!-- /site-name-wrapper -->
                        </div>
                        <!-- /header-site-info-inner -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>