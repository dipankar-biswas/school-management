@extends('backend.layout.app')

@section("title","Wedget Link")
@section("content")

<div class="col-md-10">

    <div class="m-2 my-4">
      <div class="card my-2">
      <div class="card-body">

          <div style="overflow: hidden;">
            <h3 class="float-left">Wedget link list</h3>
            <h3 class="float-right">
              <button class="btn btn-primary" id="modalShow">Add New</button>
            </h3>
          </div>
          <hr>


      <table id="example" class="table table-striped table-responsive-sm" style="width: 100%;">
        <thead>
            <tr>
                <th width="10%">SL</th>
                <th width="15%">Name</th>
                <th width="10%">Parent</th>
                <th width="10%">Target</th>
                <th width="10%">Append</th>
                <th width="10%">Go to</th>
                <th width="10%">Status</th>
                <th width="15%">Action</th>
            </tr>
        </thead>
      @if($widgetLink != null)
        <tbody>
          @foreach($widgetLink as $data)
            <tr>
                <td>{{$loop->index +1}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->widget?->name}}</td>
                <td>
                  @if($data->linkstatus == 0)
                    <span class="badge bg-warning">_Self</span>
                  @else
                    <span class="badge bg-primary">_Blank</span>
                  @endif
                </td>
                <td>
                    @if($data->target == 0)
                      <span>Link</span>
                    @elseif($data->target == 1)
                      <span>File</span>
                    @elseif($data->target == 2)
                      <span>Text</span>
                    @else
                      <span>No Detected</span>
                    @endif
                </td>
                <td>
                  <a target="_blank" href="
                    @if($data->target == 0)
                        {{$data->targetdata}}
                    @elseif($data->target == 1)
                        {{Route('detailsread.details_read', $data->slug)}}
                    @elseif($data->target == 2)
                        {{Route('details.details_widget', $data->slug)}}
                    @endif
                  ">Go to</a>
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

                  <a onclick="return confirm('Are you sure Delete?')" href="{{Route('wedgetlinkdelete.delete', 'id='.$data->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

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
        <h5 class="modal-title" id="exampleModalLabel">Add wedget link</h5>
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
              <select name="wedgetid" class="form-control">
              <option value="">Select One</option>
              @if($widget != null)
                @foreach($widget as $data)
                  <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
              @endif
              </select>
              <small class="form-text" id="errwedgetid"></small>
          </div>
          <div class="form-group">
              <select name="linkstatus" class="form-control">
                <option value="0">-Self</option>
                <option value="1">-Blank</option>
              </select>
              <small class="form-text" id="errlinkstatus"></small>
          </div>
          <div class="form-group">
              <select name="target" class="form-control" id="target">
                <option value="">Select</option>
                <option value="0">Link</option>
                <option value="1">File</option>
                <option value="2">Text</option>
              </select>
              <small class="form-text" id="errtarget"></small>
          </div>
          <div class="form-group" id="targetAppend"></div>
          <div class="form-group" id="targetAppendDes" style="display: none;">
              <textarea name="targetdata" id="targetdataTxt"></textarea>
              <script> CKEDITOR.replace('targetdata'); </script>
              <small class="form-text" id="errtargetdata"></small>
          </div>
          <div class="form-group">
              <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="2">Inactive</option>
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
              <select name="wedgetid" id="wedgetid" class="form-control">
              <option value="">Select One</option>
              @if($widget != null)
                @foreach($widget as $data)
                  <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
              @endif
              </select>
              <small class="form-text" id="erruwedgetid"></small>
          </div>
          <div class="form-group">
              <select name="linkstatus" id="linkstatus" class="form-control">
                <option value="0">-Self</option>
                <option value="1">-Blank</option>
              </select>
              <small class="form-text" id="errulinkstatus"></small>
          </div>







          <div class="form-group">
              <select name="target" id="target_up" class="form-control">
                <option value="">Select</option>
                <option value="0">Link</option>
                <option value="1">File</option>
                <option value="2">Text</option>
              </select>
              <small class="form-text" id="errutarget"></small>
          </div>

          <div class="form-group" id="targetAppend_up"></div>
          
          <div class="form-group" id="targetAppendDes_up" style="display: none;">
              <textarea name="targetdata_up" id="targetdataTxt_up"></textarea>
              <script> CKEDITOR.replace('targetdata_up'); </script>
              <small class="form-text" id="errutargetdata_up"></small>
          </div>


          <div class="form-group">
              <select name="status" id="status" class="form-control">
                <option value="1">Active</option>
                <option value="2">Inactive</option>
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
    // For Insert append
      $("#target").change(function(){
          $(document).find(".form-text").text("");
          var values = $(this).val();
          $("#targetAppend").html("");
          $("#targetAppend").css("display","none");
          $("#targetAppendDes").css("display","none");
          $("#targetdataTxt").attr("disabled", true);
          if(values == 0 && values != ""){
            $("#targetAppend").css("display","block");
            $("#targetAppend").append(`<input type="text" name="targetdata" class="form-control" placeholder="Target link*">
              <small class="form-text" id="errtargetdata"></small>`);
          }else if(values == 1){
            $("#targetAppend").css("display","block");
            $("#targetAppend").append(`<input type="file" name="targetdata" class="form-control-file">
              <small class="form-text" id="errtargetdata">Please add valid file more than 5 mb.</small>`);
          }else if(values == 2){
            $("#targetAppend").css("display","none");
            $("#targetAppendDes").css("display","block");
            $("#targetdataTxt").attr("disabled", false);
          }
      })    


    // For update append
      $("#target_up").change(function(){
          $(document).find(".form-text").text("");
          var values = $(this).val();
          $("#targetAppend_up").html("");
          $("#targetAppend_up").css("display","none");
          $("#targetAppendDes_up").css("display","none");
          $("#targetdataTxt_up").attr("disabled", true);
          if(values == 0 && values != ""){

            $("#targetAppend_up").css("display","block");
            $("#targetAppend_up").append(`<input type="text" name="targetdata_up" id="targetdata_up" class="form-control" placeholder="Target link*">
              <small class="form-text" id="errutargetdata_up"></small>`);

          }else if(values == 1){
            $("#targetAppend_up").css("display","block");
            $("#targetAppend_up").append(`<input type="file" name="targetdata_up_img" id="targetdata_up" class="form-control-file">
              <small class="form-text" id="errutargetdata_up_img">Please add valid file more than 5 mb.</small>`);
          }else if(values == 2){
            $("#targetAppend_up").css("display","none");
            $("#targetAppendDes_up").css("display","block");
            $("#targetdataTxt_up").attr("disabled", false);
          }
      });
      
  </script>




  <script type="text/javascript">

    $("#myForm").submit(function(){

      for(instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
      }

      var form = $("#myForm").get(0);

          $.ajax({
            url : "{{Route('wedgetlinkedit.store')}}",
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
      
      for(instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
      }

      var form = $("#myFormUpdate").get(0);
          $.ajax({
            url : "{{Route('wedgetlinkupdate.update')}}",
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





    $("#modalShow").click(function(){
      $("#exampleModal").modal({
        backdrop : 'static'
      });
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
    });


    function targetload(data){

            $(document).find(".form-text").text("");
            $("#targetAppend_up").html("");
            $("#targetAppend_up").css("display","none");
            $("#targetAppendDes_up").css("display","none");
            $("#targetdataTxt_up").attr("disabled", true);

            if(data.target == 0){
              $("#targetAppend_up").css("display","block");
              $("#targetAppend_up").append(`<input type="text" name="targetdata_up" class="form-control" placeholder="Target link*" value="${data.targetdata}" id="targetdata_up">
                <small class="form-text" id="errutargetdata_up"></small>`);

             }else if(data.target == 1){
              $("#targetAppend_up").css("display","block");
              $("#targetAppend_up").append(`<input type="file" name="targetdata_up_img" class="form-control-file">
                <small class="form-text" id="errutargetdata_up_img">Please add valid file more than 5 mb.</small>`);
            }else if(data.target == 2){
              $("#targetAppend_up").css("display","none");
              $("#targetAppendDes_up").css("display","block");
              $("#targetdataTxt_up").attr("disabled", false);
              CKEDITOR.instances['targetdataTxt_up'].setData(data.targetdata);
            }
    }




    function modalShowUpdate(id){
      event.preventDefault();
      $.ajax({
            url : "{{Route('wedgetlinkedit.edit')}}",
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
                    $("#wedgetid").val(response.data.wedgetid);
                    $("#linkstatus").val(response.data.linkstatus);
                    $("#target_up").val(response.data.target);
                    $("#status").val(response.data.status);
                    targetload(response.data);
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