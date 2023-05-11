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
            <h1 class="m-0">Customer Balances</h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Customer Balances</li>
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

                                <div class="row mb-3">
                                    <div class="col-md-3 mt-2">
                                        <label>Month *</label><br>
                                        <input type="month" name="month" id="month" class="form-control">
                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <label>Customer</label><br>
                                        <select class="form-control"  id="customer" name="customer">
                                           <option value="">Customer</option> 
                                        </select>
                                    </div>

                                    <div class="col-md-3 mt-2">
                                      <label>Customer Account</label><br>
                                      <select class="form-control"  id="customer_account" name="customer_account">
                                      <option disabled selected value="">Customer Account </option> 
                                      </select>
                                    </div>

                                    <div class="col-md-3 mt-3 mt-md-2">
                                        <span id="buttons" class="float-left float-md-right"></span>
                                    </div>
                                </div>

                                <table id="table" class="table mb-0 table-striped">
                                  
                                  <thead>
                                    <tr>
                            
                                      <th>Month</th>
                                      <th>Name</th>
                                      <th>Opening Balance</th>
                                      <th>Invoices</th>
                                      <th>Receivable</th>
                                      <th>Received</th>
                                      <th>Closing Balance</th>
                                   
                                    </tr>
                                  </thead>

                                </table>                 
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

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


$(document).on('change', '#month', function (event) { 

    var month = $('#month').val();
    var customer = $('#customer').val();
    var customer_account = $('#customer_account').val();

    $('#table').DataTable().destroy();
    load_data(month,customer);
  
        });


$(document).on('change', 'select', function (event) { 

    var month = $('#month').val();
    var customer = $('#customer').val();
    var customer_account = $('#customer_account').val();

    $('#table').DataTable().destroy();
    load_data(month,customer,customer_account);
  
        });
 
 
        load_data();


    function load_data(month = '', customer = '', customer_account = '')
     {

    var table = $('#table').DataTable({


        "dom": 'lfrtip', //"Bfrtip",
        "processing": true,
        "serverSide": true,
        "searching": false,
        "lengthChange": false,
        "ordering": false,
        "pageLength":100,
        
         ajax: {
            url: "{{ route('CustomerBalances') }}",
            data:{month:month,customer:customer,customer_account:customer_account},
            method: 'POST'
         },
         columns: [
            {data: 'month', name: 'month'},
            {data: 'name', name: 'customers.name'},
            {data: 'total', name: 'sales.total'},
            {data: 'invoices', name: 'sales.invoices'},
            {data: 'receivable', name: 'sales.receivable'},
            {data: 'received', name: 'sales.received'},
            {data: 'closing', name: 'sales.closing'}
         ],
         "order":[[1, 'asc']]
    });
    
     var buttons = new $.fn.dataTable.Buttons(table, {
              buttons: [
                        
                    {
                        title:'Customers Balances',
                        text: 'Excel',
                        footer: true,
                        extend: 'excelHtml5',
                        exportOptions: {
                        columns: [':visible']
                        },
                    },
                    {
                    title:'Customer Balances', 
                    text: 'PDF', 
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [':visible']
                        },
                    footer: true,
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    customize: function (doc) {
                    doc.content[1].table.widths = 
                              Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                          doc.styles.tableBodyEven.alignment = 'center';
                          doc.styles.tableBodyOdd.alignment = 'center'; 
                                
                        }
                    },
                    {
                        text: 'Print',
                        title:'Customers Balances',
                        extend: 'print',
                        footer: true,
                        exportOptions: {
                        columns: [':visible']
                        },
                    },  
                        ],
                        columnDefs: [{
                            orderable: false,
                            targets: -1
                        }]
            }).container().appendTo($('#buttons'));


    }

               

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

                        })




    });

</script>
@endpush
