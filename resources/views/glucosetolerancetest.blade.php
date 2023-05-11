@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
  <div class="row mb-0">
    <div class="col-sm-6">
      <h1 class="m-0">Glucose Tolerance Test</h1>
    </div><!-- /.col -->
    <div class="col-sm-6  d-none d-sm-none d-md-block ">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
        <li class="breadcrumb-item active">Glucose Tolerance Test</li>
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
                  
                  <div class="col-md-6">    
                  <div class="card card-primary card-outline">
                      <div class="card-body">                  
                          

                            <form id="form">
                                      {{ csrf_field() }}
                                
                                <div class="row h-100">
                                    <div class="col-8">
                                        <input type="date" name="date1" id="date1" class="form-control my-3 w-50">
                                    </div>
                                    <div class="col-4">
                                      <button id="Search" class="btn btn-primary w-50 ml-3 mb-1" type="button">Search</button>
                                  </div>
                                </div>

                            <table id="table1" class="mb-0 table-striped">
                            
                            <thead>
                              <tr>
                      
                                <th>SampleID</th>
                                <th>Date</th>
         
                                
                              </tr>
                            </thead> 



                          </table> 
                                  

                                       
                            </form>
                                    


                      </div>
                  </div>
                  </div>

              <div class="col-md-6">
                   <div class="card card-primary card-outline">
                      <div class="card-body">                  
                      <div class='row m-auto'>
                            <div class="col-12">
                                <label for="chart" class="ml-2 mt-1">Chart</label>
                                <input type="text" name="chart" id="chart" value="" class="ml-1 w-50 form-control">
                            </div>
                            <div class="col-4">
                                <label for="dob" class="ml-2 mt-1">DoB</label>
                                <input type="text" name="dob" id="dob"  class="ml-1 form-control">
                            </div>

                            <div class="col-4">
                                <label for="age" class="ml-2 mt-1">Age</label>
                                <input type="text" name="age" id="age"  class="ml-1 form-control">
                            </div>
                            <div class="col-4">
                                <label for="sex" class="ml-2 mt-1">Sex</label>
                                <input type="text" name="sex" id="sex"  class="ml-1 form-control">
                            </div>
                            <div class="col-12">
                                <label for="addr1" class="ml-2 mt-1">Add1</label>
                                <input type="text" name="addr1" id="addr1"  class="ml-1 form-control">
                            </div>
                            <div class="col-12">
                                <label for="addr2" class="ml-2 mt-1">Add2</label>
                                <input type="text" name="addr2" id="addr2"  class="ml-1 form-control">
                            </div>
                            <div class="col-12">
                                <label for="consultant" class="ml-2 mt-1">Consultant</label>
                                <input type="text" name="consultant" id="consultant"  class="ml-1 form-control">
                            </div>
                            <div class="col-12">
                                <label for="ward" class="ml-2 mt-1">Ward</label>
                                <input type="text" name="ward" id="ward"  class="ml-1 form-control">
                            </div>
                            <div class="col-12">
                                <label for="gp" class="ml-2 mt-1">GP</label>
                                <input type="text" name="gp" id="gp"  class="ml-1 form-control">
                            </div>
                        </div>         
                      </div>
                  </div> 
              </div>    

              
          </div>     
          <div class="row">
                  
                  <div class="col-md-12">    
                  <div class="card card-primary card-outline">
                      <div class="card-body">                  
                         <div class="row">
                            <div class="col-9">

                        <table id="table2" class="mb-0 table-striped">
                            
                            <thead>
                              <tr>
                      
                                <th>Run#</th>
                                <th>Date/Time</th>
                                <th>Serum</th>
                                <th>Urine</th>
         
                              </tr>
                            </thead> 

                        </table> 
                        </div>

                        <div class="col-3">
                        <form id="form2" >
                        {{ csrf_field() }}
                                <button class="btn btn-secondary" id="gttreport">Print as GTT Report</button>
                                <button class="btn btn-danger" id="glucoseseries">Print as Glucose Series</button>
                        </form>
                        </div>

                        </div>
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
<script>
$(document).ready(function() {
  var datefrom;
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '#Search', function (event) { 
      
      datefrom = $('#date1').val();
           $('#table1').DataTable().destroy();
          load_data(datefrom);
    });

   
    function load_data(datefrom = '')
     {
      var table = $('#table1').DataTable({

      "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],

      processing: true,
      serverSide: true,
      ajax: {
            type: 'post',
            url:"{{ route( 'glucosetolerancedata') }}",
            data: {datefrom : datefrom},  
      },
      columns: [
          {data: 'SampleID', name: 'SampleID'},
          {data: 'Date', name: 'Date'},
      ],
      "order":[[0, 'desc']],
              columnDefs: [
              { "visible": false, "targets": [] },
              ], 

     });
    }
    $(document).on('click', '.dob', function() {
    var id;
    id=$(this).attr('id');
    var data;
    data=$(this).attr('data');
    //alert(data);
    datefrom = $('#date1').val();
           $('#table2').DataTable().destroy();
          load_data2(datefrom,data,id);
    });

      function load_data2(datefrom = '',data='' , id='')
     {
    
      var table = $('#table2').DataTable({

      "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],

      processing: true,
      serverSide: true,
      ajax: {
            type: 'post',
            url:"{{ route( 'glucosetolerancedatabutton') }}",
            data: {datefrom : datefrom,id:id,data:data},  
      },
      columns: [
          {data: 'Run#', name: 'Run#'},
          {data: 'Date/Time', name: 'Date/Time'},
          {data: 'Serum', name: 'Serum'},
          {data: 'Urine', name: 'Urine'},
      ],
      "order":[[0, 'desc']],
              columnDefs: [
              { "visible": false, "targets": [] },
              ], 

     });
    }
 event.preventDefault();


$(document).on('click','.dob',function(){
  $('.dob').removeClass('changebtn');
  $(this).addClass('changebtn');
})
$(document).on('click', '.getsid', function() {
    var id;
    id=$(this).attr('id');
    var SCreaCode;
    SCreaCode=$(this).attr('data');

    // $('#'+id).removeClass('btn-secondary').addClass('btn-primary');

  $.ajax({
          type: 'post',
          url:"{{ route( 'glucosetolerancedatabutton1') }}",
          data: {
                 id:id,
                 SCreaCode:SCreaCode
              },
          dataType: 'json',                   
          success: function(data){ 
           let n1 = data.DoB;
           let date = n1.split(" ");
              $('#dob').val(date[0]);
              $('#cNum').val(data.Chart);
              $('#age').val(data.Age);
              $('#sex').val(data.Sex);
              $('#addr1').val(data.Addr0);
              $('#addr2').val(data.Addr1);
              $('#ward').val(data.ward);
              $('#gp').val(data.GP);
              }
          });
 event.preventDefault();
});

$(document).on('click','.getsid1',function(){
  $('.getsid1').removeClass('changebtn');
  $(this).addClass('changebtn');
})

$(document).on('click', '.getsid1', function() {
    var id;
    id=$(this).attr('id');
    var UCreaCode;
    UCreaCode=$(this).attr('data');
    var UProCode;
    UProCode=$(this).attr('data2');

    // $('#'+id).removeClass('btn-secondary').addClass('btn-primary');

  $.ajax({
          type: 'post',
          url:"{{ route( 'glucosetolerancedatabutton2') }}",
          data: {
                 id:id,
                 UCreaCode:UCreaCode,
                 UProCode:UProCode
              },
          dataType: 'json',                   
          success: function(data){ 
           let n1 = data.DoB;
           let date = n1.split(" ");
              $('#dob').val(date[0]);
              $('#cNum').val(data.Chart);
              $('#age').val(data.Age);
              $('#sex').val(data.Sex);
              $('#addr1').val(data.Addr0);
              $('#addr2').val(data.Addr1);
              $('#ward').val(data.ward);
              $('#gp').val(data.GP);
              }
          });
 event.preventDefault();
});

$(document).on('click','.getsid1',function(){
  $('.getsid1').removeClass('changebtn');
  $(this).addClass('changebtn');
})
 });
</script>
@endpush
