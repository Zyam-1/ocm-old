@include('layouts.header')
<link rel="stylesheet" href="{{asset('plugins/jquery.min.css')}}">


<link rel="stylesheet" href="{{asset('plugins/Convenient-Pagination-Plugin-With-Bootstrap-And-jQuery-UI-Pagination-js/dist/pagination.css')}}">
  <style>
/*    .th:first-child,th:last-child{
      : 0px;
    }*/
  </style>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Active Analyser Requests
                <a class="btn btn-success btn-sm" href=""><i class="fas fa-arrow-left"></i> Go Back </a>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Payments</li>
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
        <form id="form">
        {{ csrf_field() }}

        <!-- <div class="w-75 card card-primary card-outline m-auto py-4 my-2"> -->
        <div class="row">
            <div class="col-6">
            <div class='row'>
                <div class="col-6">
                    <label for="rundate" class="ml-2 mt-1">Run Dates Between</label>
                    <input type="date" name="rundate" id="rundate" value="" class="ml-1 form-control">
                </div>
                <div class="col-6">
                    <label for="rundate1" class="ml-2 mt-1 invisible">.</label>
                    <input type="date" name="rundate1" id="rundate1"  class="ml-1 form-control">
                </div>

                <div class="col-12">
                    <label for="name" class="ml-2 mt-1">Patient Name</label>
                    <input type="text" name="name" id="name"  class="ml-1 form-control">
                </div>
                <div class="col-6">
                    <label for="totalvolume" class="ml-2 mt-1">Total Urinary Volume</label>
                    <div class="d-flex">
                        <input type="text" name="chart" id="totalvolume"  class="ml-1 mr-2 w-50 form-control">
                        <span>mL</span>
                        <button id="Search" class="btn btn-primary w-50 ml-3 mb-1" type="button">Search</button>
                    </div>
                </div>
                <div class="col-6"></div>
                <div class="col-12 mb-3 mt-5">
 
                <table  class="mb-0 table table-striped " id="table">      
                                
                    <thead>
                    
                    <tr>

                    <th>Patient Name</th>
                    <th>Run Date</th>
                    <th>Serum #</th>
                    <th>Urine #</th>

                    </tr>
                        </thead>
                        
                
                    </table>
                </div>
                <div class="col-12">
                    <div class="w-50 m-auto">
                        <label for="serumcreate" class="ml-2 mt-1">Serum Creatinine</label>
                        <div class="d-flex">
                            <input type="text" name="serumcreate" id="serumcreate" value="" class="ml-1 form-control">
                            <span class="ml-2">umol/L</span>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="w-50 m-auto">
                    <label for="urinecreate" class="ml-2 mt-1">Urine Creatinine</label>
                    <div class="d-flex">
                        <input type="text" name="urinecreate" id="urinecreate" value="" class="ml-1 form-control">
                        <span class="ml-2">umol/L</span>
                    </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="w-50 m-auto">
                    <label for="urinecreate" class="ml-2 mt-1">Urine Protein</label>
                    <div class="d-flex">
                        <input type="text" name="urineprotein" id="urineprotein" value="" class="ml-1 form-control">
                        <span class="ml-2">g/L</span>
                    </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="w-50 m-auto">
                    <label for="urinecreate" class="ml-2 mt-1">Urine Protein</label>
                    <div class="d-flex">
                    <input type="text" name="urineprotein2" id="urineprotein2" value="" class="ml-1 form-control">
                    <span class="ml-2">g/24Hr</span>
                    </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="w-50 m-auto">
                    <label for="creatinineclearance" class="ml-2 mt-1">Creatinine Clearance</label>
                    <div class="d-flex">
                    <input type="text" name="creatinineclearance" id="creatinineclearance" value="" class="ml-1 form-control">
                    <span class="ml-2">mL/min</span>
                    </div>
                    </div>
                </div>
                </div>   
          
               </div>
               <div class="col-6">
                    <h5>Serum Details</h5>
                    <div class='row'>
                        <div class="col-6">
                            <label for="rundate" class="ml-2 mt-1">Run Date</label>
                            <input type="date" name="rundate" id="rundate2" value="" class="ml-1 form-control">
                        </div>
                        <div class="col-6">
                            <label for="sid" class="ml-2 mt-1">SID</label>
                            <input type="text" name="sid" id="sid" value="" class="ml-1 form-control">
                        </div>
                        <div class="col-12">
                            <label for="name" class="ml-2 mt-1">Name</label>
                            <input type="text" name="name" id="name2" value="" class="ml-1 form-control">
                        </div>
                        <div class="col-6">
                            <label for="chart" class="ml-2 mt-1">Chart</label>
                            <input type="text" name="chart" id="chart2" value="" class="ml-1 form-control">
                        </div>
                        <div class="col-6">
                            <label for="dob" class="ml-2 mt-1">DoB</label>
                            <input type="text" name="dob" id="dob2" value="" class="ml-1 form-control">
                        </div>
                        <div class="col-12">
                            <div class="d-flex mt-3">
                            <button class="btn btn-primary w-50 mr-3">Print?</button>
                            <button class="btn btn-danger w-50 ml-3">Print</button>
                            </div>
                        </div>
                    </div>
                    <h5 class="mt-3">Urine Details</h5>
                    <div class="row">
                    <div class="col-6">
                            <label for="rundate1" class="ml-2 mt-1">Run Date</label>
                            <input type="date" name="rundate1" id="rundate1" value="" class="ml-1 form-control">
                        </div>
                        <div class="col-6">
                            <label for="sid1" class="ml-2 mt-1">SID</label>
                            <input type="text" name="sid1" id="sid1" value="" class="ml-1 form-control">
                        </div>
                        <div class="col-12">
                            <label for="name1" class="ml-2 mt-1">Name</label>
                            <input type="text" name="name1" id="name1" value="" class="ml-1 form-control">
                        </div>
                        <div class="col-6">
                            <label for="chart1" class="ml-2 mt-1">Chart</label>
                            <input type="text" name="chart1" id="chart1" value="" class="ml-1 form-control">
                        </div>
                        <div class="col-6">
                            <label for="dob1" class="ml-2 mt-1">DoB</label>
                            <input type="text" name="dob1" id="dob1" value="" class="ml-1 form-control">
                        </div>
                    </div>
                </div>
            </div>      
        <!-- </div> -->
 
        </form>
                                          
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
  var patname;

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '#Search', function (event) { 
      
           from = $('#rundate').val();
           to = $('#rundate1').val();
           patname = $('#name').val();

           $('#table').DataTable().destroy();
          load_data(from , to, patname);
    });

   
    function load_data(from = '', to = '', patname = '')
     {
      var table = $('#table').DataTable({

      "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],

      processing: true,
      serverSide: true,
      ajax: {
            type: 'get',
            url:"{{ route( 'creatinineclearancedata') }}",
            data: {from : from, to : to, patname : patname},  
      },
      columns: [
          {data: 'Patient Name', name: 'Patient Name'},
          {data: 'Run Date', name: 'Run Date'},
          {data: 'Serum #', name: 'Serum #'},
          {data: 'Urine #', name: 'Urine #'},
      ],
      "order":[[0, 'desc']],
              columnDefs: [
              { "visible": false, "targets": [] },
              ], 

     });
    }
    $(document).on('click', '.getsid', function() {
    var id;
    id=$(this).attr('id');
    var SCreaCode;
    SCreaCode=$(this).attr('data');

    // $('#'+id).removeClass('btn-secondary').addClass('btn-primary');

  $.ajax({
          type: 'get',
          url:"{{ route( 'creatinineclearancedatabutton') }}",
          data: {
                 id:id,
                 SCreaCode:SCreaCode
              },
          dataType: 'json',                   
          success: function(data){ 
           let n1 = data.RunDate;
           let date = n1.split(" ");
           let n2 =data.DoB;
           let date1=n2.split(" ");
              $('#rundate2').val(date[0]);
              $('#sid').val(data.SID);
              $('#name2').val(data.Name);
              $('#chart2').val(data.Chart);
              $('#dob2').val(date1[0]);
              $('#serumcreate').val(data.lsc);
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
          type: 'get',
          url:"{{ route( 'creatinineclearancedatabutton2') }}",
          data: {
                 id:id,
                 UCreaCode:UCreaCode,
                 UProCode:UProCode
              },
          dataType: 'json',                   
          success: function(data){ 
            alert(data.Name);
           let n1 = data.RunDate;
           let date = n1.split(" ");
           let n2 =data.DoB;
           let date1=n2.split(" ");
              $('#rundate1').val(date[0]);
              $('#sid1').val(data.SID);
              $('#name1').val(data.Name);
              $('#chart1').val(data.Chart);
              $('#dob1').val(date1[0]);

              $('#urinecreate').val(data.luc);
              $('#urineprotein').val(data.lup);
              $('#totalvolume').val(data.tVolume);
              }
          });
 event.preventDefault();
});

$(document).on('click','.getsid1',function(){
  $('.getsid').removeClass('changebtn');
  $(this).addClass('changebtn');
})


});


</script>

@endpush
