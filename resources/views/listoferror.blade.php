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
            <h1 class="m-0">List of Error 
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
    <h6>Add New Error</h6> 
    <div class="row">     
    <div class="col-md-6">
    <label class="form-label">Code</label>
    <input type="Text" name="code" class="form-control" value="<?php if(count($rowssend) > 0){ echo $rowssend['Code'];} ?>">  
     <input type="hidden" name="orignalcode" class="form-control" value="<?php if(count($rowssend) > 0){ echo $rowssend['Code'];} ?>">  
    </div>  
    <div class="col-md-6">
    <label class="form-label">Text</label>
    <input type="text" name="text" class="form-control" value="<?php if(count($rowssend) > 0){ echo $rowssend['Text'];} ?>">  
    </div>                          
    </div>
    <?php
    if(count($rowssend) > 0){
        ?>
        <button class="btn btn-primary mt-2 updbtn" type="button">Update</button>
        <?php
    }else{
        ?>
          <button class="btn btn-primary mt-2 save" type="button">Save</button>
        <?php
    }
    ?>
 
    <div class="row pt-2">
<div class="col-md-12">
    <table class="table table-striped mytable">
  <thead>
    <tr>
      <th scope="col">Code</th>
      <th scope="col">Test</th>
      <th name="action">Test</th>
    </tr>
  </thead>
  <tbody>


  </tbody>
</table>    
</div>    
    
</div>

 
<div id="pagination-demo" class="text-right"></div>

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
<script src="{{ asset('plugins/jquery.ui.min.js') }}"></script>


<script src="{{asset('plugins/Convenient-Pagination-Plugin-With-Bootstrap-And-jQuery-UI-Pagination-js/dist/pagination.js')}}"></script>
<script>
$(document).ready(function() {

var rows7=@json($rows7);
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#clinicianAdd').click(function (){
      console.log("Add");
      event.preventDefault();
      var text = $("#text").val();

      let myform = document.getElementById('form');
      var formData = new FormData(myform);

        $.ajax({
            method: 'post',
            url: "{{ route('LocClinicianList')}}/"+text,
            data: formData,
            contentType: false,
            processData: false,
            cache: false,

        }).done(function (response) {
          console.log(response);
          window.location.href = "/ocm/LocClinicianList/";

        });
    });

function mysave(page){
  var table = $('.mytable').DataTable({


  "bPaginate": false,
"lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
dom: 'lBfrtip', //"Bfrtip",


processing: true,
serverSide: true,
// stateSave: true,
ajax: {
   url: "{{ route('ListofError') }}",
   method: 'GET',
   data:{
    page:page
   }
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

  table.on('click', '.delete', function () { 
     event.preventDefault();
     var id=this.id;
     console.log(id);
     swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
   if (willDelete) {
    $.ajax({
        type: 'get',
        url:"/ocm/DelError/" + id,
        //data: {'id':id},                 
        success: function(){
            table.ajax.reload();
        }
      });  


   } 


 });
});

  $('.updbtn').click(function(){

let  myform=document.getElementById('form');
let data=new FormData(myform);
$.ajax({
  url:"{{ route('ListofError') }}",
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
                                  
                                 

                                } else {
                                     Lobibox.notify('warning', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: data.error,
                                            icon: 'bx bx-info-circle'
                                        });
                                }
                                   table.ajax.reload();

})
event.preventDefault();
})


  $('.save').click(function(){
  
let  myform=document.getElementById('form');
let data=new FormData(myform);
$.ajax({
  url:"{{ route('ListofError') }}",
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
                               
                                 

                                } else {
                                     Lobibox.notify('warning', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: data.error,
                                            icon: 'bx bx-info-circle'
                                        });
                                }
                                     table.ajax.reload();

})
event.preventDefault();
})


}
mysave(1);

$(document).on('click', '.page-link', function() { 

pageno=$('.pagination-input').find('input[type=text]').val()



$.ajax({
    
    url: "{{route('LocClinicianList')}}/",
    data:{
      page:pageno
    }
    
}).done(function(response){

  $('.mytable').dataTable().fnClearTable();
  $('.mytable').dataTable().fnDestroy();
  mysave(pageno);






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

 $('.pagination-input').find('input[type=text]').addClass('d-none')
$('.pagination-input').find('.btn-outline-secondary').addClass('d-none')



});
</script>
        
@endpush
