@include('layouts.header')
  
<style>
  .changebtn{
    background-color: green !important;
  }
</style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
  <div class="row mb-0">
    <div class="col-sm-6">
      <h1 class="m-0">Urine Protien</h1>
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
                                      <label  class="col-form-label"><span>Run Dates Between</span></label>
                                          
                                       </div>
                                       
                                       <div class="col-md-6">
                                     
                                           <input type="date" class="form-control" id="fromdate" name="fromdate" value="" />
                                       </div>
                                       <div class="col-md-6">
                                     
                                     <input type="date" class="form-control" id="todate" name="todate" value="" />
                                 </div>
                                 <div class="col-md-12">
                                      <label  class="col-form-label"><span>Name</span></label>
                                          
                                       </div>
                                 <div class="col-md-12">
                                     
                               
                                 <input type="text" class="form-control" id="name" name="name" value="" />       
                                                        
                                                
                                 </div>
                                        
                                     


                                 <div class="col-md-12 mt-3">
                                          <button type="button" class="btn btn-info ml-1 float-right clear">Clear Form</button>
                                          <button type="button" class="btn btn-primary float-right save" name="button" id="button">Search</button>
                                          <button type="button"  class="btn btn-secondary float-right updatedata d-none">Update</button>
                                       </div> 
                                  
                                     </div>   
                                  </form>
                                    


                      </div>
                  </div>
                  </div>

              <div class="col-md-8">
                   <div class="card card-primary card-outline">
                      <div class="card-body table-responsive">                  
                          <table id="table2" class="mb-0 table-striped">
                            
                            <thead>
                              <tr>
                      
                                <th>PatientName</th>
                                <th>RunDate</th>  
                                <th>SampleID</th>  
                              </tr>
                            </thead> 



                          </table>                 
                      </div>
                  </div> 
              </div>    

              
          </div>     
          <div class="row">
                  
                  <div class="col-md-4">    
                  <div class="card card-primary card-outline">
                      <div class="card-body">                  
                          <h3 style="margin-bottom:15px">Demographics Detail</h3>   

                            <form id="form" class="mt-1  mb-4" >
                                      {{ csrf_field() }}
                                      <div class="row">
                                      
                                      <div class="col-md-2">
                                      <label  class="col-form-label ml-1"><span>RunDate</span></label>
                                          
                                       </div>
                                       
                                       <div class="col-md-3">
                                     
                                           <input type="date" class="form-control" id="RunDate" name="RunDate" value="" />
                                       </div>
                                       
                                 <div class="col-md-1">
                                      <label  class="col-form-label"><span>SID</span></label>
                                          
                                       </div>
                                 <div class="col-md-5">
                                    
                                 <input type="text" class="form-control" id="Sid" name="Sid" value="" />       
                                                        
                                                
                                 </div>
                                 <div class="col-md-1">
                                    
                                 
                                                           
                                                   
                                    </div>
                                 <div class="col-md-1 mt-2">
                                      <label  class="col-form-label" ><span>Name</span></label>
                                          
                                       </div>
                                       
                                       <div class="col-md-10 ml-1 mt-2">
                                     
                                           <input type="text" class="form-control w-100" name="name1" id="name1" value="" />
                                       </div>
                                       
                                 <div class="col-md-0 mt-2">
                                      <label  class="col-form-label"><span>Chart</span></label>
          
                                       </div>
                                 <div class="col-md-4 ml-1 mt-2">
                                    
                                 <input type="text" class="form-control" id="Chart" name="Chart" value="" />       
                                                        
                                                
                                 </div>
                                 <div class="col-md-1 mt-2 ">
                                      <label  class="col-form-label ml-2"><span>DoB</span></label>
                                          
                                       </div>
                                 <div class="col-md-5 mt-2">
                                    
                                 <input type="text" class="form-control" id="DoB" name="DoB" value="" />       
                                                        
                                                
                                 </div>
                                  
                                     </div>   
                                  </form>

                      </div>
                  </div>
                  </div>

                 

                  <div class="col-md-8">
                   <div class="card card-primary card-outline">
                      <div class="card-body">                  
                      <form id="form" >
                                      {{ csrf_field() }}
                                      <div class="row w-75 m-auto ">
                                      
                                      <div class="col-md-3 mt-2">
                                      <label  class="col-form-label ml-5"><span>Collected Period</span></label>
                                          
                                       </div>
                                       
                                       <div class="col-md-6 mt-2">
                                     
                                           <input type="text" class="form-control" id="collectedperiod" name="collectedperiod" value="24" />
                                       </div>
                                       <div class="col-md-2 mt-2">
                                       <label  class="col-form-label"><span>Hour</span></label>
                                 </div>
                                 

                                 <div class="col-md-3 mt-2">
                                      <label  class="col-form-label ml-5"><span>Total Urinary Volume</span></label>
                                          
                                       </div>
                                       
                                       <div class="col-md-6 mt-2">
                                     
                                           <input type="text" class="form-control" id="urinevol" name="urinevol" value="" />
                                       </div>
                                       <div class="col-md-2 mt-2">
                                       <label  class="col-form-label"><span>mL</span></label>
                                 </div>
                                 
                                 <div class="col-md-3 mt-2">
                                      <label  class="col-form-label ml-5"><span>Urinary Protien</span></label>
                                          
                                       </div>
                                       
                                       <div class="col-md-6 mt-2">
                                     
                                           <input type="text" class="form-control" id="urineprotein" name="urineprotein" value="" />
                                       </div>
                                       <div class="col-md-2 mt-2">
                                       <label  class="col-form-label"><span>g/L</span></label>
                                 </div>
                                 
                                 <div class="col-md-3 mt-2">
                                      <label  class="col-form-label ml-5"><span>Urinary Protien</span></label>
                                          
                                       </div>
                                       
                                       <div class="col-md-6 mt-2" >
                                     
                                           <input type="text" class="form-control" id="urineprotein24" name="urineprotein24" value="" />
                                       </div>
                                       <div class="col-md-2 mt-2">
                                       <label  class="col-form-label"><span>g/24</span></label>
                                 </div>
                                 

                                       
                                 
                                     </div>   
                                  </form>
                      </div>
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
$('.save').click(function() {
 
  var from= $("#fromdate").val();
  var to = $("#todate").val();
  var name = $("#name").val();

  $('#table2').DataTable().destroy();
  load_data(from , to , name);

  event.preventDefault();
});

