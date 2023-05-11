@include('layouts.header')
  
  <style type="text/css">
.flex-wrap {
    -webkit-flex-wrap: wrap!important;
    -ms-flex-wrap: wrap!important;
    flex-wrap: wrap!important;
    width: 34%;
    display: inline-block;
    text-align: center;
    top: -3px;
}
#table td:last-child, #table th:last-child {
    text-align: left;
    width: 80% !important;
}
td label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 700;
    width: auto;
}
td {
    padding: 5px 10px !important;
}
.custom-control {
    top: 0px;
    display: inline-block;
}
.dataTables_info, .dataTables_paginate {
    display: none;
}
  </style>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">User Roles Mapping </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">User Roles Mapping </li>
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

                             <div class="card card-primary card-outline">
                            <div class="card-body table-responsive">

                      
                           <div class="row">
                                    
                             <div class="col-md-12">  
                    
                                 
                                            {{ csrf_field() }}
                                            <div class="row">
                                            
                                        
                                        <div class="col-md-3">
                                           <input type="hidden" class="form-control" id="id" name="id" value="" />
                                                 <select class="form-control" name="role" id="role">
                                                        <option value="">Choose a Role</option>
                                                        @foreach ($data['roles'] as $role)
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                        @endforeach
                                                 </select>
                                             </div>

    
                                             <div class="col-md-2">
                                                <button type="button" class="btn btn-primary viewModules">View Modules</button>
                                             </div> 


                                             
                                        
                                           </div>   
                                    

                                 </div>

                             </div>
                             
                             </div>
                            </div>        


                                    <div class="card card-primary card-outline">
                            <div class="card-body table-responsive">

                           <div class="row">


                        
                                <div class="col-md-12">    
                          
                                        
                                         <table id="table" class="table mb-0 table-striped">
                                              
                                              <thead>
                                                <tr>
                                        

                                                  <th>Module </th>
                                                  <th><span id="permissions"></span> Permissions</th>
                                                                                                 
                                                </tr>
                                              </thead> 

                                            


                                            </table>       
                           


                                </div>

                              

                    
                             </div> 

                 </div>  
                  </div>  
                      </form>      


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


