@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">{{$data['report'][0]->name}}</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


     <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

            
                         <div class="card card-primary card-outline">
                           <form id="form">

                                <input type="hidden" value="{{$data['report'][0]->id}}" name="id">  
                                <input type="hidden" value="{{$data['report'][0]->interface}}" id="interface">   
                                <input type="hidden" value="{{$data['report'][0]->report}}" id="report">    

                                <div class="card-body row">                  
                                        
                                        <?php 

                                            $filters = $data['reportFilterOptions'];
                                            $users = '';
                                            $roles = '';
                                            $departments = '';

                                            if(count($filters) > 0) {

                                                ?>
                                                <div class="col-md-2  my-2">
                                                <label>Choose Date <span>*</span></label>
                                                <select class="form-control" name="date" id="date">
                                                <?php 

                                                foreach($filters as $date) {

                                                    if($date->value == 'Users') {

                                                        $users = 'yes';
                                                    }

                                                    if($date->value == 'Roles') {

                                                        $roles = 'yes';
                                                    }

                                                    if($date->value == 'Departments') {

                                                        $departments = 'yes';
                                                    }


                                                    if($date->name == 'dates') {

                                                           $date =  $date->value

                                                           ?>
                                                           <option>{{$date}}</option>
                                                           <?php
                                                        }

                                                    }
                                                ?>
                                                </select>
                                                 </div>

                                                 <div class="col-md-3 my-2 Daterange d-none">
                                                 <label class="d-block">Date From / To <span>*</span></label>                    
                                                <input type="date" placeholder="" class="form-control" style="width:49%;display: inline-block;" id="date1" name="date1" value="{{$data['date1']}}">
                                                <input type="date" placeholder="" class="form-control" style="width:49%;display: inline-block;" id="date2" name="date2" value="{{$data['date2']}}">
                                                 </div>

                                                <?php 
                                               

                                                if($users == 'yes' || $roles == 'yes' || $departments == 'yes') {

                                                    ?>
                                                <div class="col-md-2  my-2">
                                                <label>Group <span>*</span></label>
                                                <select class="form-control" name="group" id="group">
                                                    <option value="" disabled selected>Select Group</option>
                                                    <?php
                                                    foreach($filters as $group) {


                                                    if($group->name == 'filter') {

                                                           $group =  $group->value

                                                           ?>
                                                           <option>{{$group}}</option>
                                                           <?php
                                                        }

                                                    }

                                                    ?>
                                                </select>
                                                 </div>

                                                    <?php

                                                }

                                                 ?>

                                                <div class="col-md-2  my-2 Users d-none" >
                                                <label>Users <span>*</span></label>
                                                <select class="form-control" name="user" id="user">
                                                    <option>All</option>
                                                     @foreach (\App\Http\Controllers\reports::Users() as $user)
                                                      <option value="{{$user->id}}">{{$user->name}}</option>
                                                     @endforeach
                                                </select>
                                                </div>
                                                  

                                                 

                                                <div class="col-md-2  my-2 Roles d-none">
                                                <label>Roles  <span>*</span></label>
                                                <select class="form-control" name="role" id="role">
                                                    <option>All</option>
                                                     @foreach (\App\Http\Controllers\reports::Roles() as $role)
                                                      <option value="{{$role->id}}">{{$role->Text}}</option>
                                                     @endforeach
                                                </select>
                                                </div>
                                                  


                                          
                                                <div class="col-md-2 mt-2 Departments d-none">
                                                <label>Deparments  <span>*</span></label>
                                                <select class="form-control" name="department" id="department">
                                                    <option>All</option>
                                                     @foreach (\App\Http\Controllers\reports::Departments() as $department)
                                                      <option value="{{$department->id}}">{{$department->name}}</option>
                                                     @endforeach
                                                </select>
                                                </div>
                                        
                                            <?php  }  ?>  

                                        <div class="col-md-2">
                                             <label class="text-white d-block">.</label>
                                            <button style="padding: 4px;" class="btn btn-primary mt-2 float-right btn-block getReport"><i class="fas fa-search"></i> Get Report</button>
                                        </div>         
                            </div>
                           </form>  
                        </div> 

                                <div class="row Results">
                                    <div class="col-md-12" id="results"></div>
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


