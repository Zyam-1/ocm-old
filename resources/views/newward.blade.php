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
    <h6>New Ward</h6>
    <div class="row">    
    <div class="col-md-6">
    <label class="form-label mb-0">Code</label> 
    <input type="text" name="code" value="<?php if($rowsedit != NULL){echo $rowsedit['Code'];} ?>" id="code" class="form-control"> 
    </div>  
        <div class="col-md-6">
<label class="form-label mb-0" for="fax">Fax</label>
<div class="input-group">
<input type="text" id="fax" name="fax" value="<?php if($rowsedit != NULL){echo $rowsedit['FAX'];} ?>" class="form-control form-control" placeholder="">
<button type="button" class="btn btn-primary" id="addWard">Add</button>
</div>
</div>                          
    </div>
    <div class="row pt-2">
    <div class="col-md-6">
    <label class="form-label mb-0">Ward</label> 
    <input type="text" name="ward" id="ward" value="<?php if($rowsedit != NULL){echo $rowsedit['Text'];} ?>" class="form-control">   
    </div>  
        <div class="col-md-6">
    <label class="form-label mb-0">Printer</label> 
    <input type="text" name="printer" id="printer" value="<?php if($rowsedit != NULL){echo $rowsedit['PrinterAddress'];} ?>" class="form-control">   
    </div>
    </div>


    <div class="row pt-2">
    <div class="col-md-6">
    <label class="form-label mb-0">Ward</label> 
    <input type="hidden" name="ward1" id="ward1" value="<?php if($rowsedit != NULL){echo $rowsedit['Text'];} ?>" class="form-control">   
    </div>  
    </div>

    <div class="row pt-2">
    <div class="col-md-12">
    <textarea name="textWard" id="textWard" class="form-control" rows="3"></textarea>  
    </div>  
    </div>

       <div class="row mt-3 ">
    <div class="col-md-3 ">
      <label class="form-label">Search :  <input type="search"  class="form-control"></label>
        
    </div>
     
   </div>

        <div class="row pt-2">
<div class="col-md-12">
    <table id = "table" class="table table-striped mytable">
  <thead>
    <tr>
     
      <th scope="col">Code</th>
      <th scope="col">Text</th>
       <th scope="col">In Use</th>
      <th scope="col">Fax</th>
      <th scope="col">Printer Address</th>
      <th scope="col">Location</th>

      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>


  </tbody>
</table>    
</div>    
    
</div>

<div class="row">
    <div class="col-md-12 text-right">
        <div id="pagination-demo"></div>
    </div>
</div>
<div class="buttons">
<button class="btn btn-primary">Emport To Excel</button>  
<button class="btn btn-success">Print</button> 
<button class="btn btn-primary">Exit</button>
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
<script src="cdn.datatables.net/plug-ins/1.12.1/sorting/date-dd-MMM-yyyy.js"> </script>
<script src="{{ asset('plugins/jquery.ui.min.js') }}"></script>


<script src="{{asset('plugins/Convenient-Pagination-Plugin-With-Bootstrap-And-jQuery-UI-Pagination-js/dist/pagination.js')}}"></script>
<script>
$(document).ready(function() {

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    var ward1=$("#ward1").val();

    
    
$('#addWard').click(function (){
      
console.log(ward1);
    var code=$("#code").val();
    var fax=$("#fax").val();
    var ward=$("#ward").val();
    var printer=$("#printer").val();

   
//     let myform=document.getElementById('')


    let myform = document.getElementById('form');
    var formData = new FormData(myform);

        // console.log(formData);
    $.ajax({
    type: "POST",
    enctype: 'multipart/form-data',
    url: "{{ route('LocWardList')}}/"+ward,
    data:  formData,
    processData: false,
    contentType: false,
    cache: false,
    timeout: 600000,
    success: function(data) {
      
        
    
 if ($.isEmptyObject(data.error)){

                                      Lobibox.notify('success', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: data.success,
                                            icon: 'bx bx-check-circle'
                                        });
                                     window.location='/ocm/LocWardList';
                                 

                                } else {
                                     Lobibox.notify('warning', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: data.error,
                                            icon: 'bx bx-info-circle'
                                        });
                                }
        
   
    }
    });  
    
  
        event.preventDefault();
    });











function mysave(page,search){
    var table = $('.mytable').DataTable({
  "bPaginate": false,
     "searching": false,
"lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
dom: 'lBfrtip', //"Bfrtip",


processing: true,
serverSide: true,
// stateSave: true,
ajax: {
   url: "{{ route('LocWardList') }}",
   method: 'GET',
   data:{
    page:page,
    search:search,
   },
},
columns: [
   {data: 'Code', name: 'Code'},
   {data: 'Text', name: 'Text'},
   {data: 'InUse', name: 'InUse'},
   {data: 'FAX', name: 'FAX'},
   {data: 'PrinterAddress', name: 'PrinterAddress'},
   {data: 'Location', name: 'Location'},

   {data: 'action', name: 'action', orderable: false, searchable: false}

],
"order":[[0, 'desc']],

dom: "Blfrtip",
       buttons: [
       
           {
               title:'Clinician',
               text: 'Excel',
               footer: true,
               extend: 'excelHtml5',
               exportOptions: {
               columns: [':visible :not(:last-child)']
               },
           },
           {
           title:'Clinician', 
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
               title:'Clinician',
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
           targets: -1
     
       }], 

});
    table.on('click','.delete',function(){
  var wardtext = $(this).attr('id');

  swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {

    $.ajax({


url: "{{route('LocWardListdel')}}",
         method: 'GET',
         data: {
          wardtext:wardtext
         },

}).done(function (response) {    

  // window.location = "/ocm/LocWardList";
  table.ajax.reload();

});


event.preventDefault();




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
  url:'/ocm/LocWardList',
  data:{
  search:search
  },
}).done(function(response){
    $('.mytable').dataTable().fnClearTable();
  $('.mytable').dataTable().fnDestroy();
  mysave(1,search);
  })
e.preventDefault();  
}else{
$('.mytable').dataTable().fnClearTable();
$('.mytable').dataTable().fnDestroy();
mysave(1,search='');
e.preventDefault();  
}

}


})


}

mysave(1,search='');


  var rows7=@json($rows7);


$(document).on('click', '.page-link', function() { 

pageno=$('.pagination-input').find('input[type=text]').val()



$.ajax({
    
    url: "{{route('LocWardList')}}/",
    data:{
      page:pageno

    }
    
}).done(function(response){

  $('.mytable').dataTable().fnClearTable();
  $('.mytable').dataTable().fnDestroy();
  mysave(pageno,search='');






});

});



var itemsCount = rows7;
var itemsOnPage = 10;

var myPagination = new Pagination({
    container: $("#pagination-demo"),
   showInput:true,
  

   // pageClickUrl:'/',



});


 myPagination.make(itemsCount, itemsOnPage);


$('.pagination-input').find('input[type=text]').addClass('d-none');
$('.pagination-input').find('.btn-outline-secondary').addClass('d-none');






});
</script>

@endpush
