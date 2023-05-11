@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Payments 
                <a class="btn btn-primary btn-sm" href="{{route('Payment')}}"><i class="fas fa-plus"></i> Payment </a>
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
                                <table id="table" class="table mb-0 table-striped">
                                  
                                  <thead>
                                    <tr>
                                      
                                      <th>Payment ID</th>  
                                      <th>Invoice#</th>
                                      <th>Date</th>
                                      <th>Customer</th>
                                      <th>Account</th>
                                      <th>Amount</th>
                                      <th>Payment Method</th>
                                      <th>Payment Account</th>
                                      <th>Created At</th>
                                      <th>Updated At</th>
                                      <th>Created By</th>
                                      <th>Updated By</th>
                                      <th></th>
                                   
                                    </tr>
                                  </thead> 

                                  <tfoot>
                                    <tr>
                                      
                                      <th>Payment ID</th>   
                                      <th>Invoice#</th>
                                      <th>Date</th>
                                      <th>Customer</th>
                                      <th>Account</th>
                                      <th>Amount</th>
                                      <th>Payment Method</th>
                                      <th>Payment Account</th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                    
                                    </tr>
                                  </tfoot> 


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


 var table = $('#table').DataTable({

         "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
        dom: 'lBfrtip', //"Bfrtip",


        processing: true,
        serverSide: true,
        // stateSave: true,
        ajax: {
            url: "{{ route('Payments') }}",
            method: 'POST'
        },
         columns: [
            {data: 'payment_id', name: 'payment_id'},
            {data: 'invoice_id', name: 'invoice_id'},
            {data: 'date', name: 'date'},
            {data: 'customer', name: 'customer'},
            {data: 'customer_account', name: 'customer_account'},
            {data: 'total', name: 'total'},
            {data: 'payment_method', name: 'payment_method'},
            {data: 'payment_account', name: 'payment_account'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'created_by', name: 'created_by'},
            {data: 'updated_by', name: 'updated_by'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "order":[[8, 'desc']],

         dom: "Blfrtip",
                buttons: [
                
                    {
                        title:'Invoices',
                        text: 'Excel',
                        footer: true,
                        extend: 'excelHtml5',
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    },
                    {
                    title:'Invoices', 
                    text: 'PDF', 
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [':visible :not(:last-child)']
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
                        title:'Invoices',
                        extend: 'print',
                        footer: true,
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    }, 
                    'colvis'  
                ],
                columnDefs: [
                {
                    orderable: false,
                    targets: -1
                },
                { "visible": false, "targets": [7,8,9,10,11] }
                ], 



        initComplete: function () {
            this.api().columns(0).every(function () {
                var column = this;
                var input = document.createElement("input");
                input.classList.add("form-control");
                input.classList.add("p-0");
                input.classList.add("text-center");
                input.placeholder = "Payment ID";
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });
            this.api().columns(1).every(function () {
                var column = this;
                var input = document.createElement("input");
                input.classList.add("form-control");
                input.classList.add("p-0");
                input.classList.add("text-center");
                input.placeholder = "Invoice ID";
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });
              this.api().columns(2).every(function () {
                var column = this;
                var input = document.createElement("input");
                input.setAttribute("type", "date");
                input.classList.add("form-control");
                input.classList.add("p-0");
                input.classList.add("text-center");
                input.placeholder = "Date";
                $(input).appendTo($(column.footer()).empty())
                .on('change', function () {
                    column.search($(this).val()).draw();
                });
            });
             this.api().columns(3).every(function () {
                var column = this;
                var input = document.createElement("input");
                input.classList.add("form-control");
                input.classList.add("p-0");
                input.classList.add("text-center");
                input.placeholder = "Customer";
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });

              this.api().columns(4).every(function () {
                var column = this;
                var input = document.createElement("input");
                input.classList.add("form-control");
                input.classList.add("p-0");
                input.classList.add("text-center");
                input.placeholder = "Customer Account";
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });

             this.api().columns(5).every(function () {
                var column = this;
                var input = document.createElement("input");
                input.classList.add("form-control");
                input.classList.add("p-0");
                input.classList.add("text-center");
                input.placeholder = "Amount";
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });
              this.api().columns(6).every( function () {
                var column = this;
                var select = $('<select class="form-control p-0 text-center"><option value="">All</option>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
                });
              this.api().columns(7).every( function () {
                var column = this;
                var select = $('<select class="form-control p-0 text-center"><option value="">All</option>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
                });
               
        }

    });



          table.on('click', '.delete', function() {

                $tr = $(this).closest('tr');
                if($($tr).hasClass('child')) {
                    $tr = $tr.prev('parent');
                }

                var data = table.row($tr).data();
                var tr_id = '#'+table.row($tr).data().id;

                swal({
                  title: "Are you sure?",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    $.post("{{ route('deletePayment') }}",
                    {
                        id: data.payment_id 
                    });
                      $(tr_id).fadeOut(1000);
                        $(tr_id).css("background", "#4bca52");
                        setTimeout(function() {
                            $(tr_id).css("background", "none");
                            table.ajax.reload( null, false );
                            }, 900);
                   } 
                });

            });




    });

</script>
@endpush