<script type="text/javascript">
    $(document).ready(function () {

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$( "#role" ).select2({
                placeholder:'Choose Role',
                allowClear:true
               });

$(document).on('click', '.viewModules', function (event) { 


  var role = $('#role').val();
  var user = '';


   $('#table').DataTable().destroy();

   load_data(role,user);

  

                    $('#table_filter').append('<button style="padding: 4px 10px;" type="button" class="ml-2 btn btn-success savePermissions">Save Permissions</button>');
                             
                    

  
  
        });
 
    load_data();


    function load_data(role = '', user = '')
     {

       var table = $('#table').DataTable({

         "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],

        processing: true,
        serverSide: true,
        // stateSave: true,
        ajax: {
            url: "{{ route('UserRolesMapping') }}",
            data : {role:role, user:user},
            method: 'POST'
        },
         columns: [

            {data: 'name', name: 'name'},
            {data: 'permissions', name: 'permissions'}
        ],
        "order":[[0, 'asc']],
         "pageLength": 500,

         dom: "frtip",
                buttons: [
                
                    {
                        title:'Mappings',
                        text: 'Excel',
                        footer: true,
                        extend: 'excelHtml5',
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    },
                    {
                        title:'View',
                        text: 'View',
                        footer: true,
                        extend: 'colvis'
                    },    
                ],

                columnDefs: [{
                    orderable: false,
                    targets: -1,
                },

                ], 
    });

    

}

  $(document).on('click', '.allCheck', function (event) { 

                   const id = this.id.split("-"); 


                   
                   var View = "#"+id[0]+'View';
                   var View2 = "#permission-"+id[0]+'View';

                   var Update = "#"+id[0]+'Update';
                   var Update2 = "#permission-"+id[0]+'Update';

                   var Add = "#"+id[0]+'Add';
                   var Add2 = "#permission-"+id[0]+'Add';

                   var Delete = "#"+id[0]+'Delete';
                   var Delete2 = "#permission-"+id[0]+'Delete';

                   var Self_Created = "#"+id[0]+'Self_Created';
                   var Self_Created2 = "#permission-"+id[0]+'Self_Created';

                   var Request = "#"+id[0]+'Request';
                   var Request2 = "#permission-"+id[0]+'Request';

                   var Signoff = "#"+id[0]+'Signoff';
                   var Signoff2 = "#permission-"+id[0]+'Signoff';

                   if($('#' + this.id).is(":checked") == true) {

                    $(View).prop("checked", true);
                    $(Add).prop("checked", true);
                    $(Update).prop("checked", true);
                    $(Delete).prop("checked", true);
                    $(Self_Created).prop("checked", true);
                    $(Request).prop("checked", true);
                    $(Signoff).prop("checked", true);

                    $(View2).val("Yes");
                    $(Add2).val("Yes");
                    $(Update2).val("Yes");
                    $(Delete2).val("Yes");
                    $(Self_Created2).val("Yes");
                    $(Request2).val("Yes");
                    $(Signoff2).val("Yes");

                   } else {

                    $(View).prop("checked", false);
                    $(Add).prop("checked", false);
                    $(Update).prop("checked", false);
                    $(Delete).prop("checked", false);
                    $(Self_Created).prop("checked", false);
                    $(Request).prop("checked", false);
                    $(Signoff).prop("checked", false);

                    $(View2).val("No");
                    $(Add2).val("No");
                    $(Update2).val("No");
                    $(Delete2).val("No");
                    $(Self_Created2).val("No");
                    $(Signoff2).val("No");
                    $(Request2).val("No");

                   }
                    
          })


    $(document).on('click', '.singleCheck', function () { 

                   var value = "#permission-"+this.id;
                    if($('#' + this.id).is(":checked") == true) {

                        $(value).val("Yes");

                    } else {

                        $(value).val("No");
                    }
               })


$(document).on('click', '.savePermissions', function () { 

        
                        //stop submit the form, we will post it manually.
                        event.preventDefault();

                        // Get form
                        var form = $('#form')[0];

                        // Create an FormData object
                        var data = new FormData(form);
                            data.append("sync", "No"); 

                      
                        $.ajax({
                            type: "POST",
                            enctype: 'multipart/form-data',
                            url: "{{ route('savePermissions') }}",
                            data: data,
                            processData: false,
                            contentType: false,
                            cache: false,
                            timeout: 600000,
                            success: function(data) {
                                
                                //console.log(data);
                                   
                                    if ($.isEmptyObject(data.error)){
                                         Lobibox.notify('success', {
                                                pauseDelayOnHover: true,
                                                continueDelayOnInactiveTab: false,
                                                position: 'top right',
                                                msg: data.success,
                                                icon: 'bx bx-check-circle'
                                            });

                                    $(".viewModules").trigger('click');     
 
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

           


    });



$(document).on('click', '.saveAndSyncPermissions', function () { 

        
                        //stop submit the form, we will post it manually.
                        event.preventDefault();

                        // Get form
                        var form = $('#form')[0];

                        // Create an FormData object
                        var data = new FormData(form);
                            data.append("sync", "Yes");



                      
                        $.ajax({
                            type: "POST",
                            enctype: 'multipart/form-data',
                            url: "{{ route('savePermissions') }}",
                            data: data,
                            processData: false,
                            contentType: false,
                            cache: false,
                            timeout: 600000,
                            success: function(data) {
                                
                                //console.log(data);
                                   
                                    if ($.isEmptyObject(data.error)){
                                         Lobibox.notify('success', {
                                                pauseDelayOnHover: true,
                                                continueDelayOnInactiveTab: false,
                                                position: 'top right',
                                                msg: data.success,
                                                icon: 'bx bx-check-circle'
                                            });

                                    $(".viewModules").trigger('click');     
 
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

           


    });

    
    });



</script>
@endpush
