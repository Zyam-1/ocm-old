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
            <h1 class="m-0">Patient Histroy
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
                       
                <div class="row border pt-2">
                  <div class="col-md-6  mx-4">
                    <div class="row">
                      <div class="col-md-6 ">
                          
                     
                   
                      </div>
                      <div class="col-md-2">
                        <input type="radio" name="searchway" class="form-check-input" value="name">
                        <label class="form-check-label">Name</label>

                      <div class="row">
                        <div class="col-md-12">
                                   <input type="radio" name="searchway" class="form-check-input" value="patnum">
                                   <label class="form-check-label">Chart</label>
                      </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                              <input type="radio" name="searchway" class="form-check-input" value="DoB">
                              <label class="form-check-label">D.o.B</label>
                      </div>
                      </div>
                      </div>
                      

                    </div>
                  </div>
                  <div class="col-md-5 mt-3">
                    <div class="input-group">
                      <input type="search" name="search" class="form-control getvalue"><button class="btn btn-primary search2">Search</button>
                    </div>
                    
                  </div>
                </div>


<div class="row mt-4">
    <div class="col-md-12" style="overflow-x: scroll;">
                
                            <table    class="table  table-striped mytable">
                              <thead>
                               <tr>
                                  <th>Lab</th>
                                  <th>Antibodies</th>
                                  <th>Name</th>
                                  <th>Chart</th>
                                  <th>D.O.B</th>
                                  <th>Group</th>
                                  <th>Kell</th>
                                  <th name='address'>Address</th>
                                  <th>Sample Date</th>
                                  <th>Remarks</th>
                            
                                </tr>
                              </thead>
                             </table>
           
    </div>
</div>

<div class="row">
  <div class="col-md-12 text-right">
    <div id="pagination-demo"></div>
  </div>
</div>


            <div class="col-md-12 mt-2">
              <a href="#" class="btn btn-warning">Cancel</a>
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
<script src="{{ asset('plugins/jquery.ui.min.js') }}"></script>


<script src="{{asset('plugins/Convenient-Pagination-Plugin-With-Bootstrap-And-jQuery-UI-Pagination-js/dist/pagination.js')}}"></script>
<script >
$(document).ready(function() {



   
function mytable(pageno,search,radio){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    
var table=$('.mytable').DataTable({
   "bPaginate": false,
    "searching": false,
        ajax: {
            url: "{{ route('PHistory') }}",
            data:{
               search:search,
               radio:radio,
               pageno:pageno,
            },
        },
 columns: [

    {data: 'SampleID', name: 'SampleID'},
    {data: 'AIDR', name: 'AIDR'},
    {data: 'name', name: 'name'},
    {data: 'patnum', name: 'patnum'},
    {data: 'DoB', name: 'DoB'},
    {data: 'fgroup', name: 'fgroup'},
    {data: 'Kell', name: 'Kell'},
    {data: 'address', name: 'address'},
    {data: 'SampleDate', name: 'SampleDate'},
    {data: 'Comment', name: 'Comment'},

],
"order":[[0, 'desc']], 

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
table.on('click', '.delete', function () { 
     


       
    });

$(".search2").click(function(e){

search=$('.getvalue').val();
 // radio=$("input[name='searchway']").val();
 radio = $("input[name='searchway']:checked").val();


if(pageno ==''){
    pageno=1;
}else{
    pageno=$('.pagination-input').find('input[type=text]').val();
}

$.ajax({
  url:'/ocm/PHistory',
  data:{
    pageno:pageno,
  search:search,
  radio:radio
  },
}).done(function(response){
   row7= response.row7.count;
    //row7=response.data.length;
// $('.mytable').dataTable().fnClearTable();
$('.mytable').dataTable().fnDestroy();
  mytable(pageno,search,radio);

  $("#pagination-demo").empty();
  var itemsCount = row7;
var itemsOnPage = 10;



var myPagination = new Pagination({
    container: $("#pagination-demo"),
   showInput:true,
   destroy:true,
  

   // pageClickUrl:'/',
});


 myPagination.make(itemsCount, itemsOnPage);

  $('.pagination-input').find('input[type=text]').addClass('d-none');
 $('.pagination-input').find('.btn-outline-secondary').addClass('d-none'); 

  })
e.preventDefault();

})

$(document).on('click', '.page-link', function() { 

pageno=$('.pagination-input').find('input[type=text]').val();
search=$('.getvalue').val();
radio = $("input[name='searchway']:checked").val();



$.ajax({
    
    url: "{{route('PHistory')}}",
    data:{
      pageno:pageno,
      search:search,
      radio:radio
    },
    
}).done(function(response){


  // $('.mytable').dataTable().fnClearTable();
  $('.mytable').dataTable().fnDestroy();
  mytable(pageno,search,radio);
});

});




}



mytable(page='',search='',radio='');     
    






 

}); 
</script>
@endpush