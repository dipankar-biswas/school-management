@extends('backend.layout.app')

@section("title","Expense list")
@section("content")

<div class="col-md-10">

    <div class="m-2 my-4">
      <div class="card my-2">
      <div class="card-body">

          <div style="overflow: hidden;">
            <h3 class="float-left">Expense list</h3>
          </div>
          <hr>


          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" id="modalShow">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



      <table id="example" class="table table-striped table-bordered table-responsive">
        <thead>
            <tr>
                <th width="10%">Name</th>
                <th width="10%">Position</th>
                <th width="10%">Office</th>
                <th width="10%">Age</th>
                <th width="10%">Start date</th>
                <th width="10%">Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
            </tr>
        </tbody>

    </table>



          </div>
      </div>
        </div>

      </div>
    </div>
      </div>
    </div>
  </section>



<!-- The Modal For Update-->
<div class="modal fade" id="updateModal">
  <div class="modal-dialog">
    <div class="modal-content">
<!-- Modal Header -->
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form id="myForm">
        @csrf
      <div class="modal-body">

          <div class="form-group">
            <input type="text" name="debit" value="" class="form-control" placeholder="Enter amount">
            <input type="hidden" name="id" value="">
            <small class="form-text text-muted" id="debit_err"></small>
          </div>

          <div class="form-group">
            <select class="form-control" name="memberid">
              <option value="">Select</option>
            </select>
            <small id="memberid_err" class="form-text text-muted"></small>
          </div>

          <div class="form-group">
            <select class="form-control" name="getwayid">
              <option value="">Select</option>
            </select>

            <small id="getwayid_err" class="form-text text-muted"></small>
          </div>

          <div class="form-group">
            <input type="date" name="date" value="" class="form-control" placeholder="Date">
            <small class="form-text text-muted" id="date_err"></small>
          </div>



      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>



  <script type="text/javascript">



    $("#myForm").submit(function(){

      var form = $("#myForm").get(0);

      $.ajax({
        url : "{{url('/debitamountUpdate')}}",
        method: "post",
        data : new FormData(form),
        contentType : false,
        processData : false,
        beforeSend : function(){
          $(document).find(".form-text").text("");
        },
        success: function(data){

          if (data.status == 0) {
            $.each(data.message, function(prefix, values){
              $("#"+prefix+"_err").text(values);
            })
          }else if(data.status == 3){
            $("#debit_"+data.message.id).text("Tk. "+data.message.debit);
            $("#name_"+data.message.id).text(data.member.name);
            $("#getwayid_"+data.message.id).text(data.getway.name);
            $("#prepareby_"+data.message.id).text(data.user.name);
            $("#date_"+data.message.id).text(data.senderdate);
            $("#updateModal").modal('hide');
            
          }else{
            alert("Something wrong");
          }


        }
      });

      return false;
      
    });




    
  

  </script>



  <!--JavaScript Plugin-->
  <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable();
    } );
  </script>

@endsection