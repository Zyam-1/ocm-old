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
            <h1 class="m-0">Blood Transfusion Questions Mapping </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Blood Transfusion Questions Mapping </li>
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
                                                 <select class="form-control" name="profile" id="profile">
                                                        <option value="">choose a product</option>
                                                        @foreach ($data['products'] as $product)
                                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                                        @endforeach
                                                 </select>
                                             </div>

    
                                             <div class="col-md-2">
                                                <button type="button" class="btn btn-primary viewTests">View Questions</button>
                                             </div> 


                                             
                                        
                                           </div>   
                                        </form>

                                 </div>


                        
                                <div class="col-md-6">    
                          
                              
                                        <h4 class="mb-3">Available Questions</h4>

                                        <table id="table0" class="table mb-0 table-striped">
                                          
                                          <thead>
                                            <tr>
                                    

               
                                      <th>Question</th>
                                      <th></th>
                                           
                                            </tr>
                                          </thead> 



                                        </table>                 
                           


                                </div>

                                <div class="col-md-6">


                                            <h4 class="mb-3">Existing Questions</h4>

                                            <table id="table" class="table mb-0 table-striped">
                                              
                                              <thead>
                                                <tr>
                                        

                                                  <th>Product</th>
                                                  <th>Question</th>
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

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



   $( "#profile" ).select2({
                placeholder:'Choose Product',
                allowClear:true
               });




$(document).on('click', '.viewTests', function (event) { 


  var profile = $('#profile').val();

   $('#table0').DataTable().destroy();
   $('#table').DataTable().destroy();
   load_data0(profile);
   load_data(profile);
  
        });
 
    load_data0();
    load_data();

    function load_data0(profile = '')
     {

        var table0 = $('#table0').DataTable({

         "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
        dom: 'lBfrtip', //"Bfrtip",


        processing: true,
        serverSide: true,
        // stateSave: true,
        ajax: {
            url: "{{ route('MappingQuestionsBT0') }}",
            data:{profile:profile},
            method: 'POST'
        },
         columns: [

            {data: 'question', name: 'question'},          
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "order":[[0, 'asc']],

         dom: "Blfrtip",
                buttons: [
                
                    {
                        title:'Profile Questions Mapping',
                        text: 'Excel',
                        footer: true,
                        extend: 'excelHtml5',
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    },
                    {
                        title:'Profile Questions Mapping',
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

                            var profile = $('#profile').val();
                            var tr = $(this).attr('id');
                            
                            if(profile != '' && tr != '') {

                                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                                 $.ajax({
                                            type: 'post',
                                            url:"{{ route( 'addMappingQuestionBT') }}",
                                            data: {'question' : tr, 'profile' : profile, _token: CSRF_TOKEN,},
                                            dataType: 'json',                   
                                            success: function(data){ 
                                                   
                                                   $('.viewTests').trigger('click'); 
                                                    
                                                }
                                            });

                            }
                     })


                    

                    
                            // $(".add").remove();
                             
                 


                } 
    });

   



  }


 

    function load_data(profile = '')
     {

        var table = $('#table').DataTable({

         "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
        dom: 'lBfrtip', //"Bfrtip",


        processing: true,
        serverSide: true,
        // stateSave: true,
        ajax: {
            url: "{{ route('MappingQuestionsBT') }}",
            data:{profile:profile},
            method: 'POST'
        },
         columns: [

            {data: 'ProfileID', name: 'testprofiles.name'},
            {data: 'QuestionID', name: 'ProfileQuestions.question'},
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
                        title:'Profile Questions Mapping',
                        text: 'Excel',
                        footer: true,
                        extend: 'excelHtml5',
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    },
                    {
                        title:'Profile Questions Mapping',
                        text: 'View',
                        footer: true,
                        extend: 'colvis'
                    },    
                ],

                columnDefs: [{
                    orderable: false,
                    targets: -1,
                },
                { "visible": false, "targets": [3,4,5] }
                ], 

                 "initComplete": function () {


                     

                    
                            $(".delete").remove();
                             
                

                    
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
                        url:"{{ route( 'deleteMappingQuestionBT') }}",
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
