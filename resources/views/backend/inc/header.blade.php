@php $setting = App\Models\setting::find(1);@endphp
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

  <link rel="stylesheet" href="{{asset('backend/css/uikit.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/font-awesome.min.css')}}">
  <link rel="shortcut icon" href="{{isset($setting->logo) ? asset($setting->logo) : ''}}" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
  <script src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>
  <link rel="stylesheet" href="{{asset('backend/css/custom.style.css')}}">

    <style type="text/css">
      .side-menu{}
      .side-menu li{font-size: 18px;
          border-bottom: 1px solid #9db3c9;
          margin-top: 10px;
        }
      .side-menu li:last-child{
        border-bottom: none;
      }
      .side-menu li a{color: #eedddd;}
      .side-menu li i{margin-right: 10px;}
      .side-menu li ul li{
        font-size: 18px;
        border-bottom: none;
        margin-top: 10px;
      }
      .side-menu li a:hover{
        color: #b39292;
      }
      .side-menu li a:hover{
        text-decoration: none;
      }
      .navbar-nav li a{
        font-size: 18px;
      }
      .navbar-nav li a i{
        font-size: 18px;
        margin-right: 5px;
      }
    </style>


  </head>
  <body>

    <!--Navbar-->

    <nav class="navbar navbar-dark bg-dark navbar-expand-md sticky-top">
      <!-- <div class="container"> -->
        <!-- <a href="" class="navbar-brand">Online Shopping</a> -->
        <button data-target="#myNav" data-toggle="collapse" class="navbar-toggler navbar-toggler-right"><span class="navbar-toggler-icon"></span></button>

        <div class="navbar-collapse collapse" id="myNav">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" target="_blank" href="{{url('/')}}"><i class="fa fa-arrows" aria-hidden="true"></i>Visite Site</a></li>
             
             {{-- <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-envelope-open-o" aria-hidden="true"></i>Inbox</a></li> --}}

             <li class="nav-item"><a class="nav-link" href="" id="profilename">Welcome! {{isset(Auth::user()->name) ? Auth::user()->name : '' }}</a></li>

          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"></li>
            {{-- <li class="nav-item" title="Change your image"><a class="nav-link" href="">
              <img style="height:30px;width: 30px;border-radius: 50%;" src="" id="profileimg">
            </a></li> --}}
            
            <li class="nav-item avatar">
                <img class="user-options-btn" src="{{ asset('backend/images/user.png') }}" alt="Avatar">
                <div class="user-options">
                    <div class="head">
                        <div class="image">
                            <img src="{{ asset('backend/images/user.png') }}" alt="Avatar">
                        </div>
                        <div class="content">
                            <div class="name">Dipankar</div>
                            <div class="sub-title">admin</div>
                        </div>
                    </div>
                    <div class="body">
                        <hr>
                        <a href="{{ route('user.profile') }}" class="link">
                            <div class="icon"><i class="fa-regular fa-user"></i></div>
                            <div class="txt">Profile</div>
                        </a>
                        <a href="#" class="link">
                            <div class="icon"><i class="fa-solid fa-gear"></i></div>
                            <div class="txt">Settings</div>
                        </a>
                        <a href="#" class="link">
                            <div class="icon"><i class="fa-regular fa-credit-card"></i></div>
                            <div class="txt">Billing</div>
                        </a>
                        <hr>
                        <a href="#" class="link">
                            <div class="icon"><i class="fa-regular fa-life-ring"></i></div>
                            <div class="txt">Help</div>
                        </a>
                        <a href="#" class="link">
                            <div class="icon"><i class="fa-solid fa-dollar-sign"></i></div>
                            <div class="txt">Pricing</div>
                        </a>
                        <a href="#" class="link">
                            <div class="icon"><i class="fa-solid fa-question"></i></div>
                            <div class="txt">FAQ</div>
                        </a>
                        <hr>
                        <a href="{{route('login.ulogout')}}" class="link">
                            <div class="icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></div>
                            <div class="txt">Logout</div>
                        </a>
                    </div>
                </div>
            </li>
          </ul>
        </div>
    </nav>