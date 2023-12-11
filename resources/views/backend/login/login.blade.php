<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Panel</title>
    <link rel="shortcut icon" href="{{asset('img/icon.png')}}">
    <link rel="stylesheet" href="{{asset('backend/css/uikit.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
    <!-- <script src="js/jquery.min.js"></script> -->
    <style type="text/css">
      body{background: #ddd;}
      input[type="text"], input[type="password"]{
          border: none;
          border-bottom: 1.5px solid #e2e5e8;
          border-radius: 0;
      }
      .form-control:focus {
        color: none;
        background-color: none;
        border-color: none;
        outline: none;
        box-shadow: none;
      }

    </style>
  </head>
  <body style="background: #ddd;">
    <section class="my-5 p-3 py-5" style="max-width: 450px;margin: auto;">
      <div class="card">
        <div class="card-body">

          <form class="py-4" method="post" id="myForm" autocomplete="off">
            <hr>
            @csrf
            <h6 class="text-center text-danger" id="msg"></h6>
            <div class="form-group">
              <label for="phone">Email</label>
              <input type="text" name="email" value="" id="email" class="form-control" placeholder="E-mail address">
              <small id="erremail" class="form-text" style="color:red;"></small>
            </div>

            <div class="form-group">
              <label  for="password">Password</label>
              <input type="password" name="password" value="" id="password" class="form-control" placeholder="Password">
              <small id="errpassword" class="form-text" style="color:red;"></small>
            </div>
            <div class="form-check my-2">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="chbox">
              <label class="form-check-label" for="exampleCheck1">Check me login</label>
            </div>
            <input type="submit" value="Login" class="btn btn-dark mt-4 btn-sm btn-block">
          </form>

            <small class="d-block text-center">&copy; {{date('Y')}} Shak Ziaur Rahman Tito</small>

        </div>
      </div>
    </section>
    <script src="{{asset('backend/js/jquery.min.js')}}"></script>
    <script src="{{asset('backend/js/popper.min.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/js/uikit.min.js')}}"></script>
    <script src="{{asset('backend/js/uikit-icons.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript">

        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-bottom-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
    
        @if(Session::has('success'))
            toastr.success('{{Session::get('success')}}');
            @php
                Session::forget("success");
            @endphp
        @elseif(Session::has('info'))
            toastr.info('{{Session::get('info')}}')
            @php
                Session::forget("info");
            @endphp
        @elseif(Session::has('warning'))
            toastr.warning('{{Session::get('warning')}}')
            @php
                Session::forget("warning");
            @endphp
        @elseif(Session::has('error'))
            toastr.error('{{Session::get('error')}}')
            @php
                Session::forget("error");
            @endphp
        @endif

    </script>

    <script type="text/javascript">

/*For insert */

      $("#myForm").submit(function(){

          var form = $("#myForm").get(0);

          $.ajax({
            url : "{{Route('loginCheck.uloginCheck')}}",
            method: "post",
            data : new FormData(form),
            contentType : false,
            processData : false,
            beforeSend : function(){
                $(document).find(".form-text").text("");
            },
            success: function(response){

                if(response.status == "validatorError"){
                    $.each(response.data, function(key, value){
                        $("#err"+key).text(value).css("color","red");
                    });
                }

                if(response.reload == true){
                    location.reload();
                    $("#myForm")[0].reset();
                }
            }
          });

        return false;

      });
    </script>
  </body>
</html>