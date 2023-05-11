@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

     <!-- Main content -->
    <div class="content">
      <div class="container-fluid">




                        <div class="card card-primary card-outline">
                            <div class="card-body table-responsive">  


                                  <div class="row">
            
                                     <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">


                                    <li class="nav-item">
                                      <a data="all" class="nav-link departments active px-4" id="alltab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">All Departments</a>

                                    </li>
                                     
                                    

                                     <?php foreach($data['wards'] as $key => $ward) { ?>   


                                    <li class="nav-item">
                                      <a data="{{$ward->id}}" class="nav-link departments  px-4" id="ID_{{$ward->id}}tab" data-toggle="pill" href="#ID_{{$ward->id}}" role="tab" aria-controls="ID_{{$ward->id}}" aria-selected="false">{{$ward->Text}}</a>
                                    </li>


                                           <?php  } ?>

                                     
                                    <li class="nav-item">
                                    <select class="form-control" style="width:200px" id="department_">
                                      <option value="" disabled selected>Choose a Department</option>
                                       <?php foreach($data['allwards'] as $key => $ward) { ?> 
                                        <option value="{{$ward->id}}">{{$ward->Text}}</option>
                                       <?php  } ?>

                                    </select>
                                    </li>
                                            
                                       


                                  </ul>


                                    <div class="col-md-12">



                                  <div class="tab-content py-1" id="custom-content-below-tabContent">
                                  

                                     <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="alltab">
                                            

                                          <div class="row">
                                                             

                                                <div class="col-md-3  mt-1">
                                                  <!-- Widget: user widget style 2 -->
                                                 <a href="Requests/AllStates/AllPatients/AllWards/BTRequest/ThisWeek">
                                                    <div class="card card-widget mb-0  widget-user-2 bg-primary">
                                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                                    <div class="widget-user-header">

                                                      <h2><i class="fas fa-envelope float-right display-5"></i></h2>
                                                      <h4 id="btRequestsThisWeek">{{$data['btRequestsThisWeek']}}</h4>
                                                      <h5>BT Requests This Week</h5>
                                                    </div>
                                                  </div>
                          
                                                 </a>
                                                </div>
                                                <!-- /.col -->


                                                <div class="col-md-3  mt-1">
                                                  <!-- Widget: user widget style 2 -->
                                                    <a id="Requests" href="Requests/AllStates/AllPatients/AllWards/Request/ThisWeek">
                                                  <div class="card card-widget mb-0  widget-user-2 bg-danger">
                                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                                    <div class="widget-user-header">

                                                      <h2><i class="fas fa-file-medical float-right display-5"></i></h2>
                                                      <h4 id="thisWeek">{{$data['requestsThisWeek']}}</h4>
                                                      <h5>Requests This Week</h5>
                                                    </div>
                                                  </div>
                                                  <!-- /.widget-user -->
                                                </a>
                                                </div>
                                                <!-- /.col -->

                                                  <div class="col-md-3  mt-1">
                                                  <!-- Widget: user widget style 2 -->
                                                   <a id="Progress" href="Requests/Progress/AllPatients/AllWards/AllTypes/Pending">
                                                  <div class="card card-widget mb-0  widget-user-2 bg-success">
                                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                                    <div class="widget-user-header">

                                                      <h2><i class="fas fa-vials float-right display-5"></i></h2>
                                                      <h4 id="pendingThisWeek">{{$data['pendingRequestsThisWeek']}}</h4>
                                                      <h5>Pending Requests</h5>
                                                    </div>
                                                  </div>
                                                </a>
                                                  <!-- /.widget-user -->
                                                </div>
                                                <!-- /.col -->

                                                 <div class="col-md-3 mt-1">
                                                  <a id="Resulted" href="Requests/Resulted/AllPatients/AllWards/AllTypes/Unsigned">
                                                  <div class="card card-widget mb-0  widget-user-2 bg-dark">
                                                   <div class="widget-user-header">
                                                       <h2><i class="fas fa-file float-right display-5"></i></h2>
                                                       <h4 id="newResults">{{$data['unreadResults']}}</h4>
                                                       <h5 class="">Unsigned Results</h5>
                                                    </div>
                                                  </div>
                                                </a>
                                                  </div>

                                          </div>


                                    </div>



                                     <?php foreach($data['wards'] as $key => $ward) { ?>   
                       
                                           
                                     <div class="tab-pane fade" id="ID_{{$ward->id}}" role="tabpanel" aria-labelledby="ID_{{$ward->id}}tab">
                                                  

                                               <div class="row">
                                                             

                                                <div class="col-md-3  mt-1">
                                                  <!-- Widget: user widget style 2 -->
                                                 <a href="Requests/AllStates/AllPatients/{{$ward->id}}/BTRequest">
                                                    <div class="card card-widget mb-0  widget-user-2 bg-primary">
                                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                                    <div class="widget-user-header">

                                                      <h2><i class="fas fa-envelope float-right display-5"></i></h2>
                                                      <h4><span id="btRequestsThisWeek{{$ward->id}}">{{$data['btRequestsThisWeek']}}</span></h4>
                                                      <h5>BT Requests This Week</h5>
                                                    </div>
                                                  </div>
                                                  <!-- /.widget-user -->
                                                 </a>
                                                </div>
                                                <!-- /.col -->


                                                <div class="col-md-3  mt-1">
                                                  <!-- Widget: user widget style 2 -->
                                                    <a href="Requests/AllStates/AllPatients/{{$ward->id}}/Request">
                                                  <div class="card card-widget mb-0  widget-user-2 bg-danger">
                                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                                    <div class="widget-user-header">

                                                      <h2><i class="fas fa-file-medical float-right display-5"></i></h2>
                                                      <h4><span id="thisWeek{{$ward->id}}"><?php echo rand(4,20);?></span> </h4>
                                                      <h5>Requests This Week</h5>
                                                    </div>
                                                  </div>
                                                  <!-- /.widget-user -->
                                                </a>
                                                </div>
                                                <!-- /.col -->

                                                  <div class="col-md-3  mt-1">
                                                  <!-- Widget: user widget style 2 -->
                                                   <a href="Requests/Progress/AllPatients/{{$ward->id}}">
                                                  <div class="card card-widget mb-0  widget-user-2 bg-success">
                                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                                    <div class="widget-user-header">

                                                      <h2><i class="fas fa-vials float-right display-5"></i></h2>
                                                      <h4><span id="pendingThisWeek{{$ward->id}}">{{$data['pendingRequestsThisWeek']}}</span></h4>
                                                      <h5>Pending Requests</h5>
                                                    </div>
                                                  </div>
                                                </a>
                                                  <!-- /.widget-user -->
                                                </div>
                                                <!-- /.col -->

                                                 <div class="col-md-3 mt-1">
                                                  <a href="Requests/Resulted/AllPatients/{{$ward->id}}">
                                                  <div class="card card-widget mb-0  widget-user-2 bg-dark">
                                                   <div class="widget-user-header">
                                                       <h2><i class="fas fa-file float-right display-5"></i></h2>
                                                       <h4><span id="newResults{{$ward->id}}">{{$data['pendingRequestsThisWeek']}}</span></h4>
                                                        <h5>Unsigned Results</h5>
                                                    </div>
                                                  </div>
                                                  </a>
                                                  </div>

                                          </div>


                                    </div>


                                           <?php  } ?>
                               

                                  </div>


                                    </div>


                               </div>
            

                          <div class="mt-3 mb-0">
                              
                              <h4>Critical Results <a href="Messages" class="btn btn-warning btn-xs float-right mb-1 px-2">Go to Inbox</a></h4>             
                                <table id="table" class="table mb-0 table-striped">
                                  
                                  <thead>
                                    <tr>
                            
                                      <th>ID</th>
                                      <th>Sender</th>
                                      <th>Receiver</th>
                                      <th style="width:50%;">Subject</th>
                                      <th>Message</th>
                                      <th>Request</th>
                                      <th>Sample</th>
                                      <th>Status</th>
                                      <th>Date Time</th>
                                      <th>Read at</th>
                                      <th></th>
                                   
                                    </tr>
                                  </thead> 


                                </table>  

                          </div> 


                            </div>
                        </div> 


        <div class="row">
         

         <?php foreach($data['reports'] as $key => $report) {    

      if($report['interface'] == 'Bar Chart' || $report['interface'] == 'Line Chart' || $report['interface'] == 'Pie Chart' ) {
        

        ?> 

          
         <div class="col-lg-12">
            <form id="form<?=$key?>"> 
              <input type="hidden" value="{{$report['id']}}" name="id"> 
              <input type="hidden" value="{{$report['interface']}}" id="interface<?=$key?>">   
              <input type="hidden" value="{{$report['report']}}" id="report<?=$key?>">  
            <div class="card  card-primary card-outline">
              <div class="card-body">
                <div class="row m-0">
                  

                                        <?php 

                                            $filters = $report['reportFilterOptions'];
                                            $users = '';
                                            $roles = '';
                                            $departments = '';

                                            if(count($filters) > 0) {

                                                ?>
                                                <div class="col-md-2 my-2">
                                                <select class="form-control" name="date" id="date<?=$key?>">
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

                                                 <div class="col-md-   my-2 Daterange<?=$key?> d-none">                  
                                                <input type="date" placeholder="" class="form-control" style="width:49%;display: inline-block;" id="date1<?=$key?>" name="date1" value="{{$report['date1']}}">
                                                <input type="date" placeholder="" class="form-control" style="width:49%;display: inline-block;" id="date2<?=$key?>" name="date2" value="{{$report['date2']}}">
                                                 </div>

                                                <?php 
                                               

                                                if($users == 'yes' || $roles == 'yes' || $departments == 'yes') {

                                                    ?>
                                                <div class="col-md-2 my-2">
                                                <select class="form-control" name="group" id="group<?=$key?>">
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

                                                <div class="col-md-2 my-2 Users<?=$key?> d-none">
                                                <select class="form-control" name="user" id="user<?=$key?>">
                                                    <option>All</option>
                                                     @foreach (\App\Http\Controllers\reports::Users() as $user)
                                                      <option value="{{$user->id}}">{{$user->name}}</option>
                                                     @endforeach
                                                </select>
                                                </div>
                                                  

                                                 

                                                <div class="col-md-2 my-2 Roles<?=$key?> d-none">
                                                <select class="form-control" name="role" id="role<?=$key?>">
                                                    <option>All</option>
                                                     @foreach (\App\Http\Controllers\reports::Roles() as $role)
                                                      <option value="{{$role->id}}">{{$role->Text}}</option>
                                                     @endforeach
                                                </select>
                                                </div>
                                                  


                                          
                                                <div class="col-md-2 my-2 Departments<?=$key?> d-none">
                                                <select class="form-control" name="department" id="department<?=$key?>">
                                                    <option>All</option>
                                                     @foreach (\App\Http\Controllers\reports::Departments() as $department)
                                                      <option value="{{$department->id}}">{{$department->name}}</option>
                                                     @endforeach
                                                </select>
                                                </div>
                                        
                                            <?php  }  ?> 

                                             <div class="col-md-2 d-none">
                                            <button style="padding: 4px;" class="btn btn-primary mt-2 float-right btn-block getReport<?=$key?>"><i class="fas fa-search"></i> Get Report</button>
                                        </div> 
                </div>
      

                <div class="row Results<?=$key?>">
                  <div class="col-md-12" id="results<?=$key?>"></div>
                </div>

              </div>
            </div>
            <!-- /.card -->
              </form>
          </div>

          <!-- /.col-md-12 -->
        <?php }  } ?>


       


            <!-- Modal -->
                <div class="modal fade" id="messagebox" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-md  modal-dialog-centered">
                        <div class="modal-content">
                           <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white"><span id="subjectText"></span></h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                    Message
                                    <div id="messageText"></div>

                            </div>
                        </div>
                    </div>
                </div> 



        </div>
        <!-- /.row -->
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
<script src="{{ asset('plugins/charts.js') }}"></script>
<script>
  /* global Chart:false */

function getRndInteger(min, max) {
  return Math.floor(Math.random() * (max - min + 1) ) + min;
}

function random_rgba() {
    var o = Math.round, r = Math.random, s = 255;
    return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + 0.5 + ')';
}

$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true





})



