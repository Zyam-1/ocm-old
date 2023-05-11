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
            <h1 class="m-0">GP Entry
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


            <form id="form">
            {{ csrf_field() }}
                  <div class="card card-primary card-outline">
                    <div class="card-body ">                                  
<div class="row">
  <div class="col-md-12">
    <h6>Add GP</h6>
  </div>
</div>
<div class="row">
  <div class="col-md-3">
   <label class="form-label">Code</label>
   <input type="text" name="code" id="code" value="<?php if($rows3[0] !=''){echo $rows3[0]['Code'];}else{ }?>"  class="form-control">
  </div>

  <div class="col-md-3">
     <label class="form-label">Practice</label>
 
  
  <select id="practice" name="practice"class="form-control form-select">
    <?php
if($rows3[0] !=''){
    ?>
<option selected >{{$rows3[0]['Practice']}}</option>
    <?php
}else{
    ?>
     <option selected hidden disabled>Choose an Option</option>
    <?php
}
    ?>
    @foreach($rows2 as $data)
    <option>{{$data}}</option>
    @endforeach
  </select >

   

 

  </div>
<div class="col-md-3">
  <label class="form-label">Print Report</label>
 <select id="print"name="print" class="form-control form-select">
      <?php
if($rows3[0] !=''){
    ?>
<option selected  >{{$rows3[0]['PrintReport']}}</option>
    <?php
}else{
    ?>
     <option selected hidden disabled>Choose an Option</option>
    <?php
}
    ?>

   <option>Yes</option>
   <option>No</option>

 </select>
</div>
<div class="col-md-3">
  <label class="form-label"><p> </p></label>
<select class="form-control form-select">
  <option>Cavan</option>
  <option></option>

</select>
</div>
</div>

<div class="row mt-2">
  <div class="col-md-3">
   <label class="form-label">Title</label>
   <input type="text" id="title" name="title" value="<?php if($rows3[0] !=''){echo $rows3[0]['Title'];}else{ }?>" class="form-control">
  </div>

  <div class="col-md-3">
     <label class="form-label">Forename</label>  

<input type="text" id="forename"name="forename" value="<?php if($rows3[0] !=''){echo $rows3[0]['ForeName'];}else{ }?>" id="forename" class="form-control">
 

  </div>
<div class="col-md-3">
  <label class="form-label">Surname</label>
<input type="text"id="surname" name="surname" value="<?php if($rows3[0] !=''){echo $rows3[0]['SurName'];}else{ }?>" class="form-control">
</div>
<div class="col-md-3">
  <label class="form-label">Phone</label>
<input type="number" id="phone"name="phone" class="form-control" value="<?php if($rows3[0] !=''){echo $rows3[0]['Phone'];}else{ }?>">
</div>
</div>

<div class="row mt-2">
  <div class="col-md-3">
   <label class="form-label">M.C Number</label>
   <input type="text" id="number" name="number" class="form-control" value="<?php if($rows3[0] !=''){echo $rows3[0]['MCNumber'];}else{ }?>">
  </div>

  <div class="col-md-3">
     <label class="form-label">Address</label>  

<input type="text" id="address"name="address" value="<?php if($rows3[0] !=''){echo $rows3[0]['Addr0'];}else{ }?>" class="form-control">
 

  </div>
  
  <div class="col-md-3">
     <label class="form-label">Address2</label>  

<input type="text" id="address2"name="address2" class="form-control" value="<?php if($rows3[0] !=''){echo $rows3[0]['Addr1'];}else{ }?>">
 

  </div>
<div class="col-md-3">
  <label class="form-label">FAX</label>
<input type="text" id="fax" name="fax" class="form-control" value="<?php if($rows3[0] !=''){echo $rows3[0]['FAX'];}else{ }?>">
</div>

</div>

<div class="row mt-2">
<div class="col-md-3">
  <label class="form-label">Practice No</label>
<input type="number" id="practice_no"name="practice_no" class="form-control" value="<?php if($rows3[0] !=''){echo $rows3[0]['PracticeNumber'];}else{ }?>">
</div>
  <div class="col-md-3">
   <label class="form-label">Healthlink</label>
  <select name="healthlink" id="healthlink" class="form-control form-select" >
          <?php
if($rows3[0] !=''){
    ?>
<option selected hidden disabled>{{$rows3[0]['Healthlink']}}</option>
    <?php
}else{
    ?>
     <option selected hidden disabled>Choose an Option</option>
    <?php
}
    ?>
    <option>Yes</option>
    <option>No</option>

  </select>
  </div>

  <div class="col-md-3">
     <label class="form-label">Item to be Displayed in List</label>  
<select name="display" class="form-control form-select">
  <option>36</option>
  <option></option>

</select>
 

  </div>

</div>
<div class="row mt-3">
  <div class="col-md-12">
    <?php
    if($rows3[0] !=''){
    ?>
 <button class="btn btn-info updatebtn" >Update</button>
    <?php
}else{
    ?>
     <button class="btn btn-info" id="save">Save</button>
    <?php
}
    ?>
   
    <button class="btn btn-secondary">Print</button>
    <button class="btn btn-danger">Delete</button>
    <a class="btn btn-warning" href="/ocm/LocGPEntry">Cancel</a>

  </div>
