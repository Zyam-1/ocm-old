@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
  <div class="row mb-0">
    <div class="col-sm-6">
      <h1 class="m-0">Collated Reports</h1>
    </div><!-- /.col -->
    <div class="col-sm-6  d-none d-sm-none d-md-block ">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
        <li class="breadcrumb-item active">Collated Reports</li>
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
               

                            <form id="form">
                                      {{ csrf_field() }}
                                      <div class="row">
                                      
                                      <div class="col-md-8">
                                      <label  class="col-form-label"><span>Between Dates</span></label>
                                          
                                       </div>
                                       <div class="col-md-4 ">
                                      <label  class="col-form-label"><span>Clinician</span></label>
                                          
                                       </div>
                                       <div class="col-md-4">
                                     
                                           <input type="date" class="form-control" id="from" name="from" value="" />
                                       </div>
                                       <div class="col-md-4">
                                     
                                     <input type="date" class="form-control" id="to" name="to" value="" />
                                 </div>
                                 <div class="col-md-4">
                                     
                                 <select class="form-control" name="clinician" id="clinician" placeholder="Choose a Role">
                                        
                                    @foreach ($clin as $c)
                                      <option value="{{$c}}">{{$c}}</option>
                                    @endforeach
                                                        
                                  </select>
                                 </div>
                                        
                                       <div class="col-md-12 mt-3">
                                          <button type="button" class="btn btn-info ml-1 float-right clear">Clear Form</button>
                                          <button type="button" class="btn btn-primary float-right generate">Generate Report</button>
                                          <button type="button"  class="btn btn-secondary float-right updatedata d-none">Update</button>
                                       </div> 


                                       
                                  
                                     </div>   
                                  </form>
                                    


                      </div>
                  </div>
                  </div>

              <div class="col-md-7">
                   <div class="card card-primary card-outline">
                      <div class="card-body table-responsive">                  
                          <table id="table2" class="mb-0 table-striped">
                            
                            <thead>
                              <tr>
                      
                                <th>SampleID</th>
                                <th>Date</th>
                                <th>PatName</th>
                                <th>DoB</th>
                                <th>Chart</th>
                                <th>Analyte</th>
                                <th>Result</th>
                                
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

$(document).ready(function() {
  var from;
  var to;
  var clinician;

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $( "#clinician" ).select2({
                    placeholder:'Choose a Clinician',
                    allowClear:true
                   });



    $(document).on('click', '.generate', function (event) { 
 
           from = $('#from').val();
           to = $('#to').val();
           clinician = $('#clinician').val();
          //  alert(Source)

           $('#table2').DataTable().destroy();
          load_data(from , to, clinician);
    });

   
    function load_data(from = '', to = '', clinician = '')
     {
  
      var table = $('#table2').DataTable({

      "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],

      processing: true,
      serverSide: true,
      stateSave: true,
      ajax: {
            type: 'get',
            url:"{{ route( 'collectedreportsdata') }}",
            data: {from : from, to : to, clinician : clinician},  
      },
      columns: [
          {data: 'SampleID', name: 'SampleID'},
          {data: 'Date', name: 'Date'},
          {data: 'PatName', name: 'PatName'},
          {data: 'DoB', name: 'DoB'},
          {data: 'Chart', name: 'Chart'},
          {data: 'Analyte', name: 'Analyte'},
          {data: 'Result', name: 'Result'},
      ],
      "order":[[0, 'desc']],
              columnDefs: [
              { "visible": false, "targets": [] },
              ], 

     });
    }

});


</script>
@endpush
