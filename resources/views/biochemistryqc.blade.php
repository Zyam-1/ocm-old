@include('layouts.header')

    <!-- Select2 -->
    <link href="{{ asset('plugins/select2/css/select2.min.css?1112') }}" rel="stylesheet" >
  <link href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css?1112') }}" rel="stylesheet" >

  <body>
    
 
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Biochemistry QC
               
               <a class="btn btn-info btn-sm"><i class="fas fa-arrow-left"></i> Go Back </a>
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
                 <div class="col-md-12">
                   
                 </div>
                 <div class="row">
                     <div class="col-md-6">
                         <label class="form-label">Control Name (Friendly Name)</label>
                         <input type="text" name="controlname" id="controlname" class="form-control" value="<?php if(count($rowsedit)>0)  { echo $rowsedit['ControlName']; } ?>">
                         <input type="hidden" name="controlnameprev" id="controlnameprev" class="form-control" value="<?php if(count($rowsedit)>0)  { echo $rowsedit['ControlName']; } ?>">
                     </div>
                       <div class="col-md-6">
                         <label class="form-label">Alias Name (From Analyser)</label>
                         <input type="text" name="aliasname" id="aliasname" class="form-control" value="<?php if(count($rowsedit)>0)  { echo $rowsedit['AliasName']; } ?>">
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-12 mt-3">
                         <button type="button" class="btn btn-primary" id="qcsave">Add</button>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-12 mt-3">
                         <table class="table table-striped" >
                             <thead>
                                 <tr>
                                     <th>Control Name</th>
                                     <th>Alias Name</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-12 mt-3">
                         <button class="btn btn-primary">Save</button>
                         <button class="btn btn-warning">Cancel</button>
                     </div>
                 </div>


                 </div>
                 </div>        
</form>

                    

                    <!-- <input type="hidden"> -->

                    
        <!-- </form> -->
      </div>
    </div>
  </div>
</div>



  </body>
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


<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/select2.js') }}"></script>
<script>
    
$(document).ready(function() {

      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


  
  $('#qcsave').click(function (){
      

    controlnameprev
    var id=$("#controlname").val();


    var cnameprev=$("#controlnameprev").val();

          let myform = document.getElementById('form');
          var formData = new FormData(myform);
      
              // console.log(formData);
          $.ajax({
          type: "POST",
          enctype: 'multipart/form-data',
          url: "{{ route('BioChemistryQc')}}/"+id,
          data:  formData,
          processData: false,
          contentType: false,
          cache: false,
          timeout: 600000,
          success: function(response) {
              console.log(response);
              
  if ($.isEmptyObject(response.error)){

Lobibox.notify('success', {
      pauseDelayOnHover: true,
      continueDelayOnInactiveTab: false,
      position: 'top right',
      msg: response.success,
      icon: 'bx bx-check-circle'
  });


} else {
Lobibox.notify('warning', {
      pauseDelayOnHover: true,
      continueDelayOnInactiveTab: false,
      position: 'top right',
      msg: response.error,
      icon: 'bx bx-info-circle'
  });
}
              
              
            table.ajax.reload();
          }
          });  
          
        
              event.preventDefault();
          });



var table = $('.table').DataTable({

"lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
dom: 'lBfrtip', //"Bfrtip",


processing: true,
serverSide: true,
// stateSave: true,
ajax: {
   url: "{{ route('BioChemistryQc')}}",
   method: 'GET'
},
columns: [
   {data: 'ControlName', name: 'ControlName'},
   {data: 'AliasName', name: 'AliasName'},
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
  var cnametext = $(this).attr('id');

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


url: "{{route('BioChemistryQcdel')}}",
         method: 'GET',
         data: {
          cnametext:cnametext
         },

}).done(function (response) {    

  // window.location = "/ocm/LocWardList";
  table.ajax.reload();

});


event.preventDefault();




  }
});



});




});
</script>




@endpush



