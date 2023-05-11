@include('layouts.header')
  
<style type="text/css">
/*.tableResutls td, .tableResutls th {
padding:5px;
vertical-align: top;
border-top: 1px solid #dee2e6;
text-align: center !important;
}
.tableResutls td:nth-child(2) {
text-align: left !important;
}
*/

#DataTables_Table_0_wrapper .dataTables_length {
    display: none;
}
#DataTables_Table_0_wrapper .dataTables_info {
    display: none;
}
#DataTables_Table_0_wrapper .dataTables_paginate  {
 display: none
}

.Pending {
    background: rgb(247 193 51 / 40%) !important;
}


  </style>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">
            
             @if(request()->segment(2) == 'SentToTheLab')   
             Sent To The Lab
             @elseif(request()->segment(2) == 'ReceivedInLab')   
             Received In Lab
             @elseif(request()->segment(2) == 'Progress')   
             In Progress
             @elseif(request()->segment(2) == 'AllStates')   
             All
             @else
             {{request()->segment(2)}}
             @endif
 

             <?php 
              $patient = request()->segment(3); 
             if($patient == '') {
                $patient = 'AllPatients';
             }

              $ward = request()->segment(4); 
             if($ward == '') {
                $ward = 'AllWards';
             }

              $type = request()->segment(5); 
             if($type == '') {
                $type = 'AllTypes';
             }

                

              ?>
        
        

          
          <a class="btn btn-success btn-sm" href="{{route('NewRequest')}}"><i class="fas fa-plus"></i> Request </a>
          

         
          <a class="btn btn-warning btn-sm" href="{{route('BTRequest')}}"><i class="fas fa-plus"></i> Blood Transfusion </a>
         

         
          <a class="btn btn-danger btn-sm" href="{{route('BatchRequesting')}}"><i class="fas fa-plus"></i> Batch Requesting </a>
         
                

           <a class="btn btn-info btn-sm" onclick="history.back()"><i class="fas fa-arrow-left"></i> GO BACK </a>
           

          <input type="hidden" id="userPassword" name="password">


            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Requests</li>
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
                           <form id="form">

                                <div class="card-body row">                  
                                        
                                            
                                                 <div class="col-md-3 mt-2 Daterange">
                                                 <label class="d-block">Date From / To <span>*</span></label>                    
                                                <input type="date" placeholder="" class="form-control" style="width:49%;display: inline-block;" id="date1" name="date1" value="{{$data['date1']}}">
                                                <input type="date" placeholder="" class="form-control" style="width:49%;display: inline-block;" id="date2" name="date2" value="{{$data['date2']}}">
                                                 </div>



                                                <div class="col-md-2  mt-2 Users" >
                                                <label>Clinician <span>*</span></label>
                                                <select class="form-control" name="clinician" id="clinician">
                                                    <option value="">All</option>
                                                     @foreach ($data['clinicians'] as $clinician)
                                                      <option value="{{$clinician->id}}">{{$clinician->Text}}</option>
                                                     @endforeach
                                                </select>
                                                </div>


                                                <div class="col-md-2  mt-2 Users" >
                                                <label>Ward <span>*</span></label>
                                                <select class="form-control" name="ward" id="ward">
                                                    <option value="">All</option>
                                                     @foreach ($data['wards'] as $ward)
                                                      <option value="{{$ward->id}}">{{$ward->Text}}</option>
                                                     @endforeach
                                                </select>
                                                </div>
                                                  

                                                 

                                          <?php  if(request()->segment(count(request()->segments())) == 'All') { ?>
                                               
                                                <div class="col-md-2 mt-2 Departments">
                                                <label>Status  <span>*</span></label>
                                                <select class="form-control" name="status" id="status">
                                                    <option value="">All</option>

                                                    <option>Cancelled</option>
                                                    <option>In Progress</option>
                                                    <option>Received in the lab</option>
                                                    <option>Requested</option>
                                                    <option>Results Ready</option>
                                                    <option>Sent to the lab</option>
                                                </select>
                                                </div>

                                             <?php  } ?> 
                                        
                                            
                                             <div class="col-md-2  mt-2 Users" >
                                                <label>Type <span>*</span></label>
                                                <select class="form-control" name="rtype" id="rtype">
                                                    <option value="">All</option>
                                                    <option value="BTRequest">Blood Transfusion</option>
                                                     <option value="Request">Regular Request</option>

                                                </select>
                                                </div>


                                        <div class="col-md-1">
                                             <label class="text-white d-block">.</label>
                                            <button title="Show Results"  type="button" style="padding: 4px;" class="btn btn-primary mt-2 showRequests"><i class="fas fa-search"></i> </button>

                                            <button title="Clear Search" type="button" style="padding: 4px;" class="btn btn-danger mt-2 clearSearch"><i class="fas fa-ban"></i></button>
                                        </div>         
                            </div>
                           </form>  
                        </div> 
                        
             


                         <div class="card card-primary card-outline">
                            <div class="card-body table-responsive">                  
                                <table id="table" class="table mb-0 table-striped">
                                  
                                  <thead>
                                    <tr>
                            
                                      <th>RID</th>
                                      <th>Episode</th>
                                      <th>MRN</th>
                                      <th>Patient</th>
                                      <th>Clinic</th>
                                      <th>Clinician</th>
                                      <th>Ward</th>
                                      <th>Bed</th>
                                      <th>Status</th>
                                      <th>UnSigned</th>
                                      <th>Exec.Time</th>
                                      <th>Created At</th>
                                      <th>Updated At</th>
                                      <th>Created By</th>
                                      <th>Updated By</th>
                                      <th></th>
                                   
                                    </tr>
                                  </thead> 

                                </table>                 
                            </div>
                        </div> 


                 <!-- Modal -->
                <div class="modal fade" id="requestCancel" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-md  modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white">Cancel Request # <span id="requestText1"></span></h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                      
                                  <input type="hidden" id="ridCancel">  
                                  <input type="hidden" id="eidCancel">     
                                  <!-- <textarea placeholder="Cancellation Reason ? " id="reason" class="form-control" rows="10"></textarea> -->
                                  <select name="reason" id="reason" placeholder="Cancellation Reason?"  class="form-select form-control">
                                    @foreach ($data['CRLists'] as $cr)
                                      <option>{{$cr->Text}}</option>
                                    @endforeach
                                  </select>

                                <button type="button" class="mt-2 btn btn-primary CancelRequest float-right">Cancel Request</button>
                                           
                                        

                                    </div>     

                           
                           
                        </div>
                    </div>
                </div> 
                



                 <!-- Modal -->
                <div class="modal fade" id="externalLabModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-md  modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white">Form External Lab - Request #  <span id="requestText2"></span></h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                      
                                 

                                      <div class="col-md-12">
                                      <input type="hidden" id="ridExt">  
                                      <input type="hidden" id="eidExt"> 

                                  <select class="form-control"  id="gp" name="gp">
                                      <option disabled selected value=""></option>
                                    @foreach ($data['GPs'] as $GP)
                                      <option value="{{$GP->id}}">{{$GP->GP_Name}} | {{$GP->GP_Practice_Address}} | {{$GP->GP_Practice_identifier}} </option>
                                      @endforeach
                                  </select>
                                  </div>

                                  <div class="col-md-12">
                                      <textarea placeholder="Notes ? " name="notes" id="notes" class="form-control mt-2" rows="5"></textarea>
                                  </div>

                                <button type="button" class="mt-2 btn btn-primary PrintExternalLab float-right">Generate Request Form</button>
                                        

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
<script src="https://cdn.datatables.net/fixedheader/3.2.2/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>


