@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Abnormals</h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Abnormals </li>
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
                        
                     <div class="col-md-5">    
                        <div class="card card-primary card-outline">
                            <div class="card-body">                  
                                <h5>Facility Info</h5>   

                                  <form id="form">
                                            {{ csrf_field() }}
                                            <div class="row">
                                            
                                            <div class="col-md-12">
                                            <label  class="col-form-label">Between Dates<span>*</span></label>
                                             </div>
                                             <div class="col-md-4">
                                         
                                                 <input type="date" class="form-control" id="to" name="to" value="" />
                                                
                                             </div>
                                             <div class="col-md-4">
                                         
                                            <input type="date" class="form-control" id="from" name="from" value="" />
                                        
                                              </div>
                                       
                                              <div class="col-md-4   ">
                                         
                                         <button type="button"   class="btn btn-primary calculate">Calculate</button>
                                   
                                         </div>

                                             
                                        
                                           </div>   
                                        </form>
                                          


                            </div>

                        </div>
                        <div class="card card-primary card-outline">
                            <div class="card-body">                  
                                <h5>Analyte</h5>   

                                  <form id="form">
                                            {{ csrf_field() }}
                                            <div class="row">
                                            <div class="col-md-6">
                                            <select class="form-control" name="analyte" id="analyte">
                                              @foreach ($analyte as $an)
                                                <option value="{{$an}}">{{$an}}</option>
                                              @endforeach
                                            </select>
                                             </div>
                                             <div class="col-md-6">
                                             </div>
                                             <div class="col-md-3 mt-2 ">
                                           
                                             </div>

                                             <div class="col-md-6 mt-2 ml-2 ">
                                             <h5 style="">Normal Ranges</h5> 
                                             </div>
                                             <div class="col-md-1 mt-2 ">
                                           
                                             </div>
                                             <div class="col-md-2">

                                             </div>
                                             <div class="col-md-2 mt-2">
                                             <button type="button" class="btn btn-primary">Male</button>
                                             </div>
                                             <div class="col-md-2 mt-2 ">
                                             <button type="button" class="btn btn-primary">Female</button>
                                             </div>
                                             <div class="col-md-2 mt-2">
                                             <button type="button" class="btn btn-primary ">  Both</button>
                                             </div>
                                            
                                             <div class="col-md-4 mt-3">
                                            <span> Deselect Range</span>
                                          </div>
                                            
                                         
                                          <div class="col-md-2 mt-2">
                                            <span> High</span>
                                          </div>
                                          <div class="col-md-2 mt-2">
                                         
                                         <input type="text" class="form-control" id="from" name="from" value="" />
                                     
                                           </div>
                                           <div class="col-md-2 mt-2">
                                         
                                         <input type="text" class="form-control" id="from" name="from" value="" />
                                     
                                           </div>

                                           <div class="col-md-2 mt-2">
                                         
                                         <input type="text" class="form-control" id="from" name="from" value="" />
                                     
                                           </div>
                                           <div class="col-md-3  mt-2">
                                         
                                         <input type="text" class="form-control" id="from" name="from" value="" />
                                     
                                           </div>
                                           <div class="col-md-2 mt-2">
                                            <span> Low</span>
                                          </div>
                                          <div class="col-md-2 mt-2">
                                         
                                         <input type="text" class="form-control" id="from" name="from" value="" />
                                     
                                           </div>
                                           <div class="col-md-2 mt-2">
                                         
                                         <input type="text" class="form-control" id="from" name="from" value="" />
                                     
                                           </div>

                                           <div class="col-md-2 mt-2">
                                         
                                         <input type="text" class="form-control" id="from" name="from" value="" />
                                     
                                           </div>
                                           <div class="col-md-3  mt-2">
                                         
                                         <input type="text" class="form-control" id="from" name="from" value="" />
                                     
                                           </div>
                                           <div class="col-md-3 mt-2 ">
                                           
                                             </div>
                                             
                                             <div class="col-md-6 mt-2 ml-2 ">
                                             <h5 style="">Flag Ranges</h5> 
                                             </div>
                                             <div class="col-md-1 mt-2 ">
                                           
                                             </div>
                                             <div class="col-md-2">

                                             </div>
                                             <div class="col-md-2 mt-2">
                                             <button type="button" class="btn btn-primary">Male</button>
                                             </div>
                                             <div class="col-md-2 mt-2 ">
                                             <button type="button" class="btn btn-primary">Female</button>
                                             </div>
                                             <div class="col-md-2 mt-2">
                                             <button type="button" class="btn btn-primary ">  Both</button>
                                             </div>
                                            
                                             <div class="col-md-4 mt-3">
                                           
                                          </div>
                                            
                                         
                                          <div class="col-md-2 mt-2">
                                            <span> High</span>
                                          </div>
                                          <div class="col-md-2 mt-2">
                                         
                                         <input type="text" class="form-control" id="from" name="from" value="" />
                                     
                                           </div>
                                           <div class="col-md-2 mt-2">
                                         
                                         <input type="text" class="form-control" id="from" name="from" value="" />
                                     
                                           </div>

                                           <div class="col-md-2 mt-2">
                                         
                                         <input type="text" class="form-control" id="from" name="from" value="" />
                                     
                                           </div>
                                           <div class="col-md-3  mt-2">
                                         
                                     
                                           </div>
                                           <div class="col-md-2 mt-2">
                                            <span> Low</span>
                                          </div>
                                          <div class="col-md-2 mt-2">
                                         
                                         <input type="text" class="form-control" id="from" name="from" value="" />
                                     
                                           </div>
                                           <div class="col-md-2 mt-2">
                                         
                                         <input type="text" class="form-control" id="from" name="from" value="" />
                                     
                                           </div>

                                           <div class="col-md-2 mt-2">
                                         
                                         <input type="text" class="form-control" id="from" name="from" value="" />
                                     
                                           </div>
                                           <div class="col-md-3  mt-2">
                                         
                                     
                                           </div>
                                           <div class="col-md-2 ">
                                          
                                     
                                           </div>
                                           <div class="col-md-3 mt-2">
                                           <label  class="col-form-label">Under Range</label>

                                         <input type="text" class="form-control" id="from" name="from" value="" />
                                     
                                           </div>
                                    
                                           <div class="col-md-3 mt-2 ml-4">
                                           <label  class="col-form-label">Over Range</label>

                                         <input type="text" class="form-control" id="from" name="from" value="" />
                                     
                                           </div>
                                          
                                           
                                           </div>   
                                        </form>
                                          

                        </div>

                        </div>
                        </div>

                    <div class="col-md-7">
                         <div class="card card-primary card-outline">
                            <div class="card-body table-responsive">                  
                                <table id="table" class="table mb-0 table-striped">
                                  
                                  <thead>
                                    <tr>
                            
            
                                      <th>RunDate</th>
                                      <th>Sample ID </th>
                                      <th>Chart</th>
                                      <th>Age</th>
                                      <th>Result</th>
                                     
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

