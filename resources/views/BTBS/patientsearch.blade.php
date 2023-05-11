@include('layouts.header')



<link rel="stylesheet" href="{{asset('plugins/jquery.ui.min.css')}}">


<link rel="stylesheet" href="{{asset('plugins/Convenient-Pagination-Plugin-With-Bootstrap-And-jQuery-UI-Pagination-js/dist/pagination.css')}}">

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Patient Search
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




<div class="row">

<div class="col-md-6">
<label class="form-label " for="">Search</label>

<div>
    
    <input class="ml-2" type="radio" id="download" name="table" value="PatientIFs">
    <label class=" radio-inline " for="download">Download</label>

    <input class="ml-2" id="historic" type="radio" name="table" value="demographics" >
    <label class="radio-inline " for="historic">Historic</label>
    
    <input class="ml-2"  id="both" type="radio" name="table">
    <label class="radio-inline" for="both">Both</label>
    

</div>


<div class="input-group mb-3">
<input class="form-control getsearch" type="search" > <button type="button" class="btn btn-primary mysearch">Search</button>
</div>



</div>


<div class="col-md-3">
<label class="form-label " for="">Search For</label>

<div >
    <input type="radio" name="searchby" id="name" value="PatName">
    <label class=" radio-inline " for="name">Name</label>
</div>

<div >
    <input type="radio" name="searchby" id="chart" value="Chart">
    <label class=" radio-inline " for="chart">Chart</label>
</div>

<div >
    <input type="radio" name="searchby" id="dob" value="DoB">
    <label class=" radio-inline " for="dob">D.O.B</label>
</div>

<div >
    <input type="radio" name="searchby" id="namedob" value="namedob">
    <label class=" radio-inline" for="name_dob">Name+D.O.B</label>
</div>

<div>

</div>


</div>



<div class="col-md-3 mb-3">
<label class="form-label " for="">How To Search</label>

<div >
    <input type="radio" name="howsearch" id="exact" value="Exact Match">
    <label class=" radio-inline ml-1" for="exact">Exact Match</label>
</div>

<div >
    <input type="radio" name="howsearch" id="lead" value="Leading Characters">
    <label class=" radio-inline ml-1" for="lead">Leading Characters</label>
</div>

<div >
    <input type="radio" name="howsearch" id="trail" value="Trailing Characters">
    <label class=" radio-inline ml-1" for="trail">Trailing Characters</label>
</div>

<div >
    <input type="radio" name="howsearch" id="all" value="All Characters">
    <label class=" radio-inline ml-1" for="all">All Characters</label>
</div>



</div>




</div>


















                 <div class="col-md-12">
                   
                 </div>          
         
             

             
<div class="row mt-4">
    <div class="col-md-12" style="overflow-x:scroll;">
                         <table  class="mb-0 table table-striped mytable" >      
                           
                           <thead>
                           
                           <tr>


                           <th>E</th>
                          <th>M</th>
                          <th>C</th>
                          <th>H</th>
                          <th>B</th>
                          <th>S</th>
                          <th>Run Date</th>
                          <th>Run#</th>
                          <th>Chart</th>
                          <th>Name</th>
                          <th>Date of Birth</th>
                          <th>Age</th>
                          <th>Sex</th>
                          <th>Address</th>
                          <th>Ward</th>
                          <th>Clinician</th>
                          <th>GP</th>
                          <th>Hospital</th>
                          <th>Lab No</th>
                      
              
                            </tr>
                               </thead>
                               
                        
                             </table> 

                             <div class="row">
  <div class="col-md-12 text-right">
    <div id="pagination-demo"></div>
  </div>
</div>
    </div>
</div>

               
             

   
   


                   
           
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

<script src="{{asset('plugins/jquery.ui.min.js')}}"></script>


<script src="{{asset('plugins/Convenient-Pagination-Plugin-With-Bootstrap-And-jQuery-UI-Pagination-js/dist/pagination.js')}}"></script>
   <script>
   
$(document).ready(function() {


   
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

function mytable(pageno,search,radio,howsearch,table){

var table=$('.mytable').DataTable({
 "bPaginate": false,
     "searching": false,
 ajax: {
    
    url: "{{ route('Patientsearch') }}",
    data:{
        pageno:pageno,
        search:search,
        radio:radio,
        howsearch:howsearch,
        table:table,
    },
    
},

 columns: [

  {data: 'forext', name: 'forext'},
    {data: 'formicro', name: 'formicro'},
   {data: 'forcoag', name: 'forcoag'},
   {data: 'forhaem', name: 'forhaem'},
   {data: 'forbio', name: 'forbio'},
    {data: 'forsemen', name: 'forsemen'},
   {data: 'RunDate', name: 'RunDate'},
   {data: 'SampleID', name: 'SampleID'},
   {data: 'Chart', name: 'Chart'},
    {data: 'PatName', name: 'PatName'},
   {data: 'DoB', name: 'DoB'},
   {data: 'Age', name: 'Age'},
   {data: 'Sex', name: 'Sex'},
    {data: 'address', name: 'address'},
   {data: 'Ward', name: 'Ward'},
   {data: 'Clinician', name: 'Clinician'},
   {data: 'GP', name: 'GP'},
   {data: 'Hospital', name: 'Hospital'},
   {data: 'LabNo', name: 'LabNo'}
     
],
"order":[[1, 'desc']], 

  dom: "Blfrtip",
                buttons: [
                
                    {
                        title:'Users',
                        text: 'Excel',
                        footer: true,
                        extend: 'excelHtml5',
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    },
                    {
                    title:'Users', 
                    text: 'PDF', 
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    footer: true,
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    customize: function (doc) {
                    doc.content[1].table.widths = 
                              Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                          doc.styles.tableBodyEven.alignment = 'center';
                          doc.styles.tableBodyOdd.alignment = 'center'; 
                                
                        }
                    },
                    {
                        text: 'Print',
                        title:'Users',
                        extend: 'print',
                        footer: true,
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    }, 
                    'colvis'   
                ],

                columnDefs: [{
                    orderable: false,
                    targets: -1,
                },
                { "visible": false, "targets": [] }
                ], 

});

}





 $('.mysearch').click(function(){

   $('.mytable').dataTable().fnDestroy();

           search = $('.getsearch').val();
           radio = $("input[name='searchby']:checked").val();
           table = $("input[name='table']:checked").val();
          howsearch = $("input[name='howsearch']:checked").val();
        var pageno='';
        if(pageno ==''){
            pageno=1;
           
        }else{
            pageno=$('.pagination-input').find('input[type=text]').val();
        }


    mytable(1,search,radio,howsearch,table);

 }) 








     
  




   

});  
    </script>





@endpush