$(document).ready(function () {


  $('#department_').select2();

                $(document).on('click', '.departments', function () {


                    if($(this).attr('href') == 'home') {

                        location.reload();

                    }

                })


   $(document).on('select2:select', '#department_', function () { 


              


                      
                    var ward = $(this).val();
                    var wardName = $("#department_  option:selected").text();

                        $.ajax({
                              type: "get",
                              url:"{{ route( 'getDepartmentStates') }}",
                              data: {'data' : ward},
                              timeout: 600000,
                              success: function(data) {
                                    
                                       // console.log(data)

                                        
                                        var btRequestsThisWeek = data.btRequestsThisWeek;
                                        var thisWeek = data.requestsThisWeek;
                                        var pendingThisWeek = data.pendingRequestsThisWeek;
                                        var newResults = data.unreadResults;

                                        $('#btRequestsThisWeek').text(btRequestsThisWeek);
                                        $('#thisWeek').text(thisWeek);
                                        $('#pendingThisWeek').text(pendingThisWeek);
                                        $('#newResults').text(newResults);
                                       
                                       $('.nav-tabs > li > a').removeClass('active')
                                       $('#alltab').tab('show')

                                       $('#alltab').html(wardName+'&nbsp; <i class="fas fa-sync"></i>');
                                       $('#alltab').attr('href','home');

                                    
                                  }
                              });


                



                })


  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

 var table = $('#table').DataTable({

         "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],

        processing: true,
        serverSide: true,
        // stateSave: true,
        ajax: {
            url: "{{ route('Messages') }}",
            data:{status:'unread'},
            method: 'POST'
        },
         columns: [
            {data: 'id', name: 'id'},
            {data: 'assignedfrom', name: 'assignedfrom'},
            {data: 'assignedto', name: 'assignedto'},
            {data: 'subject', name: 'subject'},
            {data: 'message', name: 'message'},
            {data: 'request', name: 'request'},
            {data: 'sampleid', name: 'sampleid'},
            {data: 'status', name: 'status'},
            {data: 'datetime',
                    render: function (data, type, row) {
                      return moment(new Date(data).toString()).format('DD-MM-YYYY HH:mm');
                    }
                  },
            {data: 'datetimeread',
                render: function (data, type, row) {
                  return moment(new Date(data).toString()).format('DD-MM-YYYY HH:mm');
                }
              },
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "order":[[8, 'desc']],

         dom: "",
                buttons: [
                
                    {
                        title:'TestProfiles',
                        text: 'Excel',
                        footer: true,
                        extend: 'excelHtml5',
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    },
                    {
                    title:'TestProfiles', 
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
                        title:'TestProfiles',
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
                { "visible": false, "targets": [0,2,4,5,7,9] }
                ], 

               
                 "createdRow": function( row, data, dataIndex ) {

          
                    $(row).children(':nth-child(2)').addClass('ShowMessage').css('cursor','pointer').attr('title','View Message');

                }


             });
      

                    


                $(document).on('click', '.departments', function () {
                       
                       var ward = $(this).attr('data');

                        $.ajax({
                              type: "get",
                              url:"{{ route( 'getDepartmentStates') }}",
                              data: {'data' : ward},
                              timeout: 600000,
                              success: function(data) {
                                    
                                       // console.log(data)

                                        
                                        var btRequestsThisWeek = data.btRequestsThisWeek;
                                        var thisWeek = data.requestsThisWeek;
                                        var pendingThisWeek = data.pendingRequestsThisWeek;
                                        var newResults = data.unreadResults;

                                        $('#btRequestsThisWeek'+ward).text(btRequestsThisWeek);
                                        $('#thisWeek'+ward).text(thisWeek);
                                        $('#pendingThisWeek'+ward).text(pendingThisWeek);
                                        $('#newResults'+ward).text(newResults);
                                    
                                  }
                              });

                 });



                $('#table tbody').on('click', '.ShowMessage', function () {
                       var data = table.row($(this).closest('tr')).data();

                        $('#messagebox').modal('show');
                        $('#subjectText').text(data[Object.keys(data)[2]]);
                        $('#messageText').text(data[Object.keys(data)[3]]);
                 });


                        var data = @json($data);
                        var reports = data.reports;
                        //console.log(reports);


                               $( reports ).each(function( index ) { 


                                 $(document).on('change', '#date'+index, function () {


                                $('.Daterange'+index).attr('style', 'display: none !important');

                                if(this.value == 'Custom Date') {

                                 $('.Daterange'+index).attr('style', 'display: block !important');
                                  
                                }

                                             $.ajax({
                                                  type: "get",
                                                  url:"{{ route( 'getDates') }}",
                                                  data: {'id' : this.value},
                                                  timeout: 600000,
                                                  success: function(data) {
                                                     
                                                      $('#date1'+index).val(data.date1)
                                                      $('#date2'+index).val(data.date2)
                                                       $('.getReport'+index).trigger('click');
                                                        
                                                      }
                                                  });

                                  })


                                 $(document).on('change', '#group'+index, function () { 


                                          $('.Users'+index).attr('style', 'display: none !important');
                                          $('.Roles'+index).attr('style', 'display: none !important');
                                          $('.Departments'+index).attr('style', 'display: none !important');

                                          if(this.value == 'Users') {

                                              $('.Users'+index).attr('style', 'display: block !important');
                                          }

                                          if(this.value == 'Roles') {


                                              $('.Roles'+index).attr('style', 'display: block !important');
                                          }

                                          if(this.value == 'Departments') { 

                                              $('.Departments'+index).attr('style', 'display: block !important');
                                          }

                                           $('.getReport'+index).trigger('click');

                                  })


                                   $(document).on('change', '#user'+index, function () { 

                                     
                                           $('.getReport'+index).trigger('click');

                                  })

                                    $(document).on('change', '#role'+index, function () { 

                                     
                                           $('.getReport'+index).trigger('click');

                                  })


                                     $(document).on('change', '#department'+index, function () { 

                                     
                                           $('.getReport'+index).trigger('click');

                                  })









            //add and update js code

            $(".getReport"+index).click(function (event) {



                    var date1 = $('#date1'+index).val();
                    var date2 = $('#date2'+index).val();
                    var group = $('#group'+index).val();




                        $('.'+group+index).attr('style', 'display: Block !important');
            



                    var user = $('#user'+index).val();
                    var role = $('#role'+index).val();
                    var department = $('#department'+index).val();

                    $('.Results'+index).attr('style', 'display: none !important');
                    //stop submit the form, we will post it manually.
                    event.preventDefault();

                    // Get form
                    var form = $('#form'+index)[0];

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

                                    



                                          $('.Results'+index).attr('style', 'display: block !important');  
                                          $('#results'+index).html(data);  

                             
                                                
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

                             

                                          var exists = false; 
                                                $('#date'+index+'  option').each(function(){
                                                  if (this.value == 'This Week') {
                                                    exists = true;
                                                  }
                                                });
                                        
                                            if(exists == true) {

                                                $('#date'+index).val('This Week'); 
                                            } 
                                            else {

                                                $('#date'+index).val();
                                            }
 
              

                                        
                                              $.ajax({
                                                  type: "get",
                                                  url:"{{ route( 'getDates') }}",
                                                  data: {'id' : $('#date'+index).val()},
                                                  timeout: 600000,
                                                  success: function(data) {
                                                     
                                                      $('#date1'+index).val(data.date1)
                                                      $('#date2'+index).val(data.date2)
                                                      $('#group'+index+' option:nth-child(2)').attr('selected', 'selected');
                                                      $('.getReport'+index).trigger('click');
                                                        
                                                      }
                                                  });


                                              


                                         
                              



                               })





            


    });

</script>

@endpush