<script type="text/javascript">

$(document).ready(function () {

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      
      $('#date').select2();
      $('#group').select2();
      $('#user').select2();
      $('#role').select2();
      $('#department').select2();
              

       $(document).on('change', '#date', function () { 

      $('.Daterange').attr('style', 'display: none !important');

      if(this.value == 'Custom Date') {

       $('.Daterange').attr('style', 'display: block !important');
        
      }

                   $.ajax({
                        type: "get",
                        url:"{{ route( 'getDates') }}",
                        data: {'id' : this.value},
                        timeout: 600000,
                        success: function(data) {
                           
                            $('#date1').val(data.date1)
                            $('#date2').val(data.date2)
                              
                            }
                        });

        })


       $(document).on('change', '#group', function () { 

                $('.Users').attr('style', 'display: none !important');
                $('.Roles').attr('style', 'display: none !important');
                $('.Departments').attr('style', 'display: none !important');

                if(this.value == 'Users') {

                    $('.Users').attr('style', 'display: block !important');
                }

                if(this.value == 'Roles') {

                    $('.Roles').attr('style', 'display: block !important');
                }

                if(this.value == 'Departments') {

                    $('.Departments').attr('style', 'display: block !important');
                }

        })



            //add and update js code

            $(".getReport").click(function (event) {

                    var date1 = $('#date1').val();
                    var date2 = $('#date2').val();
                    var group = $('#group').val();
                    var user = $('#user').val();
                    var role = $('#role').val();
                    var department = $('#department').val();

                    $('.Results').attr('style', 'display: none !important');
                    //stop submit the form, we will post it manually.
                    event.preventDefault();

                    // Get form
                    var form = $('#form')[0];

                    // Create an FormData object
                    var data = new FormData(form);

                    $.ajax({
                        type: "POST",
                        enctype: 'multipart/form-data',
                        url: "{{ route('getReport') }}",
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        success: function(data) {                      

                                var reportOptions = @json($data);
                                var reportOptions = reportOptions.reportsOptions;


                                if ($.isEmptyObject(data.error)) {

                                    if($("#interface").val() == 'Table' && $("#report").val() == 'Samples') {
                                    
                                    $('#results').html(data);
                                    $('.Results').attr('style', 'display: block !important');

                                       
                                        const columnsData = [{data:'PhlebotomySampleDateTime', name: 'PhlebotomySampleDateTime'}];
                                        const sortings = [0];
                                         const columnDefsData = [ { orderable: true, className: 'reorder', targets: sortings },{ orderable: false, targets: '_all' }];        
                                        //console.log(columnsData);
                                                        
                                                $( reportOptions ).each(function( index ) {

                                                    if(reportOptions[index].table2 == null) {
   
                                                    columnsData.push( {data: reportOptions[index].column_, name: reportOptions[index].column_} );

                                                    } else {


                                                    columnsData.push( {data: reportOptions[index].column_, name: reportOptions[index].table2+'.'+reportOptions[index].value2 } );

                                                    }



                                                    if(reportOptions[index].sorting == 1) {

                                                        sortings.push(index+1)

                                                    }

                                                     if(reportOptions[index].column_ == 'reflexed') {
                                                                        
                                                        columnDefsData.push( {"mRender": function(data, type, row) {
                                                        
                                                         if (data === 1) { return 'Yes'; } else { return 'No'; }

                                                          }, "aTargets": [index+1] } )
                                                    }

                                                    if(reportOptions[index].column_ == 'addon') {
                                                                        
                                                        columnDefsData.push( {"mRender": function(data, type, row) {
                                                        
                                                         if (data === 1) { return 'Yes'; } else { return 'No'; }

                                                          }, "aTargets": [index+1] } )
                                                    }


                                                     })  

                                                columnsData.push( {data: 'action', name: 'action', orderable: false, searchable: false});
                                  

                                             var table = $('#table').DataTable({
                                          
                                                 "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
                                                dom: 'lBfrtip', //"Bfrtip",


                                                processing: true,
                                                serverSide: true,
                                                // stateSave: true,
                                                ajax: {
                                                    url: "{{ route('getReportResult') }}",
                                                    method: 'POST',
                                                    data:{
                                                        
                                                        'report':"{{$data['report'][0]->name}}",
                                                        'date1':date1,
                                                        'date2':date2,
                                                        'group':group,
                                                        'user':user,
                                                        'role':role,
                                                        'department':department

                                                    },
                                                },
                                                 columns: columnsData,
                                                "order":[[0, 'asc']],

                                                 dom: "Blfrtip",
                                                        buttons: [
                                                        
                                                            {
                                                                title:"{{$data['report'][0]->name}}",
                                                                text: 'Excel',
                                                                footer: true,
                                                                extend: 'excelHtml5',
                                                                exportOptions: {
                                                                columns: [':visible :not(:last-child)']
                                                                },
                                                            },
                                                            {
                                                                text: 'Print',
                                                                title:"{{$data['report'][0]->name}}",
                                                                extend: 'print',
                                                                footer: true,
                                                                exportOptions: {
                                                                columns: [':visible :not(:last-child)']
                                                                },
                                                            }, 
                                                            'colvis'   
                                                        ],

                                                        rowReorder: true,
                                                        columnDefs: columnDefsData,


                                                        initComplete: function () {
                                                                
                                                              var table2 =  this.api();  
                                                              $( reportOptions ).each(function( index ) {

                                                                if(reportOptions[index].columnfilter == 1) {

                                                                   table2.columns(index+1).every(function () {
                                                                            var column = this;
                                                                            var input = document.createElement("input");
                                                                            input.classList.add("form-control");
                                                                            input.classList.add("text-center");
                                                                            input.classList.add("p-0");
                                                                            input.placeholder = "";
                                                                            $(input).appendTo($(column.footer()).empty())
                                                                            .on('keyup', function () {
                                                                                column.search($(this).val()).draw();
                                                                            });
                                                                        });

                                                                    }

                                                                    

                                                                 }) 

                                                        }
                                            }); 
                                    
                                    } else  if($("#interface").val() == 'Table' && $("#report").val() == 'Activity Logs') {  

                                         $('#results').html(data);
                                         $('.Results').attr('style', 'display: block !important');

                                       
                                        const columnsData = [];
                                        const sortings = [0];
                                         const columnDefsData = [ { orderable: true, className: 'reorder', targets: sortings },{ orderable: false, targets: '_all' }];        
                                        //console.log(columnsData);
                                                        
                                                $( reportOptions ).each(function( index ) {

                                                    if(reportOptions[index].table2 == null) {
   
                                                    columnsData.push( {data: reportOptions[index].column_, name: reportOptions[index].column_} );

                                                    } else {


                                                    columnsData.push( {data: reportOptions[index].column_, name: reportOptions[index].table2+'.'+reportOptions[index].value2 } );

                                                    }


                                                    if(reportOptions[index].sorting == 1) {

                                                        sortings.push(index)

                                                    }
                                
                                                     })  

                                                columnsData.push();
                                  

                                             var table = $('#table').DataTable({
                                          
                                                 "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
                                                dom: 'lBfrtip', //"Bfrtip",


                                                processing: true,
                                                serverSide: true,
                                                // stateSave: true,
                                                ajax: {
                                                    url: "{{ route('getReportResult') }}",
                                                    method: 'POST',
                                                    data:{
                                                        
                                                        'report':"{{$data['report'][0]->name}}",
                                                        'date1':date1,
                                                        'date2':date2,
                                                        'group':group,
                                                        'user':user,
                                                        'role':role,
                                                        'department':department

                                                    },
                                                },
                                                 columns: columnsData,
                                                "order":[[0, 'asc']],

                                                 dom: "Blfrtip",
                                                        buttons: [
                                                        
                                                            {
                                                                title:"{{$data['report'][0]->name}}",
                                                                text: 'Excel',
                                                                footer: true,
                                                                extend: 'excelHtml5',
                                                                exportOptions: {
                                                                columns: [':visible :not(:last-child)']
                                                                },
                                                            },
                                                            {
                                                                text: 'Print',
                                                                title:"{{$data['report'][0]->name}}",
                                                                extend: 'print',
                                                                footer: true,
                                                                exportOptions: {
                                                                columns: [':visible :not(:last-child)']
                                                                },
                                                            }, 
                                                            'colvis'   
                                                        ],

                                                        rowReorder: true,
                                                        columnDefs: columnDefsData,


                                                        initComplete: function () {
                                                                
                                                              var table2 =  this.api();  
                                                              $( reportOptions ).each(function( index ) {



                                                                   table2.columns(index).every(function () {
                                                                            var column = this;
                                                                            var input = document.createElement("input");
                                                                            input.classList.add("form-control");
                                                                            input.classList.add("text-center");
                                                                            input.classList.add("p-0");
                                                                            input.placeholder = "";
                                                                            $(input).appendTo($(column.footer()).empty())
                                                                            .on('keyup', function () {
                                                                                column.search($(this).val()).draw();
                                                                            });
                                                                        });

                                                                    

                                                                    

                                                                 }) 

                                                        }
                                            }); 


                                    } 


                                    else if($("#interface").val() == 'Table' && $("#report").val() == 'Results') {  



                                         $('#results').html(data);
                                         $('.Results').attr('style', 'display: block !important');

                                        
                                        const columnsData = [];
                                        const sortings = [0];
                                         const columnDefsData = [ { orderable: true, className: 'reorder', targets: sortings },{ orderable: false, targets: '_all' }];        
                                        //console.log(columnsData);

                                        console.log(reportOptions)
                                                        
                                                $( reportOptions ).each(function( index ) {

                                                    if(reportOptions[index].table2 == null) {
   
                                                    columnsData.push( {data: reportOptions[index].column_, name: reportOptions[index].column_} );

                                                    } else {


                                                    columnsData.push( {data: reportOptions[index].column_, name: reportOptions[index].table2+'.'+reportOptions[index].value2 } );

                                                    }


                                                    if(reportOptions[index].sorting == 1) {

                                                        sortings.push(index)

                                                    }
                                
                                                     })  

                                                columnsData.push();
                                    


                                             var table = $('#table').DataTable({
                                          
                                                 "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
                                                dom: 'lBfrtip', //"Bfrtip",


                                                processing: true,
                                                serverSide: true,
                                                // stateSave: true,
                                                ajax: {
                                                    url: "{{ route('getReportResult') }}",
                                                    method: 'POST',
                                                    data:{
                                                        
                                                        'report':"{{$data['report'][0]->name}}",
                                                        'date1':date1,
                                                        'date2':date2,
                                                        'group':group,
                                                        'user':user,
                                                        'role':role,
                                                        'department':department

                                                    },
                                                },
                                                 columns: columnsData,
                                                "order":[[0, 'asc']],

                                                 dom: "Blfrtip",
                                                        buttons: [
                                                        
                                                            {
                                                                title:"{{$data['report'][0]->name}}",
                                                                text: 'Excel',
                                                                footer: true,
                                                                extend: 'excelHtml5',
                                                                exportOptions: {
                                                                columns: [':visible :not(:last-child)']
                                                                },
                                                            },
                                                            {
                                                                text: 'Print',
                                                                title:"{{$data['report'][0]->name}}",
                                                                extend: 'print',
                                                                footer: true,
                                                                exportOptions: {
                                                                columns: [':visible :not(:last-child)']
                                                                },
                                                            }, 
                                                            'colvis'   
                                                        ],

                                                        rowReorder: true,
                                                        columnDefs: columnDefsData,


                                                        initComplete: function () {
                                                                
                                                              var table2 =  this.api();  
                                                              $( reportOptions ).each(function( index ) {



                                                                   table2.columns(index).every(function () {
                                                                            var column = this;
                                                                            var input = document.createElement("input");
                                                                            input.classList.add("form-control");
                                                                            input.classList.add("text-center");
                                                                            input.classList.add("p-0");
                                                                            input.placeholder = "";
                                                                            $(input).appendTo($(column.footer()).empty())
                                                                            .on('keyup', function () {
                                                                                column.search($(this).val()).draw();
                                                                            });
                                                                        });

                                                                    

                                                                    

                                                                 }) 

                                                        }
                                            }); 


                                    } 


                                    else {

                                          $('.Results').attr('style', 'display: block !important');  
                                          $('#results').html(data);  

                                    }
                            
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
