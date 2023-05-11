@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
  <div class="row mb-0">
    <div class="col-sm-6">
      <h1 class="m-0">Demographics Data</h1>
    </div><!-- /.col -->
    <div class="col-sm-6  d-none d-sm-none d-md-block ">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
        <li class="breadcrumb-item active">Bl100</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main content -->
<div class="content">
<div class="container-fluid">

              <div class="row">
                  
                  <div class="col-md-4">    
                  <div class="card card-primary card-outline">
                      <div class="card-body">                  
                         

                            <form id="form">
                                      {{ csrf_field() }}
                                      <div class="row">
                                      
                                      <div class="col-md-12">
                                      <label  class="col-form-label text-center">Between Dates</label>
                                       </div>
                                       <div class="col-md-6">
                                      <label  class="col-form-label">from<span>*</span></label>
                                           <input type="date" class="form-control" id="date1" name="text" value="" />
                                       </div>
                                       <div class="col-md-6">
                                      <label  class="col-form-label">To<span>*</span></label>
                                           <input type="date" class="form-control" id="date2" name="text" value="" />
                                       </div>
                                       <div class="col-md-12 mt-3">
                                          <button type="button" class="btn btn-info ml-1 float-right clear">Clear Form</button>
                                          <button type="button" class="btn btn-primary float-right calculate">Calculate</button>
                                        
                                       </div> 


                                       
                                  
                                     </div>   
                                  </form>
                                    


                      </div>
                  </div>
                  </div>

              <div class="col-md-8">
                   <div class="card card-primary card-outline">
                      <div class="card-body table-responsive">                  
                          <table id="table" class="mb-0 table-striped">
                            
                            <thead>
                              <tr>
                      
                               <th>PatName</th>
                                <th>Chart</th>
                                <th>DoB</th>
                                <th>Sex</th>
                                <th>Address</th>
                                <th>Ward</th>
                                <th>Clinician</th>
                                <th>GP</th>
                                <th>SampleID</th>
                                <th>SampleDate</th>
                                <th>Rec Date</th>
                                <th>Run Date</th>
                                <th>Site</th>
                                <th>Site Details</th>
                                <th></th>
                             
                              </tr>
                            </thead> 



                          </table>                 
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
<script>
    $(document).ready(function() {
var updateid;
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.calculate').click(function (){
var from_date = $('#date1').val();
  var to_date = $('#date2').val();



   $('#table').DataTable().destroy();
   load_data(from_date, to_date);
  
        });
        $('.clear').click(function (){
 $('#date1').val('');
 $('#date2').val('');




  
        });
 
        load_data(from_date, to_date);
 





function load_data(from_date = '', to_date = '')
 {


 var table = $('#table').DataTable({

         "lengthMenu": [ [10, 15, 25, 50, 100, 200, 500, -1], [10,15, 25, 50,100, 200, 500, "All"] ],
        dom: 'lBfrtip', //"Bfrtip",
        processing: true,
        serverSide: true,
        // stateSave: true,
        ajax: {
            url: "{{ route('getdemographicsdata') }}",
            data: {
                from_date:from_date, 
                to_date:to_date, 
            },
            method: 'POST'
        },
         columns: [
            {data: 'PatName', name: 'PatName'},
            {data: 'Chart', name: 'Chart'},
            {data: 'DoB', name: 'DoB'},
            {data: 'Sex', name: 'Sex'},
            {data: 'Addr0', name: 'Addr0'},
            {data: 'Ward', name: 'Ward'},
            {data: 'Clinician', name: 'Clinician'},
            {data: 'GP', name: 'GP'},
            {data: 'SampleID', name: 'SampleID'},
            {data: 'SampleDate', name: 'SampleDate'},
            {data: 'RecDate', name: 'RecDate'},
            {data: 'RunDate', name: 'RunDate'}
            {data: 'Site', name: 'Site'}
            {data: 'SiteDetails', name: 'SiteDetails'}

        ],
        "pageLength": 10,
        "order":[[0, 'desc']],

         dom: "Blfrtip",

                buttons: [
                
                    {
                        title:'Requests',
                        text: 'Excel',
                        footer: true,
                        extend: 'excelHtml5',
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    },
                    {
                    title:'Requests', 
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
                        title:'Requests',
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


               

}
    });
</script>
@endpush
