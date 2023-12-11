@extends('backend.layout.app')

@section("title","Employee List")
@section("content")

<div class="col-md-10">

    <div class="m-2 my-4">
      <div class="card my-2">
      <div class="card-body">

          <div style="overflow: hidden;">
            <h3 class="float-left">Employee List</h3>
            <h3 class="float-right">
              <button class="btn btn-primary" id="modalShow">Add New</button>
            </h3>
          </div>
          <hr>


      <table id="example" class="table table-striped table-responsive-sm">
        <thead>
            <tr>
                <th width="2%">SL</th>
                <th width="15%">Name</th>
                <th width="10%">Designation</th>
                <th width="10%">Mobail</th>
                <th width="10%">Email</th>
                <th width="10%">Category</th>
                <th width="2%">priority</th>
                <th width="8%">Image</th>
                <th width="5%">Status</th>
                <th width="10%">Action</th>
            </tr>
        </thead>
      @if(isset($employee) && $employee != null)
        <tbody>
          @foreach($employee as $data)
            <tr>
                <td>{{$loop->index +1}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->designation}}</td>
                <td>{{$data->mobail}}</td>
                <td>{{$data->email}}</td>
                <td>
                  @if($data->category == 1)
                    Teacher
                  @elseif($data->category == 2)
                    Office-Employee
                  @elseif($data->category == 3)
                    Managing Committee
                  @endif

                </td>
                <td>{{$data->priority}}</td>
                <td>
                  <img src="{{asset($data->image)}}" alt="Image" width="80px">
                </td>
                <td>
                  @if($data->status == 1)
                    <span class="badge bg-success">Active</span>
                  @else
                    <span class="badge bg-danger">Inactive</span>
                  @endif
                </td>
                <td>
                  <a class="btn btn-sm btn-primary" onclick="modalShowUpdate({{$data->id}})" href=""><i class="fa fa-edit"></i></a>

                    <a onclick="return confirm('Are you sure Delete?')" href="{{Route('emdelete.delete', 'id='.$data->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

                </td>
            </tr>
          @endforeach
        </tbody>
      @endif

    </table>

          </div>
      </div>
        </div>

      </div>
    </div>
      </div>
    </div>
  </section>


<!--Insert Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form id="myForm" method="post" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
              <input type="text" name="name" class="form-control" placeholder="Enter name *">
              <small class="form-text" id="errname"></small>
          </div>

          <div class="form-group">
              <input type="text" name="designation" class="form-control" placeholder="Enter designation *">
              <small class="form-text" id="errdesignation"></small>
          </div>

          <div class="form-group">
              <input type="text" name="mobail" class="form-control" placeholder="Enter mobail">
              <small class="form-text" id="errmobail"></small>
          </div>          

          <div class="form-group">
              <input type="text" name="email" class="form-control" placeholder="Enter email">
              <small class="form-text" id="erremail"></small>
          </div>

          <div class="form-group">
              <textarea placeholder="Enter address" class="form-control" rows="5" name="address"></textarea>
              <small class="form-text" id="erraddress"></small>
          </div>
          <div class="form-group">
              <input type="number" name="priority" class="form-control" placeholder="Enter priority *">
              <small class="form-text" id="errpriority"></small>
          </div>

          <div class="form-group">
              <select class="form-control" name="category">
                <option value="">Select</option>
                <option value="1">Teachers</option>
                <option value="2">Office-employee</option>
                <option value="3">Managing Committee</option>
              </select>
              <small class="form-text" id="errcategory"></small>
          </div>

          <div class="form-group">
              <input type="file" name="image" class="form-control-file">
              <small class="form-text" id="errimage">Image size 450x565 and less than 1 MB.</small>
          </div>
          <div class="form-group">
              <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>
              <small class="form-text" id="errstatus"></small>
          </div>
          <button type="submit" class="btn btn-primary">Save Change</button>
        </form>

      </div>
    </div>
  </div>
</div>


<!--Update Modal -->
<div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form id="myFormUpdate" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <input type="text" name="name" id="name" class="form-control" placeholder="Enter name *">
              <small class="form-text" id="erruname"></small>
          </div>

          <input type="hidden" name="id" id="id">

          <div class="form-group">
              <input type="text" name="designation" id="designation" class="form-control" placeholder="Enter designation *">
              <small class="form-text" id="errudesignation"></small>
          </div>

          <div class="form-group">
              <input type="text" name="mobail" id="mobail" class="form-control" placeholder="Enter mobail">
              <small class="form-text" id="errumobail"></small>
          </div>          

          <div class="form-group">
              <input type="text" name="email" id="email" class="form-control" placeholder="Enter email">
              <small class="form-text" id="erruemail"></small>
          </div>

          <div class="form-group">
              <textarea placeholder="Enter address" class="form-control" id="address" rows="5" name="address"></textarea>
              <small class="form-text" id="erruaddress"></small>
          </div>
          <div class="form-group">
              <input type="number" name="priority" id="priority" class="form-control" placeholder="Enter priority *">
              <small class="form-text" id="errupriority"></small>
          </div>

          <div class="form-group">
              <select class="form-control" name="category" id="category">
                <option value="">Select</option>
                <option value="1">Teachers</option>
                <option value="2">Office-employee</option>
                <option value="3">Managing Committee</option>
              </select>
              <small class="form-text" id="errucategory"></small>
          </div>

          <div class="form-group">
              <input type="file" name="image" class="form-control-file">
              <small class="form-text" id="erruimage">Image size 450x565 and less than 1 MB.</small>
          </div>
          <div class="form-group">
              <select name="status" id="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>
              <small class="form-text" id="errustatus"></small>
          </div>
          <button type="submit" class="btn btn-primary">Save Update</button>
        </form>

      </div>
    </div>
  </div>
</div>



@endsection

@section("script")

  <script type="text/javascript">

/*Insert System*/
    $("#myForm").submit(function(){
      var form = $("#myForm").get(0);
          $.ajax({
            url : "{{Route('emstore.store')}}",
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


/*update System*/

    $("#myFormUpdate").submit(function(){
      var form = $("#myFormUpdate").get(0);
          $.ajax({
            url : "{{Route('emupdate.update')}}",
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
                        $("#erru"+key).text(value).css("color","red");
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

/*Get update data*/

    $("#modalShow").click(function(){
      $("#exampleModal").modal({
        backdrop : 'static'
      });
    });


    function modalShowUpdate(id){
      event.preventDefault();
      $.ajax({
            url : "{{Route('emedit.edit')}}",
            method: "get",
            data : {
              "id" : id
            },
            beforeSend : function(){
                $(document).find(".form-text").text("");
            },
            success: function(response){
                if(response.status == "getSelectdata"){
                    $("#id").val(response.data.id);
                    $("#name").val(response.data.name);
                    $("#designation").val(response.data.designation);
                    $("#mobail").val(response.data.mobail);
                    $("#email").val(response.data.email);
                    $("#address").val(response.data.address);
                    $("#category").val(response.data.category);
                    $("#priority").val(response.data.priority);
                    $("#status").val(response.data.status);
                }
            }
          });

      $("#exampleModalUpdate").modal({
        backdrop : 'static'
      });
    }


  </script>



  <!--JavaScript Plugin-->
  <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable();
    } );
  </script>

@endsection