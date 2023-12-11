<section class="container-fluid">
  <div class="row">
    <div class="col-md-2 bg-dark paddingHeight" style="min-height: 550px;">
      <div id="accordian">
        <ul class="list-unstyled side-menu my-3">
                
              
              <li class="p-1 tree">
                <a href="{{Route('dashboard.index')}}"><i class="fa fa-tachometer"></i>Dashboard</a>
              </li>
              
              <li class="p-1 tree"><a href="#select-1" data-toggle="collapse"><i class="fa fa-users" aria-hidden="true"></i>People</a>
                  <ul class="collapse list-unstyled ml-4" id="select-1" data-parent="#accordian">
                    <li><a href="{{Route('memberadd.index')}}">Add Member</a></li>
                    <li><a href="{{Route('emadd.index')}}">Add Employee</a></li>
                  </ul>
              </li>



              <li class="p-1 tree"><a href="#select-2" data-toggle="collapse"><i class="fa fa-files-o" aria-hidden="true"></i>Pages</a>
                  <ul class="collapse list-unstyled ml-4" id="select-2" data-parent="#accordian">
                    <li><a href="{{Route('pageadd.index')}}">Add Page</a></li>
                    <li><a href="{{Route('staticpage.static')}}">Static Page</a></li>
                  </ul>
              </li>


              <li class="p-1 tree"><a href="#select-3" data-toggle="collapse"><i class="fa fa-thumb-tack" aria-hidden="true"></i>Notice</a>
                  <ul class="collapse list-unstyled ml-4" id="select-3" data-parent="#accordian">
                    <li><a href="{{Route('noticeadd.index')}}">Add Notice</a></li>
                    <li><a href="{{Route('snoticeadd.index')}}">Add Slide Notice</a></li>
                  </ul>
              </li>


              <li class="p-1 tree"><a href="#select-4" data-toggle="collapse"><i class="fa fa-bars" aria-hidden="true"></i>Navbars</a>
                  <ul class="collapse list-unstyled ml-4" id="select-4" data-parent="#accordian">
                    <li><a href="{{Route('navbaradd.index')}}">Add Navbar</a></li>
                  </ul>
              </li>
              

              <li class="p-1 tree"><a href="#select-5" data-toggle="collapse"><i class="fa fa-paint-brush" aria-hidden="true"></i>Wedget</a>
                  <ul class="collapse list-unstyled ml-4" id="select-5" data-parent="#accordian">
                    @if(theme() == "v1" || theme() == "v3") <li><a href="{{Route('sadd.index')}}">Add Slider</a></li> @endif
                    <li><a href="{{Route('wedget.addwedget')}}">Add Wedget</a></li>
                    <li><a href="{{Route('wedgetlink.index')}}">Add Link</a></li>
                  </ul>
              </li>



              <li class="p-1 tree"><a href="#select-6" data-toggle="collapse"><i class="fa fa-sliders" aria-hidden="true"></i>SideBar</a>
                  <ul class="collapse list-unstyled ml-4" id="select-6" data-parent="#accordian">
                    
                    <li><a href="{{Route('sltadd.index')}}">Add Title</a></li>
                    <li><a href="{{Route('sladd.index')}}">Add Link</a></li>
                    <li><a href="{{Route('siadd.index')}}">Add Image</a></li>
                  </ul>
              </li>

              <li class="p-1 tree"><a href="#select-7" data-toggle="collapse"><i class="fa fa-user"></i>User</a>
                  <ul class="collapse list-unstyled ml-4" id="select-7" data-parent="#accordian">
                    <li><a href="{{Route('userdd.index')}}">Add User</a></li>
                  </ul>
              </li>


              <li class="p-1 tree" id="settingModal"><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i>Settings</a></li>

           {{--  <li class="p-1 tree"><a href="{{Route('login.ulogout')}}"><i class="fa fa fa-sign-out"></i>Logout</a>
              </li> --}}

        </ul>
      </div>
  </div>