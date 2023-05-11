@include('layouts.header')
  
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Documents
                <a class="btn btn-info btn-sm" href="{{route('Files')}}"><i class="fas fa-arrow-left"></i> GO BACK </a>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Documents</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

                         <div class="card card-primary card-outline">
                            <div class="card-body table-responsive">                  
                                
                                <form id="form">

                                    {{ csrf_field() }}
                                        
                                        <div class="row">
                                            <div class="col-xl-12 mx-auto">
                                            <label  class="col-form-label">Files <span>*</span></label>    
                                              <input id="file" type="file" name="file">
                                            </div>
                                        </div>
                                  
                                 <div class="row">
   
                                     <div class="col-md-3 mt-2">
                                    <label  class="col-form-label">Document Name <span>*</span></label>
                                         <input type="text" class="form-control" id="name" name="name" value="" />
                                         <input type="hidden" class="form-control" id="filename" name="filename" value="" />
                                         <input type="hidden" class="form-control" id="id" name="id" value="" />
                                     </div>

                                    <div class="col-md-3 mt-2">
                                    <label  class="col-form-label">Document Type <span>*</span></label>
                                         <select class="form-control" id="type" name="type">
                                            <option></option>
                                              @foreach ($data['types'] as $type)
                                              <option value="{{$type->id}}" 
                                                    @if($type->Default == 'Yes')
                                                    selected=""
                                                    @endif
                                                     >{{$type->Text}}</option>
                                              @endforeach
                                         </select>
                                     </div>

                                     <div class="col-md-3 mt-2">
                                    <label  class="col-form-label">Department  <span>*</span></label>
                                         <select class="form-control" id="department" name="department">
                                            <option></option>
                                              @foreach ($data['DPTs'] as $DPT)
                                              <option value="{{$DPT->id}}" 
                                                    @if($DPT->Default == 'Yes')
                                                    selected=""
                                                    @endif
                                                     >{{$DPT->Text}}</option>
                                              @endforeach
                                         </select>
                                     </div>

                                     <div class="col-md-3 mt-2">
                                    <label  class="col-form-label">Status <span>*</span></label>
                                         <select class="form-control" id="status" name="status">
                                             <option value="1">Active</option>
                                             <option value="0">In-Active</option>
                                         </select>
                                     </div>

                                     <div class="col-md-12 mt-3">
                                        <button type="button" class="btn btn-primary AddUpdatebtn">Save Now</button>
                                     </div> 

                                   </div>   
                            </form>
                                          


                            </div>
                        </div> 


      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@extends('layouts.footer')

@push('script')

<!-- fancyfileuploader -->
<script src="{{ asset('plugins/fancy-file-uploader/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('plugins/fancy-file-uploader/jquery.fileupload.js') }}"></script>
<script src="{{ asset('plugins/fancy-file-uploader/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('plugins/fancy-file-uploader/jquery.fancy-fileupload.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {





   $( "#type" ).select2({
                placeholder:'Choose Document Type',
                allowClear:true
               });

      $( "#department" ).select2({
                placeholder:'Choose Department',
                allowClear:true
               });

       $( "#status" ).select2({
                placeholder:'Choose Status',
                allowClear:true
               });


    var data = @json($data);

        var file = data['file'];

            if(file.length > 0) {

            $('#name').val(file[0].FileName);
            $('#status').val(file[0].InUse).trigger('change');
            $('#filename').val(file[0].FilePath);
            $('#id').val(file[0].FileID);
            $('#type').val(file[0].FileType).trigger('change');
            $('#department').val(file[0].FileDepartment).trigger('change');

            }

           var editmode = data['editmode'];


        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });


           if(editmode == 'on') { 

            $('#file').FancyFileUpload({

                url : "{{ route('updateFile') }}",
                maxfilesize: 100000000,
                params: {
                    id:$('#id').val()
                },
                added : function(e, data) {
                this.find('.ff_fileupload_actions button.ff_fileupload_start_upload').click();
                },
                uploadcompleted : function(e, data) {
                      if ($.isEmptyObject(data.error)){
                             // Lobibox.notify('success', {
                             //        pauseDelayOnHover: true,
                             //        continueDelayOnInactiveTab: false,
                             //        position: 'top right',
                             //        msg: data.result.success,
                             //        icon: 'bx bx-check-circle'
                             //    });
                            // data.ff_info.RemoveFile();
                            $('#filename').val(data.result.filename)

                        } else {
                             Lobibox.notify('warning', {
                                    pauseDelayOnHover: true,
                                    continueDelayOnInactiveTab: false,
                                    position: 'top right',
                                    msg: data.result.error,
                                    icon: 'bx bx-info-circle'
                                });
                        }
                }
            });

            } else {


                $('#file').FancyFileUpload({

                url : "{{ route('addFile') }}",
                maxfilesize: 100000000,
                added : function(e, data) {
                this.find('.ff_fileupload_actions button.ff_fileupload_start_upload').click();
                },
                uploadcompleted : function(e, data) {
                      if ($.isEmptyObject(data.error)){
                             // Lobibox.notify('success', {
                             //        pauseDelayOnHover: true,
                             //        continueDelayOnInactiveTab: false,
                             //        position: 'top right',
                             //        msg: data.result.success,
                             //        icon: 'bx bx-check-circle'
                             //    });
                            // data.ff_info.RemoveFile();
                            $('#filename').val(data.result.filename)

                        } else {
                             Lobibox.notify('warning', {
                                    pauseDelayOnHover: true,
                                    continueDelayOnInactiveTab: false,
                                    position: 'top right',
                                    msg: data.result.error,
                                    icon: 'bx bx-info-circle'
                                });
                        }
                }
            });
            }

            



             //add and update js code

            $(".AddUpdatebtn").click(function (event) {

               
                    //stop submit the form, we will post it manually.
                    event.preventDefault();

                    // Get form
                    var form = $('#form')[0];

                    // Create an FormData object
                    var data = new FormData(form);


                    // append account names to form 
                     var accountname = $(".accountname");
                     
                        for(var i = 0; i < accountname.length; i++){
                            
                             data.append("accountname[]", $(accountname[i]).text());

                        }
                        


                     if(editmode == 'on') { 

                        var url = "{{ route('updateFileInfo') }}";        
                       
                    } else {

                        var url = "{{ route('addFileInfo') }}";   
                        // append List id to form
                         // data.append("uid", List[0].uid);

                    }


                    $.ajax({
                        type: "POST",
                        enctype: 'multipart/form-data',
                        url: url,
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        success: function(data) {
                            //console.log(data);
                                if ($.isEmptyObject(data.error)){
                                     Lobibox.notify('success', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: data.success,
                                            icon: 'bx bx-check-circle'
                                        });
                                       window.location = "{{route('Files')}}"; 

                                } else {
                                     Lobibox.notify('warning', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: data.error,
                                            icon: 'bx bx-info-circle'
                                        });
                                }
                            }

                        });
            });





     }) 




</script>
@endpush
