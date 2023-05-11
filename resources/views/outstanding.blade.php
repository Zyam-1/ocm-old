@include('layouts.header')
<link rel="stylesheet" href="{{asset('plugins/jquery.min.css')}}">


<link rel="stylesheet" href="{{asset('plugins/Convenient-Pagination-Plugin-With-Bootstrap-And-jQuery-UI-Pagination-js/dist/pagination.css')}}">
  <style>
/*    .th:first-child,th:last-child{
      : 0px;
    }*/
  </style>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Active Analyser Outstanding
                <a class="btn btn-success btn-sm" href=""><i class="fas fa-arrow-left"></i> Go Back </a>
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

       <!-- <div class="w-75 card card-primary card-outline m-auto py-4 my-2"> -->
        <div class='row m-auto'>
            <div class="col-7">
            <div class="card card-primary card-outline">
                            <div class="card-body table-responsive">                  
                                <table id="table" class="table mb-0 table-striped">
                                  
                                  <thead>
                                    <tr>
                            
                                      <th>Sample Number</th>
                                      <th>Outstanding</th>
                                      <th>Date</th>
                                      <th></th>
                                   
                                    </tr>
                                  </thead> 

                                </table>                 
                            </div>
                        </div> 
            </div>
            <div class="col-5">
                <div class="row">
                    <div class="col-12">
                        <label for="date" class="ml-2 mt-1">Date:</label>
                        <input type="date" name="date" id="date" value="" class="ml-1 mb-3 w-50 form-control">
                    </div>
                    <div class="col-12">
                        <h4>Departments</h4>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio">All
                        </label>
                        </div>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio">H. Pylori
                        </label>
                        </div>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio">c. Diff
                        </label>
                        </div>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio">Faeces
                        </label>
                        </div>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio">Urine
                        </label>
                        </div>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio">Rota/Adeno
                        </label>
                        </div>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio">CSF
                        </label>
                        </div>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio">Ova/Parasites
                        </label>
                        </div>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio">C&S
                        </label>
                        </div>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio">Red Sub
                        </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>         
        <!-- </div> -->

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

<script>
  $(document).ready(function () {



 
$.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $(document).on('click', '.showOutstanding', function (event) { 


var date = $('#date').val();
var optradio = $('#optradio').val();



 $('#table').DataTable().destroy();
 load_data(date, optradio);

      });
 
 load_data();





function load_data(date = '', optradio = '')
 {


 var table = $('#table').DataTable({

         "lengthMenu": [ [10, 15, 25, 50, 100, 200, 500, -1], [10,15, 25, 50,100, 200, 500, "All"] ],
        dom: 'lBfrtip', //"Bfrtip",


        processing: true,
        serverSide: true,
        // stateSave: true,
        ajax: {
            url: "{{ route('Outstanding') }}",
            data: {
                date:date,
                optradio:optradio, 
            },
            method: 'POST'
        },
         columns: [
            {data: 'sampleid', name: 'sampleid'},
            {data: 'outstanding', name: 'outstanding'},
            {data: 'Date',
                    render: function (data, type, row) {
                        if(data != null) {
                           return moment(new Date(data).toString()).format('DD-MM-YYYY HH:mm');  
                        }else {

                            return '';
                        }
                     
                    }
                  },

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "pageLength": 15,
        "order":[[0, 'desc']],

         dom: "Blfrtip",

                buttons: [
                
                    {
                        title:'Outstanding',
                        text: 'Excel',
                        footer: true,
                        extend: 'excelHtml5',
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    },
                    {
                    title:'Outstanding', 
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
                        title:'Outstanding',
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
                 { "visible": false, "targets": [1,4,11,12,13,14] }
                ], 

            });

                    new $.fn.dataTable.FixedHeader( table, {
                        // options
                    } );


                     setInterval( function () {
                        table.ajax.reload();
                    }, 500000 );


}
});
</script>

@endpush
