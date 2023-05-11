@include('layouts.header')
  
  <style type="text/css">
.flex-wrap {
    -webkit-flex-wrap: wrap!important;
    -ms-flex-wrap: wrap!important;
    flex-wrap: wrap!important;
    width: 34%;
    display: inline-block;
    text-align: center;
    top: -3px;
}
  </style>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">BL1200 Codes Mapping </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">BL1200 Codes Mapping </li>
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

                           <div class="row">
                                    
                             <div class="col-md-12 mb-3">  
                    
                                  <form id="form">
                                            {{ csrf_field() }}
                                            <div class="row">
                                            
                                        
                                        <div class="col-md-3">
                                           <input type="hidden" class="form-control" id="id" name="id" value="" />
                                                 <select class="form-control" name="facility" id="facility">
                                                        <option value="">choose a facility</option>
                                                        @foreach ($data['profiles'] as $profile)
                                                        <option value="{{$profile->id}}">{{$profile->name}}</option>
                                                        @endforeach
                                                 </select>
                                             </div>

    
                                             <div class="col-md-2">
                                                <button type="button" class="btn btn-primary viewTests">View Tests</button>
                                             </div> 


                                             
                                        
                                           </div>   
                                        </form>

                                 </div>


                        
                                <div class="col-md-6">    
                          
                              
                                        <h4 class="mb-3">Available Codes</h4>

                                        <table id="table0" class="table mb-0 table-striped">
                                          
                                          <thead>
                                            <tr>
                                    

               
                                      <th>Code</th>
                                      <th>Name</th>
                            
                                      <th></th>
                                           
                                            </tr>
                                          </thead> 



                                        </table>                 
                           


                                </div>

                                <div class="col-md-6">


                                            <h4 class="mb-3">Existing Codes</h4>

                                            <table id="table" class="table mb-0 table-striped">
                                              
                                              <thead>
                                                <tr>
                                        

                                                  <th>Facility</th>
                                                  <th>Code</th>
                                                  <th>Name</th>
                                                  <th>Mapped</th>
                                                  <th>Re-Mapped</th>
                                                  <th>Mapped By</th>
                                                  <th>Re-Mapped By</th>
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


<script type="text/javascript">
    $(document).ready(function () {


   $( "#facility" ).select2({
                placeholder:'Choose Facility',
                allowClear:true
               });


  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


$(document).on('click', '.viewTests', function (event) { 


  var facility = $('#facility').val();

   $('#table0').DataTable().destroy();
   $('#table').DataTable().destroy();
   load_data0(facility);
   load_data(facility);
  
        });
 
    load_data0();
    load_data();

    function load_data0(facility = '')
     {

        var table0 = $('#table0').DataTable({

         "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
        dom: 'lBfrtip', //"Bfrtip",


        processing: true,
        serverSide: true,
        // stateSave: true,
        ajax: {
            url: "{{ route('bl1200Mapping0') }}",
            data:{facility:facility},
            method: 'POST'
        },
         columns: [

            {data: 'code', name: 'code'},
            {data: 'text', name: 'text'},       
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "order":[[1, 'asc']],

         dom: "Blfrtip",
                buttons: [
                
                    {
                        title:'Mappings',
                        text: 'Excel',
                        footer: true,
                        extend: 'excelHtml5',
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    },
                    {
                        title:'View',
                        text: 'View',
                        footer: true,
                        extend: 'colvis'
                    },    
                ],

                columnDefs: [{
                    orderable: false,
                    targets: -1,
                },
                { "visible": false, "targets": [] }
                ], 
              
                "initComplete": function () {

                    $('#table0 tbody').off().on( 'click', '.add', function (e) {

                            var facility = $('#facility').val();
                             var tr = $(this).attr('id');
                            
                            if(facility != '' && tr != '') {

                                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                                 $.ajax({
                                            type: 'post',
                                            url:"{{ route( 'addbl1200Mapping') }}",
                                            data: {'test' : tr, 'facility' : facility, _token: CSRF_TOKEN,},
                                            dataType: 'json',                   
                                            success: function(data){ 
                                                   
                                                   $('.viewTests').trigger('click'); 
                                                    
                                                }
                                            });

                            }
                     })




                } 


    });

   

  }


 

    function load_data(facility = '')
     {

        var table = $('#table').DataTable({

         "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
        dom: 'lBfrtip', //"Bfrtip",


        processing: true,
        serverSide: true,
        // stateSave: true,
        ajax: {
            url: "{{ route('bl1200Mapping') }}",
            data:{facility:facility},
            method: 'POST'
        },
         columns: [

            {data: 'name', name: 'facilities.name'},
            {data: 'code', name: 'code'},
            {data: 'text', name: 'text'},       
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'created_by', name: 'created_by'},
            {data: 'updated_by', name: 'updated_by'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "order":[[1, 'asc']],

         dom: "Blfrtip",
                buttons: [
                
                    {
                        title:'Mappings',
                        text: 'Excel',
                        footer: true,
                        extend: 'excelHtml5',
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    },
                    {
                        title:'View',
                        text: 'View',
                        footer: true,
                        extend: 'colvis'
                    },    
                ],

                columnDefs: [{
                    orderable: false,
                    targets: -1,
                },
                { "visible": false, "targets": [3,4,5,6] }
                ], 

                "initComplete": function () {




                } 

    });

   

  table.on('click', '.delete', function() {


        tr = $(this).attr('id');
       

        swal({
          title: "Are you sure?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {

             var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

             $.ajax({
                        type: 'post',
                        url:"{{ route( 'deletebl1200Mapping') }}",
                        data: {'id' : tr, _token: CSRF_TOKEN,},
                        dataType: 'json',                   
                        success: function(data){ 
                               
                               $('.viewTests').trigger('click'); 
                                
                            }
                        });
           } 
        });

 });


  }

          


    });

</script>
@endpush
