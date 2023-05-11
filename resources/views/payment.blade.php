@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Payment Info 
                <a class="btn btn-primary btn-sm" href="{{route('Payments')}}"><i class="fas fa-arrow-left"></i> Go Back </a>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Payments</li>
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
                                         <label  class="col-form-label">Date <span>*</span></label>

                                       <div class="input-group mb-3 date" id="date" data-target-input="nearest">
                                    
                                      <input data-target="#date" data-toggle="datetimepicker" placeholder="Date *" type="text" class="form-control date" data-target="#date" name="date" value="" />
                                    </div>


                                     </div>


                                     <div class="col-md-3 mt-0">
                                         <label  class="col-form-label">Customer <span>*</span></label>  
                                          <select class="form-control"  id="customer" name="customer">
                                           <option value="">Customer *</option> 
                                           </select>
                                     </div>

                                     <div class="col-md-3 mt-0">
                                         <label  class="col-form-label">Customer Account <span>*</span></label>
                                          <select class="form-control"  id="customer_account" name="customer_account">
                                           <option disabled selected value="">Customer Account *</option> 
                                           </select>
                                     </div>


                                     <div class="col-md-3">
                                         <label  class="col-form-label">Amount <span>*</span></label>
                                         <input type="number" name="amount" id="amount" class="form-control">
                                     </div>



                                    <div class="col-md-3 mt-2">
                                    <label>Method <span class="required">*</span></label>
                                    <select class="form-control select2" name="payment_method" id="payment_method">
                                      <option>Cash</option>
                                      <option>Bank</option>
                                      <option>Cheque</option>
                                      <option>Credit card</option>
                                      <option>PayPal</option>
                                      <option>Other</option>
                                    </select>  
                                    </div>


                                    <div class="col-md-3 mt-2">
                                    <label>Payment Account <span class="required">*</span></label>
                                    <select class="form-control select2" name="payment_account" id="payment_account">
                                    </select>  
                                    </div>

                                    <div class="col-md-3 mt-2">
                                        <label>Upload Attachment</label>
                                        <div class="input-group">
                                          <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file" id="file">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                          </div>
                                        </div>
                                      </div>

                                    
                                    <div class="col-md-6 mt-2">
                                         <p class="mb-0"><strong>Notes</strong></p>
                                        <textarea id="notes" name="notes" class="form-control mt-1" rows="5" placeholder="Notes"></textarea>
                                    </div>


                                     <div class="col-md-12 mt-3">
                                        <button type="button" class="btn btn-primary AddUpdatebtn float-right">Save Payment</button>
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

