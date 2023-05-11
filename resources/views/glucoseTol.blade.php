@include('layouts.header')
<link rel="stylesheet" href="{{ asset('plugins/jquery.ui.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
            <h1 class="m-0">Ward List
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
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                
                <label for="">Between Dates</label>
                <input type="date" class = "form-control " name="startDate" id="startDate">
                <input type="date" class = "form-control mt-2" name="endDate" id="endDate">
            </div>
            <div class="col-md-4">
                <label for="name">Name</label>
                <input type="text" name="name" class = "form-control" id="name"> <span><button class = "btn btn-info mt-2">Save</button>

                  <button class = "btn btn-danger mt-2">Cancel</button> 
                  <button id="Search" class="btn btn-primary w-50 ml-3 mb-1" type="button">Search</button>
            </div>
            
            <div class="col-md-4 card">
                <table class="table" id="table1">
                    <thead>
                      <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Name</th>
                        
                      </tr>
                    </thead>
                    
                  </table>
            </div>
        </div>
        <hr>
        <div class="col-md-12">
            <div class="row">
                <div class="first-cont col-md-6">
                    <div class="row">
                        <div class="col-md-3">
                        <label for="cNum">Chart Number</label>
                        <input type="text" id = "cNum" name = "cNum" class = "form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="dob">D.O.B</label>
                            <input id = "dob" name = "dob" type="date" class = "form-control">
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                        <label for="age">Age</label>
                        <input type="text" id = "age" name = "age" class = "form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="sex">Sex</label>
                            <input type="text" id = "sex" name = "sex" class = "form-control">
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                        <label for="addr1">Addr1</label>
                        <input type="text" id = "addr1" name = "addr1" class = "form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="addr2">Addr2</label>
                            <input type="text" id = "addr2" name = "addr2" class = "form-control">
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                        <label for="">Consultant</label>
                        <input type="text" class = "form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">Ward</label>
                            <input type="text" class = "form-control" id="ward">
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                        <label for="">G.P</label>
                        <input type="text" class = "form-control" id="gp">
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6 card" style = "margin-left: -200px"  >
                    <table class="table w-100" id="table2">
                        <thead>
                          <tr>
                            <th scope="col">Run#</th>
                            <th scope="col">Time</th>
                            <th scope="col">Serum mmol/L</th>
                            
                          </tr>
                        </thead>
                       
                      </table>
                </div>
        </div>

            
                </div>
                
            </div>
    </div>




<div class="col-md-4">
    
</div>
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



  $(document).on('click', '.getsid', function() {
    var id;
    id=$(this).attr('id');
    var data;
    data=$(this).attr('data');

   

  $.ajax({
          type: 'post',
          url:"{{ route( 'GlucoseTolDataButton2') }}",
          data: {
                 id:id,
                 data:data
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
$(document).on('click','.getsid',function(){
  $('.getsid').removeClass('changebtn');
  $(this).addClass('changebtn');
})


$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '#Search', function (event) { 
      
           from = $('#startDate').val();
           to = $('#endDate').val();
           patname = $('#name').val();

           $('#table1').DataTable().destroy();
          load_data(from , to, patname);
    });

   
    function load_data(from = '', to = '', patname = '')
     {
      var table = $('#table1').DataTable({

      "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],

      processing: true,
      serverSide: true,
      ajax: {
            type: 'post',
            url:"{{ route( 'GlucoseTolData') }}",
            data: {from : from, to : to, patname : patname},  
      },
      columns: [
          {data: 'Date', name: 'Date'},
          {data: 'PatName', name: 'Name'},
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
    from = $('#startDate').val();
           to = $('#endDate').val();
           patname = $('#name').val();
           $('#table2').DataTable().destroy();
          load_data2(from , to, patname,data,id);
          });

      function load_data2(from = '', to = '', patname = '',data='' , id='')
     {
      var table = $('#table2').DataTable({

      "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],

      processing: true,
      serverSide: true,
      ajax: {
            type: 'post',
            url:"{{ route( 'GlucoseTolDataButton') }}",
            data: {from : from, to : to, patname : patname,id:id,data:data},  
      },
      columns: [
          {data: 'Run#', name: 'Run#'},
          {data: 'Time', name: 'Time'},
          {data: 'Serum mmol/L', name: 'Serum mmol/L'},
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





 });


</script>

@endpush
