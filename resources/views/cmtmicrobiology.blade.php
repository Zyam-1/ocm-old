@include('layouts.header')
  

<link rel="stylesheet" href="{{asset('plugins/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/Convenient-Pagination-Plugin-With-Bootstrap-And-jQuery-UI-Pagination-js/dist/pagination.css')}}">

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">
    <?php
        if($listtype=='BA'){


    ?>
              Comment Of Microbiology
 <?php
}else if($listtype=='BI'){
?>
 Comment Of BioChemistry

 <?php
}else if($listtype=='HA'){
  ?>

  Comment Of Haematology
   <?php
}else if($listtype=='CO'){
   ?>

  Comment Of Coagulation

  <?php
}else if($listtype=='DE'){
 ?>


  Comment Of Demographics
   <?php
}else if($listtype=='SE'){
 ?>


 Comment Of Semen
 <?php
}else if($listtype=='CD'){
?>
               Comment Of Clinical Details
  <?php
}
  ?>


     
                <a class="btn btn-info btn-sm" href=""><i class="fas fa-arrow-left"></i> Go Back </a>
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
    <div class="border p-3">
        <div class="row">
      <div class="col-md-12">
        <h5>Add new Clinician</h5>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <label class="form-label">Code</label>
        <input type="text" name="code" class="form-control" value="<?php if($data2[0] !=''){ echo $data2[0]['Code'];}?>">
         <input type="hidden" name="hidecode" class="form-control" value="<?php if($data2[0] !=''){ echo $data2[0]['Code'];}?>">
      </div>
           <div class="col-md-6">
        <label class="form-label">Text</label>
         <input type="text" name="text" class="form-control" value="<?php if($data2[0] !=''){ echo $data2[0]['Text'];}?>">
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-12">
        <?php
if($data2[0] !=''){
        ?>
        <button class="btn btn-primary updbtn">Update</button>
        <?php
}else{
        ?>
  <button class="btn btn-primary savebtn">Save</button>
        <?php
      }
      ?>
      </div>
    </div>  
    </div>
        <div class=" p-4 mt-3">
        <div class="row">
      <div class="col-md-12">
        <h5>List Type</h5>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 ">
         <input type="radio" name="listType" class="form-check-input " value="BI" <?php if($listtype=='BI'){echo 'checked';}?>>
        <label class="form-check-label">Biochemistry Comments</label>
       
      </div>
      <div class="col-md-3 ">
         <input type="radio" name="listType" class="form-check-input " value="HA" <?php if($listtype=='HA'){echo 'checked';}?>>
        <label class="form-check-label">Hematology  Comments</label>
       
      </div>
     <div class="col-md-3 ">
         <input type="radio" name="listType" class="form-check-input " value="CO" <?php if($listtype=='CO'){echo 'checked';}?>>
        <label class="form-check-label">Coagulation  Comments</label>
       
      </div>
        <div class="col-md-3 ">
         <input type="radio" name="listType" class="form-check-input " value="DE" <?php if($listtype=='DE'){echo 'checked';}?>>
        <label class="form-check-label">Demographics  Comments</label>
       
      </div>

           
    </div>
        <div class="row mt-2">

        <div class="col-md-3 ">
         <input type="radio" name="listType" class="form-check-input " value="SE" <?php if($listtype=='SE'){echo 'checked';}?>>
        <label class="form-check-label">Semen  Comments</label>
       
      </div>
      <div class="col-md-3 ">
         <input type="radio" name="listType" class="form-check-input "  value="CD" <?php if($listtype=='CD'){echo 'checked';}?>>
        <label class="form-check-label">Cinical Details</label>
       
      </div>
      <div class="col-md-3 ">
         <input type="radio" name="listType" class="form-check-input " value="BA" <?php if($listtype=='BA'){echo 'checked';}?>>
        <label class="form-check-label">Micro Comments</label>
       
      </div>
     <div class="col-md-3 ">
         <input type="radio" name="listType" class="form-check-input ">
        <label class="form-check-label">Film Comments</label>
       
      </div>


           
    </div>

  </div>

     <div class="row mt-3 ">
    <div class="col-md-3 ">
      <label class="form-label">Search :  <input type="search"  class="form-control"></label>
        
    </div>
     
   </div>


  <div class="row mt-3">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped mytable">
            <thead>
              <tr>
                <th>Code</th>
                <th>Text</th>
                 <th>InUse</th>
                <th name="action">Action</th>
              </tr>
            </thead>

          </table>
        </div>
      </div>
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


<script src="{{asset('plugins/jquery-ui.min.js')}}"></script>


<script src="{{asset('plugins/Convenient-Pagination-Plugin-With-Bootstrap-And-jQuery-UI-Pagination-js/dist/pagination.js')}}"></script>
   <script>
   
$(document).ready(function() {

listtype=@json($listtype);


$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

 function savedata(page,listtype,search){
var table=$('.mytable').DataTable({
  "bPaginate": false,
   "searching": false,
ajax: {
    
    url: "/ocm/CmtMicrobiology",
    data:{
      page:page,
      listtype:listtype,
      search:search,
    },
    
},
 columns: [

    {data: 'Code', name: 'Code'},
    {data: 'Text', name: 'Text'},
      {data: 'InUse', name: 'InUse'},
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
  url:'/ocm/CmtMicrobiologyDel/'+id,
  method:'get',
}).done(function(){
  console.log(1);
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
  url:'/ocm/CmtMicrobiology',
  data:{
  search:search
  },
}).done(function(response){
    $('.mytable').dataTable().fnClearTable();
  $('.mytable').dataTable().fnDestroy();
  savedata(1,listtype,search);
  })
e.preventDefault();
}else{

  $('.mytable').dataTable().fnClearTable();
  $('.mytable').dataTable().fnDestroy();

  savedata(1,listtype,search='');
  e.preventDefault();
}

}


})

 }   

savedata(1,listtype,search='');

  

$(document).on('click', '.page-link', function() { 

pageno=$('.pagination-input').find('input[type=text]').val()



$.ajax({
    
    url: "/ocm/CmtMicrobiology/",
    data:{
      page:pageno
    }
    
}).done(function(response){

  $('.mytable').dataTable().fnClearTable();
  $('.mytable').dataTable().fnDestroy();
  savedata(pageno,listtype);






});

});




   

});  
    </script>

<script type="text/javascript">
$(document).ready(function(){

listtype=@json($listtype);
rows7=@json($rows7);

  

$('.savebtn').click(function(){
let  myform=document.getElementById('form');
let data=new FormData(myform);
$.ajax({
  url:'/ocm/CmtMicrobiology',
  data:data,
  cache:false,
  processData:false,
  contentType:false,
  type:'Post'
}).done(function(data){

console.log(1);
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
  url:'/ocm/CmtMicrobiologyUpdate',
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
