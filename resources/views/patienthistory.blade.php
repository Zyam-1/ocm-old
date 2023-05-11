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
table {
    width: Auto;
}
.table {
    width: auto !important;
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
            
            Patient History
        
        <a class="btn btn-info btn-sm" href="{{route('Patients')}}/All"><i class="fas fa-plus"></i> Go to Patient List </a>

                

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
                                        
                                                
                                                


                                                <div class="col-md-2  mt-2">
                                                <label>Patient MRN</label>
                                                 <input placeholder="Enter Patient MRN" class="form-control" type="text" id="mrn" value="<?php if($data['type'] == 'demo') { echo $data['patient']['Chart']; }
                                                 else {
                                                  echo $data['patient'][0]->Chart;
                                                 }?> ">
                                                </div> 

                                                    

                                                   <div class="col-md-4 mt-2 Daterange">
                                                 <label class="d-block">Date From / To <span>*</span></label>                    
                                                <input type="date" placeholder="" class="form-control" style="width:49%;display: inline-block;" id="date1" name="date1" value="<?php if($data['type'] == 'demo') { echo $data['date1']; }
                                                 else {
                                                  echo $data['date1'];
                                                 }?>">
                                                <input type="date" placeholder="" class="form-control" style="width:49%;display: inline-block;" id="date2" name="date2" value="<?php if($data['type'] == 'demo') { echo $data['date2']; }
                                                 else {
                                                  echo $data['date2'];
                                                 }?>">
                                                 </div>

                                                  <div class="col-md-2  mt-2">
                                                <label>Department</label>
                                                 <select class="form-control" id="department" name="department">
                                                     
                                                      @foreach ($data['departments'] as $department)
                                                        <option value="{{$department->id}}">{{$department->Text}}</option>
                                                       @endforeach

                                                 </select>
                                                </div> 



                                               
                                   

                                        <div class="col-md-2">
                                             <label class="text-white d-block">.</label>
                                             
                                            <button title="Show Results"  type="button" style="padding: 4px;" class="btn btn-primary mt-2 showRequests "><i class="fas fa-search"></i></button>

                                         </div>


                            </div>
                           </form>  
                        </div> 
                        
             


                         <div class="card card-primary card-outline">
                            <div class="card-body table-responsive"> 
                         
                                        <h3> Patient Demographics</h3>
                                        <div class="well Demographics">
                                                
                                                <p class="mb-2">Patient : <?php if($data['type'] == 'demo') { echo $data['patient']['PatName']; }
                                                 else {
                                                  echo $data['patient'][0]->PatName;
                                                 }?> </p>
                                                <p class="mb-2">MRN #  <?php if($data['type'] == 'demo') { echo $data['patient']['Chart']; }
                                                 else {
                                                  echo $data['patient'][0]->Chart;
                                                 }?> </p>
                                                <p class="mb-2">Date of Birth : <?php if($data['type'] == 'demo') { echo \App\Http\Controllers\Controller::Date($data['patient']['DoB']); }
                                                 else {
                                                  echo \App\Http\Controllers\Controller::Date($data['patient'][0]->DoB);
                                                 }?> </p>
                                                <p class="mb-2">Address : <?php if($data['type'] == 'demo') { echo $data['patient']['Addr0']; }
                                                 else {
                                                  echo $data['patient'][0]->Address0;
                                                 }?> </p>
                                        </div>
                               <div id="result" style="font-weight:bold; font-size:20px;"></div>      
                            </div>
                        </div> 



                         <!-- Modal -->
                <div class="modal fade" id="comments" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl  modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white"><span id="testText"></span> - Patient Trend Results</h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body" id="chartResults">


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
<script src="{{ asset('plugins/dataTables.fixedHeader.min.js') }}" type="text/javascript"></script>

<script type="text/javascript" src="{{asset('plugins/Chart.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('plugins/chartjs-plugin-annotation.min.js')}}"></script>


<script type="text/javascript">

    $(document).ready(function () {

        $('#department').select2();
        
       $(document).on('click', '.viewPatientHistoryChart', function() { 

                            var mrn = $('#mrn').val();
                            var code = $(this).attr('id');
                            var date1 = $('#date1').val();
                            var date2 = $('#date2').val();

                            var segments      = location.pathname.split('/');
                            r = segments[segments.length - 3];


                            $('#chartResults').html('');


                            $('#comments').modal('show');
                            $('#testText').text(code);


                             $.ajax({
                                    type: 'get',
                                    url:"{{ route( 'getChartResults') }}",
                                    data: {
                                                mrn: mrn,
                                                code: code,
                                                date1:date1,
                                                date2:date2,
                                                r:r
                                            },                  
                                            success: function(response){ 

                                                  

                                                    $('#chartResults').html(response);


                                               }
                                        });



       })

        
       $(document).on('click', '.showRequests', function() {

        // var a=

        var segments      = location.pathname.split('/');

        r = segments[segments.length - 3];
   
        

         r2 = segments[segments.length - 1];
         
        //  var type = segments[segments.length - 2];
     
        if(r2=='Biochemistry'){
         $('#department').val('1270').trigger('change');
        }
        if(r2=='Coagulation'){
         $('#department').val('1297').trigger('change');
        }
        if(r2=='Haematology'){
         $('#department').val('1277').trigger('change');
        }
        if(r2=='External'){
         $('#department').val('1487').trigger('change');
        }
      
        r3 = segments[segments.length - 2];

        // alert(secondLastSegment);
                            var mrn = $('#mrn').val();
                            var date1 = $('#date1').val();
                            var date2 = $('#date2').val();
                            var department = $('#department').val();
                            $('#result').html('');
                            var deptName = $('#department').find(":selected").text();
                            console.log(deptName);

                            if(deptName.localeCompare('Blood Transfusion') == 0) {
                              
                              $.ajax({
                                      type: 'get',
                                      url:"{{ route( 'checkPatient') }}",
                                      data: {
                                                  mrn: mrn,
                                              },                  
                                              success: function(response){ 
                                                console.log(response);
                                                if(response.success==true){
                                                  window.location.href="{{ route( 'PatientHistoryBT') }}/"+mrn;
                                                }  else {
                                                  $('#result').html("No Result");

                                                }
                                              }
                                          });
                                      }
                            if(deptName.localeCompare('Microbiology') == 0) {

                              $.ajax({
                                      type: 'get',
                                      url:"{{ route( 'checkMicroPatient1') }}",
                                      data: {
                                                  mrn: mrn,
                                              },                  
                                              success: function(response){ 
                                                console.log(response);
                                                if(response.success==true){
                                                  window.location.href="{{ route( 'checkMicroPatient') }}/"+mrn;
                                                }  else {
                                                  $('#result').html("No Result");
                                                  
                                                }
                                              }
                                          });
                                      }

             else if(deptName == 'Biochemistry' || deptName == 'Coagulation' || deptName == 'Haematology' || deptName == 'External') { 
                // alert('correct bio');
               $.ajax({
                      type: 'get',
                      url:"{{ route( 'getPatientHistory') }}",
                      data: {
                                  mrn: mrn,
                                  date1:date1,
                                  date2:date2,
                                  department:department,
                                  r:r,
                                  r3:r3

                              },                  
                              success: function(response){ 

                                    

                                      $('#result').html(response);

                                      $('.flagL').addClass('btn-info');
                                      $('.flagH').addClass('btn-danger');





                                  }
                          });

                     }
                        
                 })


       $(".showRequests").trigger('click');


     })   

</script>

@endpush
