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

       <div class="w-75 card card-primary card-outline m-auto py-4 my-2">
        <div class='row w-75 m-auto'>
            <div class="col-6">
                <label for="sampleid" class="ml-2 mt-1">Sample ID:</label>
                <input type="text" name="sampleid" id="sampleid" value="" class="ml-1 form-control">
            </div>
            <div class="col-6">
                <label for="dob" class="ml-2 mt-1">DoB</label>
                <input type="text" name="dob" id="dob" value="" class="ml-1 form-control">
            </div>

            <div class="col-12">
                <label for="name" class="ml-2 mt-1">Name</label>
                <input type="text" name="name" id="name"  class="ml-1 form-control">
            </div>
            <div class="col-6">
                <label for="chart" class="ml-2 mt-1">Chart</label>
                <input type="text" name="chart" id="chart"  class="ml-1 form-control">
            </div>
            <div class="col-6">
                <label for="date" class="ml-2 mt-1">Run Date/Time</label>
                <input type="text" name="date" id="date"  class="ml-1 mb-3 form-control">
                <input type="text" name="time" id="time"  class="ml-1 form-control">
            </div>
            <div class="col-6">
                <button type="button" id="search1" class="btn btn-primary w-75">Search</button>
            </div>
        </div>         
        </div>

        <div class="w-75 card card-primary card-outline m-auto py-4 my-2">
        <div class='row w-75 m-auto'>
            <div class="col-7">
                <div class="row">
                    <div class="col-6">
                        <label for="creat" class="ml-2 mt-1">Creatinine</label>
                        <input type="text" name="creat" id="creat" value="" class="ml-1 form-control">
                    </div>
                    <div class="col-6">
                        <label for="creat1" class="ml-2 mt-1 invisible">.</label>
                        <input type="text" name="creat1" id="creat1" value="" class="ml-1 form-control">
                    </div>
                    <div class="col-6">
                        <label for="urea" class="ml-2 mt-1">Urea</label>
                        <input type="text" name="urea" id="urea" value="" class="ml-1 form-control">
                    </div>
                    <div class="col-6">
                        <label for="urea1" class="ml-2 mt-1 invisible">.</label>
                        <input type="text" name="urea1" id="urea1" value="" class="ml-1 form-control">
                    </div>
                    <div class="col-6">
                        <label for="sodium" class="ml-2 mt-1">Sodium</label>
                        <input type="text" name="sodium" id="sodium" value="" class="ml-1 form-control">
                    </div>
                    <div class="col-6">
                        <label for="sodium1" class="ml-2 mt-1 invisible">.</label>
                        <input type="text" name="sodium1" id="sodium1" value="" class="ml-1 form-control">
                    </div>
                    <div class="col-6">
                        <label for="potassium" class="ml-2 mt-1">Potassium</label>
                        <input type="text" name="potassium" id="potassium" value="" class="ml-1 form-control">
                    </div>
                    <div class="col-6">
                        <label for="potassium1" class="ml-2 mt-1 invisible">.</label>
                        <input type="text" name="potassium1" id="potassium1" value="" class="ml-1 form-control">
                    </div>
                    <div class="col-6">
                        <label for="chloride" class="ml-2 mt-1">Chloride</label>
                        <input type="text" name="chloride" id="chloride" value="" class="ml-1 form-control">
                    </div>
                    <div class="col-6">
                        <label for="chloride1" class="ml-2 mt-1 invisible">.</label>
                        <input type="text" name="chloride1" id="chloride1" value="" class="ml-1 form-control">
                    </div>
                    <div class="col-6">
                        <label for="calcium" class="ml-2 mt-1">Calcium</label>
                        <input type="text" name="calcium" id="calcium" value="" class="ml-1 form-control">
                    </div>
                    <div class="col-6">
                        <label for="calcium1" class="ml-2 mt-1 invisible">.</label>
                        <input type="text" name="calcium1" id="calcium1" value="" class="ml-1 form-control">
                    </div>
                    <div class="col-6">
                        <label for="phosphorus" class="ml-2 mt-1">Phosphorus</label>
                        <input type="text" name="phosphorus" id="phosphorus" value="" class="ml-1 form-control">
                    </div>
                    <div class="col-6">
                        <label for="phosphorus1" class="ml-2 mt-1 invisible">.</label>
                        <input type="text" name="phosphorus1" id="phosphorus1" value="" class="ml-1 form-control">
                    </div>
                    <div class="col-6">
                        <label for="magnesium" class="ml-2 mt-1">Magnesium</label>
                        <input type="text" name="magnesium" id="magnesium" value="" class="ml-1 form-control">
                    </div>
                    <div class="col-6">
                        <label for="magnesium1" class="ml-2 mt-1 invisible">.</label>
                        <input type="text" name="magnesium1" id="magnesium1" value="" class="ml-1 form-control">
                    </div>
                    <div class="col-6">
                        <label for="tprot" class="ml-2 mt-1">T. Prot</label>
                        <input type="text" name="tprot" id="tprot" value="" class="ml-1 form-control">
                    </div>
                    <div class="col-6">
                        <label for="tprot1" class="ml-2 mt-1 invisible">.</label>
                        <input type="text" name="tprot1" id="tprot1" value="" class="ml-1 form-control">
                    </div>
                    <div class="col-6">
                        <label for="nitrogen" class="ml-2">Nitrogen</label>
                        <input type="text" name="nitrogen" id="nitrogen" value="" class="ml-1 form-control">
                    </div>

                </div>
            </div>
            <div class="col-5">
                <div class="row">
                    <div class="col-12">
                        <label for="volume" class="ml-2">Volume</label>
                        <div class="d-flex justify-content-center align-items-center">
                            <input type="text" name="volume" id="volume" value="" class="ml-1 form-control">
                            <p class="ml-2 my-0">ml</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="volume" class="ml-2">Units</label>
                        <div class="d-flex justify-content-center align-items-center">
                            <p class="ml-2 my-0">mmol/</p>
                            <input type="text" name="volume" id="volume" value="" class="ml-1 form-control">
                            <p class="ml-2 my-0">Hrs</p>
                        </div>
                        <div class="d-flex mt-3">
                            <button class="btn btn-primary w-100">left</button>
                            <button class="btn btn-danger w-100 ml-2">right</button>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center my-3">
                        <button class="btn btn-secondary w-75">Print?</button>
                    </div>
                    <div class="col-12 d-flex justify-content-center my-3">
                        <button class="btn btn-danger w-75">Print</button>
                    </div>
                    <div class="col-12 d-flex justify-content-center my-3">
                        <button class="btn btn-primary w-75">Cancel</button>
                    </div>
                </div>
            </div>
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

