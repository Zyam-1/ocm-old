@include('layouts.header')
  <link rel="stylesheet" href="{{ asset('plugins/jquery.ui.min.css') }}">
<link rel="stylesheet" href="{{asset('plugins/Convenient-Pagination-Plugin-With-Bootstrap-And-jQuery-UI-Pagination-js/dist/pagination.css')}}">
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Hospital
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
    <h6>Add New Hospital</h6>
    <div class="row">    
    <div class="col-md-6">
<label class="form-label mb-0" for="code">Code</label>

<input type="text" id="code" name="code"  class="form-control form-control" placeholder="" value = "<?php if(count($rowssend) >0) { echo $rowssend['Code']; } ?>">

<input type="hidden" id="code" name="originalcode"  class="form-control form-control" placeholder="" value = "<?php if(count($rowssend) >0) { echo $rowssend['Code']; } ?>">


</div>
<div class="col-md-6">
<label class="form-label mb-0">Name</label> 
<input type="text" id="name" value = "<?php if(count($rowssend) >0) { echo $rowssend['Text']; } ?>" name="hospitalname" class="form-control form-control" placeholder=""> 
</div>



</div>

<div class="row">
 <div class="col-md-12">
  @if(count($rowssend) > 0)
 <button type="button" class="btn btn-primary updbtn mt-2">Update </button>
@else 
<button type="button" class="btn btn-primary savebtn mt-2">Save </button>
@endif
</div>

</div>

   <div class="row mt-3 ">
    <div class="col-md-3 ">
      <label class="form-label">Search :  <input type="search"  class="form-control"></label>
        
    </div>
     
   </div>

    <div class="row pt-3">
<div class="col-md-12">
    <table class="table table-striped mytable">
  <thead>
    <tr>
      <th >Code</th>
      <th >Test</th>
      <th name="action">Action</th>
    </tr>
  </thead>

</table>    
</div>    
    
</div>

<div class="row">
  <div class="col-md-12 text-right">
    <div id="pagination-demo">
     

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


   <script>
   
$(document).ready(function() {

 

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

 function savedata(page,search){
var table=$('.mytable').DataTable({
  "bPaginate": false,
  "searching": false,
 
ajax: {
    
    url: "/ocm/LocHostpital",
    data:{
      page:page,
      search:search,
    },
    
},
 columns: [

    {data: 'Code', name: 'Code'},
    {data: 'Text', name: 'Text'},
   {data: 'action', name: 'action', orderable: false, searchable: false},
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
 table.on('click','.delete',function(){
  var id =$(this).attr('id');
 swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
$.ajax({
  url:'/ocm/LocHostpitaldel/'+id,
  method:'get',
}).done(function(){
  table.ajax.reload()
})
  } 
});

}); 

$("input[type=search]").keypress(function(e){

 // var keycode = (event.keyCode ? event.keyCode : event.which);
 //  if(keycode == '13'){
 //    alert('You pressed a "enter" key in textbox');  
 //  }
  if (e.keyCode == 13) {

 // alert();

search=$(this).val();

if(search !=''){

$.ajax({
  url:'/ocm/LocHostpital',
  data:{
  search:search
  },
}).done(function(response){
    $('.mytable').dataTable().fnClearTable();
  $('.mytable').dataTable().fnDestroy();
  savedata(1,search);
  })
e.preventDefault();

}else{

$('.mytable').dataTable().fnClearTable();
$('.mytable').dataTable().fnDestroy();
savedata(1,search='');
e.preventDefault();
}

}


})


 }   

savedata(1,search='');

  

$(document).on('click', '.page-link', function() { 

pageno=$('.pagination-input').find('input[type=text]').val()



$.ajax({
    
    url: "{{route('MIdentifyStains')}}/",
    data:{
      page:pageno
    }
    
}).done(function(response){

  $('.mytable').dataTable().fnClearTable();
  $('.mytable').dataTable().fnDestroy();
  savedata(pageno);






});

});




   

});  
    </script>

<script type="text/javascript">
$(document).ready(function(){

 rows7 = @json($rows7);
  

$('.savebtn').click(function(){
let  myform=document.getElementById('form');
let data=new FormData(myform);
$.ajax({
  url:'/ocm/LocHostpital',
  data:data,
  cache:false,
  processData:false,
  contentType:false,
  type:'Post'
}).done(function(data){

 if ($.isEmptyObject(data.error)){

                                      Lobibox.notify('success', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: data.success,
                                            icon: 'bx bx-check-circle'
                                        });
                                     window.location='';
                                 

                                } else {
                                     Lobibox.notify('warning', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: data.error,
                                            icon: 'bx bx-info-circle'
                                        });
                                }

})
event.preventDefault();
})


$('.updbtn').click(function(){

let  myform=document.getElementById('form');
let data=new FormData(myform);
$.ajax({
  url:'/ocm/LocHostpitalupd',
  data:data,
  cache:false,
  processData:false,
  contentType:false,
  type:'Post'
}).done(function(data){


 if ($.isEmptyObject(data.error)){

                                      Lobibox.notify('success', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: data.success,
                                            icon: 'bx bx-check-circle'
                                        });
                                     window.location='';
                                 

                                } else {
                                     Lobibox.notify('warning', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: data.error,
                                            icon: 'bx bx-info-circle'
                                        });
                                }

})
event.preventDefault();
})

var itemsCount = rows7;
var itemsOnPage = 10;

var myPagination = new Pagination({
    container: $("#pagination-demo"),
   showInput:true,
  

   // pageClickUrl:'/',





});


 myPagination.make(itemsCount, itemsOnPage);


$('.pagination-input').find('input[type=text]').addClass('d-none')
$('.pagination-input').find('.btn-outline-secondary').addClass('d-none')


  


})


</script>
@endpush
