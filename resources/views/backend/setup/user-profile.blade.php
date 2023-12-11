@extends('backend.layout.app')

@section("title","Slider List")
@section("content")

<div class="col-md-10">

    @if (session()->has('failure'))
    <p class="text-danger text-center fs-4 mt-2 mb-0">{{ session()->get('failure') }}</p>
    @endif


    <div class="col-md-10">

        <div class="user-update py-3">
            <div class="heading">
                <h4 class="m-0 pb-3 mb-4 border-bottom">Edit Profile</h4>
            </div>
            <div class="card">
                <div class="card-body">

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            @if (Session::has('message'))
                            <h5 class="form-text text-danger text-center">
                                {{ Session::get('message') }}
                            </h5>
                            @endif

                            <form class="my-2" id="ProfileUpdate" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                                <div class="form-group">
                                    <label>Name *</label>
                                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" placeholder="Enter name">
                                    <small id="errname" class="form-text"></small>
                                </div>

                                <div class="form-group">
                                    <label>Email Address *</label>
                                    <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}" placeholder="example@gmail.com">
                                    <small id="erremail" class="form-text"></small>
                                </div>

                                <button type="submit" class="btn btn-primary" style="background-color: #572c84!important;border-color: #572c84!important;">Save
                                    Change</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>



            <div class="heading mt-5">
                <h4 class="m-0 pb-3 mb-4 border-bottom">Change Password</h4>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <form class="my-2" id="passwordChange" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label>Old Password *</label>
                                    <input type="password" name="oldpassword" class="form-control" placeholder="Password">
                                    <small id="erroldpassword" class="form-text text-danger"></small>
                                </div>

                                <div class="form-group">
                                    <label>New Password *</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <small id="errpassword" class="form-text text-danger"></small>

                                </div>

                                <div class="form-group">
                                    <label>Confirm Password *</label>
                                    <input type="password" name="repassword" class="form-control" placeholder="Confirm Password">
                                    <small id="errrepassword" class="form-text text-danger"></small>

                                </div>

                                <button type="submit" class="btn btn-primary" style="background-color: #572c84!important;border-color: #572c84!important;">Save
                                    Change</button>
                            </form>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .as-pf-setup {
            margin: auto;
            display: table;
        }

        .as-pf-img {
            position: relative;
            width: 110px;
            height: 110px;
            border: 3px solid #ddd;
            border-radius: 50%;
            background-color: #f7f7f7;
        }

        .as-pf-img img {
            width: 104px;
            height: 104px;
            line-height: 104px;
            object-fit: cover;
            overflow: hidden;
            border-radius: 50%;
        }

        .as-pf-img .edit-btn {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            cursor: pointer;
            transition: all 0.3s ease 0s;
            -webkit-transition: all 0.3s ease 0s;
        }

        .as-pf-img .edit-btn i {
            font-size: 20px;
            color: #000;
            cursor: pointer;
            display: none;
        }

        .as-pf-img:hover::before {
            position: absolute;
            content: '';
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, .35);
        }

        .as-pf-img:hover .edit-btn i {
            color: #fff;
            display: block;
        }

        @media only screen and (max-width: 767px) {
            .as-pf-img:hover::before {
                position: relative;
                background-color: none;
            }

            .as-pf-img .edit-btn {
                left: auto !important;
                top: auto !important;
                bottom: 0 !important;
                right: 6px !important;
                transform: none;
            }

            .as-pf-img .edit-btn i {
                display: block;
            }

            .as-pf-img:hover .edit-btn i {
                color: #777;
            }
        }
    </style>


</div>
</div>
</div>
</div>
</section>

@endsection

@section("script")
<script type="text/javascript">
    // profile Form Update
    $("#ProfileUpdate").submit(function(){
        var form = $("#ProfileUpdate").get(0);
        $.ajax({
        url : "{{ Route('profile.udate') }}",
        method: "post",
        data : new FormData(form),
        contentType : false,
        processData : false,
        beforeSend : function(){
            $(document).find(".form-text").text("");
        },
        success: function(data){
            if(data.message == "error"){
                $.each(data.data, function(key, value){
                    $("#err"+key).text(value).css("color","red");
                });
            }
            if(data.status == "reload"){
                window.location.href = "{{Route('user.profile')}}"
            }
        }
        });
        return false;
    });
    
    
    /*----user password update----*/
    
    $("#passwordChange").submit(function(){
        var form = $("#passwordChange").get(0);
        $.ajax({
        url : "{{ Route('password.change') }}",
        method: "post",
        data : new FormData(form),
        contentType : false,
        processData : false,
        beforeSend : function(){
            $(document).find(".form-text").text("");
        },
        success: function(data){
            if(data.message == "error"){
                $.each(data.data, function(key, value){
                    $("#err"+key).text(value).css("color","red");
                });
            }
            if(data.status == "reload"){
                window.location.href = "{{Route('user.profile')}}"
            }
        }
        });
        return false;
    }); 
</script>

@endsection