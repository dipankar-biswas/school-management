@extends('backend.layout.app')

@section("title","Dashboard")
@section("content")

	<div class="col-md-10">

		<div class="m-2 my-4">
		      <div class="card my-2">
			      <div class="card-body">
			      		<h5>Dashboard</h5>
			      	<hr>
	<div class="row">
			<div class="col-md-6">
			    <div class="card mb-4">
				    <div class="card-body">
				    		<div style="overflow:hidden;">
				    			<h6 class="float-left h5">Admin user List</h6>
				    			<h6 class="float-right">Total : {{App\Models\User::count()}}</h6>
				    		</div>
				    	<hr>
				    @if(isset($users) && $users != null)
				      	<table class="table table-striped table-responsive-sm dataTable no-footer">
				      		<tr>
				      			<td>SL</td>
				      			<td>Name</td>
				      			<td>Email</td>
				      			<td>Created</td>
				      		</tr>
				      	@foreach($users as $user)
				      		<tr>
				      			<td>{{$loop->index + 1}}</td>
				      			<td>{{$user->name}}</td>
				      			<td>{{$user->email}}</td>
				      			<td>{{$user->created_at}}</td>
				      		</tr>
				      	@endforeach

				      	</table>
				    @endif
				    </div>
			    </div>

			    <div class="card mb-4">
				    <div class="card-body">
				    		<div style="overflow:hidden;">
				    			<h6 class="float-left h5">Member List</h6>
				    			<h6 class="float-right">Total : {{App\Models\member::count()}}</h6>
				    		</div>
				    	<hr>
				    @if(isset($members) && $members != null)
				      	<table class="table table-striped table-responsive-sm dataTable no-footer">
				      		<tr>
				      			<td>SL</td>
				      			<td>Name</td>
				      			<td>Designation</td>
				      			<td>Picture</td>
				      		</tr>
				      	@foreach($members as $member)
				      		<tr>
				      			<td>{{$loop->index + 1}}</td>
				      			<td>{{$member->name}}</td>
				      			<td>{{$member->designation}}</td>
				      			<td>
				      				<img src="{{asset($member->image)}}" alt="Image" width="60px">
				      			</td>
				      		</tr>
				      	@endforeach
				      	</table>
				    @endif
				    </div>
			    </div>
			    <div class="card my-4">
				    <div class="card-body">
				    		<div style="overflow:hidden;">
				    			<h6 class="float-left h5">Employee List</h6>
				    			<h6 class="float-right">Total : {{App\Models\employee::count()}}</h6>
				    		</div>
				    	<hr>
				    @if(isset($employees) && $employees != null)
				      	<table class="table table-striped table-responsive-sm dataTable no-footer">
				      		<tr>
				      			<td>SL</td>
				      			<td>Name</td>
				      			<td>Designation</td>
				      			<td>Picture</td>
				      		</tr>
				      	@foreach($employees as $employee)
				      		<tr>
				      			<td>{{$loop->index + 1}}</td>
				      			<td>{{$employee->name}}</td>
				      			<td>{{$employee->designation}}</td>
				      			<td>
				      				<img src="{{asset($employee->image)}}" alt="Image" width="60px">
				      			</td>
				      		</tr>
				      	@endforeach
				      	</table>
				    @endif
				    </div>
			    </div>
			</div>
			<div class="col-md-6">
			      <div class="card mb-4">
				    <div class="card-body">
				    		<div style="overflow:hidden;">
				    			<h6 class="float-left h5">Navbar List</h6>
				    			<h6 class="float-right">Total : {{App\Models\navbar::count()}}</h6>
				    		</div>
				    	<hr>
				    @if(isset($navbars) && $navbars != null)
						<div class="d-flex flex-wrap column-gap-4 row-gap-4">
					      	@foreach($navbars as $navbar)
					      		<div class="d-flex align-items-center column-gap-2">
					      			<p class="m-0 mx-2">{{$navbar->name}}</p>
					      		</div>
					      	@endforeach
					    </div>
				    @endif
				    </div>
			    </div>

			    <div class="card mb-4">
				    <div class="card-body">
				    		<div style="overflow:hidden;">
				    			<h6 class="float-left h5">Slider List</h6>
				    			<h6 class="float-right">Total : {{App\Models\slider::count()}}</h6>
				    		</div>
				    	<hr>
				    @if(isset($sliders) && $sliders != null)
				      	<table class="table table-striped table-responsive-sm dataTable no-footer">
				      		<tr>
				      			<td>SL</td>
				      			<td>Name</td>
				      			<td>Priority</td>
				      			<td>Picture</td>
				      		</tr>
				      	@foreach($sliders as $slider)
				      		<tr>
				      			<td>{{$loop->index + 1}}</td>
				      			<td>{{$slider->name}}</td>
				      			<td>{{$slider->priority}}</td>
				      			<td>
				      				<img src="{{asset($slider->image)}}" alt="Image" width="60px">
				      			</td>
				      		</tr>
				      	@endforeach

				      	</table>
				    @endif
				    </div>
			    </div>			      

			    <div class="card mb-4">
				    <div class="card-body">
				    		<div style="overflow:hidden;">
				    			<h6 class="float-left h5">Page List</h6>
				    			<h6 class="float-right">Total : {{App\Models\page::count()}}</h6>
				    		</div>
				    	<hr>
				    @if(isset($pages) && $pages != null)
						<div class="d-flex flex-wrap column-gap-4 row-gap-4">
					      	@foreach($pages as $page)
					      		<div class="d-flex align-items-center column-gap-2">
					      			<p class="m-0 mx-2">{{$page->name}}</p>
					      		</div>
					      	@endforeach
					    </div>
				    @endif
				    </div>
			    </div>			    
			<div class="card mb-4">
				 <div class="card-body">
			    		<div style="overflow:hidden;">
			    			<h6 class="float-left h5">Last notice</h6>
			    		</div>
				    	<hr>
				    @if(isset($notices) && $notices != null)
				    	<table class="table table-striped table-responsive-sm dataTable no-footer">
					      	@foreach($notices as $notice)
					      		<tr>
					      			<td>{{$notice->name}}</td>
					      		</tr>
					      	@endforeach
					    </table>
				    @endif
				    
			    </div>
			</div>
		</div>
			      </div>
		      </div>
		 </div>
	</div>
    </div>
      </div>
    </div>
  </section>
@endsection
@section("script")
@endsection