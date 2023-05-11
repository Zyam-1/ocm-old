@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
  <div class="row mb-0">
    <div class="col-sm-6">
      <h1 class="m-0">Bl1200</h1>
    </div><!-- /.col -->
    <div class="col-sm-6  d-none d-sm-none d-md-block ">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
        <li class="breadcrumb-item active">Bl100</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main content -->
<div class="content">
<div class="container-fluid">

              <div class="row">
                  
                  <div class="col-md-4">    
                  <div class="card card-primary card-outline">
                      <div class="card-body">                  
                          <h5>Bl1200 Info</h5>   

                            <form id="form">
                                      {{ csrf_field() }}
                                      <div class="row">
                                      
                                      <div class="col-md-12">
                                      <label  class="col-form-label">Code <span>*</span></label>
                                           <input type="text" class="form-control" id="code" name="code" value="" />
                                           <input type="hidden" class="form-control" id="id" name="id" value="" />
                                       </div>
                                       <div class="col-md-12">
                                      <label  class="col-form-label">Text<span>*</span></label>
                                           <input type="text" class="form-control" id="text" name="text" value="" />
                                       </div>
                                        
                                       <div class="col-md-12 mt-3">
                                          <button type="button" class="btn btn-info ml-1 float-right clear">Clear Form</button>
                                          <button type="button" class="btn btn-primary float-right save">Save Now</button>
                                          <button type="button"  class="btn btn-secondary float-right updatedata d-none">Update</button>
                                       </div> 


                                       
                                  
                                     </div>   
                                  </form>
                                    


                      </div>
                  </div>
                  </div>

              <div class="col-md-8">
                   <div class="card card-primary card-outline">
                      <div class="card-body table-responsive">                  
                          <table id="table" class="mb-0 table-striped">
                            
                            <thead>
                              <tr>
                      
                              <th>Id</th>
                                <th>Code</th>
                                <th>Text</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Action</th>
                             
                              </tr>
                            </thead> 



                          </table>                 
                      </div>
                  </div> 
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
<script>
$(document).ready(function() {
var updateid;
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.save').click(function (){
      
     
          var code=$("#code").val();
          var text=$("#text").val();
        
      
      
          let myform = document.getElementById('form');
          var formData = new FormData(myform);
      
              // console.log(formData);
          $.ajax({
          type: "POST",
      
          url: "{{ route('addbl1200')}}",
          data:  formData,
          processData: false,
          contentType: false,
          cache: false,
          success: function(data) {
            
              
          
       if ($.isEmptyObject(data.error)){
      
                                            Lobibox.notify('success', {
                                                  pauseDelayOnHover: true,
                                                  continueDelayOnInactiveTab: false,
                                                  position: 'top right',
                                                  msg: data.success,
                                                  icon: 'bx bx-check-circle'
                                              });
                                           window.location='/ocm/bl1200';
                                       
      
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
          $(".clear").click(function () {
                 $('#code').val('');
                 $('#text').val('');
           })
          $('.updatedata').click(function (){
      
     
      var code=$("#code").val();
      var text=$("#text").val();
      var id=updateid;
    
    //   alert(id);
      
  
          // console.log(formData);
      $.ajax({
    
  
      url: "{{ route('updatebl1200')}}",
      data: {
         id:id ,
         text:text,
         code:code
        },
    //   processData: false,
    //   contentType: false,
    //   cache: false,
      type: "POST",
      success: function(data) {
        
          
      
   if ($.isEmptyObject(data.error)){
  
                                        Lobibox.notify('success', {
                                              pauseDelayOnHover: true,
                                              continueDelayOnInactiveTab: false,
                                              position: 'top right',
                                              msg: data.success,
                                              icon: 'bx bx-check-circle'
                                          });
                                       table.ajax.reload();
                                   
  
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

  var table = $('#table').DataTable({


//   "bPaginate": false,
//     "searching": false,
// "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
// dom: 'lBfrtip', //"Bfrtip",


// processing: true,
// serverSide: true,
// stateSave: true,
ajax: {
   url: "{{ route('bl1200') }}",
},
columns: [
  {data: 'id', name: 'id'},
   {data: 'code', name: 'code'},
   {data: 'text', name: 'text'},
   {data: 'created_at', name: 'created_at'},
   {data: 'updated_at', name: 'updated_at'},
   {data: 'created_by', name: 'created_by'},
   {data: 'updated_by', name: 'updated_by'},
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
        type: 'post',
        url:"{{ route('deletebl1200') }}",
        data: {'id':id},                 
        success: function(){
        }
      });  


   } else {
     swal("Your imaginary file is safe!");
   }
  table.ajax.reload();

 });
});

table.on('click', '.update', function () { 
     event.preventDefault();
     var id=this.id;
     updateid=id;
    //  alert(updateid);
    
    $.ajax({
        type: 'get',
        url:"{{ route('getbl1200') }}",
        data: {'id':id},                 
        success: function(response){
           $('#code').val(response[0]['code']);
           $('#text').val(response[0]['text']);
           $('.updatedata').attr('style','display:inline-block !important;'); 
           $('.save').attr('style','display:none !important;'); 

        }
      });  

});

})
</script>
@endpush