<script>
    $(document).ready(function() {
  // alert()
  
  $(document).on('click', '#search1', function (event) { 
      var Sample = $('#sampleid').val();

      $.ajax({
                        type: 'get',
                        url:"{{ route( '24hoururineSearch') }}",
                        data: {Sample : Sample},
                        dataType: 'json',                   
                        success: function(data){ 
                           $("#dob").val(data.Dob);
                           $("#name").val(data.Patname);
                           $("#chart").val(data.Chart);
                           $("#date").val(data.RunDate);
                           $("#creat").val(data.creatinine);
                           $("#urea").val(data.urea);
                           $("#sodium").val(data.sodium);
                           $("#potassium").val(data.potassium);
                           $("#chloride").val(data.Chloride);
                           $("#calcium").val(data.Calcium);
                           $("#phosphorus").val(data.phosphorus);
                           $("#magnesium").val(data.magnesium);
                           $("#tprot").val(data.tprot);
                           $("#nitrogen").val(data.nitrogen);
                            }
                        });
    });

//   $.ajaxSetup({
//           headers: {
//               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//           }
//       });
  
//       $(document).on('click', '.calculate', function (event) { 
//         var from = $('#date2').val();
//         var to = $('#date1').val();
//         var Source = $('#Source').val();
  
//         $.ajax({
//                           type: 'get',
//                           url:"{{ route( '24hoururineSearch') }}",
//                           data: {from : from, to: to, Source : Source},
//                           dataType: 'json',                   
//                           success: function(accounts){ 
                        
//                               }
//                           });
//       }); 
  });
  
</script>
@endpush
