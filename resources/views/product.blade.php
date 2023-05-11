@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Product Info 
                <a class="btn btn-primary btn-sm" href="{{route('Products')}}"><i class="fas fa-arrow-left"></i> Go Back </a>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
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
                                            
                                            <div class="col-md-3">
                                            <label  class="col-form-label">Name <span>*</span></label>
                                                 <input type="text" class="form-control" id="name" name="name" value="" />
                                             </div>

                                             <div class="col-md-2">
                                            <label  class="col-form-label">Category <span>*</span></label>
                                            <select class="form-control select2" name="category" id="category">
                                            </select>  
                                             </div>

                                             <div class="col-md-2">
                                            <label  class="col-form-label">Price <span>*</span></label>
                                                 <input type="text" class="form-control" id="price" name="price" value="" />
                                             </div>    
                                    
                                           <div class="col-md-2">
                                            <label  class="col-form-label">Buy this Product</label>
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                  <input class="buy" name="buy" value="Yes" type="checkbox" aria-label="Checkbox for following text input">
                                                </div>
                                              </div>
                                              <input readonly="" placeholder="Cost" type="text" id="cost" name="cost" class="form-control" aria-label="Text input with checkbox">
                                            </div>
                                            </div>


                                            <div class="col-md-3">
                                            <label  class="col-form-label">Add Stock Location</label>
                                             <select id="locations" onautocomplete="false" name="locations" multiple="multiple" data-placeholder="e.g. Warehouse" style="width: 100%;">
                                            </select>
                                             </div>
                               
                                             <div class="locationlist col-md-12">
                                                <div class="row mt-3  bg-light pt-3 p-2 pb-2 mt-2 rounded locationInfo" id="1">
                                                
                                                <div class="col col-md-12">
                                                    <h3 class="mb-0"><span class="locationname">Store</span>
                                                        <button type="button" class="d-none removeButton remove btn btn-dark float-right">
                                                     <i class="fas fa-window-close"></i>
                                                    </button> 
                                                    </h3>
                                                </div>

                                                <div class="col-md-2"><label class="col-form-label">Opening Stock <span>*</span></label> 
                                                    <input type="text" class="form-control" id="quantity" name="quantity[]" value="" />
                                                    <input type="hidden" name="lid[]" id="lid"></div>

                                                <div class="col-md-2"><label class="col-form-label">Rack # </label> <input type="text" class="form-control" id="rack" name="rack[]" value="" /></div>
                                            
                                              </div>
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

<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


<script type="text/javascript">
    $(document).ready(function () {

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


          function cloneLocations(index) {


                    var noOfDivs = $('.locationInfo').length;
                                     
                    var id = $('.locationlist > .row:last').attr('id');
                    alert(id)


                    var clonedDiv = $('.locationInfo').first().clone(true);
                        clonedDiv.appendTo(".locationlist");
        
                    $('.locationlist > .row:last').attr('id',parseFloat(id)+1);
        }


         $(document).on('click', '.buy', function (e) {    


                        if($(this).prop('checked') == true) {

                            $(this).val('yes')
                            $('#cost').prop('readonly', false);

                        } else {

                            $(this).val('no')
                            $('#cost').prop('readonly', true);
                        }
                   
           });




        $('#category').select2({
            tags:true
        })

         $('#locations').select2({
            tags:true
        })

            
        var data = @json($data);

       var categories = data['categories'];

              $( categories ).each(function( index ) { 

                var data = {
                    id: categories[index].id,
                    text: categories[index].name
                    };
                 var newOption = new Option(data.text, data.id, false, false);
                 $('#category').append(newOption).trigger('change');   
            })




          $(document).on('select2:select', '#locations', function (e) { 

                                
                var selected_value = $(this).val();
                $("#locations").val(null).trigger('change');

                   
                   cloneLocations()
        

                    var id = $('.locationlist > .row:last').attr('id');
                     $('#'+id).find('#lid').val('');
                     $('#'+id).find('.locationname').text(selected_value);
                     $('#'+id).find('.remove').attr('id',id);
                     $('#'+id).find('.removeButton').attr('style','display: block !important');
                     $('#'+id).find('#quantity').val('');
                
         
        });


        $(document).on('click', '.remove', function (e) {    

                    var id = this.id;
                    $('#'+id).remove();
           });


            // if not  edit mode 
            if(data.product.length == 0) {

                $('.AddUpdatebtn').attr('id','btnAdd');

            } else {

                $('.AddUpdatebtn').attr('id','btnUpdate');
            }


            //add and update js code

            $(".AddUpdatebtn").click(function (event) {


                
                    //stop submit the form, we will post it manually.
                    event.preventDefault();

                    // Get form
                    var form = $('#form')[0];

                    // Create an FormData object
                    var data = new FormData(form);


                    // append location names to form 
                     var locationname = $(".locationname");
                     
                        for(var i = 0; i < locationname.length; i++){
                            
                             data.append("locationname[]", $(locationname[i]).text());

                        }
                        


                    if(this.id == 'btnAdd') {

                        var url = "{{ route('addProduct') }}";        
                       
                    } else {

                        var url = "{{ route('updateProduct') }}";   
                        // append Product id to form
                          data.append("uid", Product[0].uid);

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
                                     window.location = "{{route('Products')}}"; 

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
