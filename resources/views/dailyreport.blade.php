@include('layouts.header')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Daily Report
               <a class="btn btn-info btn-sm" href="{{route('home')}}"><i class="fas fa-arrow-left"></i> Go Back </a>
             </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Clients</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


     <!-- Main content -->
    <div class="content">
      <div class="container-fluid">


  

                  <form id="form" >
                                       {{ csrf_field() }}


                                       
                                                 
                         <div class="card card-primary card-outline">
                            <div class="card-body "> 
                                
                            <div style="display:flex; flex-direction:column;">


 <div class="mb-3">
 <input id="date" class="ml-2 date" type="date" name="dailyreports">
 <button type="button" class="btn btn-primary my-2 mx-2 calculate">Calculate</button>
 </div>

 

 </div>


                 <div class="col-md-12">
                   
                 </div>          
         
             

             
                 <table  class="mb-0 table table-striped " id="table">      
                           
             <thead>
             
             <tr>

              <th>Sample ID</th>
              <th>Name</th>
              <th>Chart</th>
              <th>GP</th>
              <th>Ward</th>

              </tr>
                 </thead>
                 
          
               </table>
               
  
 

                   
           
                            </div>
                           </div>
                            <div id="result" class="text-danger"></div>

                  </form>        

        <!-- /.row -->
      </div>







      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>



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
   <script>
   
$(document).ready(function() {


   
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var date;
    $(document).on('click', '.calculate', function (event) { 

           date = $('#date').val();

           $('#table').DataTable().destroy();
          load_data(date);
    });

    function load_data(date = '')
     {
  
      var table = $('#table').DataTable({

      "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],

      processing: true,
      serverSide: true,
      stateSave: true,
      ajax: {
            type: 'get',
            url:"{{ route( 'dailyreportdata') }}",
            data: {date : date},  
      },
      columns: [

       {data: 'sampleid', name: 'sampleid'},
       {data: 'name', name: 'name'},
       {data: 'chart', name: 'chart'},
       {data: 'gp', name: 'gp'},
       {data: 'ward', name: 'ward'},
       ],
        "order":[[1, 'desc']], 

      });
    }
    




});  





    </script>





@endpush