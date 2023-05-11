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
            <h1 class="m-0">Clinician List
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
    <h6>Add new Clinician</h6>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
  <label class="form-label">Code </label>
  <input type="text" name="code" id="code" value="<?php if($rows3 != ""){ echo $rows3['Code']; } ?>" class="form-control">
  <input type="hidden" name="text" id="text" value="<?php if($rows3 != ""){ echo $rows3['Text']; } ?>" class="form-control">
  </div>
    <div class="col-md-6">
  <label class="form-label">Default Ward </label>
 <select id="defaultward" name="defaultward" value="<?php if($rows3 != ""){ echo $rows3['Ward']; } ?>"  class="form-control form-select">
   <option>GP</option>
 </select>
  </div>
</div>
<div class="row mt-2">
  <div class="col-md-6">
  <label class="form-label">Hospital </label>
  <select id="hospital" name="hospital" class="form-control form-select">
   <option value='C'>Cavan</option>
   <option value='NEO'>Neo Fertility Clinic</option>
 </select>
  </div>
    <div class="col-md-6">
  <label class="form-label">Title </label>
 <input type="text" name="title" id="title" value="<?php if($rows3 != ""){ echo $rows3['Title']; } ?>"  class="form-control">
  </div>
</div>
<div class="row mt-2">
  <div class="col-md-6">
  <label class="form-label">Forename </label>
  <input type="text" name="forename" value="<?php if($rows3 != ""){ echo $rows3['ForeName']; } ?>" id="forename" class="form-control">
  </div>
    <div class="col-md-6">
  <label class="form-label">Surname </label>
  <div class="d-flex align-items-center">
    <input type="text" name="surname" id="surname" value="<?php if($rows3 != ""){ echo $rows3['SurName']; } ?>"  class="form-control">
      <?php if($rows3!=""){ ?>
        <button class="btn btn-warning ml-3 mt-1" id="clinicianAdd">Update</button>
      <?php } else { ?>
        <button class="btn btn-primary ml-3 mt-1" id="clinicianAdd">Add</button>
      <?php } ?> 
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
    <table id="table"  class="table table-striped mytable">
      <thead>
        <tr>
          <th>Title</th>
          <th>ForeName</th>
          <th>SurName</th>
          <th>InUse</th>
          <th>Text</th>
          <th>HospitalCode</th>
          <th>Code</th>
          <th>Ward</th>

          <th>ListOrder</th>
          <th>Action</th>
        </tr>
      </thead>
     
      <tbody id="clinicianTable">

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
$(document).ready(function() {
rows7=@json($rows7);

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
            url: "{{ route('CliniciansUpdate')}}/"+text,
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
                                      window.location.href = "/ocm/Clinicians/";
                                 

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
   url: "{{ route('Clinicians') }}",
   method: 'GET',
   data:{
    page:page,
    search:search,
   },
},
columns: [
  {data: 'Title', name: 'Title'},
   {data: 'ForeName', name: 'ForeName'},
   {data: 'SurName', name: 'SurName'},
   {data: 'InUse', name: 'InUse'},
   {data: 'Text', name: 'Text'},
   {data: 'HospitalCode', name: 'HospitalCode'},
   {data: 'Code', name: 'Code'},
   {data: 'Ward', name: 'Ward'},
   {data: 'ListOrder', name: 'ListOrder'},
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
        url:"{{ route('delete') }}/" + id,
        //data: {'id':id},                 
        success: function(){
        }
      });  


   } else {
     swal("Your imaginary file is safe!");
   }
  table.ajax.reload();

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

$.ajax({
  url:'/ocm/CliniciansUpdate',
  data:{
  search:search
  },
}).done(function(response){
    $('.mytable').dataTable().fnClearTable();
  $('.mytable').dataTable().fnDestroy();
  mysave(1,search);
  })
e.preventDefault();
}


})


}
mysave(1,search='');

$(document).on('click', '.page-link', function() { 

pageno=$('.pagination-input').find('input[type=text]').val()



$.ajax({
    
    url: "{{route('Clinicians')}}/",
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