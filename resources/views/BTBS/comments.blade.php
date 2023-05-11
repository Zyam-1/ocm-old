@include('layouts.header')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Comments
               <a class="btn btn-info btn-sm" href=""><i class="fas fa-arrow-left"></i> Go Back </a>
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

<div class="col-md-7">
<label class="form-label " for="">Add New Comment</label>

<!-- <div>
    
    <input class="ml-2" type="radio" id="download" name="search">
    <label class=" radio-inline " for="download">Download</label>

    <input class="ml-2" id="historic" type="radio" name="search">
    <label class="radio-inline " for="historic">Historic</label>
    
    <input class="ml-2"  id="both" type="radio" name="search">
    <label class="radio-inline" for="both">Both</label>
    

</div> -->


<!-- <div class="input-group mb-3">
<input class="form-control " type="search"> <a href="#" class="btn btn-primary">Code</a>
</div> -->

<div>
<label class="form-label" for="soundex">Code</label>
</div>

<div class="container row">

<input class="form-control" style="width:50%;" type="text" name="code" id="code">

</div>

<div>
<label class="form-label" for="soundex">Text</label>
<textarea class="form-control mb-2" name="text" id="text" style="width: 50%;
  height: 10%;" cols="30" rows="5"></textarea>
 
</div>

<input class="btn btn-primary mb-4" type="submit" value="Add">
</div>


<div class="col-md-3">
<label class="form-label " for="">List Type</label>

<div >
    <input type="radio" name="name" id="name">
    <label class=" radio-inline " for="name">Biochemistry Comments</label>
</div>

<div >
    <input type="radio" name="name" id="chart">
    <label class=" radio-inline " for="chart">Haematology Comments</label>
</div>

<div >
    <input type="radio" name="name" id="dob">
    <label class=" radio-inline " for="dob">Coagulation Comments</label>
</div>

<div >
    <input type="radio" name="name" id="name_dob">
    <label class=" radio-inline" for="name_dob">Demographic Comments</label>
</div>

<div class="mt-4">
<label class="form-label" for="soundex">Items to be displayed in List</label>
<!-- <input type="text" class="form-control" > -->
<select class="form-control" name="items" id="items">
  <option value="16" >16</option>
  <option value="16">32</option>
  <option value="16">48</option>
  <option value="16">64</option>
</select>

</div>


</div>



<div class="col-md-2 mb-3">
<label class="form-label mb-4" for=""></label>

<div >
    <input type="radio" name="name1" id="exact">
    <label class=" radio-inline ml-1" for="exact">Semen Comments</label>
</div>

<div >
    <input type="radio" name="name1" id="lead">
    <label class=" radio-inline ml-1" for="lead">Clinical Details</label>
</div>

<div >
    <input type="radio" name="name1" id="trail">
    <label class=" radio-inline ml-1" for="trail">Micro Comments</label>
</div>

<div >
    <input type="radio" name="name1" id="all">
    <label class=" radio-inline ml-1" for="all">Film Comments</label>
</div>



</div>




</div>


















                 <div class="col-md-12">
                   
                 </div>          
         
             

             
                 <table  class="mb-0 table table-striped" id="table">      
                           
                           <thead>
                           
                           <tr>


                           <th>Code</th>
                          <th>Text</th>
                          <th>Inuse</th>
                          <!-- <th>H</th>
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
                          <th>Lab No</th> -->
                      
              
                            </tr>
                               </thead>
                               
                        
                             </table> 
               
             

   
<button class="btn btn-success ml-5"> Submit </button>
<button class="btn btn-danger ml-1"> Cancel </button> 
<button class="btn btn-warning ml-1"> Delete </button>  


                   
           
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

    
var table=$('#table').DataTable({
 // ajax: {
    
//     url: "{{ route('Tickets') }}",
    
// },

 columns: [

  {data: 'Code', name: 'Code'},
    {data: 'Text', name: 'Text'},
   {data: 'Inuse', name: 'Inuse'},

     
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



     
    




   

});  
    </script>





@endpush