var analytename;
var from;
var to;

$.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });

 
 $( "#analyte" ).select2({
                    placeholder:'Choose an Analyte',
                    allowClear:true
                   });

$(document).on('select2:select', '#analyte', function () { 
  analytename = $(this).val();
  to=$("#to").val();
 from=$("#from").val();
  $.ajax({
        type: 'get',
        url:"{{ route( 'getabnormalflags') }}",  
        data: {analytename : analytename, from:from, to:to},
        dataType: 'json',                   
        success: function(response){ 

        }     

        });
 });

$(document).on('click', '.calculate', function (event) { 

to=$("#to").val();
from=$("#from").val();
load_data(to,from);


});
 function load_data(fromdate='',todate='')
     {

        var table = $('#table').DataTable({

         "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
        dom: 'lBfrtip', //"Bfrtip",


        processing: true,
        serverSide: true,
        // stateSave: true,
        ajax: {
            url: "{{ route('abnormalresults') }}",
            data:{fromdate:fromdate,todate:todate},
            method: 'POST'
        },
         columns: [

            {data: 'rundate', name: 'rundate'},
            {data: 'sampleid', name: 'code'},
            {data: 'chart', name: 'text'},       
            {data: 'age', name: 'created_at'},
            {data: 'result', name: 'result'},
    
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

                "initComplete": function (results) {
                





                } 

    });
  }
 
 
});

</script>
@endpush
