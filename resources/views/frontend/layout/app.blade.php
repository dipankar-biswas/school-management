<!DOCTYPE html>
<html lang="en">
<head>
    @php
        $setting = App\Models\setting::find(1);
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="{{isset($setting->metadescription) ? $setting->metadescription : ''}}">
@yield('meta')
    <meta name="keywords" content="{{isset($setting->keywords) ? $setting->keywords : ''}}">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{isset($setting->name) ? $setting->name : ''}}">
    <meta itemprop="description" content="{{isset($setting->metadescription) ? $setting->metadescription : ''}}">
    <meta itemprop="image" content="{{isset($setting->logo) ? asset($setting->logo) : ''}}">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{isset($setting->logo) ? asset($setting->logo) : ''}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/lightgallery.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/notify.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/responsiveslides.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .owl-carousel {
            position: relative;
            height: 300px;
        }
        .owl-carousel div:not(.owl-controls) {
            height: 100%;
        }
        .owl-carousel .slide-img {
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        .owl-nav {
            display: none;
        }
    </style>
</head>

<body class="gotop" onload="startTime()">

    @include('frontend.inc.mobailnav')

        @if(theme() === 'v1' || theme() === 'v3')
            @include('frontend.inc.slider')
        @else
             @include('frontend.inc.header')
        @endif

    @include('frontend.inc.menus')
    <!-- Notice section Start -->
    <section class="Notice-area">
        <div class="container">
            {{-- request()->path() --}}
            {{-- collect(request()->segments())->first() --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="row {{ theme() === 'v3' || theme() === 'v4' ? 'reverse' : '' }}">
                        @if(theme() === 'v3' || theme() === 'v4')
                        <!-- ===================V2================= -->
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            @include("frontend.inc.sidebar")
                        </div>

                        <div class="col-sm-12 col-md-9 col-sm-lg-9">
                            @yield('content')
                        </div>
                        @else
                        <!-- ===================V================= -->
                        <div class="col-sm-12 col-md-9 col-sm-lg-9">
                            @yield('content')
                        </div>

                        <div class="col-sm-12 col-md-3 col-lg-3">
                            @include("frontend.inc.sidebar")
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Notice section End -->
    @include("frontend.inc.fotter")



<!-- ================================ -->

<script type="text/javascript" src="{{asset('frontend/js/jquery-3.5.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/responsiveslides.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/meanmenu.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/lightgallery-all.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/notify.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/script.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/owl.carousel.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#main-slide').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            margin: 0,
            slideSpeed: 300,
            paginationSpeed: 400,
            autoplay: true,
            // autoplayHoverPause:true,
            items: 1,
            animateIn: 'fadeIn', // add this
            animateOut: 'fadeOut', // and this
            responsiveClass: true,

            responsive: {
                0: {
                    items: 1
                    // nav:true
                },
                600: {
                    items: 1,
                    nav: false
                },
                1000: {
                    items: 1,
                    nav: true
                    // loop:false
                }
            }
        });


    });
</script>


<style>
    #myTable th {
        border: 1px solid #000000;
        line-height: 20px;
    }
</style>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<script type="text/javascript">
    function print_content() {
        var html_content = $("#printable_div").html();
        newwindow = window.open();
        newdocument = newwindow.document;
        newdocument.write(html_content);
        newdocument.close();
        newwindow.print();
        return false;
    }
</script>
<script>
    $('#lightgallery').lightGallery();
</script>

</body>

</html>