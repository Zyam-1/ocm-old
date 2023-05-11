@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Batch Requesting 
                <a class="btn btn-info btn-sm" href="{{route('Requests')}}/All"><i class="fas fa-arrow-left"></i> GO BACK </a>
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

            <form id="form">
                 {{ csrf_field() }}

                         <div class="card card-primary card-outline">
                            <div class="card-body table-responsive">                  
                                
                     
                              
                                <div class="row">
                                            
                                    <div class="col-md-8 p-0">
                                      <h5 class="m-0 mb-1">
                                          <button type="button" id="addProduct" class="btn btn-warning mb-0 position-relative m"><i class="fas fa-plus"></i> Test / Profile</button>

   <button type="button" id="addMultiple" class="btn btn-info float-left mb-1 mr-1"><i class="fas fa-plus"></i> Add Profiles by Panels</button>
                                        </h5>
                                    </div>
   
                                  <div class="col-md-8">
                                    
                                    <div class="row">


                                        <div class="col-md-4 d-none d-sm-none d-md-block bg-secondary">
                                            <label class="col-form-label">Test / Profile <span>*</span></label> 
                                        </div>

                                      

                                        <div class="col-md-8 d-none d-sm-none d-md-block bg-secondary">
                                            <label class="col-form-label">Description</label> 
                                        </div>
                          
                       
                                     <div class="testList col-md-12">

                                        <div class="row mt-0 pb-1 rounded testInfo" id="1">
                                        
                                      

                                        <div class="col-md-4 bg-light  p-1">
                                            <label class="col-form-label d-sm-none d-md-none">Tests <span>*</span></label> 

                                            <input readonly="" type="hidden" class="form-control bg-white" id="sr" value="1" />
                                            <select class="input product form-control tests"  id="test" name="test[]" style="width: 100%;">
                                          
                                            @foreach ($data['quicktestprofiles'] as $quicktestprofile)
                                              <option data="{{$quicktestprofile->rcf}}" data2="{{$quicktestprofile->dppHours}}" data3="{{$quicktestprofile->diagnostics}}" value="{{$quicktestprofile->id}}">{{$quicktestprofile->name}}</option>
                                              @endforeach
                                              @foreach ($data['testprofiles'] as $testprofile)
                                              <option data="{{$testprofile->rcf}}" data2="{{$testprofile->dppHours}}" data3="{{$testprofile->diagnostics}}" value="{{$testprofile->id}}">{{$testprofile->name}}</option>
                                              @endforeach
                                            </select>

                                        </div>

                                  

                                     
                                        <div class="col-md-8 bg-light p-1"><label class="col-form-label d-sm-none d-md-none">Description </label>

                                        <div class="input-group">
                                         
                                            <textarea name="description[]" id="description" rows="1" class="form-control description" placeholder="Profile Description (optional)"></textarea>

                                          <div class="input-group-prepend">
                                            <span id="1" class="input-group-text btn bg-dark border border-dark remove"><i class="fas fa-times"></i></span>
                                          </div>
                                        </div>

                                        </div>
                                        

                                      </div>

                                     </div>

                                    </div>

                                  </div>  
        
                                  <div class="col-md-4">
                                    
                                    <div class="row">
                            

                                        <div class="col-md-12 d-none d-sm-none d-md-block bg-secondary">
                                            <label class="col-form-label">Execution Time <span>*</span></label> 
                                        </div>

                          
                       
                                     <div class="col-md-12">

                                        <div class="row mt-0 pb-1 rounded">
                                        
                                      

                                        <div class="col-md-12 bg-light  p-1">

                                           <input type="hidden" class="form-control" id="session" name="session" value="">


                                           <input type="datetime-local" class="form-control" name="datetime" value="{{$data['ExecutionDateTime']}}">
                                          
                                             <textarea name="description[]" id="description" rows="5" class="form-control description" placeholder="Request Notes (optional)"></textarea>
                                      


                                        </div>

                                  

                                     
                                        

                                      </div>

                                     </div>


                                    </div>

                                  </div>


                               <div class="col-md-12"><hr/></div>
                                        
                        
                                    <div class="col-md-12 p-0"><h5 class="m-0 mb-1">

            

                                      <button type="button" id="SelectPatientsByWard" class="btn btn-info mb-0 position-relative"><i class="fas fa-plus"></i> Add Multiple Patients</button>

                                      <button  type="button" id="addPatient" class="btn btn-warning  mb-0 position-relative mr-1"><i class="fas fa-plus"></i> Add Patient</button>

                                    </h5>
                                    </div>

                                        <div class="col-md-3 d-none d-sm-none d-md-block bg-secondary">
                                            <label class="col-form-label">Patient <span>*</span></label> 
                                        </div>

                                        <div class="col-md-2 d-none d-sm-none d-md-block bg-secondary">
                                            <label class="col-form-label">Clinician <span>*</span></label> 
                                        </div> 


                                        <div class="col-md-2 d-none d-sm-none d-md-block bg-secondary">
                                            <label class="col-form-label">Location <span>*</span></label> 
                                        </div>

                                        <div class="col-md-2 d-none d-sm-none d-md-block bg-secondary">
                                            <label class="col-form-label">Bed <span>*</span></label> 
                                        </div>

                                        <div class="col-md-3 d-none d-sm-none d-md-block bg-secondary">
                                            <label class="col-form-label">Priority <span>*</span></label> 
                                        </div>

                          
                       
                                     <div class="patientList col-md-12">

                                        <div class="row mt-0  pb-1 rounded patientInfo" id="100">
                                        
                                        <div class="col-md-3 bg-light px-1 py-2 pl-2">
                                           <input readonly="" type="hidden" class="form-control bg-white" id="sr2" value="100" />
                                            
                                            <select class="input product form-control patient"  id="patient" name="patient[]" style="width: 100%;">

                                           <!--  <option value=""></option> -->

                                            </select>

                                        </div>


                                         <div class="col-md-2 bg-light  px-1 py-2 ">
                                            <select class="input product form-control clinician"  id="clinician" name="clinician[]" style="width: 100%;">
                                            <option value=""></option>
                                            @foreach ($data['Clinicians'] as $Clinician)
                                              <option value="{{$Clinician->id}}">{{$Clinician->Text}} - {{$Clinician->Title}} {{$Clinician->ForeName}} {{$Clinician->SurName}}</option>
                                              @endforeach
                                            </select>
                                             <textarea  class="d-none form-control clinicalDetail" placeholder="Clinician Details" id="clinicalDetail" name="clinicalDetail[]"></textarea>
                                        </div>


                                        <div class="col-md-2 bg-light px-1 py-2">
                                            <select class="input product form-control ward"  id="ward" name="ward[]" style="width: 100%;">
                                              <option value=""></option>
                                            @foreach ($data['Wards'] as $Ward)
                                              <option value="{{$Ward->id}}">{{$Ward->Text}}</option>
                                              @endforeach
                                            </select>

                                        </div>


                                        <div class="col-md-2 bg-light px-1 py-2">
                                           
                                           <input type="text" placeholder="Bed" id="bed" name="bed[]" class="form-control bed">

                                        </div>

                                        <div class="col-md-3 bg-light px-1 py-2">
                                       
                                        <div class="input-group">
                                         
                                             <select class="form-control priority"  id="priority" name="priority[]">
                                           <option disabled selected >Priority *</option> 
                                           <option>Normal</option>
                                           <option>Urgent</option>
                                           </select>

                                          <div class="input-group-prepend">
                                             <button style="padding:0 10px;" type="button" title="Questions ?" class="questions btn btn-secondary">
                                            <i class="fas fa-question"></i>
                                          </button>
                                          <button style="padding:0 10px;" type="button" title="Clinician Notes" class="addnotes btn btn-secondary">
                                            <i class="fa fa-notes-medical"></i>
                                          </button> 
                                          <button id="100" style="padding:0 10px;" type="button" title="Remove Patient" class="remove2 btn btn-dark">
                                            <i class="fas fa-times"></i>
                                          </button> 
                                          </div>
                                        </div>


                                        
                                        </div>
                                        

                                      </div>

                                     </div>
        



                              
        


                                        
                                           </div>   
                               
                                          


                            </div>
                        </div>




                        </form>

                     <div class="row">
                       <div class="col-md-12 mb-3">
                         <button type="button" class="btn btn-primary SaveRequests float-right">Save Requests</button>

                       </div>
                     </div>
                                 


                <!-- Modal -->
                <div class="modal fade" id="SelectPatientsByWardModal"  aria-hidden="true">
                    <div class="modal-dialog modal-xl  modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white">Selecting Patients</h5>
                               <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <div class="row">
                            <div class="col-lg-12">
                    
                              
                                <form class="g-3"  id="form">
                                      {{ csrf_field() }}
                        
                                      <div class="row">
                                          

                                          <div class="col-md-3">
                                          <label>Select by Ward</label>
                                          <select class="form-control"  id="wards">
                                              <option disabled selected value=""></option>
                                            @foreach ($data['Wards'] as $Ward)
                                              <option value="{{$Ward->id}}">{{$Ward->Text}}</option>
                                              @endforeach
                                          </select>
                                          </div>

                                          <div class="col-md-2">
                                          <label class="text-white">.</label>
                                           <button type="button" class="search btn btn-block d-block p-1 px-2 btn-warning"><i class="fas fa-search"></i> Search</button>
                                          </div>


                                          <div class="col-md-2">
                                          <label class="text-white">.</label>
                                           <button type="button" class="selectAll btn btn-block d-block p-1 px-2 btn-danger"><i class="fas fa-check"></i> Select All</button>
                                          </div>


                                          <div class="col-md-2">
                                          <label class="text-white">.</label>
                                           <button type="button" class="deSelectAll btn btn-block d-block p-1 px-2 btn-info"><i class="fas fa-check"></i> Deselect All</button>
                                          </div>


                                          <div class="col-md-2">
                                          <label class="text-white">.</label>
                                           <button type="button" disabled class="addSelected btn btn-block d-block p-1 px-2 btn-success"> Add Selected Patients</button>
                                          </div>

                                      </div>  

                                </form>
                        


                           <div class="card card-primary card-outline mt-3">
                            <div class="card-body table-responsive">                  
                                <table id="table" class="table mb-0 table-striped w-100">
                                  
                                  <thead>
                                    <tr>
                            
                                      <th>MRN</th>
                                      <th>Name</th>
                                      <th>Gender</th>
                                      <th>Date Of Birth</th>
                                      <th>Ward</th>
                                      <th>Bed</th>
                                      <th>Clinician</th>
                                      <th>Address0</th>
                                      <th></th>

                                   
                                    </tr>
                                  </thead> 
                                </table>
                                
                            </div>
                          </div>        


                             
                            </div>
                        </div>

                            </div>
                           
                        </div>
                    </div>
                </div> 





                <!-- Modal -->
                <div class="modal fade" id="clinicalDetailModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-md  modal-dialog-centered">
                        <div class="modal-content">
                           <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white">Clinician Notes</h5>
                               <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <div class="row">
                            <div class="col-lg-12">
                    
                                  <input type="hidden" id="cdid">  
                                  <textarea id="cdvalue" class="form-control" rows="10"></textarea>

                                    <button type="button" class="btn btn-primary saveNotes float-right mt-2">Save</button>
                      
                             
                            </div>
                        </div>

                            </div>
                           
                        </div>
                    </div>
                </div> 


                <!-- Modal -->
                <div class="modal fade" id="questionsModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-md  modal-dialog-centered">
                        <div class="modal-content">
                           <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white">Questions</h5>
                               <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            
                            <div class="modal-body">

                              <input type="hidden" id="row_id">

                              <div class="row" id="questionsList"></div>


                            <div class="row">
                            <div class="col-lg-12">
                               <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary saveQuestion float-right mt-2">Save</button>
                            </div>
                            </div>

                            </div>
                           
                        </div>
                    </div>
                </div> 





                <!-- Modal -->
                <div class="modal fade" id="addMultipleModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-md  modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white">Selecting Panels</h5>
                               <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <div class="row">
                            <div class="col-lg-12">
                    
                              
                                <form class="g-3"  id="form">
                                      {{ csrf_field() }}
                        
                                      <div class="row">
                                          

                                       

                                          <div class="col-md-12">
                                           <button type="button" class="selectAll2 btn   p-1 px-2 btn-danger"><i class="fas fa-check"></i> Select All</button>

                                           <button type="button" class="deSelectAll2 btn   p-1 px-2 btn-info"><i class="fas fa-check"></i> Deselect All</button>

                                           <button type="button" disabled class="addSelected2 btn   p-1 px-2 btn-success"> Add Selected</button>
                                          </div>


                                      </div>  

                                </form>
                        


                           <div class="card card-primary card-outline mt-3">
                            <div class="card-body table-responsive">                  
                                <table id="table2" class="table mb-0 table-striped w-100">
                                  
                                  
                                   <thead>
                                    <tr>
                                      
                                      <th></th>  
                                      <th>Name</th>
                                      <th>Department</th>
                                      <th>Barcode</th>
                                      <th>InUse</th>
                                      <th>Created</th>
                                      <th>Updated</th>
                                      <th>Created By</th>
                                      <th>Updated By</th>
                                      <th></th>
                                   
                                    </tr>
                                  </thead> 

                                  <tfoot>
                                    <tr>
                                      
                                      <th></th>   
                                      <th>Name</th>
                                      <th>Department</th>
                                      <th>Barcode</th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                    
                                    </tr>
                                  </tfoot> 


                                </table>
                                
                            </div>
                          </div>        


                             
                            </div>
                        </div>

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
<script src="{{asset('plugins/moment.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function () {

     if(localStorage.getItem("request") != '') {

          $.get("{{route('ClearProfileQuestions')}}", 
               {
                session: localStorage.getItem("request"),
              }, 
              function(data){ });
        
      }


      var uniq = (new Date()).getTime();
      localStorage.setItem('request', uniq);
      var session = localStorage.getItem("request");
      $('#session').val(session);

       var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


               function patientList() {

                $( ".patient" ).select2({
                placeholder:'Choose a Patient',
                allowClear:true,

                   minimumInputLength:3,  
                     ajax: { 
                      url:"{{ route( 'GetPatientList') }}",
                      type: "post",
                      dataType: 'json',
                      delay: 250,
                      data: function (params) {
                        return {
                          _token: CSRF_TOKEN,
                          search: params.term // search term
                        };
                      },
                      processResults: function (response) {
                        //console.log(response)
                        return {
                          results: response

                        };
                      },
                      cache: true
                    }


               });

               }

               patientList()

               $( ".clinician" ).select2({
                placeholder:'Choose a Clinician',
                allowClear:true
               });

               $( ".ward" ).select2({
                placeholder:'Choose a location',
                allowClear:true,
                 width: 'resolve'
               });


               $(document).on('select2:select', '.patient', function () { 

                         var value =  this.value;
                            var tests =  $('.tests').val();
                            var text =  $(this).find('option:selected').text();


                             if(tests == null || tests == '') {

                              $(this).val(null).trigger("change"); 
                               Lobibox.notify('warning', {
                                              pauseDelayOnHover: true,
                                              continueDelayOnInactiveTab: false,
                                              position: 'top right',
                                              msg: 'Please select Profile first.',
                                              icon: 'bx bx-info-circle'
                                          });
                            return false;   
                            }


                       var this_ =  $('.patient');
                       var line = $(this).parents(".patientInfo").attr('id');


                        var all = $(".patient  option:selected").map(function() {
                            return this.value;
                          }).get();

                         
                         const hasDuplicates = (arr) => arr.length !== new Set(arr).size;
                        
                          if(hasDuplicates(all) == true) {

                            $(this).val(null).trigger("change"); 
                             Lobibox.notify('warning', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: 'Patient Already selected.',
                                            icon: 'bx bx-info-circle'
                                        });
                          return false;   
                          }


                     $.ajax({
                        
                        type: 'post',
                        url:"{{ route( 'GetPatientInfo') }}",
                        data: {'search' : this.value, _token: CSRF_TOKEN,},
                        dataType: 'json',                   
                        success: function(response){ 
                                  
                                  //console.log(response)
                                  $('#'+line).find('.clinician').val(response[0].ClinicianID).trigger('change');
                                  $('#'+line).find('.ward').val(response[0].WardID).trigger('change');
                                    
                                   if(response[0].RequestClinicalDetail != null) {
                                        
                                       $('#'+line).find('.clinicalDetail').val(response[0].RequestClinicalDetail);
                                        $('#'+line).find('.addnotes').removeClass('btn-secondary');
                                        $('#'+line).find('.addnotes').addClass('btn-success'); 
                                     }
                                      else {

                                        $('#'+line).find('.clinicalDetail').val(response[0].RequestClinicalDetail);
                                        $('#'+line).find('.addnotes').removeClass('btn-success');
                                        $('#'+line).find('.addnotes').addClass('btn-secondary'); 
                                     }

                            }
                        });



                        $.ajax({
                        
                        type: 'post',
                        url:"{{ route( 'refreshQuestions') }}",
                        data: {row : line, _token: CSRF_TOKEN, patient: value, session: session,},
                        dataType: 'json',                   
                        success: function(response){ 
                              


                            }
                        });




               })  


               $(document).on('click', '.addnotes', function () { 

                    var line = $(this).parents(".patientInfo").attr('id');
                    var clinicalDetail = $('#'+line).find('.clinicalDetail').val();
                        

                $('#clinicalDetailModal').modal('show'); 


                $('#clinicalDetailModal').on('shown.bs.modal', function (e) {
                    
                    $("#cdvalue").focus();
                    $('#cdid').val(line);
                    $('#cdvalue').val(clinicalDetail);

                 })

                    
               })


               $(document).on('click', '.questions', function () { 

                    var row = $(this).parents(".patientInfo").attr('id');
                    var patient =  $('#'+row).find('.patient').val();
                                   $('#row_id').val(row)  

                
                      var profiles = $(".tests  option:selected").map(function() {
                        return this.value;
                      }).get();

                      // console.log(row)  
                      // console.log(patient)
                      // console.log(profiles)

                $('#questionsModal').modal({backdrop: 'static', keyboard: false})         
                $('#questionsModal').modal('show'); 

                var session = $('#session').val(); 
                //alert(session)   

                  $.ajax({
                        type: 'post',
                        url:"{{ route( 'getQuestions') }}",
                        data: {row : row, _token: CSRF_TOKEN, patient: patient, profiles: profiles, session: session,},
                        dataType: 'json',                   
                        success: function(data){ 
                            
                                  
                if(data.length > 0) {


                    var questionsList = '';

                    $('#questionsList').html('');


                     $( data ).each(function( index ) { 

                        questionsList =  '<div style="font-size:13px;" class="text-capitalize col-md-5"><label>'+data[index].question+'</label></div><div class="col-sm-7 text-right text-capitalize"> <div class="form-group clearfix answersList-'+index+'"></div></div><div class="text-capitalize col-md-12"><hr class="mt-1"/></div>';

                         $('#questionsList').append(questionsList);
                        
                     
                       if(data[index].answers != null) {

                        var answers = data[index].answers.split(",");

                        } else {

                           var answers = '';
                        }

              
                  
                    const answer = data[index].answer;
           
                        var checked = '';

       

                            if(answers == '') {


                           $('.answersList-'+index).append('<input class="form-control acheck"  data="'+data[index].id+'"   type="text"  placeholder="Answers"> ');


                              } else {

                            $( answers ).each(function( index2 ) {  


                              if(answers[index2] == answer) {
                                 checked = 'checked';
                              } else {
                                 checked = '';
                              } 


                               $('.answersList-'+index).append(' <div class="icheck-success d-inline"> <input class="acheck"  data="'+data[index].id+'" data2="'+answers[index2]+'" '+checked+' type="radio" name="answer-'+data[index].id+'[]"  id="'+answers[index2]+index+'"> <label for="'+answers[index2]+index+'"> '+answers[index2]+' </label> </div>');

                             })

                      }

                     
                     })            


                }

                            }
                        });

                    
               })






                $(document).on('keyup click', '.acheck', function (e) { 

                  var id = $(this).attr('data');
                  var answer = $(this).attr('data2');
                 
                  if(answer == '' || answer == undefined) {

                    answer = $(this).val();
                  }


                   $.get("{{route('SaveProfileQuestions')}}", 
                     {
                      id: id,
                      answer: answer,
                    },
                     function(data){



                     });


                })

                
                $(document).on('click', '.saveQuestion', function () { 

                  var row_id = $('#row_id').val();
                  var patient =  $('#'+row_id).find('.patient').val();

                   if(row_id != ''&& patient != '') {

                       $('#'+row_id).find('.questions').removeClass('btn-secondary');
                       $('#'+row_id).find('.questions').addClass('btn-success'); 
                   }

                    
               })

                


               $(document).on('click', '.saveNotes', function () { 

                   var cdid = $('#cdid').val();
                   var cdvalue = $('#cdvalue').val();   
                   var clinicalDetail = $('#'+cdid).find('.clinicalDetail').val(cdvalue);
                   $('#clinicalDetailModal').modal('hide'); 

                   if(cdvalue != '') {

                       $('#'+cdid).find('.addnotes').removeClass('btn-secondary');
                       $('#'+cdid).find('.addnotes').addClass('btn-success'); 
                   }

                    
               })

               

               $('#priority').val('Normal').trigger('change');

               $( "#priority" ).select2({
                placeholder:'Priority',
                allowClear:true
               });


               function addPatient(pid,name,ward,clinician,clinicalDetail) {



                var noOfDivs = $('.patientInfo').length;
                var checkList = 0;


                  
                var id = $('.patientList > .row:last').attr('id');

                    if($('#'+id).find('.patient').val() == null) {

                                if(pid != undefined) {

                                     var patient = new Option(name, pid, true, true);
                                     $('#'+id).find('.patient').append(patient).trigger('change'); 
                                     $('#'+id).find('.clinician').val(clinician).trigger('change');
                                     $('#'+id).find('.ward').val(ward).trigger('change');
                                     $('#'+id).find('.bed').val('');
                                     $('#'+id).find('.priority').val('Normal').trigger('change');
                                     
                                     if(clinicalDetail == '' || clinicalDetail == null) {

                                        $('#'+id).find('.addnotes').removeClass('btn-success');
                                        $('#'+id).find('.addnotes').addClass('btn-secondary'); 

                                     } else {
                                        
                                       $('#'+id).find('.clinicalDetail').val(clinicalDetail);
                                        $('#'+id).find('.addnotes').removeClass('btn-secondary');
                                        $('#'+id).find('.addnotes').addClass('btn-success'); 
                                     }
                                     
       
                                      } else {

                                     $('#'+id).find('.patient').val('').trigger('change');
                                     $('#'+id).find('.clinician').val('').trigger('change');
                                     $('#'+id).find('.clinicalDetail').val('');
                                     $('#'+id).find('.ward').val('').trigger('change');
                                     $('#'+id).find('.bed').val('');
                                     $('#'+id).find('.priority').val('Normal').trigger('change');

                                      }

                    }
                     
                     if(pid != undefined) {


                     const all = $(".patient  option:selected").map(function() {
                            
                            if(this.value == pid) {
                                      
                                      checkList = 1;     

                                      }

                          }).get();

                         if(checkList == 0) {


                         $('.patient').select2("destroy");
                         $('.clinician').select2("destroy");
                         $('.ward').select2("destroy");
                         $('.priority').select2("destroy");
                         
                                       
                          var clonedDiv = $('.patientInfo').first().clone(true);
                              clonedDiv.appendTo(".patientList");

                           patientList()
                      
                             $( ".clinician" ).select2({
                                placeholder:'Choose a Clinician',
                                allowClear:true
                               });

                               $( ".ward" ).select2({
                                placeholder:'Choose a location',
                                allowClear:true,
                                 width: 'resolve'
                               });

                                $( ".priority" ).select2({
                                placeholder:'Choose a Clinician',
                                allowClear:true
                               });

                               $( ".ward" ).select2({
                                placeholder:'Choose a location',
                                allowClear:true,
                                 width: 'resolve'
                               });

                              
                          var id = parseFloat(id)+1;
                                  $('.patientList > .row:last').attr('id',id);
                                  $('#'+id).find('#sr2').val(parseFloat(id));
                                  $('#'+id).find('.remove2').attr('id',parseFloat(id));

                          var id = $('.patientList > .row:last').attr('id');


                                   $('#'+id).find('.addnotes').removeClass('btn-success'); 
                                   $('#'+id).find('.addnotes').addClass('btn-secondary'); 



                                   if(pid != undefined) {

                                     var patient = new Option(name, pid, true, true);
                                     $('#'+id).find('.patient').append(patient).trigger('change'); 
                                     $('#'+id).find('.clinician').val(clinician).trigger('change');
                                     $('#'+id).find('.ward').val(ward).trigger('change');
                                     $('#'+id).find('.bed').val('');
                                     $('#'+id).find('.priority').val('Normal').trigger('change');

                                     $('#'+id).find('.clinicalDetail').val(''); 


                                       
                                     if(clinicalDetail == '' || clinicalDetail == null) {

                                        $('#'+id).find('.addnotes').removeClass('btn-success');
                                        $('#'+id).find('.addnotes').addClass('btn-secondary'); 

                                     } else {
                                        
                                       $('#'+id).find('.clinicalDetail').val(clinicalDetail);
                                        $('#'+id).find('.addnotes').removeClass('btn-secondary');
                                        $('#'+id).find('.addnotes').addClass('btn-success'); 
                                     }
                                            
                            
                                      } else {

                                   $('#'+id).find('.patient').val('').trigger('change');
                                   $('#'+id).find('.clinician').val('').trigger('change');
                                   $('#'+id).find('.clinicalDetail').val('');
                                   $('#'+id).find('.ward').val('').trigger('change');
                                   $('#'+id).find('.bed').val('');
                                   $('#'+id).find('.priority').val('Normal').trigger('change');

                                      }


                         }

                        } else {


                         $('.patient').select2("destroy");
                         $('.clinician').select2("destroy");
                         $('.ward').select2("destroy");
                         $('.priority').select2("destroy");
                         
                                       
                          var clonedDiv = $('.patientInfo').first().clone(true);
                              clonedDiv.appendTo(".patientList");

                           patientList()
                      
                             $( ".clinician" ).select2({
                                placeholder:'Choose a Clinician',
                                allowClear:true
                               });

                               $( ".ward" ).select2({
                                placeholder:'Choose a location',
                                allowClear:true,
                                 width: 'resolve'
                               });

                                $( ".priority" ).select2({
                                placeholder:'Choose a Clinician',
                                allowClear:true
                               });

                               $( ".ward" ).select2({
                                placeholder:'Choose a location',
                                allowClear:true,
                                 width: 'resolve'
                               });

                               
                              
                          var id = parseFloat(id)+1;
                                  $('.patientList > .row:last').attr('id',id);
                                  $('#'+id).find('#sr2').val(parseFloat(id));
                                  $('#'+id).find('.remove2').attr('id',parseFloat(id));

                          var id = $('.patientList > .row:last').attr('id');


                                   $('#'+id).find('.addnotes').removeClass('btn-success'); 
                                   $('#'+id).find('.addnotes').addClass('btn-secondary'); 


                                    $('#'+id).find('.questions').removeClass('btn-success'); 
                                    $('#'+id).find('.questions').addClass('btn-secondary'); 

                                   if(pid != undefined) {

                                     var patient = new Option(name, pid, true, true);
                                     $('#'+id).find('.patient').append(patient).trigger('change'); 
                                     $('#'+id).find('.clinician').val(clinician).trigger('change');
                                     $('#'+id).find('.ward').val(ward).trigger('change');
                                     $('#'+id).find('.bed').val('');
                                     $('#'+id).find('.priority').val('Normal').trigger('change');
                                     
                                        
                                     if(clinicalDetail == '' || clinicalDetail == null) {

                                        $('#'+id).find('.addnotes').removeClass('btn-success');
                                        $('#'+id).find('.addnotes').addClass('btn-secondary'); 

                                     } else {
                                        
                                       $('#'+id).find('.clinicalDetail').val(clinicalDetail);
                                        $('#'+id).find('.addnotes').removeClass('btn-secondary');
                                        $('#'+id).find('.addnotes').addClass('btn-success'); 
                                     }

                            
                                      } else {

                                     $('#'+id).find('.patient').val('').trigger('change');
                                     $('#'+id).find('.clinician').val('').trigger('change');
                                     $('#'+id).find('.clinicalDetail').val('');
                                     $('#'+id).find('.ward').val('').trigger('change');
                                     $('#'+id).find('.bed').val('');
                                     $('#'+id).find('.priority').val('Normal').trigger('change');

                                      }

                        }




                               
               }

                $(document).on('click', '#addPatient', function (e) { 
        
                           var value =  this.value;
                            var tests =  $('.tests').val();
                            var text =  $(this).find('option:selected').text();


                             if(tests == null || tests == '') {

                              $(this).val(null).trigger("change"); 
                               Lobibox.notify('warning', {
                                              pauseDelayOnHover: true,
                                              continueDelayOnInactiveTab: false,
                                              position: 'top right',
                                              msg: 'Please select Profile first.',
                                              icon: 'bx bx-info-circle'
                                          });
                            return false;   
                            }

                           addPatient();

               });





             $(document).on('click', '#SelectPatientsByWard', function () { 

                 var value =  this.value;
                            var tests =  $('.tests').val();
                            var text =  $(this).find('option:selected').text();


                             if(tests == null || tests == '') {

                              $(this).val(null).trigger("change"); 
                               Lobibox.notify('warning', {
                                              pauseDelayOnHover: true,
                                              continueDelayOnInactiveTab: false,
                                              position: 'top right',
                                              msg: 'Please select Profile first.',
                                              icon: 'bx bx-info-circle'
                                          });
                            return false;   
                            }


                $('#SelectPatientsByWardModal').modal('show'); 


                $('#SelectPatientsByWardModal').on('shown.bs.modal', function (e) {
                    $("#mrn").focus();
                    $( "#clinicians" ).select2({
                    placeholder:'Choose a Clinician',
                    allowClear:true
                   });

                   $( "#wards" ).select2({
                    placeholder:'Choose a Ward',
                    allowClear:true
                   });
                 })
            


             })


             $(document).on('select2:select', '#clinician', function () { 

 
            $('.clinicianInfo').attr('style', 'display: block !important');


             })





           $('.tests').select2({
                
                placeholder:'Choose a Profile',
                matcher: function(params, data) {
                        
                        // Do not display the item if there is no 'text' property
                        if (typeof data.text === 'undefined')
                        { return null; }
                        
                        // If there are no search terms, return all of the data
                        if (params.term === '' || typeof params.term === 'undefined') { 
                            return data; 
                        } else {
                            // `params.term` is the user's search term
                            // `data.id` should be checked against
                            // `data.text` should be checked against
                            // console.log(params.term.toLowerCase());
                            var q = params.term.toLowerCase();

                             
      

                       
                            if (data.text.toLowerCase().indexOf(q) > -1 || $(data.element).attr('data3').toLowerCase().indexOf(q) > -1) {
                                return $.extend({}, data, true);
                            }
                        }

                        // Return `null` if the term should not be displayed
                        return null;
                    }

            });

            $('.tests').val(null).trigger("change"); 


             $(document).on('select2:open', '.tests', function () { 
            
                    $('.select2-search__field').attr('placeholder','Search by Name or Diagnostics');
           })    



            var data = @json($data);
            var mode = data['mode'];
            var OCMRequest = data['OCMRequest'];
            var OCMRequestDetails = data['OCMRequestDetails'];
            var OCMRequestQuestionsDetails = data['OCMRequestQuestionsDetails'];






          $(document).on('click', '#addProduct', function (e) { 
        

               $('.tests').select2("destroy");

                var noOfDivs = $('.testInfo').length;
                             

                var id = $('.testList > .row:last').attr('id');


                var clonedDiv = $('.testInfo').first().clone(true);
                    clonedDiv.appendTo(".testList");

                 $('.tests').select2({
                
                                      placeholder:'Choose a Profile',
                                          matcher: function(params, data) {
                                                  
                                                  // Do not display the item if there is no 'text' property
                                                  if (typeof data.text === 'undefined')
                                                  { return null; }
                                                  
                                                  // If there are no search terms, return all of the data
                                                  if (params.term === '' || typeof params.term === 'undefined') { 
                                                      return data; 
                                                  } else {
                                                      // `params.term` is the user's search term
                                                      // `data.id` should be checked against
                                                      // `data.text` should be checked against
                                                      // console.log(params.term.toLowerCase());
                                                      var q = params.term.toLowerCase();

                                
                 
                                                      if (data.text.toLowerCase().indexOf(q) > -1 || $(data.element).attr('data3').toLowerCase().indexOf(q) > -1) {
                                                          return $.extend({}, data, true);
                                                      }
                                                  }

                                                  // Return `null` if the term should not be displayed
                                                  return null;
                                              }

                                      });

                    
                var id = parseFloat(id)+1;
                        $('.testList > .row:last').attr('id',id);
                        $('#'+id).find('#sr').val(parseFloat(id));
                        $('#'+id).find('.remove').attr('id',parseFloat(id));

                var id = $('.testList > .row:last').attr('id');
                         $('#'+id).find('.tests').val('').trigger('change');
                         $('#'+id).find('#description').val('');

        });


            $(document).on('select2:select', '.tests', function () { 
          
                var all = $(".tests  option:selected").map(function() {
                  return this.value;
                }).get();

               
               const hasDuplicates = (arr) => arr.length !== new Set(arr).size;
              
                if(hasDuplicates(all) == true) {

                  $(this).val(null).trigger("change"); 
                   Lobibox.notify('warning', {
                                  pauseDelayOnHover: true,
                                  continueDelayOnInactiveTab: false,
                                  position: 'top right',
                                  msg: 'Profile Already selected.',
                                  icon: 'bx bx-info-circle'
                              });
                return false;   
                }

           })


              

                   function load_data( wards = '')
                     {
                        var table = $('#table').DataTable({

                        
                        "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
                        dom: 'frtip', //"Bfrtip",


                        processing: true,
                        serverSide: true,
                        pageLength:10,
                        // stateSave: true,
                        ajax: {
                            url:'{{ route("PatientList2") }}',
                            data:{wards:wards}
                           },
                         columns: [
                            {data: 'Chart', name: 'Chart'}, 
                            {data: 'PatName', name: 'PatName'}, 
                            {data: 'Sex', name: 'Sex'},
                            {data: 'DoB', name: 'DoB'},
                            {data: 'Wards', name: 'Wards'},
                            {data: 'BedNumber', name: 'BedNumber'},
                            {data: 'Clinicians', name: 'Clinicians'},
                            {data: 'Address0', name: 'Address0'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ],
                        "order":[[1, 'asc']]
                            });

                        }


              $(document).on('click', '.search', function (event) { 



                var wards = $('#wards').val();

                 $(".addSelected").prop("disabled", true);
                 $('#table').DataTable().destroy();
                 load_data(wards);
   
                      });
               
                  load_data();


                   $('#table tbody').on( 'click', 'tr', function () {
                  
                        $(this).toggleClass('selected');
                        
                        if($("#table").DataTable().rows('.selected').data().length > 0) {

                                  $(".addSelected").prop("disabled", false);
                             } else {

                                 $(".addSelected").prop("disabled", true);
                             }

                       });


                      $(document).on('click', '.selectAll ', function (e) {

                            $('#table tbody tr').addClass("selected");
                            if($("#table").DataTable().rows('.selected').data().length > 0) {

                                  $(".addSelected").prop("disabled", false);
                             } 

                        });

                       $(document).on('click', '.deSelectAll ', function (e) {
  
                            $('#table tbody tr').removeClass("selected");
                             $(".addSelected").prop("disabled", true);

                        });
                        

                     $(document).on('click', '.addSelected', function (e) {
                           
     

                              var ids = $.map($("#table").DataTable().rows('.selected').data(), function (item) {
                                    return item;
                                });
                                console.log(ids)
                                
                                if($("#table").DataTable().rows('.selected').data().length > 0) {



                                   $( ids ).each(function( index ) {

                                        addPatient(ids[index].id,ids[index].PatName,ids[index].WardID,ids[index].ClinicianID,ids[index].RequestClinicalDetail) 

                                    })

                                    $('#SelectPatientsByWardModal').modal('hide');   

                                }


                        });                           


                
            
               
             $(document).on('click', '.remove', function (e) { 


                  var tests =  $('.testInfo');
                        
                      if(tests.length == 1) {

                         Lobibox.notify('warning', {
                                pauseDelayOnHover: true,
                                continueDelayOnInactiveTab: false,
                                position: 'top right',
                                msg: 'Atleast add 1 Test / Profile.',
                                icon: 'bx bx-info-circle'
                            });

                      }  else {

                         var id = '#'+this.id;
                         if(this.id == 1) {
                            $('.testList  .testInfo:first').remove();
                         } else {
                          $('.testList  '+id).remove();
                        }
                      }
                    

            }); 


              $(document).on('click', '.remove2', function (e) { 


                  var tests =  $('.patientInfo');
                        
                      if(tests.length == 1) {

                         Lobibox.notify('warning', {
                                pauseDelayOnHover: true,
                                continueDelayOnInactiveTab: false,
                                position: 'top right',
                                msg: 'Atleast add 1 Patient.',
                                icon: 'bx bx-info-circle'
                            });

                      }  else {

                         var id = '#'+this.id;
                         if(this.id == 1) {
                            $('.patientList  .patientInfo:first').remove();
                         } else {
                          $('.patientList  '+id).remove();
                        }
                      }
                    

            }); 
            

  




            //add and update js code

                $(".SaveRequests").click(function (event) {


                        $(".SaveRequests").prop("disabled", true);

                        //stop submit the form, we will post it manually.
                        event.preventDefault();

                        // Get form
                        var form = $('#form')[0];

                        // Create an FormData object
                        var data = new FormData(form);


                        $.ajax({
                            type: "POST",
                            enctype: 'multipart/form-data',
                            url: "{{ route('saveRequests') }}",
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
                                          
                                         window.location = "{{route('Requests')}}/All"; 
                                         $(".AddUpdatebtn").prop("disabled", false);       

                                    } else {
                                         Lobibox.notify('warning', {
                                                pauseDelayOnHover: true,
                                                continueDelayOnInactiveTab: false,
                                                position: 'top right',
                                                msg: data.error,
                                                icon: 'bx bx-info-circle'
                                            });
                                         $(".SaveRequests").prop("disabled", false);
                                    }
                                }



                            });

                           

                    });



               






             $(document).on('click', '#addMultiple', function () { 




                $('#addMultipleModal').modal('show'); 


             })

                
        







                    

                 $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });


                 var table = $('#table2').DataTable({

                         "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
                        dom: 'frtip', //"Bfrtip",


                        processing: true,
                        serverSide: true,
                        // stateSave: true,
                        ajax: {
                            url: "{{ route('Panels') }}",
                            data:{InUse:1},
                            method: 'POST'
                        },
                        select: true,  
                         columns: [
                            {data: 'listorder', name: 'listorder'},
                            {data: 'name', name: 'name'},
                            {data: 'department', name: 'Lists.Text'},
                            {data: 'barcode', name: 'barcode'},
                            {data: 'InUse', name: 'InUse'},
                            {data: 'created_at', name: 'created_at'},
                            {data: 'updated_at', name: 'updated_at'},
                            {data: 'created_by', name: 'created_by'},
                            {data: 'updated_by', name: 'updated_by'},
                            {data: 'action', name: 'action', orderable: false, searchable: false},
                        ],
                        "order":[[0, 'asc']],

  
                                buttons: [
                                
                                    {
                                        title:'Panels',
                                        text: 'Excel',
                                        footer: true,
                                        extend: 'excelHtml5',
                                        exportOptions: {
                                        columns: [':visible :not(:last-child)']
                                        },
                                    },
                                    {
                                    title:'Panels', 
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
                                        title:'Panels',
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
                                { "visible": false, "targets": [0,4,5,6,7,8,9] }
                                ], 



                        initComplete: function () {
                             
                             this.api().columns(1).every(function () {
                                var column = this;
                                var input = document.createElement("input");
                                input.classList.add("form-control");
                                input.classList.add("text-center");
                                input.classList.add("p-0");
                                input.placeholder = "Name";
                                $(input).appendTo($(column.footer()).empty())
                                .on('keyup', function () {
                                    column.search($(this).val()).draw();
                                });
                            });

                             this.api().columns(2).every(function () {
                                var column = this;
                                var input = document.createElement("input");
                                input.classList.add("form-control");
                                input.classList.add("text-center");
                                input.classList.add("p-0");
                                input.placeholder = "Department";
                                $(input).appendTo($(column.footer()).empty())
                                .on('keyup', function () {
                                    column.search($(this).val()).draw();
                                });
                            });

                             this.api().columns(3).every(function () {
                                var column = this;
                                var input = document.createElement("input");
                                input.classList.add("form-control");
                                input.classList.add("text-center");
                                input.classList.add("p-0");
                                input.placeholder = "Barcode";
                                $(input).appendTo($(column.footer()).empty())
                                .on('keyup', function () {
                                    column.search($(this).val()).draw();
                                });
                            });
                           
                               
                        }
                    });
                    



                  $('#table2 tbody').on( 'click', 'tr', function () {
                  
                        $(this).toggleClass('selected');
                        
                        if($("#table2").DataTable().rows('.selected').data().length > 0) {

                                  $(".addSelected2").prop("disabled", false);
                             } else {

                                 $(".addSelected2").prop("disabled", true);
                             }

                       });


                      $(document).on('click', '.selectAll2', function (e) {

                            $('#table2 tbody tr').addClass("selected");
                            if($("#table2").DataTable().rows('.selected').data().length > 0) {

                                  $(".addSelected2").prop("disabled", false);
                             } 

                        });

                       $(document).on('click', '.deSelectAll2', function (e) {
  
                            $('#table2 tbody tr').removeClass("selected");
                             $(".addSelected2").prop("disabled", true);

                        });



                     $(document).on('click', '.addSelected2', function (e) {
                           
     

                              var ids = $.map($("#table2").DataTable().rows('.selected').data(), function (item) {
                                    return item.id;
                                });
                                //console.log(ids)


                                   var profileIDs = $(".tests  option:selected").map(function() {
                                        return this.value;
                                      }).get();


                                 if(profileIDs != '') {

                                               var separator = ',';
                                               var implodedArray = '';
                                      
                                                for(let i = 0; i < profileIDs.length; i++) {
                                      
                                                    // add a string from original array
                                                    implodedArray += profileIDs[i];
                                      
                                                    // unless the iterator reaches the end of
                                                    // the array add the separator string
                                                    if(i != profileIDs.length - 1){
                                                        implodedArray += separator; 
                                                    }
                                                }
                                                
                                                // console.log(implodedArray);

                                               }


                                
                                if($("#table2").DataTable().rows('.selected').data().length > 0) {


                                    let panelIDs = ids.join(",");

                                   $.get("{{route('getProfiles')}}", 
                                                   {
                                                    panelIDs : panelIDs,
                                                    existingProfileIDs :implodedArray
                                                  }, 
                                                  function(response){ 

                                                     // console.log(response)
                                   
                                                          if(response.length > 0) {

                                                              $( response ).each(function( index ) {  
                                                                    
                                                                    var ProfileID = response[index].ProfileID;
                                                                    var ProfileName = response[index].ProfileName;

                                                                
                                                                  // console.log(ProfileID)
                                                                   

                                                                    if(ProfileID > 0 ) {

                                                                      var id = $('.testList > .row:last').attr('id');   
                                            
                                                                        
                                                                          if($('#'+id+'.testInfo').find('.tests').val() == null) {

                                                            



                                                                    $('#'+id+'.testInfo').find('.tests').val(ProfileID).trigger('change'); 

                                                                    

                                                 



                                                                         } else  {


                                                                       $('.tests').select2("destroy");

                                                                        var noOfDivs = $('.testInfo').length;
                                                                        var id = $('.testList > .row:last').attr('id');
                                                                        var clonedDiv = $('.testInfo').first().clone();
                                                                            clonedDiv.appendTo(".testList");

                                                                        $('.tests').select2({
                                                    
                                                                          placeholder:'Choose a Profile',
                                                                              matcher: function(params, data) {
                                                                                      
                                                                                      // Do not display the item if there is no 'text' property
                                                                                      if (typeof data.text === 'undefined')
                                                                                      { return null; }
                                                                                      
                                                                                      // If there are no search terms, return all of the data
                                                                                      if (params.term === '' || typeof params.term === 'undefined') { 
                                                                                          return data; 
                                                                                      } else {
                                                                                          // `params.term` is the user's search term
                                                                                          // `data.id` should be checked against
                                                                                          // `data.text` should be checked against
                                                                                          // console.log(params.term.toLowerCase());
                                                                                          var q = params.term.toLowerCase();

                                                                    
                                                     
                                                                                          if (data.text.toLowerCase().indexOf(q) > -1 || $(data.element).attr('data3').toLowerCase().indexOf(q) > -1) {
                                                                                              return $.extend({}, data, true);
                                                                                          }
                                                                                      }

                                                                                      // Return `null` if the term should not be displayed
                                                                                      return null;
                                                                                  }

                                                                          });
                                                                            
                                                                        var id = parseFloat(id)+1;
                                                                            $('.testList > .row:last').attr('id',id);
                                                                            $('#'+id+'.testInfo').find('.remove').attr('id',parseFloat(id));
                                                                  

                                                                    

                                                                    $('#'+id+'.testInfo').find('.tests').val(ProfileID).trigger('change'); 




                                                                    } 

                                                                  var patient =  $('#patient').val();
                                                                  var this_ = $('#'+id+'.testInfo').find('.tests');
                                                                  
                                                                   loadQuestions(session)


                                                                        if(this_.find('option:selected').attr('data') == 1) {

                                                                         Lobibox.notify('info', {
                                                                                          pauseDelayOnHover: true,
                                                                                          continueDelayOnInactiveTab: false,
                                                                                          position: 'top right',
                                                                                          msg: ProfileName+' requires a consent form.',
                                                                                          icon: 'bx bx-info-circle',
                                                                                          delay: 5000000,                // Hide notification after this time (in miliseconds)
                                                                                          delayIndicator: false  
                                                                                      }); 

                                                                        }
                                                                                                                               
                                                                                                                                                                                    
                                                                     }

                                                              })

                                                             
                                                          }
                                                  });

                                    $('#addMultipleModal').modal('hide');   

                                }


                        });   



    function loadQuestions(session) {


       
        var profileIDs = $(".tests  option:selected").map(function() {
              return this.value;
            }).get();


       if(profileIDs != '') {

                      separator = ',';
                      implodedArray = '';
            
                      for(let i = 0; i < profileIDs.length; i++) {
            
                          // add a string from original array
                          implodedArray += profileIDs[i];
            
                          // unless the iterator reaches the end of
                          // the array add the separator string
                          if(i != profileIDs.length - 1){
                              implodedArray += separator; 
                          }
                      }
                      
                       //console.log(implodedArray);

                        $.get("{{route('ClearProfileQuestions')}}", 
                             {
                              session: localStorage.getItem("request"),
                            }, 
                            function(data){


                             $.get("{{route('GetProfileQuestions')}}", 
               {
                id: implodedArray,
                session: session,
              }, 
              function(data){
              
               //console.log(data)

                 if(data.length > 0) {


                // $('#questions').modal('show'); 
                  
                 // $('#questions').on('shown.bs.modal', function (e) {

                    var questionsList = '';


                    $('#questionsList').html('');

                     //console.log(data);

                     $( data ).each(function( index ) { 

                        questionsList =  '<div style="font-size:13px;" class="text-capitalize col-md-5"><label>'+data[index].question+'</label></div><div class="col-sm-7 text-right text-capitalize"> <div class="form-group clearfix answersList-'+index+'"></div></div><div class="text-capitalize col-md-12"><hr class="mt-1"/></div>';

                         $('#questionsList').append(questionsList);
                        
                     
                       if(data[index].answers != null) {

                        var answers = data[index].answers.split(",");

                        } else {

                           var answers = '';
                        }

              
                  
                    const answer = data[index].answer;
           
                        var checked = '';

       

                         if(answers == '') {


                        
                                $('.answersList-'+index).append('<input class="form-control acheck"  data="'+data[index].id+'"   type="text"  placeholder="Answers"> ');


                              } else {

                            $( answers ).each(function( index2 ) {  


                              if(answers[index2] == answer) {
                                 checked = 'checked';
                              } else {
                                 checked = '';
                              } 


                               $('.answersList-'+index).append(' <div class="icheck-success d-inline"> <input class="acheck"  data="'+data[index].id+'" data2="'+answers[index2]+'" '+checked+' type="radio" name="answer-'+data[index].id+'[]"  id="'+answers[index2]+index+'"> <label for="'+answers[index2]+index+'"> '+answers[index2]+' </label> </div>');

                             })

                      }

                     
                     })

            

                } else {

                    $('#questionsList').html('<div class="col-md-12">...</div>');
                }
              
              });

               });



            }
                     


      }




                $(document).on('select2:open', '#test', function () { 

                    $(".select2-search__field")[0].focus();
               })

                 $(document).on('select2:open', '#patient', function () { 

                    $(".select2-search__field")[0].focus();
               })

                  $(document).on('select2:open', '#wards', function () { 

                    $(".select2-search__field")[0].focus();
               })


         

     })  

</script>
        
@endpush
