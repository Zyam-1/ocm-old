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
            <h1 class="m-0">Reflex Testing </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Mapping </li>
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
                                                 <select class="form-control" name="test" id="test">
                                                        <option value="">choose a test</option>
                                                        @foreach ($data['tests'] as $test)
                                                        <option value="{{$test->id}}">{{$test->name}}</option>
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
                          
                              
                                        <h4 class="mb-3">Available Tests</h4>

                                        <table id="table0" class="table mb-0 table-striped">
                                          
                                          <thead>
                                            <tr>
                                    

               
                                      <th>Code</th>
                                      <th>Name</th>
                                      <th>SampleType</th>
                                      <th>Facility</th>
                                      <th></th>
                                           
                                            </tr>
                                          </thead> 



                                        </table>                 
                           


                                </div>

                                <div class="col-md-6">


                                            <h4 class="mb-3">Existing Tests</h4>

                                            <table id="table" class="table mb-0 table-striped">
                                              
                                              <thead>
                                                <tr>
                                        

                                                 <th>Code</th>   
                                                  <th>Name</th>
                                                  <th>SampleType</th>
                                                  <th>Facility</th>
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

   $( "#test" ).select2({
                placeholder:'Choose Test',
                allowClear:true
               });



  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


$(document).on('click', '.viewTests', function (event) { 


  var test = $('#test').val();

   $('#table0').DataTable().destroy();
   $('#table').DataTable().destroy();
   load_data0(test);
   load_data(test);
  
        });
 
    load_data0();
    load_data();

    function load_data0(test = '')
     {

        var table0 = $('#table0').DataTable({

         "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
        dom: 'lBfrtip', //"Bfrtip",


        processing: true,
        serverSide: true,
        // stateSave: true,
        ajax: {
            url: "{{ route('ReflexTesting0') }}",
            data:{test:test},
            method: 'POST'
        },
         columns: [

              {data: 'shortname', name: 'shortname'},
            {data: 'longname', name: 'longname'},
            {data: 'SampleType', name: 'Lists.Text'},
            {data: 'Hospital', name: 'facilities.name'},            
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

                            var test1 = $('#test').val();
                            var test2 = $(this).attr('id');
                            
                            if(test1 != '' && test2 != '') {

                                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                                 $.ajax({
                                            type: 'post',
                                            url:"{{ route( 'addReflexTesting') }}",
                                            data: {'test1' : test1, 'test2' : test2, _token: CSRF_TOKEN,},
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


 

    function load_data(test = '')
     {

        var table = $('#table').DataTable({

         "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
        dom: 'lBfrtip', //"Bfrtip",


        processing: true,
        serverSide: true,
        // stateSave: true,
        ajax: {
            url: "{{ route('ReflexTesting') }}",
            data:{test:test},
            method: 'POST'
        },
         columns: [

            {data: 'shortname', name: 'shortname'},
            {data: 'longname', name: 'longname'},
            {data: 'SampleType', name: 'Lists.Text'},
            {data: 'Hospital', name: 'facilities.name'},    
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
                { "visible": false, "targets": [4,5,6,7] }
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
                        url:"{{ route( 'deleteReflexTesting') }}",
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
