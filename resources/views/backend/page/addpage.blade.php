@extends('backend.layout.app')

@section("title","Page List")
@section("content")

<div class="col-md-10">

    <div class="m-2 my-4">
      <div class="card my-2">
      <div class="card-body">

          <div style="overflow: hidden;">
            <h3 class="float-left">Page list</h3>
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
                <th width="20%">Page Link</th>
                <th width="10%">Status</th>
                <th width="10%">Action</th>
            </tr>
        </thead>
      @if(isset($page) && $page != null)
        <tbody>
          @foreach($page as $data)
            <tr>
                <td>{{$loop->index +1}}</td>
                <td>{{$data->name}}</td>
                <td><code style="padding: 5px;background: #ddd;">{{url('pages')}}/{{$data->slug}}</code></td>
                <td>
                  @if($data->status == 1)
                    <span class="badge bg-success">Active</span>
                  @else
                    <span class="badge bg-danger">Inactive</span>
                  @endif
                </td>
                <td>
                  <a class="btn btn-sm btn-primary" onclick="modalShowUpdate({{$data->id}})" href=""><i class="fa fa-edit"></i></a>

                    <a onclick="return confirm('Are you sure Delete?')" href="{{Route('pagedelete.delete', 'id='.$data->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

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
        <h5 class="modal-title" id="exampleModalLabel">Add Page</h5>
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
             <textarea name="description" id="art_body"></textarea>
              <script>
                      CKEDITOR.replace('description');
              </script>
              <small class="form-text" id="errdescription"></small>
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
        <h5 class="modal-title" id="exampleModalLabel">Sidebar link title</h5>
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
             <textarea name="up_description" id="up_description"></textarea>
              <script>
                      CKEDITOR.replace('up_description');
              </script>
              <small class="form-text" id="erruup_description"></small>
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



//Insert System
    $("#myForm").submit(function(){

      for(instance in CKEDITOR.instances) {
          CKEDITOR.instances[instance].updateElement();
      }

      var form = $("#myForm").get(0);
          $.ajax({
              url : "{{Route('pagestore.store')}}",
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
      for(instanceed in CKEDITOR.instances) {
              CKEDITOR.instances[instanceed].updateElement();
      }
      var form = $("#myFormUpdate").get(0);
          $.ajax({
            url : "{{Route('pageupdate.update')}}",
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
      
        $.fn.modal.Constructor.prototype._enforceFocus = function() {
                var $modalElement = this.$element;
                $(document).on('focusin.modal',function(e) {
                        if ($modalElement.length > 0 && $modalElement[0] !== e.target
                            && !$modalElement.has(e.target).length
                            && $(e.target).parentsUntil('*[role="dialog"]').length === 0) {
                            $modalElement.focus();
                        }
                });
        };

      $.ajax({
            url : "{{Route('pageedit.edit')}}",
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
                    CKEDITOR.instances['up_description'].setData(response.data.description);
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