<script type="text/javascript">
    $(document).ready(function () {



    function getCustomerAccounts(customer,customer_account) { 

                $.ajax({
                        type: 'post',
                        url:"{{ route( 'getCustomerAccounts') }}",
                        data: {'id' : customer, _token: CSRF_TOKEN,},
                        dataType: 'json',                   
                        success: function(accounts){ 
                            $("#customer_account").html('');
                             $( accounts ).each(function( index ) {
                                var data = {
                                        id: accounts[index].id,
                                        text: accounts[index].text
                                        };
                                     var newOption = new Option(data.text, data.id, false, false);
                                     $('#customer_account').append(newOption).trigger('change');   
                                })
                             
                             if(customer_account != undefined) {
                                 $('#customer_account').val(customer_account).trigger('change');
                             } 

                            }
                        }); 

              }


    function customerList() {

               $( "#customer" ).select2({
                    
                            minimumInputLength:3,  
                             ajax: { 
                              url:"{{ route( 'getCustomersList') }}",
                              type: "post",
                              dataType: 'json',
                              delay: 250,
                              data: function (params) {
                                return {
                                  _token: CSRF_TOKEN,
                                  search: params.term // search term
                                };
                              },
                              processResults: function (response) {
                                //console.log(response)
                                return {
                                  results: response

                                };
                              },
                              cache: true
                            }

                            });


                            $( "#customer_account" ).select2();

                            $(document).on('select2:select', '#customer', function (e) { 

                                                
                                var customer = $(this).val();

                                    getCustomerAccounts(customer);

                    })

             }


            
       
       var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        //Date picker
        $('#date').datetimepicker({
            format: 'YYYY/MM/DD'
        });

        $( ".select2" ).select2()


        customerList()

             
        var data = @json($data);
        var date = data['date'];
        var invoice_id = data['invoice_id']
        var payment_id = data['payment_id'];
        var type = data['type'] 
        var customer = data['customer'];
        var customername = data['customername'];
        var customer_account = data['customer_account'];
        var amount = data['amount'];
        var notes = data['notes'];
        var payment_account = data['payment_account'];
        var payment_method = data['payment_method'];
        var payment_accounts = data['payment_accounts'];

              $( payment_accounts ).each(function( index ) { 

                var data = {
                    id: payment_accounts[index].id,
                    text: payment_accounts[index].name
                    };
                 var newOption = new Option(data.text, data.id, false, false);
                 $('#payment_account').append(newOption).trigger('change');   
            })


            $('.date').val(date);
            $('#notes').val(notes);
            $('#amount').val(amount);
            $('#payment_method').val(payment_method).trigger('change');
            $('#payment_account').val(payment_account).trigger('change');
     

            
            if(customer != '') {
             var client = new Option(customername, customer, true, true);
              
              $('#customer').append(client).trigger('change');
              getCustomerAccounts(customer,customer_account)
              
            }

            if(invoice_id != '' && invoice_id != null) {

            $("#customer").select2('destroy').attr("readonly", true);
            $("#customer_account").select2('destroy').attr("readonly", true);

            }


          $(document).on('click', '#addProduct', function (e) { 

                   
                    cloneProduct();

            var id = $('.productlist > .row:last').attr('id');
                     $('#'+id).find('.products').val('').trigger('change');
                     $('#'+id).find('#description').val('');
                     $('#'+id).find('#quantity').val('');
                     $('#'+id).find('#price').val('');
                     $('#'+id).find('#tax').val('');
                     $('#'+id).find('#discount').val('');
                     $('#'+id).find('#total').val('');

            });


            $(document).on('click', '.remove', function (e) { 


                  var products =  $('.productInfo');
                        
                      if(products.length == 1) {

                         Lobibox.notify('warning', {
                                pauseDelayOnHover: true,
                                continueDelayOnInactiveTab: false,
                                position: 'top right',
                                msg: 'Atleast add 1 Product.',
                                icon: 'bx bx-info-circle'
                            });

                      }  else {

                         var id = this.id;
                                  $('#'+id).remove();
                                   calculate() 
                      }
                    

            }); 


            
          // order summary & calculations 
            $('.input').on('keyup change keypress', function() {

                calculate()
                
                })

       
    
            

            // if not  edit mode 
            if(data.customer.length == 0) {

                $('.AddUpdatebtn').attr('id','btnAdd');

            } else {

                $('.AddUpdatebtn').attr('id','btnUpdate');
            }



            //add and update js code

                $(".AddUpdatebtn").click(function (event) {


                        $(".AddUpdatebtn").prop("disabled", true);

                        //stop submit the form, we will post it manually.
                        event.preventDefault();

                        // Get form
                        var form = $('#form')[0];

                        // Create an FormData object
                        var data = new FormData(form);

                        if(this.id == 'btnAdd') {

                            var url = "{{ route('savePayment') }}";        
                           
                        } else {

                            
                           
                            if(type == 'Invoice') {    
                             
                             data.append("payment_id", invoice_id); 
                              var url = "{{ route('invoicePayment') }}";   
                            
                            } else {

                              data.append("payment_id", payment_id); 
                               var url = "{{ route('updatePayment') }}";    
                             }
                              
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
                                         window.location = "{{route('Payments')}}";

                                    } else {
                                         Lobibox.notify('warning', {
                                                pauseDelayOnHover: true,
                                                continueDelayOnInactiveTab: false,
                                                position: 'top right',
                                                msg: data.error,
                                                icon: 'bx bx-info-circle'
                                            });
                                         $(".AddUpdatebtn").prop("disabled", false);
                                    }
                                }

                            });

                     

                    });

     })   
</script>
        
@endpush
