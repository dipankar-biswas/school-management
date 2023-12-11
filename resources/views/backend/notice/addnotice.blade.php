@extends('backend.layout.app')

@section("title","Notice Broad")
@section("content")

<div class="col-md-10">

    <div class="m-2 my-4">
      <div class="card my-2">
      <div class="card-body">

          <div style="overflow: hidden;">
            <h3 class="float-left">Notice list</h3>
            <h3 class="float-right">
              <button class="btn btn-primary" id="modalShow">Add New</button>
            </h3>
          </div>
          <hr>


      <table id="example" class="table table-striped table-responsive-sm">
        <thead>
            <tr>
                <th width="10%">SL</th>
                <th width="20%">Name</th>
                <th width="20%">View</th>
                <th width="10%">Status</th>
                <th width="10%">Action</th>
            </tr>
        </thead>
      @if(isset($notice) && $notice != null)
        <tbody>
          @foreach($notice as $data)
            <tr>
                <td>{{$loop->index +1}}</td>
                <td>{{$data->name}}</td>
                <td><a href="{{route('notice.details', $data->slug)}}" target="_blank">View</a></td>
                <td>
                  @if($data->status == 1)
                    <span class="badge bg-success">Active</span>
                  @else
                    <span class="badge bg-danger">Inactive</span>
                  @endif
                </td>
                <td>
                  <a class="btn btn-sm btn-primary" onclick="modalShowUpdate({{$data->id}})" href=""><i class="fa fa-edit"></i></a>
                    <a onclick="return confirm('Are you sure Delete?')" href="{{Route('noticedelete.delete', 'id='.$data->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Notice</h5>
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
              <input type="file" name="file" class="form-control-file">
              <small class="form-text" id="errfile">Only upload pdf file size less than 5 MB.</small>
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Notice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form id="myFormUpdate" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" id="id">
          <div class="form-group">
              <input type="text" name="name" id="name" class="form-control" placeholder="Enter name *">
              <small class="form-text" id="erruname"></small>
          </div>

          <div class="form-group">
              <input type="file" name="file" id="file" class="form-control-file">
              <small class="form-text" id="errufile">Only upload pdf file size less than 5 MB.</small>
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
            url : "{{Route('noticestore.store')}}",
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
            url : "{{Route('noticeupdate.update')}}",
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
            url : "{{Route('noticeedit.edit')}}",
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