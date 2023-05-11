@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Totals For Haematology </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Panels </li>
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
                        
            
                        
                        <div class="col-md-12"> 

                            <div class="card card-primary card-outline">
                            <div class="card-body">                  
                              

                                  <form id="form">
                                            {{ csrf_field() }}

                                            <div class="row">
                                      
                                     <div class="col-md-12">
                                     <label  class="col-form-label">Phone Log History For Sample ID<span>*</span></label>
                                     </div>
                                       <div class="col-md-4">
                                    
                                           <input type="text" class="form-control" id="sampleid" name="text" value="" />
                                       </div>
                                       <div class="col-md-2">
                                       <button type="button" class="btn btn-primary float-left search">Search</button>
                                       </div>
                                       
                                       </div> 
                                        </form>
                                          


                            </div>
                        </div>
                        </div>

                 <div class="col-md-12">
                    

                         <div class="card card-primary card-outline">
                            <div class="card-body table-responsive">       
                                
          
                                <table id="table" class="table mb-0 table-striped">
                                  
                                  <thead>
                                    <tr>
                                      
                              
                                        <th>Date Time</th>
                                        <th>Hae</th>
                                        <th>Bio</th>
                                        <th>Coa</th>
                                        <th>Imm</th>
                                        <th>Gas</th>
                                        <th>Ext</th>
                                        <th>Mic</th>
                                        <th>End</th>
                                        <th>Not Phoned</th>
                                        <th>Phoned To</th>
                                        <th>Comment</th>
                                        <th>Phoned By</th>
                                        <th>In/Out</th>
                                   <!-- IN/OUT and NotPhoned Columns to be added -->

                                
                                   
                                    </tr>
                                  </thead> 

                                  <tbody>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                   
                                   
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                   

                                  </tbody>
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
<script src="{{ asset('plugins/dataTables.fixedHeader.min.js') }}" type="text/javascript"></script>



    <script>
    $(document).ready(function() {
 
      var Sampleid=0;
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.search').click(function (){
Sampleid = $('#sampleid').val();



   $('#table').DataTable().destroy();
   load_data(Sampleid);
  
        });
        $('.clear').click(function (){
 $('#sampleid').val('');





  
        });
 
        load_data(Sampleid);
 





function load_data(Sampleid='')
 {


 var table = $('#table').DataTable({

         "lengthMenu": [ [10, 15, 25, 50, 100, 200, 500, -1], [10,15, 25, 50,100, 200, 500, "All"] ],
        dom: 'lBfrtip', //"Bfrtip",
        processing: true,
        serverSide: true,
        // stateSave: true,
        ajax: {
            url: "{{ route('getphone') }}",
            data: {
               Sampleid:Sampleid
            },
            method: 'get'
        },
         columns: [
            {data: 'DateTime', name: 'DateTime'},
            {data: 'Hae', name: 'Hae'},
            {data: 'Bio', name: 'Bio'},
            {data: 'Coa', name: 'Coa'},
            {data: 'Imm', name: 'Imm'},
            {data: 'Gas', name: 'Gas'},
            {data: 'Ext', name: 'Ext'},
            {data: 'Mic', name: 'Mic'},
            {data: 'End', name: 'End'},
            {data: 'Not Phoned', name: 'Not Phoned'}, 
            {data: 'PhonedTo', name: 'PhonedTo'},
            {data: 'Comment', name: 'Comment'},
            {data: 'PhonedBy', name: 'PhonedBy'},
            {data: 'In/Out', name: 'In/Out'},
           

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
                 { "visible": false, "targets": [] }
                ], 

            });


               

}
    });
</script>
@endpush
