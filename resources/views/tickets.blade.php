@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Tickets
               <a class="btn btn-info btn-sm" href="{{route('Ticket')}}"><i class="fas fa-plus"></i> Ticket </a>
             </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Tickets</li>
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
             <table  class="table mb-0 table-striped table">
                                 
             <thead>
             
             <tr>
             
              <th>ID</th>
              <th>Ticket#</th>
              <th>Subject</th>


              <th>Patient</th>
              <th>Request#</th>
              <th>Sample#</th>

              <th>Status</th>
              <th>Created At</th>
              <th>Resolved</th>
              <th>Department</th>
              <th>Priority</th>
              <th>System</th>
              <th>Actions</th>
              </tr>


                 </thead>
          
               </table>
         

        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
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


   
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    
var table=$('.table').DataTable({
 
ajax: {
    
    url: "{{ route('Tickets') }}",
    
},
 columns: [

    {data: 'id', name: 'id'},
    {data: 'ticketid', name: 'ticketid'},
    {data: 'subject', name: 'subject'},
   {data: 'patientname', name: 'patientname'},
   {data: 'requestid', name: 'requestid'},
    {data: 'sampleid', name: 'sampleid'},
    {data: 'status', name: 'status'},
    {data: 'created_at', name: 'created_at'},
    {data: 'resolved', name: 'resolved'},
      {data: 'department', name: 'department'},
        {data: 'priority', name: 'priority'},
        {data: 'internal', name: 'internal'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
],
"order":[[7, 'desc']], 

  dom: "Blfrtip",
                buttons: [
                
                    {
                        title:'Users',
                        text: 'Excel',
                        footer: true,
                        extend: 'excelHtml5',
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    },
                    {
                    title:'Users', 
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
                        title:'Users',
                        extend: 'print',
                        footer: true,
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    }, 
                    'colvis'   
                ],

                columnDefs: [{
                    orderable: false,
                    targets: -1,
                },
                { "visible": false, "targets": [0,3,4,5] }
                ], 

});


$(document).on('click', '.delete', function () { 
     
     var id=this.id;

             swal({
                title: "Are you sure?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              }).then((willDelete) => {
                  if (willDelete) {
                 
                 $.ajax({
                  type: 'get',
                  url:"{{route('deleteTicket')}}/"+id,
                  dataType: '',                  
                  success: function(){
                      
                     table.ajax.reload( null, false );

                        }
                      }); 

   

  } 
});

       
    });
     
    




   

});  
    </script>
@endpush