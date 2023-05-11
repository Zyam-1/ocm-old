@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Totals For Depts </h1>
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

                                            <div class=" mx-1">
    <div class="row">
        <div class="col-md-2">
            <div class="parent">
                <h6>Between Dates</h6>       
                <div class="1">
                    <input type="date" class="form-control" id="date1" name="date1">
                </div>
                <div class="2">
                    <input type="date" class="form-control mt-2" id="date2" name="date2">
                </div>             
            </div>
        </div>
        <div class="col-md-2">
            <div class="parent">
                <a class="btn btn-primary mt-4 calculate" style="color: aliceblue;">Calculate</a> 
                <a class="btn btn-secondary mt-4" style="color: aliceblue;">Graph</a>             
            </div>
        </div>
        <div class="col-md-2">
            <div class="parent">
            </div>
        </div>
        <div class="col-md-2">
           
        </div>
        <div class="col-md-2">
            
        </div>
        <div class="col-md-2">
            <div class="parent">
            <p><b>Criteria</b></p>
            <div class="form-check form-check-inline mt-1">
                                                      <input class="form-check-input" type="radio" name="Source" id="Source1" value="Clinician">
                                                    <label class="form-check-label" for="Source1">Clinician</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mt-1">
                                                    <input class="form-check-input" type="radio" name="Source" id="Source2" value="Ward">
                                                    <label class="form-check-label" for="Source2">Ward</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mt-1">
                                                    <input class="form-check-input" type="radio" name="Source" id="Source3" value="GP" >
                                                    <label class="form-check-label" for="Source3">GP</label>
                                                    </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <table class="table mt-3" id="table2">
                                              <thead>
                                                <tr>
                                                  <th scope="col">Source</th>
                                                  <th scope="col">Total Samples</th>
                                                  <th scope="col">Coag Samples</th>
                                                  <th scope="col">Bio Samples</th>
                                                  <th scope="col">Haem Samples</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              </tbody>
                                            </table>
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
<script src="{{ asset('plugins/dataTables.fixedHeader.min.js') }}" type="text/javascript"></script>


<script type="text/javascript">

$(document).ready(function() {
// alert()


$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

 
    var from;
    var to;
    var Source;

    $(document).on('click', '.calculate', function (event) { 
           from = $('#date1').val();
           to = $('#date2').val();
           Source =  $("input[name='Source']:checked").val()
         
          //  alert(Source)

           $('#table2').DataTable().destroy();
          load_data(from , to , Source );
    });

   
    function load_data(from = '', to = '', Source = '')
     {
  
      var table = $('#table2').DataTable({

      "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],

      processing: true,
      serverSide: true,
  
      ajax: {
            type: 'get',
            url:"{{ route( 'index7data') }}",
            data: {from : from, to : to , Source : Source},  
      },
      columns: [
          {data: 'Source', name: 'Source'},
          {data: 'TotalSamples', name: 'Total Samples'},
          {data: 'CoagSamples', name: 'Coag Samples'},
          {data: 'BioSamples', name: 'Bio Samples'},
          {data: 'HaemSamples', name: 'Haem Samples'}
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

