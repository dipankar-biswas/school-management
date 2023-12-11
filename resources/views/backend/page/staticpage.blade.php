@extends('backend.layout.app')

@section("title","Page")
@section("content")

<div class="col-md-10">

    <div class="m-2 my-4">
      <div class="card my-2">
      <div class="card-body">

          <div style="overflow: hidden;">
            <h3 class="float-left">Static Page list</h3>
          </div>
          <hr>


      <table id="example" class="table table-striped table-responsive-sm">
        <thead>
            <tr>
                <th width="10%">SL</th>
                <th width="20%">Name</th>
                <th width="70%">Page Link</th>
            </tr>
        </thead>

        <tbody>
          @foreach($statics as $key => $value)
            <tr>
                <td>{{$loop->index +1}}</td>
                <td>{{$key}}</td>
                <td>{{url($value)}}</td>
            </tr>
          @endforeach
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

@endsection

@section("script")

  <!--JavaScript Plugin-->
  <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable();
    } );
  </script>

@endsection