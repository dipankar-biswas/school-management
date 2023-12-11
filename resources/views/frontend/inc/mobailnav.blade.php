
    <div id="mobile-menu">
        <div class="container">
            <div class="row">

                <div class="col-sm-12">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" title="" href="{{url('/')}}">
            <img alt="Logo" src="{{isset($setting->logo) ? asset($setting->logo) : ''}}" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                
                @if(App\Models\navbar::where("status", 1)->where("parentid", 0)->count() > 0)

            @foreach(App\Models\navbar::where("status", 1)->where("parentid", 0)->get() as $key=>$navbarData)


                            @if(App\Models\navbar::where("status", 1)->where("parentid", $navbarData->id)->count() > 0)

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#"
                        id="navbarDropdownMenuLink{{$key}}" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">{{$navbarData->name}}
                                </a>
                                <ul class="dropdown-menu px-2" aria-labelledby="navbarDropdownMenuLink{{$key}}">
                                    @foreach(App\Models\navbar::where("status", 1)->where("parentid", $navbarData->id)->orderby("priority", "ASC")->get() as $subNav)
                                    <li class="nav-item d-block"><a href="{{$subNav->link}}" class="dropdown-item nav-link">{{$subNav->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                @else
                    <li class="nav-item"><a href="{{$navbarData->link}}" class="nav-link">{{$navbarData->name}}</a></li>
                @endif

            @endforeach

        @endif
            
    </ul>


        </div>
    </nav>

                </div>
            </div>
        </div>
    </div>
    