@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">External WorkList </h1>
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
                                                
                                                <div class="col-md-8 border=1">
                                                    <label class="form-label"  id="from">Between Date/Time
                                                    </label>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label ml-3" style="    margin-left: 2rem !important;" for="text-left">Exteral Site</label>
                                                </div>

                                            </div>

                                          <div class="row">

                                                 <div class="col-md-3">
                                                 <input type="date" class="form-control" id="fromdate" name="fromdate" value="" />
                                                </div> 

                                                <div class="m-1"> 
                                                <p>and</p>
                                                </div>

                                                <div class="col-md-3">
                                                <input type="date" class="form-control" id="todate" name="todate" value="" />
                                                </div>

                                                <div class="col-md-2">
                                                    <input type="time" class="form-control" for="time" name="time">
                                                </div>

                                                <div class="col-md-3"  >
                                                    <select class="form-control">
                                                        <option selected disabled hidden>Choose An Option</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                                </div>

                                          </div>

                                          <button type="button" class="btn btn-primary calculate">Calculate</button>
                                            
                                        </form>
                                          


                            </div>
                        </div>
                        </div>

                 <div class="col-md-12">
                    

                         <div class="card card-primary card-outline">
                            <div class="card-body table-responsive">                  
                                <table id="table2" class="table mb-0 table-striped">
                                  
                                  <thead>
                                    <tr>
                                      
                                      <th>Sample ID</th>
                                      <th>Patient Name</th>
                                      <th>Chart</th>
                                      <th>D.O.B</th>
                                      <th>Location</th>
                                      <th>Requests</th>
                                   
                                    </tr>
                                  </thead> 

                                  <!-- <tfoot>
                                    <tr>
                                      
                                      <th></th>   
                                      <th>Name</th>
                                      <th>Barcode</th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                    
                                    </tr>
                                  </tfoot>  -->


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


<script type="text/javascript">

$(document).ready(function () {

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(document).on('click', '.calculate', function(event) {

var from= $("#fromdate").val();
var to = $("#todate").val();

$('#table2').DataTable().destroy();
load_data(from , to);

event.preventDefault();
});

function load_data(from = '', to = '')
   {

    var table = $('#table2').DataTable({

    "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],

    processing: true,
    serverSide: true,
    stateSave: true,
    ajax: {
          type: 'get',
          url:"{{ route( 'ExtwokLst') }}",
          data: {from : from, to : to },  
    },
    columns: [
        
        {data: 'SampleID', name: 'SampleID'},
        {data: 'PatName', name: 'Patient Name'},
        {data: 'Chart', name: 'Chart'},
        {data: 'DoB', name: 'DoB'},
        {data: 'Location', name: 'Location'},
        {data: 'Request', name: 'Request'},

    ],
    "order":[[0, 'desc']],
            columnDefs: [
            { "visible": false, "targets": [] },
            ], 
    }
    )
  }

});

</script>
@endpush
