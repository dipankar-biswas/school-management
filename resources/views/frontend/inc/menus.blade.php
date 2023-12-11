<!-- Slider Section Start -->
<section class="header-area" id="myHeader">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="menu-area">
                    <ul>
                        <li><a href="{{route('home-page')}}">
                                <img src="{{asset('frontend/images/home_dark.png')}}" alt="">
                            </a>
                        </li>


                        @if(App\Models\navbar::where("status", 1)->where("parentid", 0)->count() > 0)

                        @foreach(App\Models\navbar::where("status", 1)->where("parentid", 0)->orderby("priority", "ASC")->get() as $navbarData)


                        @if(App\Models\navbar::where("status", 1)->where("parentid", $navbarData->id)->count() > 0)

                            <li class="custom-dropdown">
                                <a class="anchor">{{$navbarData->name}} <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="submenu">
                                    @foreach(App\Models\navbar::where("status", 1)->where("parentid", $navbarData->id)->orderby("priority", "ASC")->get() as $subNav)
                                    <li><a href="{{$subNav->link}}">{{$subNav->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                        @else
                            <li><a href="{{$navbarData->link}}">{{$navbarData->name}}</a></li>
                        @endif

                        @endforeach

                        @endif


                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Slider section End -->