<script type="text/javascript">
    $(document).ready(function () {




  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $( "#clinician" ).select2({
                    placeholder:'Choose a Clinician',
                    allowClear:true
                   });


     $( "#ward" ).select2({
                    placeholder:'Choose a Ward',
                    allowClear:true
                   });

      $( "#status" ).select2({
                    placeholder:'Choose a Status',
                    allowClear:true
                   });


      $( "#gp" ).select2({
                    placeholder:'Choose a GP',
                    allowClear:true
                   });

      $( "#rtype" ).select2({
                    placeholder:'Choose a Request Type',
                    allowClear:true
                   }); 



$(document).on('click', '.clinicianID', function (event) { 


                
                    $('#clinician').val($(this).attr('id')).trigger('change');
                    $('.showRequests').trigger('click');


            });


$(document).on('click', '.wardID', function (event) { 


                
                    $('#ward').val($(this).attr('id')).trigger('change');
                    $('.showRequests').trigger('click');


            });

$(document).on('click', '.viewRequest', function (event) { 

                var id = $(this).attr('id');
                var rid = $(this).attr('data');
            
                
                $('.form-control-sm').val('.');
                $.ajax({
    type: 'post',
    url:"{{ route( 'viewRequestLog') }}",
     data: {
        'rid' : rid,
    },
    dataType: 'json',                   
    

     }).done(function(response){
      localStorage.setItem('viewRequest', rid);
window.location = id;

     });








                   
            });




$(document).on('click', '.clearSearch', function (event) { 

        var clinician = $('#clinician').val('').trigger('change');
        var ward = $('#ward').val('').trigger('change');
        var rtype = $('#rtype').val('').trigger('change');
        $('.showRequests').trigger('click');

})


    $(document).on('click', '.showRequests', function (event) { 


  var from_date = $('#date1').val();
  var to_date = $('#date2').val();
  var clinician = $('#clinician').val();
  var ward = $('#ward').val();
  var status = $('#status').val();
  var rtype = $('#rtype').val();
  var unsigned;



   $('#table').DataTable().destroy();
   load_data(from_date, to_date, clinician, ward, status, rtype, unsigned);
  
        });
 
 load_data();





function load_data(from_date = '', to_date = '', clinician = '', ward = '', status = '', rtype = '', unsigned = '')
 {


 var table = $('#table').DataTable({

         "lengthMenu": [ [10, 15, 25, 50, 100, 200, 500, -1], [10,15, 25, 50,100, 200, 500, "All"] ],
        dom: 'lBfrtip', //"Bfrtip",


        processing: true,
        serverSide: true,
        // stateSave: true,
        ajax: {
            url: "{{ route('Requests') }}",
            data: {
                state : "{{request()->segment(2)}}",
                patient : "{{$patient}}",
                from_date:from_date, 
                to_date:to_date, 
                clinician:clinician, 
                ward:ward, 
                status:status,
                rtype:rtype,
                unsigned:"{{request()->segment(6)}}",
            },
            method: 'POST'
        },
         columns: [
            {data: 'ReqestID', name: 'ReqestID'},
            {data: 'RequestEpisodeID', name: 'RequestEpisodeID'},
            {data: 'Chart', name: 'Chart'},
            {data: 'RequestPatientID', name: 'RequestPatientID'},
            {data: 'clinic', name: 'clinic'},
            {data: 'RequestClinician', name: 'RequestClinician'},
            {data: 'RequestWardID', name: 'RequestWardID'},
             {data: 'bed', name: 'bed'},
            {data: 'RequestState', name: 'RequestState'},
            {data: 'unsignedResults', name: 'unsignedResults'},
            // {data: 'ExecutionDateTime', name: 'ExecutionDateTime'},
            {data: 'ExecutionDateTime',
                    render: function (data, type, row) {
                        if(data != null) {
                           return moment(new Date(data).toString()).format('DD-MM-YYYY HH:mm');  
                        }else {

                            return '';
                        }
                     
                    }
                  },

            {data: 'RequestCreatedDateTime', name: 'RequestCreatedDateTime'},
            {data: 'RequestModifiedDateTime', name: 'RequestModifiedDateTime'},
            {data: 'RequestCreatedBy', name: 'RequestCreatedBy'},
            {data: 'RequestModifiedBy', name: 'RequestModifiedBy'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "pageLength": 15,
        "order":[[0, 'desc']],

         dom: "Blfrtip",

                buttons: [
                
                    {
                        title:'Requests',
                        text: 'Excel',
                        footer: true,
                        extend: 'excelHtml5',
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    },
                    {
                    title:'Requests', 
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
                        title:'Requests',
                        extend: 'print',
                        footer: true,
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    }, 
                     'colvis' 
                ],
                columnDefs: [
                {
                    orderable: false,
                    targets: -1
                },
                 { "visible": false, "targets": [1,4,11,12,13,14] }
                ], 

            });

                    new $.fn.dataTable.FixedHeader( table, {
                        // options
                    } );


                     setInterval( function () {
                        table.ajax.reload();
                    }, 500000 );


}


        if('{{request()->segment(4)}}' != '' && '{{request()->segment(4)}}' != 'AllWards') {

            $('#ward').val('{{request()->segment(4)}}').trigger('change');
             $('.showRequests').trigger('click');
        }


        if('{{request()->segment(5)}}' != '' && '{{request()->segment(5)}}' != 'AllTypes') {

            $('#rtype').val('{{request()->segment(5)}}').trigger('change');
             $('.showRequests').trigger('click');
        }

        


        $(document).on('click', '.addEpisode', function() {

  

                swal({
                  title: "Are you sure you want to add a new episode ?",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {

                    window.location = this.id;
 

                   } 

                });

                  $('.swal-button--cancel').html('Blood Transfusion').addClass('btn btn-danger btn-lg').removeClass('swal-button').attr('data',$(this).attr('data'));
                    $('.swal-button--confirm').html('Blood Sciences').addClass('btn btn-primary btn-lg');

            });

          $(document).on('click', '.swal-button--cancel', function() {
                    
                    window.location = '../requestPatientBT/'+$(this).attr('data');
            })




        $(document).on('click', '.delete', function() {


                         var rid = $(this).attr('rid');
                         var eid = $(this).attr('eid');
                                    $('#reason').val('');


                        $('#requestText1').text(rid)
                        $('#ridCancel').val(rid)
                        $('#eidCancel').val(eid)

                        $('#requestCancel').modal('show');


            });
             


                   $(document).on('click', '.CancelRequest', function () { 

                          
                                var rid2 = $('#ridCancel').val();
                                var eid2 = $('#eidCancel').val();
                                var reason = $('#reason').val();


                                if(reason == '' || reason == null) {

                                    Lobibox.notify('warning', {
                                          pauseDelayOnHover: true,
                                          continueDelayOnInactiveTab: false,
                                          position: 'top right',
                                          msg: 'Please enter the reason of cancellation.',
                                          icon: 'bx bx-info-circle',
                                          delayIndicator: false  
                                      }); 

                                } else {

                                     
                                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                                         $.ajax({
                                            type: 'get',
                                            url:"{{ route( 'deleteRequest') }}",
                                            data: {
                                                    ReqestID: rid2,
                                                    RequestEpisodeID: eid2, 
                                                    _token: CSRF_TOKEN,
                                                    reason:reason
                                                },
                                            dataType: 'json',                   
                                            success: function(response){ 
                                               
                                               $('#requestCancel').modal('hide');
                                                  $('#reason').val('');

                                                   $('#table').DataTable().destroy();
                                                   load_data();
                                                

                                                }
                                            });


                                          
                                           
                                }
                   })


                    
               $(document).on('click', '.externalLab', function() {


                         var rid = $(this).attr('rid');
                         var eid = $(this).attr('eid');

                        $('#requestText2').text(rid)
                        $('#ridExt').val(rid)
                        $('#eidExt').val(eid)

                        $('#externalLabModal').modal('show');


                    });




                     $(document).on('click', '.PrintExternalLab', function () { 

                                 var rid = $('#ridExt').val();
                                 var eid = $('#eidExt').val();
                                 var gp = $('#gp').val();
                                 var notes = $('#notes').val();


                                if(gp == '' || gp == null || notes == '' || notes == null) {

                                    Lobibox.notify('warning', {
                                          pauseDelayOnHover: true,
                                          continueDelayOnInactiveTab: false,
                                          position: 'top right',
                                          msg: 'Please fill in both info.',
                                          icon: 'bx bx-info-circle',
                                          delayIndicator: false  
                                      }); 

                                } else {


                                    
                                     
                                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                                         $.ajax({
                                            type: 'get',
                                            url:"{{ route( 'PrintExternalLab') }}",
                                            data: {
                                                    _token: CSRF_TOKEN,
                                                    ReqestID: rid,
                                                    RequestEpisodeID:eid, 
                                                    gp:gp, 
                                                    notes:notes
                                                    },
                                            dataType: 'json',                   
                                            success: function(response){ 
                                                   
                                                                                  
                                                $('#externalLabModal').modal('hide');
                                                 $('#notes').val('');
                        
                                                  window.open("{{ route( 'PrintRequestExternalLab') }}/"+rid+'/'+eid);

                                                       
                                                        
                                                       }
                                                });


                                          
                                           
                                }
                   })





                              

              

    });


</script>
@endpush