function load_data(from = '', to = '', name = '')
     {
  
      var table = $('#table2').DataTable({

      "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],

      processing: true,
      serverSide: true,
      stateSave: true,
      ajax: {
            type: 'get',
            url:"{{ route( 'urineprotienData') }}",
            data: {from : from, to : to , name : name},  
      },
      columns: [
          {data: 'Patname', name: 'PatientName'},
          {data: 'RunDate', name: 'RunDate'},
          {data: 'SampleID', name: 'SampleID'},
      ],
      "order":[[0, 'desc']],
              columnDefs: [
              { "visible": false, "targets": [] },
              ], 
      }
      )
    }


  $(document).on('click', '.getsid', function() {
    var id;
    id=$(this).attr('id');

    // $('#'+id).removeClass('btn-secondary').addClass('btn-primary');

  $.ajax({
          type: 'get',
          url:"{{ route( 'urineprotienSampleID') }}",
          data: {
                 id:id,
              },
          dataType: 'json',                   
          success: function(response){ 
           let n1 = response.RunDate;
           let date = n1.split(" ");

              $('#Sid').val(response.sid);
              $('#urineprotein').val(response.result);
              $('#Chart').val(response.Chart);
              $('#DoB').val(response.DoB);
              $('#name1').val(response.PatName);
              $('#RunDate').val(date[0]);
              }
          });
 event.preventDefault();
});

$(document).on('click','.getsid',function(){
  $('.getsid').removeClass('changebtn');
  $(this).addClass('changebtn');
})

});

</script>
@endpush
