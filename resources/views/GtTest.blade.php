@include('layouts.header')
<link rel="stylesheet" href="{{ asset('plugins/jquery.ui.min.css') }}">


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
    <div class = "row">

        <div class = "col-md-6">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Date Of Birth</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>sd</td>
                    
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>df</td>
                   
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>sad</td>
                    
                  </tr>
                </tbody>
              </table>
        </div>
   


    <div class="col-md-6">
        <div class="row">
    <div class="col-md-6">
    <label class="form-label mb-0">Chart Number</label> 
    <input type="text" name="chartNo" value="" id="code" class="form-control"> 
    </div>  
        <div class="col-md-6">
<label class="form-label mb-0" for="dob">D.o.B</label>
<div class="input-group">
<input type="date" id="dob" name="dob" value="" class="form-control form-control" placeholder="">
</div>
</div>                          
    </div>
    <div class="row pt-2">
    <div class="col-md-6">
    <label class="form-label mb-0">Age</label> 
    <input type="number" name="age" id="age" value="" class="form-control">   
    </div>  
        <div class="col-md-6">
    <label class="form-label mb-0">Sex</label> 
    <input type="text" name="sex" id="sex" value="" class="form-control">   
    </div>
    </div>


    <div class="row pt-2">
        <div class="col-md-6">
        <label class="form-label mb-0">Addr1</label> 
        <input type="text" name="addr1" id="addr1" value="" class="form-control">   
        </div> 
   

    
        <div class="col-md-6">
            <label class="form-label mb-0">Addr2</label> 
            <input type="text" name="addr2" id="addr2" value="" class="form-control">   
            </div>
    </div>

    <div class="row pt-2">
        <div class="col-md-6">
        <label class="form-label mb-0">Consultant</label> 
        <input type="text" name="cons" id="cons" value="" class="form-control">   
        </div> 
   

    
        <div class="col-md-6">
            <label class="form-label mb-0">Ward</label> 
            <input type="text" name="ward" id="ward" value="" class="form-control">   
            </div>
    </div>


    <div class="row pt-2">
        <div class="col-md-6">
        <label class="form-label mb-0">GP</label> 
        <input type="text" name="gp" id="gp" value="" class="form-control">   
        </div> 
    
    </div>
</div>
</div>
</div>
    

<div>


</div>

<hr>
<div class = "row" style = "margin-left: 13px">
    <div class = "col-md-6">
        <table class="table" >
            <thead>
              <tr>
                <th scope="col">Rune#</th>
                <th scope="col">Date/Time</th>
                <th scope="col">Serum</th>
                <th scope="col">Urine</th>

                
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>sd</td>
                <td>sd</td>
                <td>sd</td>

                
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>df</td>
                <td>sd</td>
                <td>sd</td>
               
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>sd</td>
                <td>sd</td>
                <td>sad</td>
                
              </tr>
            </tbody>
          </table>
    </div>

    <div class = "col-md-6">
        <button class = "btn btn-primary"><b>Print Glucose Tes Report</b> </button>
    
        <button class = "btn btn-info"><b>Cancel</b> </button>
    </div>
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