</div>
   <div class="row mt-3 ">
    <div class="col-md-3 ">
      <label class="form-label">Search :  <input type="search"  class="form-control"></label>
        
    </div>
     
   </div>
<div class="row mt-3">
  <div class="col-md-12" style="overflow-x: scroll;">
    <table class="table  table-striped mytable" id="mytable" >
      <thead>
        <tr>
          <th class="p-2">Code</th>
          <th class="p-2">InUse</th>
          <th class="p-2">GP Name</th>
          <th class="p-2">Addr 1</th>
          <th class="p-2">Addr 2</th>
          <th class="p-2">Title</th>
          <th class="p-2">Forename</th>
          <th class="p-2">Surname</th>
          <th class="p-2">Phone</th>
          <th class="p-2">FAX</th>
          <th class="p-2">Practice</th>
          <th class="p-2">Print Report</th>
          <th class="p-2">Healthlink</th>
          <th class="p-2">M.C Number</th>
          <th class="p-2">Practice no</th>
          <th class="p-2">eGFR</th>
          <th class="p-2">CC</th>
          <th class="p-2">Interim</th>
           <th class="p-2" name="action">Action</th>

        </tr>
      </thead>
      <tbody id="allgps">
        
      </tbody>
    </table>
  </div>
</div>
<div class="row">
    <div class="col-md-12 text-right">
        <div id="pagination-demo"></div>
    </div>
</div>


      </div>
  </div>

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

<script>



  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  
$(document).ready(function() {

    mydata=@json($rows7);
  
 $('#save').click(function(){

 
    let myform = document.getElementById('form');
    let formData = new FormData(myform);

    $.ajax({
        method: 'post',
        url: "{{route('LocGPEntryInfo/{id?}')}}",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        }).done(function (data) {
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



        });
        event.preventDefault();


   


});
 function mysave(page,search){

 var table = $('.mytable').DataTable({

      "bPaginate": false,
      "searching": false,

        processing: true,
        serverSide: true,
        // stateSave: true,
        ajax: {
            url: "{{ route('LocGPEntry/{id?}') }}",
            method: 'POST',
            data:{
                page:page,
                search:search,
            },
        },
         columns: [
            {data: 'Code', name: 'Code'},
            {data: 'InUse', name: 'InUse'},
            {data: 'Text', name: 'Text'},
            {data: 'Addr0', name: 'Addr0'},
            {data: 'Addr1', name: 'Addr1'},
            {data: 'Title', name: 'Title'},
            {data: 'ForeName', name: 'ForeName'},
            {data: 'SurName', name: 'SurName'},
            {data: 'Phone', name: 'Phone'},
            {data: 'FAX', name: 'FAX'},
            {data: 'Practice', name: 'Practice'},
            {data: 'PrintReport', name: 'PrintReport'},
            {data: 'Healthlink', name: 'Healthlink'},
            {data: 'MCNumber', name: 'MCNumber'},
            {data: 'PracticeNumber', name: 'PracticeNumber'},
            {data: 'ListOrder', name: 'ListOrder'},
            {data: 'AutoCC', name: 'AutoCC'},
            {data: 'Interim', name: 'Interim'},
                         
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "order":[[1, 'asc']],

         dom: "Blfrtip",
                buttons: [
                
                    {
                        title:'User Departments',
                        text: 'Excel',
                        footer: true,
                        extend: 'excelHtml5',
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    },
                    {
                    title:'User Departments', 
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
                        title:'User Departments',
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
 textdata=$(this).attr('id');

 swal({
   title: "Are you sure?",
   text: "Once deleted, you will not be able to recover this imaginary file!",
   icon: "warning",
   buttons: true,
   dangerMode: true,
 }).then((willDelete) => {
   if (willDelete) {
                
    window.location="/ocm/DelGPEntry/"+textdata;
 // table.ajax.reload();
   

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
  url:'/ocm/LocGPEntry',
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
}


}


})


 }
 mysave(1,search='');



 $(".updatebtn").click(function(){
 let myform = document.getElementById('form');
    var formData = new FormData(myform);

    $.ajax({
        method: 'post',
        url: "{{route('LocGPEntryInfo/{id?}')}}",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        }).done(function (data) {

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


var itemsCount = mydata;
var itemsOnPage = 10;

var myPagination = new Pagination({
    container: $("#pagination-demo"),
   showInput:true,
  

});


 myPagination.make(itemsCount, itemsOnPage);

$(document).on('click', '.page-link', function() { 

pageno=$('.pagination-input').find('input[type=text]').val()



$.ajax({
    
    url: '/ocm/LocGPEntry/',
    data:{
      page:pageno
    }
    
}).done(function(response){

  $('.mytable').dataTable().fnClearTable();
  $('.mytable').dataTable().fnDestroy();
  mysave(pageno);






});

});

$('.pagination-input').find('input[type=text]').addClass('d-none');
$('.pagination-input').find('.btn-outline-secondary').addClass('d-none');
});
    </script>
@endpush