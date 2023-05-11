@include('layouts.header')
  
    <style type="text/css">
    .flex-wrap {
        width: auto;
        text-align: left;
    }
    .flex-wrap button{
        padding: 3px 10px;
    }
    .dt-buttons {
         text-align: center !important;
    }
    </style>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Customer Statement</h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Customer Statement</li>
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
                                    <div class="row mb-3">
                                    <div class="col-md-3 mt-2">
                                        <label>Date Range *</label><br>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text bg-primary">
                                                <i class="fas fa-calendar-alt"></i>
                                              </span>
                                            </div>
                                            <input type="text" class="form-control float-right" id="daterange" name="daterange">
                                          </div>
                                        <!-- /.form group -->
                                    </div>

                                    <div class="col-md-3 mt-2">
                                        <label>Customer *</label><br>
                                        <select class="form-control"  id="customer" name="customer">
                                           <option value="">Customer</option> 
                                        </select>
                                    </div>

                                    <div class="col-md-3 mt-2">
                                      <label>Customer Account</label><br>
                                      <div class="input-group">
                                      <select class="form-control"  id="customer_account" name="customer_account">
                                      <option disabled selected value="">Customer Account </option> 
                                      </select>
                                      <div class="input-group-prepend">
                                      <button type="button" class="input-group-text bg-primary" id="submit">
                                        <i class="fas fa-search"></i>
                                      </button>
                                    </div>
                                      </div>
                                    </div>

                                </div>
                                </form>

                            </div>
                        </div> 




                        <div class="card d-none" id="result">
                            <div class="card-body table-responsive"> 

                                 <!-- title row -->
                                  <div class="row">
                                    <div class="col-12">
                                      <h4>
                                        <img class="invoice-img" src="{{ asset('images/' . $data['business'][0]->file) }}"> 
                                        <small class="float-right">C U S T O M E R &nbsp; S T A T E M E N T</small>
                                      </h4>
                                    </div>
                                    <!-- /.col -->
                                  </div>
                                  <!-- info row -->
                                  <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                      <address>
                                        <strong><span id="businessname">Company Name</span></strong><br>
                                       <span id="baddress">1094 Oakpoint Dr</span><br>
                                       <span id="bcity"> Joe Point </span> 
                                       <span id="bstate"> California </span>
                                       <span id="bzip"> 00000 </span>
                                       <span id="bcountry"> United States</span><br>
                                        Phone: <span id="bphone">0 000 0000000</span><br>
                                        Email: <span id="bemail">business@itnall.com</span>
                                      </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                      <address>
                                        <strong><span id="customername">Customer Name</span> 
                                                <span id="customeraccountanme">(Customer Account)</span></strong><br>
                                       <span id="address">1094 Oakpoint</span><br>
                                       <span id="city"> Joe Point </span>
                                        <span id="state"> California </span>
                                        <span id="zip"> 00000 </span>
                                        <span id="country"> United States </span><br>
                                        Phone: <span id="phone">0 000 0000000</span><br>
                                        Email: <span id="email">customer@itnall.com</span>
                                      </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col mb-3">
                                      <b><span id="date1">1 Jan 1970 </span> -  <span id="date2">1 Jan 1970 </span> </b> <br>
                                      <b>Opening Balance :</b> <span class="currency"></span><span id="openingbalance">00,000 </span><br>
                                      <b>Invoices :</b> <span class="currency"></span><span id="invoices">00,000 </span><br>
                                      <b>Payments :</b> <span class="currency"></span><span id="payments">00,000 </span><br>
                                      <b>Closing Balance :</b> <span class="currency"></span><span id="closingbalance">00,000 </span><br>
                                    </div>
                                    <!-- /.col -->
                                  </div>
                                  <!-- /.row -->

                                  <!-- Table row -->
                                  <div class="row">
                                    <div class="col-12 table-responsive">
                                      <table id="table" class="table mb-0 table-striped">
                                          
                                          <thead>
                                            <tr>
                                    
                                              <th>Date</th>
                                              <th>Activity</th>
                                              <th>Account</th>
                                              <th>Amount</th>
                                              <th>Balance</th>
                                           
                                            </tr>
                                          </thead>

                                          <tbody></tbody>

                                        </table> 
                                    </div>
                                    <!-- /.col -->
                                  </div>
                                  <!-- /.row -->
                                   <!-- this row will not appear when printing -->
              <div class="row no-print mt-3">
                <div class="col-12">
                  <button  type="button" class="btn btn-primary float-right" id="pdfButton" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>

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
        var data = @json($data);
        var month = data['month'];
        var customers = data['customers'];

            $('#month').val(month);
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

                       $.ajax({
                        type: 'post',
                        url:"{{ route( 'getCustomerAccounts') }}",
                        data: {'id' : customer, _token: CSRF_TOKEN,},
                        dataType: 'json',                   
                        success: function(accounts){ 
                            
                            $("#customer_account").html('');
                            var newOption = new Option('All', '', false, false);
                            $('#customer_account').append(newOption).trigger('change');

                             $( accounts ).each(function( index ) {
                                var data = {
                                        id: accounts[index].id,
                                        text: accounts[index].text
                                        };
                                     var newOption = new Option(data.text, data.id, false, false);
                                     $('#customer_account').append(newOption).trigger('change');   
                                })
                   

                            }
                        });

                        })


                    //Date range picker with time picker
                    $('#daterange').daterangepicker({
                      timePicker: false,
                      startDate: moment().startOf('month'),
                      endDate: moment().endOf('month'),
                      locale: {
                        format: 'YYYY/MM/DD'
                      }
                    })


                    $(document).on('click', '#submit', function (e) { 

                        var daterange = $('#daterange').val();
                        var customer = $('#customer').val();
                        var customer_account = $('#customer_account').val(); 
                        
                        var form = $('#form')[0];
                        var data = new FormData(form);

                        $.ajax({
                            type: "POST",
                            enctype: 'multipart/form-data',
                            url: "{{ route( 'getCustomerStatement') }}",
                            data: data,
                            processData: false,
                            contentType: false,
                            cache: false,
                            timeout: 600000,
                            success: function(data) {
                                
                                    if ($.isEmptyObject(data.error)){
                                        
                                         $('#result').attr('style','display: block !important');

                                        $('#businessname').text(data.business[0].name);
                                        $('#baddress').text(data.business[0].address);
                                        $('#bcity').text(data.business[0].city);
                                        $('#bstate').text(data.business[0].state);
                                        $('#bzip').text(data.business[0].zip);
                                        $('#bcountry').text(data.business[0].country);
                                        $('#bphone').text(data.business[0].phone);
                                        $('#bemail').text(data.business[0].email);


                                        $('#customername').text(data.customer[0].name);
                                        $('#customeraccountanme').text('('+data.customer_account[0].name+')');
                                        $('#address').text(data.customer_account[0].address);
                                        $('#city').text(data.customer_account[0].city);
                                        $('#state').text(data.customer_account[0].state);
                                        $('#zip').text(data.customer_account[0].zip);
                                        $('#country').text(data.customer_account[0].country);
                                        $('#phone').text(data.customer[0].phone);
                                        $('#email').text(data.customer[0].email);

                                        $('#date1').text(data.datefrom);
                                        $('#date2').text(data.dateto);

                                        $('#openingbalance').text(data.customerbalance[0].total);
                                        $('#invoices').text(data.customerbalance[0].invoices);
                                        $('#payments').text(data.customerbalance[0].received);
                                        $('#closingbalance').text(data.closingbalance);  

                                        $('tbody').html('');

                                        // tr for opening balance
                                        $('#table > tbody:last-child').append('<tr><td>'+data.datefrom+'</td><td><h6 class="m-0">Opening Balance</h6></td><td>'+data.customer_account[0].name+'</td><td><span class="currency"></span>'+data.customerbalance[0].total+'</td><td><span class="currency"></span>'+data.customerbalance[0].total+'</td></tr>');

                                        var balance = data.customerbalance[0].total;

                                        // tr for activities
                                         $( data.activities ).each(function( index ) {
                                            
                                            var date = new Date(data.activities[index].date);
                                            var newDate = date.toString('dd MMM yyyy');

                                                


                                        if(data.activities[index].type == 'Invoice') {

                                            balance += data.activities[index].total;

                                        $('#table > tbody:last-child').append('<tr><td>'+newDate+'</td><td>'+data.activities[index].type+'<br/><a target="_blank" href="invoiceView/'+data.activities[index].invoice_id+'"">Invoice # '+data.activities[index].invoice_id+'</a></td><td>'+data.activities[index].name+'</td><td><span class="currency"></span>'+data.activities[index].total+'</td><td><span class="currency"></span>'+balance+'</td></tr>');

                                        } else {

                                            balance -= data.activities[index].total;

                                        $('#table > tbody:last-child').append('<tr><td>'+newDate+'</td><td>'+data.activities[index].type+'<br/><a target="_blank" href="paymentView/'+data.activities[index].uid+'"">Payment ID : '+data.activities[index].uid+'</a></td><td>'+data.activities[index].name+'</td><td  class="text-danger"><span class="currency"></span>'+data.activities[index].total+'</td><td><span class="currency"></span>'+balance+'</td></tr>');    
                                         }
                                       

                                        })

                                         // tr for closing balance
                                         $('#table > tbody:last-child').append('<tr><td>'+data.dateto+'</td><td><h6 class="m-0">Closing Balance</h6></td><td>'+data.customer_account[0].name+'</td><td><span class="currency"></span>'+data.closingbalance+'</td><td><span class="currency"></span>'+data.closingbalance+'</td></tr>');

                                          
                                         //add currency symbol 
                                        $('.currency').text(data.business[0].currency);

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


  
                    })
                    
                    var startDate;
var endDate;
  
                    $(document).on('click', '#pdfButton', function (e) { 

                        
                        
                        var customer = $('#customer').val();
                        var customer_account = $('#customer_account').val();
                            
                            if(customer_account == '') {

                                customer_account = 'All';
                            }
                        
                        let daterange = $('#daterange').val();
                        const dates = daterange.split("-");
                        var date1 = dates[0];
                            date1 = date1.replace(' ','');
                            date1 = new Date(date1);
                            date1 = date1.toString('yyyy-MM-dd');

                        var date2 = dates[1];
                            date2 = date2.replace(' ','');
                            date2 = new Date(date2);
                            date2 = date2.toString('yyyy-MM-dd');


                  window.location = "downloadCustomerStatement/"+date1+"/"+date2+"/"+customer+"/"+customer_account;


                  

                    })


    });
               
                   

</script>
@endpush
