@include('layouts.header')
<link rel="stylesheet" href="{{asset('plugins/jquery.min.css')}}">


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
            <h1 class="m-0">Code Text Analyser
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

       <!-- <div class="w-75 card card-primary card-outline m-auto py-4 my-2"> -->
<div class="row">
    <div class="col-md-3">
    <div class="container">
        <label for="Code" class="ml-2 mt-1">Code:</label>
                <input type="Code" name="Code" id="Code" value="" class="ml-1 form-control">
        </div>
    </div>
    <div class="col-md-9">
    <div class="container">
        <label for="Text" class="ml-2 mt-1">Text:</label>
                <input type="Text" name="Text" id="Text" value="" class="ml-1 form-control">
        </div>
    </div>
</div>
<div class="container">
<div class="row">
                                            <div class="col-md-12">
                                                <h5 class="mt-2"><b>Number of Antibiotics to report:</b></h5>
                                                </div>
                                            </div>
<div class="row">
<div class="col-md-8">
                                                    <div class="form-check form-check-inline mt-1">
                                                    <input class="form-check-input" type="radio" name="Source" id="one" value="one">
                                                    <label class="form-check-label" for="one">1</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mt-1">
                                                    <input class="form-check-input" type="radio" name="Source" id="two" value="two">
                                                    <label class="form-check-label" for="two">2</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mt-1">
                                                    <input class="form-check-input" type="radio" name="Source" id="three" value="three" >
                                                    <label class="form-check-label" for="three">3</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mt-1">
                                                    <input class="form-check-input" type="radio" name="Source" id="four" value="four" >
                                                    <label class="form-check-label" for="four">4</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                <button id="add" class="btn btn-primary w-75" type="button">Add</button>
                                                </div>
</div>
</div>

<div class="container mt-4">
    <div class="row">
    <div class="col-md-12">
                    

                 
                           
     
                           <table id="table2" class="table mb-0 table-striped">
                             
                             <thead>
                               <tr>
                                 
                         
                                 <th>Code</th>
                                 <th>Text</th>
                                 <th>AB's</th>
                                 <th>Action</th>

                           
                              
                               </tr>
                             </thead> 
                 
                             
                           </table>                 
                       </div>
                 
    </div>

               </div> 
               <div class="row">
                <div class="col-md-4">
                <div class="container">
               <button id="display" class="display btn btn-primary w-75" type="button">Display</button>
               </div>
                </div>
               </div>
               
</div>

        
      
        </div>

             
           
        </div> 
        <!-- </div> -->
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

 var listcode=@json($listtype);

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

 function savedata(page,listcode,search){
var table=$('#table2').DataTable({
  "bPaginate": false,
   "searching": false,
 
ajax: {
    
    url: "/ocm_old/codetextDATA",
    data:{
      page:page,
      listcode:listcode,
      search:search,
    },
    
},
 columns: [

    {data: 'Code', name: 'Code'},
    {data: 'Text', name: 'Text'},
    {data: 'Default', name: 'ABs'},
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
  url:''+id,
  method:'get',
}).done(function(){
  table.ajax.reload()
})
  } 
});

}); 
$(document).on('click', '#display', function (event) {
 
  var table = $('#table2').DataTable({

"lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],

processing: true,
serverSide: true,
ajax: {
    
    url: "/ocm_old/codetextDATAdisplay",
    data:{
      Code:Code,
      Text:Text,
    },
    
},
 columns: [

    {data: 'Code', name: 'Code'},
    {data: 'Text', name: 'Text'},
    {data: 'ABs', name: 'ABs'},
   {data: 'action', name: 'action', orderable: false, searchable: false},
],
"order":[[0, 'desc']],
        columnDefs: [
        { "visible": false, "targets": [] },
        ], 

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
  url:'/ocm/Lists',
  data:{
  search:search
  },
}).done(function(response){
    $('.mytable').dataTable().fnClearTable();
  $('.mytable').dataTable().fnDestroy();
  savedata(1,listcode,search);
  })
e.preventDefault();


}else{

$('.mytable').dataTable().fnClearTable();
$('.mytable').dataTable().fnDestroy();
savedata(1,listcode,search='');
e.preventDefault();
}


}


})

 }   

savedata(1,listcode,search='');

  

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
  savedata(pageno,listcode);






});

});




   

});  
    </script>

<script type="text/javascript">
$(document).ready(function(){

  var rows7=@json($rows7);
  var listtype=@json($listtype);
  

$('.savebtn').click(function(){
let  myform=document.getElementById('form');
let data=new FormData(myform);

$.ajax({
  url:'{{route('MIdentifyStains')}}',
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
  url:'/ocm/MIdentifyStainsUpdate',
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
                                     window.location='/ocm/Lists/'+listtype;
                                 

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
