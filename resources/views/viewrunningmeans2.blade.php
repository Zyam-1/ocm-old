@include('layouts.header')

  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Totals For Haematology </h1>
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
                                              
                                               <div class="col-md-4">
                                                  <p><b>Between Dates</b></p>
                                                  <div class="col-sm-6">
                                                  <input type="date" id="date" name="date" class="form-control"><br><br>
                                                  <input type="date" id="date1" name="date1" class="form-control">  
                                                   <button class="calculate btn btn-primary mt-3" type='button'>Calculate</button>
                                      
                                                  </div>
                                               </div>

                                               <div class="col-md-2">
                                                 <p><b>Parameter</b></p>
                                                 <input type="radio" name="source" id="Mono" value="Mono">
                                                 <label for="Mono">Mono</label><br>
                                                 <input type="radio" name="source" id="Malaria" value="Malaria">
                                                 <label for="Malaria">Malaria</label><br>
                                                 <input type="radio" name="source" id="Sickledex" value="Sickledex">
                                                 <label for="Sickledex">Sickledex</label>

                                               </div>
                                                     <div class="col-md-6">
                                                    <table class="table table-striped" id="table">
                                                      <thead>
                                                          <tr>
                                                            <th>EntryDateTime</th>
                                                            <th>SampleID</th>
                                                            <th>LotNumber</th>
                                                            <th>Expiry</th>
                                                          </tr>
                                                        </thead>  
                                                    </table>
                                                
                                                  </div>   
                                               

                                            </div>
                                            
                                               
                                
                                </div> 
                                       
                                       
                                  </form>
                                            

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
<script src="{{ asset('plugins/dataTables.fixedHeader.min.js') }}" ></script>


<script >
$(document).ready(function() {

  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    var from;
    var to;
    var Source;

    $(document).on('click', '.calculate', function (event) { 
           from = $('#date').val();
           to = $('#date1').val();
           Source =  $("input[name='source']:checked").val()
          //  alert(Source)

           $('#table').DataTable().destroy();
          load_data(from , to , Source );
    });

    function load_data(from = '', to = '', Source = '')
     {

      var table = $('#table').DataTable({

      "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],

      processing: true,
      serverSide: true,

      ajax: {
            type: 'get',
            url:"{{ route( 'viewrunning2data') }}",
            data: {from : from, to : to , Source : Source},  
   
      },
      columns: [
          {data: 'EntryDateTime', name: 'EntryDateTime'},
          {data: 'SampleID', name: 'SampleID'},
          {data: 'LotNumber', name: 'LotNumber'},
          {data: 'Expiry', name: 'Expiry'},
      ]

     });


    // var table = $('#table').DataTable({
    //   "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
    //     processing: true,
    //     serverSide: true,
    //     ajax: {
    //       url:"{{ route('viewrunning2data') }}",
    //       data: {from : from, to : to , Source : Source},  
    //     },
    //     columns: [
    //         {data: 'EntryDateTime', name: 'EntryDateTime'},
    //         {data: 'SampleID', name: 'SampleID'},
    //         {data: 'LotNumber', name: 'LotNumber'},
    //         {data: 'Expiry', name: 'Expiry'},
    //     ]
    // });


    }

  });
</script>
@endpush
