

<!--Setting update modal -->
<div class="modal fade" id="settingupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Website setup</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        @php
           $settingData = App\Models\setting::find(1);
        @endphp


        <form id="settingFormUpdate" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <input type="text" name="name" id="name" class="form-control" value="{{isset($settingData->name) ? $settingData->name : ''}}" placeholder="Enter title *">
              <small class="form-text" id="errsname"></small>
          </div>
          <div class="form-group">
              <input type="text" name="address" id="address" class="form-control" value="{{isset($settingData->address) ? $settingData->address : ''}}" placeholder="Enter address *">
              <small class="form-text" id="errsaddress"></small>
          </div>
          <div class="form-group">
              <input type="file" name="logo" id="logo" class="form-control-file">
              <small class="form-text" id="errslogo">* Logo must be less than 1 MB..</small>
          </div>

          <div class="form-group">
              <input type="text" name="email" id="email" class="form-control" value="{{isset($settingData->email) ? $settingData->email : ''}}" placeholder="Email address *">
              <small class="form-text" id="errsemail"></small>
          </div>


          <div class="form-group">
              <input type="tel" name="phone" id="phone" value="{{isset($settingData->phone) ? $settingData->phone : ''}}" class="form-control" placeholder="Phone number *">
              <small class="form-text" id="errsphone"></small>
          </div>

          <div class="form-group">
              <input type="text" name="maps" id="maps" value="{{isset($settingData->maps) ? $settingData->maps : ''}}" class="form-control" placeholder="Maps Embed Code">
              <small class="form-text" id="errsmaps"></small>
          </div>


          <div class="form-group">
              <input type="file" name="emimage" id="emimage" class="form-control-file">
              <small class="form-text" id="errsemimage">*Emergency image must be less than 1 MB.</small>
          </div>

          <div class="form-group">
              <input type="file" name="banner" id="banner" class="form-control-file">
              <small class="form-text" id="errsbanner">*Banner image size 1200x500 and less than 1 MB.</small>
          </div>

          <div class="form-group">
              <input type="text" name="bannerlink" id="bannerlink" class="form-control" value="{{isset($settingData->bannerlink) ? $settingData->bannerlink : ''}}" placeholder="Banner link">
              <small class="form-text" id="errsbannerlink"></small>
          </div>


          <div class="form-group">
              <input type="text" name="keywords" id="keywords" class="form-control" value="{{isset($settingData->keywords) ? $settingData->keywords : ''}}" placeholder="Meta keywords">
              <small class="form-text" id="errskeywords"></small>
          </div>

          <div class="form-group">
              <textarea class="form-control" rows="5" placeholder="Meta Description" name="metadescription">{{isset($settingData->metadescription) ? $settingData->metadescription : ''}}</textarea>
              <small class="form-text" id="errsdescription"></small>
          </div>

          <div class="form-group">
              <textarea class="form-control" rows="2" placeholder="Like page iframe" name="likepage">{{isset($settingData->likepage) ? $settingData->likepage : ''}}</textarea>
              <small class="form-text" id="errslikepage"></small>
          </div>


          <div class="form-group">
             <textarea name="about">{{isset($settingData->about) ? $settingData->about : ''}}</textarea>
              <script>
                      CKEDITOR.replace('about');
              </script>
              <small class="form-text" id="errsabout">Write your school information minimum 150 words</small>
          </div>

          <button type="submit" class="btn btn-primary">Save Update</button>

        </form>

      </div>
    </div>
  </div>
</div>




<!--Copyright Section-->
    <section id="copyright-section" class="py-3 text-center text-light">
        <div class="container">
          <div class="row">
            <div class="col">
              <p class="lead mb-0">&copy; <?php echo date('Y'); ?>  by shak ziaur rahman tito</p>
            </div>
          </div>
        </div>
    </section>

    <!--JavaScript-->
  <script src="{{asset('backend/js/jquery.min.js')}}"></script>
  <script src="{{asset('backend/js/popper.min.js')}}"></script>
  <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('backend/js/uikit.min.js')}}"></script>
  <script src="{{asset('backend/js/uikit-icons.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend/js/printThis.js')}}"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{asset('backend/js/main.js')}}"></script>

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









    /*Get Setting update*/

    $("#settingModal").click(function(){
        $("#settingFormUpdate")[0].reset();
        $("#settingupdate").modal({
            backdrop : 'static'
        });
    });


    // $.fn.modal.Constructor.prototype._enforceFocus = function() {
    // var $modalElement = this.$element;
    // $(document).on('focusin.modal',function(e) {
    //         if ($modalElement.length > 0 && $modalElement[0] !== e.target
    //             && !$modalElement.has(e.target).length
    //             && $(e.target).parentsUntil('*[role="dialog"]').length === 0) {
    //             $modalElement.focus();
    //         }
    //     });
    // };




/*update System*/

    $("#settingFormUpdate").submit(function(){

      for(instance in CKEDITOR.instances) {
          CKEDITOR.instances[instance].updateElement();
      }

      var form = $("#settingFormUpdate").get(0);
          $.ajax({
            url : "{{Route('settingstore.store')}}",
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
                        $("#errs"+key).text(value).css("color","red");
                    });
                }

                if(response.reload == true){
                    location.reload();
                    $("#settingFormUpdate")[0].reset();
                }
            }
          });
        return false;
    });


    </script>

    @yield("script")

  <script type="text/javascript">
    new DataTable('#example');
  </script>

  <script type="text/javascript">
      $(".paddingHeight").css("min-height", $(window).height()-120);
  </script>


  </body>
</html>