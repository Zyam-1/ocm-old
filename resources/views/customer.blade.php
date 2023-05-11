@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Customer Info 
                <a class="btn btn-primary btn-sm" href="{{route('Customers')}}"><i class="fas fa-arrow-left"></i> Go Back </a>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Customers</li>
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
                                            <label  class="col-form-label">Full Name <span>*</span></label>
                                                 <input type="text" class="form-control" id="name" name="name" value="" />
                                             </div>

                                             <div class="col-md-2">
                                            <label  class="col-form-label">Phone <span>*</span></label>
                                                 <input type="text" class="form-control" id="phone" name="phone" value="" />
                                             </div>

                                             <div class="col-md-2">
                                            <label  class="col-form-label">Email <span>*</span></label>
                                                 <input type="text" class="form-control" id="email" name="email" value="" />
                                             </div>    
                                    
                                           <div class="col-md-2">
                                            <label  class="col-form-label">Alt.Phone</label>
                                                <input type="text" class="form-control" id="alternative_phone" name="alternative_phone" value="" />
                                            </div>


                                            <div class="col-md-3">
                                            <label  class="col-form-label">Add More Accounts</label>
                                             <select id="accounts" onautocomplete="false" name="accounts" multiple="multiple" data-placeholder="e.g. Secondary Account" style="width: 100%;">
                                            </select>
                                             </div>
                               
                                             <div class="acccountlist col-md-12">
                                                 <div class="row mt-3  bg-light pt-3 p-2 pb-2 mt-2 rounded accountInfo" id="1">
                                                <div class="col-md-12">
                                                    <h3 class="mb-0"><span class="accountname">Primary Account</span>
                                                        <button type="button" class="d-none removeButton remove btn btn-dark float-right">
                                                     <i class="fas fa-window-close"></i>
                                                    </button> 
                                                    </h3>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-form-label">Balance {{ \App\Http\Controllers\business::businessinfo($data)[0]->currency; }} <span>*</span></label> <input type="number" class="form-control" id="opening_balance" name="opening_balance[]" value="" />
                                                    <input type="hidden" name="aid[]" id="aid">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-form-label">Country <span>*</span></label> 
                                                    <select class="country"  id="country" name="country[]" style="width: 100%;">
                                                       <option value=""></option> 
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-form-label">State <span>*</span></label> 
                                                    <select class="state" id="state" name="state[]" style="width: 100%;">
                                                       <option value=""></option> 
                                                    </select>
                                                </div>
                                                <div class="col-md-2"><label class="col-form-label">City</label> <input type="text" class="form-control" id="city" name="city[]" value="" /></div>
                                                <div class="col-md-1"><label class="col-form-label">Zip / Postal </label> <input type="text" class="form-control" id="zip" name="zip[]" value="" /></div>
                                            
                                                 <div class="col-md-3"><label class="col-form-label">Address </label> <textarea type="text" class="form-control" id="address" rows="2" name="address[]"></textarea></div>
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


        $('#accounts').select2({
            tags:true
        })

        $('.country').select2({
            placeholder:'Choose Country'
        })
        
        $('.state').select2({ //apply select2 to my element
            placeholder: "Choose State",
            allowClear: true,
            tags:true
            });

        function getStates(country,id,state) { 

                $.ajax({
                        type: 'post',
                        url:"{{ route( 'getStates') }}",
                        data: {'id' : country, _token: CSRF_TOKEN,},
                        dataType: 'json',                   
                        success: function(states){ 
                            $('#'+id).find("#state").html('');
                             $( states ).each(function( index ) {
                                var data = {
                                        id: states[index].id,
                                        text: states[index].name
                                        };
                                     var newOption = new Option(data.text, data.id, false, false);
                                     $('#'+id).find('#state').append(newOption).trigger('change');   
                                })
                                    $('#'+id).find('#state').val(state).trigger('change'); 
                            }
                        }); 

         }


        function cloneAccounts(index) {

                   $('.country').select2("destroy");
                   $('.state').select2("destroy");

                    var noOfDivs = $('.accountInfo').length;
                    
                    
                    var id = $('.acccountlist > .row:last').attr('id');


                    var clonedDiv = $('.accountInfo').first().clone(true);
                        clonedDiv.appendTo(".acccountlist");

                
                        $('.country').select2({
                            placeholder:'Choose Country'
                        })
                        
                        $('.state').select2({ //apply select2 to my element
                            placeholder: "Choose State",
                            allowClear: true,
                            tags:true
                            });

        
                    $('.acccountlist > .row:last').attr('id',parseFloat(id)+1);
        }

        function getAccountInfo(index) {

                var id = $('.acccountlist > .row:last').attr('id');   
                         $('#'+id).find('#aid').val(customeraccounts[index].uid);
                         $('#'+id).find('.accountname').text(customeraccounts[index].name);
                         $('#'+id).find('#opening_balance').val(customeraccounts[index].total);
                         $('#'+id).find('#country').val(customeraccounts[index].country).trigger('change');
                         $('#'+id).find('#city').val(customeraccounts[index].city);
                         $('#'+id).find('#zip').val(customeraccounts[index].zip);
                         $('#'+id).find('#address').val(customeraccounts[index].address);

                         var country = customeraccounts[index].country;
                         var state = customeraccounts[index].state;

                         getStates(country,id,state)

                         
                         

        }

        function getCustomerInfo(index) {

              if(index == 0) {

                    getAccountInfo(index)

                    } else {

                    
                    cloneAccounts()    
                    getAccountInfo(index)



                    }

        }

        var data = @json($data);

        var customer = data['customer'];
        var customeraccounts = data['customeraccounts'];
        var sales = data['sales'];
        var countries = data['countries'];
        var date = data['date'];
            $('#opening_balance_date').val(date);

            $( countries ).each(function( index ) { 

                var data = {
                    id: countries[index].id,
                    text: countries[index].name
                    };
                 var newOption = new Option(data.text, data.id, false, false);
                 $('#country').append(newOption).trigger('change');   
            })

            if(customer.length > 0) {

            $('#name').val(customer[0].name);
            $('#phone').val(customer[0].phone);
            $('#email').val(customer[0].email);
            $('#alternative_phone').val(customer[0].alternative_phone);

                $(customeraccounts ).each(function( index ) {
                    
                     getCustomerInfo(index)
               }) 
      

            }


        $('.country').on('select2:select', function (e) {
                
                var country = $(this).val();

                var id = $(this).closest('.row').prop('id');

                getStates(country,id,0)
          

        });



          $(document).on('select2:select', '#accounts', function (e) { 

                                
                var selected_value = $(this).val();
                $("#accounts").val(null).trigger('change');

                   
                   cloneAccounts()
        
                    var id = $('.acccountlist > .row:last').attr('id');
                     $('#'+id).find('#aid').val('');
                     $('#'+id).find('.accountname').text(selected_value);
                     $('#'+id).find('.remove').attr('id',id);
                     $('#'+id).find('.removeButton').attr('style','display: block !important');
                     $('#'+id).find('#opening_balance').val('');
                     $('#'+id).find('#country').val('').trigger('change');
                     $('#'+id).find('#state').val('').trigger('change');
                     $('#'+id).find('#state').html('');
                     $('#'+id).find('#city').val('');
                     $('#'+id).find('#zip').val('');
                     $('#'+id).find('#address').val('');

            
    
         
        });


        $(document).on('click', '.remove', function (e) {    

                    var id = this.id;
                    $('#'+id).remove();
           });


            // if not  edit mode 
            if(data.customer.length == 0) {

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


                    // append account names to form 
                     var accountname = $(".accountname");
                     
                        for(var i = 0; i < accountname.length; i++){
                            
                             data.append("accountname[]", $(accountname[i]).text());

                        }
                        


                    if(this.id == 'btnAdd') {

                        var url = "{{ route('addCustomer') }}";        
                       
                    } else {

                        var url = "{{ route('updateCustomer') }}";   
                        // append customer id to form
                          data.append("uid", customer[0].uid);

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
                                     window.location = "{{route('Customers')}}"; 

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
