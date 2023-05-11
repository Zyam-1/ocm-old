@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Blood Transfusion Request Info 
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


                         <div class="card card-primary card-outline">
                            <div class="card-body table-responsive">                  
                                
                                 <form id="form">
                                              {{ csrf_field() }}
                                            <div class="row">
                                            
                                   
   


                                     <div class="col-md-4">

                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary border border-primary"><i class="fas fa-user"><span>*</span></i> </span>
                                          </div>
                                          <select class="form-control patient"  id="patient" name="patient"></select>
                                          <input type="hidden" name="id" id="id">
                                          <input type="hidden" name="session" id="session">
                                        </div>

                                        <div class="card card-primary card-outline d-none patientInfo">
                                          <div class="card-body box-profile p-0 px-2 pt-1">
                                           

                                            <h3 class="profile-username text-center mt-0" id="patname">Patient Name</h3>

                                            <p class="text-muted text-center m-1">
                                                <span id="patSex">Male</span> / 
                                                <span id="patage">00</span> yrs
                                            </p>
                                            <p class="text-muted text-center m-1 mb-2" id="pataddress">London, United Kingdom</p>

                                            <ul class="list-group list-group-unbordered mb-3">
                                              
                                              <li class="list-group-item p-1">
                                                <b>MRN</b> <a class="float-right" id="patmrn">0000000</a>
                                              </li>
                                              <li class="list-group-item p-1">
                                                <b>Chart</b> <a class="float-right" id="patchart">0000000</a>
                                              </li>
                                              <li class="list-group-item p-1">
                                                <b>Date Of Birth</b> <a class="float-right" id="patdob">00 Jan 00</a>
                                              </li>
                                              <li class="list-group-item p-1">
                                                <b>Visits</b> <a class="float-right" id="patvisits">00</a>
                                              </li>
                                            </ul>
                                          </div>
                                          <!-- /.card-body -->
                                        </div>

                                    </div> 

                                      <div class="col-md-4 mb-0">      

                                         <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary border border-primary"><i class="fas fa-user-nurse"><span>*</span></i></span>
                                          </div>
                                          <select class="form-control"  id="clinician" name="clinician">
                                              <option disabled selected value=""></option>
                                            @foreach ($data['Clinicians'] as $Clinician)
                                              <option value="{{$Clinician->id}}">{{$Clinician->Text}} - {{$Clinician->Title}} {{$Clinician->ForeName}} {{$Clinician->SurName}}</option>
                                              @endforeach
                                          </select>
                                        </div>

                                         <div class="card card-primary card-outline d-none clinicianInfo">
                                          <div class="card-body box-profile p-0">
                                           <textarea rows="8" class="form-control" placeholder="Clinician Details *" id="clinicalDetail" name="clinicalDetail"></textarea>
                                       </div>
                                   </div>

                                     </div>


                                    
                                    <div class="col-md-4">   

                                        
                                      <div class="input-group mb-2 clinicDiv">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary border border-primary"><i class="fas fa-clinic-medical"><span>*</span></i></span>
                                          </div>
                                          <select class="form-control"  id="clinic" name="clinic">
                                              <option disabled selected value=""></option>
                                          </select>
                                        </div>


                                        <div class="input-group mb-2  wardDiv">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary border border-primary"><i class="fas fa-x-ray"><span>*</span></i></span>
                                          </div>
                                          <select class="form-control"  id="ward" name="ward">
                                              <option disabled selected value=""></option>
                                            @foreach ($data['Wards'] as $Ward)
                                              <option value="{{$Ward->id}}">{{$Ward->Text}}</option>
                                              @endforeach
                                          </select>
                                        </div>

                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary border border-primary"><i class="fas fa-bed"><span>*</span>&nbsp;</i></span>
                                          </div>
                                          <input placeholder="Bed" type="text" name="bed" id="bed" class="form-control">
                                        </div>

                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary border border-primary"><i class="fas fa-pizza-slice"><span>*</span>&nbsp;</i></span>
                                          </div>
                                          <select class="form-control"  id="fasting" name="fasting">
                                           <option  selected disabled>Fasting *</option> 
                                           <option>Yes</option>
                                           <option>No</option>
                                           </select>
                                        </div>

                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary border border-primary"><i class="fas fa-clock"><span>*</span>&nbsp;</i></span>
                                          </div>
                                          <select class="form-control"  id="outofhours" name="outofhours">
                                           <option  selected disabled>Out of Hours *</option> 
                                           <option>Yes</option>
                                           <option>No</option>
                                           </select>
                                        </div>


                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary border border-primary"><i class="fas fa-star"><span>*</span>&nbsp;</i></span>
                                          </div>
                                          <select class="form-control"  id="priority" name="priority">
                                           <option disabled selected >Priority *</option> 
                                           <option>Normal</option>
                                           <option>Urgent</option>
                                           </select>
                                        </div> 

        
                                        <div class="exTimeList">
                                        
                                        <div class="input-group  date exTimeInfo" id="1">
                                          <div class="input-group-append" >
                                            <span class="input-group-text bg-primary border border-primary"><i class="fas fa-clock"><span>*</span>&nbsp;&nbsp;</i></span>
                                          </div> 
                                             <input id="datetime"  type="datetime-local" class="form-control" name="datetime[]" value="{{$data['ExecutionDateTime']}}" />  
                                             <div class="input-group-append addBtn">
                                            <button type="button" class="input-group-text bg-warning border border-warning cloneExTime"><i class="fas fa-plus"></i></button>
                                          </div>    
                                        </div>

                                        </div>


                                    </div> 
 


       <button type="button" id="addProduct" class="btn btn-warning float-left mb-1"><i class="fas fa-plus"></i> Blood Transfusion</button>

   


                                 
                                    


                                    <div class="col-md-12"></div>


                                        <div class="col-md-4 d-none d-sm-none d-md-block bg-secondary">
                                            <label class="col-form-label">Blood Transfusion <span>*</span></label> 
                                        </div>

                                      

                                        <div class="col-md-8 d-none d-sm-none d-md-block bg-secondary">
                                            <label class="col-form-label">Description</label> 
                                        </div>
                          
                                     <div class="addonList col-md-12">
                                          <div class="row mt-0 px-0 pb-1 rounded addonInfo"></div>
                                     </div>
                                     <div class="testList col-md-12">

                                        <div class="row mt-0 px-0 pb-1 rounded testInfo" id="1">
                                        


                                        <div class="col-md-4 bg-light  p-1">
                                            <label class="col-form-label d-sm-none d-md-none">Tests <span>*</span></label> 
                                            <select class="input product form-control tests"  id="test" name="test[]" style="width: 100%;">
                                              
                                              <option>Group and screen</option>
                                              <option>Blood Group</option>
                                              <option>DCT</option>
                                              <option>Klieheaur</option>

                                            </select>

                                        </div>

                                  

                                     
                                        <div class="col-md-8 bg-light p-1"><label class="col-form-label d-sm-none d-md-none">Description </label>

                                        <div class="input-group">
                                         
                                            <textarea name="description[]" id="description" rows="1" class="form-control description" placeholder="Description (optional)"></textarea>

                                          <div class="input-group-prepend descriptionRemove">
                                            <span id="1" class="input-group-text btn bg-dark border border-dark remove"><i class="fas fa-times"></i></span>
                                          </div>
                                        </div>

                                        </div>
                                        

                                      </div>

                                     </div>
        

                                            <div class="col-md-5 mt-5">
                                              <!--  <p><strong>Request Questions</strong></p>

                                               <div class="questionsDiv row" id="questionsList"> <div class="col-md-12">...</div> </div> -->

                                            </div>

                                            <div class="col-md-2"></div>

                                            <div class="col-md-5 mt-5">
                                              <p><strong>Request Notes</strong></p>
                                                <textarea id="notes" name="notes" class="form-control mt-1" rows="5" placeholder="Request Notes"></textarea>
                                            </div>


                                                 <div class="col-md-12 mt-3">
                                                <button type="button" class="btn btn-primary AddUpdatebtn float-right">Save Request</button>
                                             </div> 


                                        
                                           </div> 



                                            <!-- Modal -->
                <div class="modal fade" id="selectSampleID" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg  modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white">Selecting Sample ID</h5>
                               <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                    
                        
                                      <div class="row selectSampleIDsDiv"><div id="noSample" class="col-md-12 p-3 bg-light">No Samples Found! Please add profiles.</div></div>

                                      <div class="row">
                                     <div class="col-md-12">
                                       <button type="button" data-dismiss="modal" aria-label="Close" class=" btn mt-2 closeButton  p-1 px-2 btn-success float-right"> Close</button>
                                     </div>
                                     </div> 
                                      </div>  

                        
      
                             
                            </div>
                        </div>

                            </div>
                           
                        </div>
                    </div>
                </div> 



                                        </form>
                                          


                            </div>
                        </div> 



                <!-- Modal -->
                <div class="modal fade" id="selectPatient" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl  modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white">Selecting Patient</h5>
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
                                                <label>Select by MRN</label>
                                                 <input placeholder="Enter Patient MRN" class="form-control" type="text" id="mrn">    
                                          </div>

                                          <div class="col-md-3">
                                          <label>Select by Ward</label>
                                          <select class="form-control"  id="wards">
                                              <option disabled selected value=""></option>
                                            @foreach ($data['Wards'] as $Ward)
                                              <option value="{{$Ward->id}}">{{$Ward->Text}}</option>
                                              @endforeach
                                          </select>
                                          </div>


                                          <div class="col-md-3">
                                          <label>Select by Clinician</label>
                                          <select class="form-control"  id="clinicians">
                                              <option disabled selected value=""></option>
                                            @foreach ($data['Clinicians'] as $Clinician)
                                              <option value="{{$Clinician->id}}">{{$Clinician->Text}} - {{$Clinician->Title}} {{$Clinician->ForeName}} {{$Clinician->SurName}}</option>
                                              @endforeach
                                          </select>
                                          </div>


                                          <div class="col-md-3">
                                          <label class="text-white">.</label>
                                           <button type="button" class="search btn d-block p-1 px-2 btn-warning"><i class="fas fa-search"></i> Search</button>
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
                                           <button type="button" class="selectAll btn   p-1 px-2 btn-danger"><i class="fas fa-check"></i> Select All</button>

                                           <button type="button" class="deSelectAll btn   p-1 px-2 btn-info"><i class="fas fa-check"></i> Deselect All</button>

                                           <button type="button" disabled class="addSelected btn   p-1 px-2 btn-success"> Add Selected</button>
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
<script src="{{ asset('plugins/moment.min.js') }}"></script>

<script type="text/javascript">

    $(document).ready(function () {

            var data = @json($data);

            var session = '';
            var mode = data['mode'];
            var OCMRequest = data['OCMRequest'];
            var OCMRequestDetails = data['OCMRequestDetails'];
            var OCMRequestQuestionsDetails = data['OCMRequestQuestionsDetails'];

            if(OCMRequestQuestionsDetails.length > 0) {

              session = OCMRequestQuestionsDetails[0].session;
            } 
              else {

                if(localStorage.getItem("request") != '') { 

                  session = localStorage.getItem("request"); 
                   $.get("{{route('ClearProfileQuestions')}}", 
                     {
                      session: session,
                    });
                }
                var uniq = (new Date()).getTime();
                localStorage.setItem('request', uniq);
                var session = localStorage.getItem("request");


            }

      $('#session').val(session);

      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


      function loadpatients() {
       
  
                $('#selectPatient').modal('show'); 
                $("#patient").select2("close");

                $('#selectPatient').on('shown.bs.modal', function (e) {
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
       }



              $( "#patient" ).select2({
                  placeholder:'Choose a Patient',
                  allowClear:true
                 });


              $( "#clinic" ).select2({
                  placeholder:'Choose a location',
                  allowClear:true
                 });


               $( "#clinician" ).select2({
                placeholder:'Choose a Clinician',
                allowClear:true
               });

               $(document).on('select2:select', '#clinician', function () { 

                $('.clinicianInfo').attr('style', 'display: block !important');

                })



               $( "#ward" ).select2({
                placeholder:'Choose a location',
                allowClear:true,
                 width: 'resolve'
               });

                $( "#fasting" ).select2({
                placeholder:'Fasting',
                allowClear:true
               });

               $('#fasting').val('No').trigger('change');
               $('#priority').val('Normal').trigger('change');

               $( "#priority" ).select2({
                placeholder:'Priority',
                allowClear:true
               });


                $( "#outofhours" ).select2({
                placeholder:'Out of Hours',
                allowClear:true
               });

                $('#outofhours').val('No').trigger('change');


                
              $(document).on('select2:open', '.tests', function () { 

                     $('.select2-search__field').attr('placeholder','Search by Name or Diagnostics');
               })

               $('.tests').select2({
                    
                    placeholder:'Choose from the list',
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





                function profileIDs() {



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
                       return implodedArray;
                          }                                  
                }



              

      function loadQuestions(session) {


                    
                 var existingProfileIDs = profileIDs();

                      if(existingProfileIDs == undefined) {

                        existingProfileIDs = '';
                      }

                        $.get("{{route('ClearProfileQuestions')}}", 
                             {
                              session: localStorage.getItem("request"),
                            }, 
                            function(data){


                   $.get("{{route('GetProfileQuestions')}}", 
                         {
                                id: existingProfileIDs,
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



       


           $(document).on('select2:open', '.patient', function () { 

                    loadpatients();
               })
               

               $('.wardDiv').attr('style', 'display: none !important');

                $(document).on('click', '.cloneExTime', function () {  

                    var id = $('.exTimeList > div:last').attr('id');


                    var clonedDiv = $('.exTimeInfo').first().clone(true);
                    clonedDiv.appendTo(".exTimeList");

                             
                        id = parseFloat(id)+1;
                        $('.exTimeList > div:last').attr('id',id);
                        $('#'+id).find('.cloneExTime').remove();
                        $('#'+id).find('.addBtn').html('<button id="'+id+'" type="button" class="input-group-text bg-danger border border-warning removeExTime"><i class="fas fa-minus"></i></button>');

                 })



                 $(document).on('click', '.removeExTime', function () { 

                    var id = "#"+this.id;
                    $('.exTimeList '+id).remove();

                 })


              


           $(document).on('select2:select', '.tests', function () { 
            
            var currentProfileID =  this.value;
            var Patient =  $('#patient').val();
            var currentProfileName =  $(this).find('option:selected').text();
            var ProfileElement = $(this);

             if(Patient == null || Patient == '') {

                ProfileElement.val(null).trigger("change"); 
                 Lobibox.notify('warning', {
                                pauseDelayOnHover: true,
                                continueDelayOnInactiveTab: false,
                                position: 'top right',
                                msg: 'Please select Patient first.',
                                icon: 'bx bx-info-circle'
                            });
                           return false;   
              } 


           

              const all = profileIDs().split(",");
           
               const hasDuplicates = (arr) => arr.length !== new Set(arr).size;
              
                if(hasDuplicates(all) == true) {

                 ProfileElement.val(null).trigger("change"); 
                  
                   Lobibox.notify('warning', {
                                  pauseDelayOnHover: true,
                                  continueDelayOnInactiveTab: false,
                                  position: 'top right',
                                  msg: 'Profile Already selected.',
                                  icon: 'bx bx-info-circle'
                              });
                              return false;   
                
                } else {

                    
                     if(mode == 'add-on') {

                        var id = $('#id').val();

                         $.ajax({
                                  type: 'post',
                                  url:"{{ route( 'AddOnExistingProfile') }}",
                                  data: {'id' : id, 'profile' : currentProfileID, _token: CSRF_TOKEN,},
                                  dataType: 'json',                   
                                  success: function(response__){ 
                                 
                                          if(response__ > 0) {

                                            Lobibox.notify('warning', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: 'Profile Already selected.',
                                            icon: 'bx bx-info-circle'
                                          });
                                            ProfileElement.val(null).trigger("change"); 
                                            return false;
                                          
                                          } else {

                  profileIDs()

                  $.get("{{route('CheckAddOnAvailability')}}", 
                     {
                      id: profileIDs,
                      rid: $("#id").val()

                    }, 
                    function(response){ 

                    if(response.length > 0) {

                        $('.selectSampleIDsDiv').html('');  

                          $('.closeButton').text('Update Samples Info')
                          $('#noSample').css('display','none')

                              $( response ).each(function( index ) {  

                                if(response[index].sampleid != null && response[index].taken != null) {
                                $('.selectSampleIDsDiv').append('<div id="'+response[index].sampleid+'" class="col-md-6 mb-3 addAddOn"><div class="bg-light">  <div class="p-2 text-center"> <b>Sample Taken : '+response[index].taken+'<b/> <br/> <img style="height: 60px;width: 180px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOAAAAAeAQMAAAAPe4DLAAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAACNJREFUKJFjOHD+/JnzByD4DD8E/zkAREBxhlHJUclRScolAW+zeO93nKCGAAAAAElFTkSuQmCC" alt="barcode"> <br><b>'+response[index].sampleid+'</b> </div><div class="p-2 float-left"><b>'+response[index].sampletype+'</b></div><div class="p-2 float-right"><b>'+response[index].hospital+'</b></div><div style="clear: both;"></div></div><input class="mt-2 form-control" type="" name="sampleid[]" value="'+response[index].sampleid+'"/><input class="mt-2 form-control addonvalue" type="" name="addon[]" value="No"/><input class="mt-2 form-control addon" type="checkbox"/><div>')
                                
                                $('#selectSampleID').modal('show');
                              }

                               })

                         //loadQuestions(session);  

                      

                         } else {

                            Lobibox.notify('info', {
                              pauseDelayOnHover: true,
                              continueDelayOnInactiveTab: false,
                              position: 'top right',
                              msg: 'No Sample ID found.',
                              icon: 'bx bx-info-circle',
                              delay: 5000000,                // Hide notification after this time (in miliseconds)
                              delayIndicator: false  
                          }); 

                           ProfileElement.val(null).trigger("change"); 
                               return false;
                         }

                    })
                                          }


                                      }
                                  });

                      } else {

                        GetProfileThreshHold(ProfileElement,currentProfileID,Patient,currentProfileName);
                      }

                   
                  

                 }
            
            


           })



     function GetProfileThreshHold(ProfileElement,currentProfileID,Patient,currentProfileName) {
              

            var threshHold = ProfileElement.find('option:selected').attr('data2');

             $.get("{{route('GetProfileThreshHold')}}", 
               {
                id: currentProfileID,
                threshHold: threshHold,
                patient: Patient
              }, 
              function(data){ 
                          
              if(data.error != '') {

          
                   swal({
                    title: data.error,
                    text: data.message,
                    icon: "info",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {

                    if (!willDelete) {

                             ProfileElement.val(null).trigger("change"); 
                             
                                var id = ProfileElement.closest(".testInfo").attr('id')

                                $('#'+id+'.testInfo').remove();  

                                return true; 

                     } else {
                      
                           if(mode == 'add-on') {

                          addOn(ProfileElement)

                          } else {

                              loadQuestions(session)
                              consentForm(ProfileElement,currentProfileName)

                          }
                      
                     }

                      });

                  } else {
                    
                      if(mode == 'add-on') {

                        addOn(ProfileElement)

                      } else {

                          loadQuestions(session)
                          consentForm(ProfileElement,currentProfileName)

                      }
                    

                  }
              })

          } 


          function consentForm(ProfileElement,currentProfileName) {

            if(ProfileElement.find('option:selected').attr('data') == 1) {

             Lobibox.notify('info', {
                              pauseDelayOnHover: true,
                              continueDelayOnInactiveTab: false,
                              position: 'top right',
                              msg: currentProfileName+' requires a consent form.',
                              icon: 'bx bx-info-circle',
                              delay: 5000000,      
                              delayIndicator: false  
                          }); 

                }

          }


           function addOn(ProfileElement) {
                  


                const all = $(".addAddOn").map(function() {
                    return this.id;
                  }).get();


                  profileIDs()

                  $.get("{{route('CheckAddOnAvailability')}}", 
                     {
                      id: profileIDs,
                      rid: $("#id").val()

                    }, 
                    function(response){ 

                    if(response.length > 0) {

                        $('.selectSampleIDsDiv').html('');  

                          $('.closeButton').text('Update Samples Info')
                          $('#noSample').css('display','none')

                              $( response ).each(function( index ) {  

                                $('.selectSampleIDsDiv').append('<div id="'+response[index].sampleid+'" class="col-md-6 mb-3 addAddOn"><div class="bg-light">  <div class="p-2 text-center"> <b>Sample ID 2<b/> <br/> <img style="height: 60px;width: 180px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOAAAAAeAQMAAAAPe4DLAAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAACNJREFUKJFjOHD+/JnzByD4DD8E/zkAREBxhlHJUclRScolAW+zeO93nKCGAAAAAElFTkSuQmCC" alt="barcode"> <br><b>'+response[index].sampleid+'</b> </div><div class="p-2 float-left"><b>'+response[index].sampletype+'</b></div><div class="p-2 float-right"><b>'+response[index].hospital+'</b></div><div style="clear: both;"></div></div><input class="mt-2 form-control" type="hidden" name="sampleid[]" value="'+response[index].sampleid+'"/><input class="mt-2 form-control addonvalue" type="hidden" name="addon[]" value="No"/><input class="mt-2 form-control addon" type="checkbox"/><div>')
                                
                                $('#selectSampleID').modal('show');

                               })

                         loadQuestions(session);  

                      

                         } else {

                            Lobibox.notify('info', {
                              pauseDelayOnHover: true,
                              continueDelayOnInactiveTab: false,
                              position: 'top right',
                              msg: 'No Sample ID found.',
                              icon: 'bx bx-info-circle',
                              delay: 5000000,                // Hide notification after this time (in miliseconds)
                              delayIndicator: false  
                          }); 

                           ProfileElement.val(null).trigger("change"); 
                               return false;
                         }

                    })


       }




      



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



            if(mode == 'on') { 

              if(OCMRequestQuestionsDetails.length > 0) {

              localStorage.setItem('request', OCMRequestQuestionsDetails[0].session);

                var data = OCMRequestQuestionsDetails;



                 if(OCMRequestQuestionsDetails.length > 0) {


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


                        var answer = data[index].answer;
                        //console.log(answers[0])
                        var checked = '';
                       
                         if(answers == '') {


                        
                                $('.answersList-'+index).append('<input class="form-control acheck"  data="'+data[index].id+'"   type="text"  placeholder="Answers" value="'+answer+'"> ');


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



               var id = OCMRequest[0].RequestPatientID;
               var name = OCMRequest[0].PatName;
               var patient = new Option(name, id, true, true);
                $('#id').val(OCMRequest[0].OID);
                $('#patient').append(patient).trigger('change');
                $('#clinician').val(OCMRequest[0].RequestClinicianID).trigger('change');
                $('#ward').val(OCMRequest[0].RequestWardID).trigger('change');
                $('#bed').val(OCMRequest[0].bed);
                $('#fasting').val(OCMRequest[0].RequestFasting).trigger('change');
                $('#priority').val(OCMRequest[0].RequestPriority).trigger('change');
                $('#clinicalDetail').val(OCMRequest[0].RequestClinicalDetail);
                $('#notes').val(OCMRequest[0].RequestNotes);


                if(OCMRequest[0].RequestWardID == null || OCMRequest[0].RequestWardID == '') {

                  $('.wardDiv').attr('style', 'display: none !important');  
                  $('.clinicDiv').attr('style', 'display: flex !important');

                } else {
                  
                  $('.wardDiv').attr('style', 'display: flex !important');
                   $('.clinicDiv').attr('style', 'display: none !important');
                }

                 $.ajax({
                        type: 'post',
                        url:"{{ route( 'getClinicList') }}",
                        data: {'id' : id, _token: CSRF_TOKEN,},
                        dataType: 'json',                   
                        success: function(accounts){ 
                            $("#clinic").html('');
                             $( accounts ).each(function( index ) {
                                var data = {
                                        id: accounts[index].id,
                                        text: accounts[index].text
                                        };
                                     var newOption = new Option(data.text, data.id, false, false);
                                     $('#clinic').append(newOption).trigger('change');  

                                      if(OCMRequest[0].clinic == accounts[index].id) {
                                     $('#clinic').val(OCMRequest[0].clinic).trigger('change');
                                    } 


                                })
                   
                            

                            }
                        });


                

                    $('.cloneExTime').remove();
                    
                    if(clinician != '') {

                       $('.clinicianInfo').attr('style', 'display: block !important');
                    } 
                    else {

                      $('.clinicianInfo').attr('style', 'display: none !important');
                    }

                    
                    $('.patientInfo').attr('style', 'display: block !important');
                    var age = moment().diff(moment(OCMRequest[0].DoB, 'YYYY-MM-DD'), 'years');

                    var Sex = OCMRequest[0].Sex;
                    if(Sex == 'M') {  Sex = 'Male'; } else { Sex = 'Female'; }
                    var Sex = $('#patSex').text(Sex);
                    $('#patname').text(OCMRequest[0].PatName);
                    $('#patage').text(age);
                    $('#patmrn').text(OCMRequest[0].MRN);
                    $('#patchart').text(OCMRequest[0].Chart);
                    var DoB = moment(OCMRequest[0].DoB).format('DD MMMM YYYY');
                    $('#patdob').text(DoB);
                    $('#pataddress').text(OCMRequest[0].Address0);
                    $('#patvisits').text(OCMRequest[0].Visits);


                        $(OCMRequestDetails).each(function( index ) {
                            
            
                             if(index > 0) {

                                    
                                   $('.tests').select2("destroy");

                                    var noOfDivs = $('.testInfo').length;
                                    var id = $('.testList > .row:last').attr('id');
                                    var clonedDiv = $('.testInfo').first().clone();
                                        clonedDiv.appendTo(".testList");

                                    $('.tests').select2({
                
                                      placeholder:'Choose from the list',
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
                                        $('#'+id).find('.remove').attr('id',parseFloat(id));
                                        $('#'+id).find('.tests').val(OCMRequestDetails[index].TestID).trigger('change');
                                        $('#'+id).find('#description').val(OCMRequestDetails[index].TestDescription);

                                } else {

                                    $('#test').val(OCMRequestDetails[index].TestID).trigger('change');
                                    $('#description').val(OCMRequestDetails[index].TestDescription);
                                }

        
                        }) 
     


                 }








                  if(mode == 'add-on') { 

                    $('#patient').removeClass('patient');

                   $("#patient").select2('destroy').attr("readonly", true)  
                   $("#clinician").select2('destroy').attr("readonly", true)  
                   $("#ward").select2('destroy').attr("readonly", true)  
                   $("#clinic").select2('destroy').attr("readonly", true)  
                   $("#bed").prop('readonly', true); 
                   $("#fasting").select2('destroy').attr("readonly", true)  
                   $("#outofhours").select2('destroy').attr("readonly", true) 
                   $("#priority").select2('destroy').attr("readonly", true) 
                   $("#datetime").prop('readonly', true);  

                   $("#clinicalDetail").attr("readonly", "readonly");
                   $('.patientInfo .card-body').attr('style', 'background: #e9ecef !important');
                   $('.list-group li').attr('style', 'background: #e9ecef !important');


                   //$(".tests").select2('destroy').attr("readonly", true) 
                   //$(".description").attr("disabled", true); 
                   //$('.descriptionRemove').remove();
                   //$(".tests").prop("disabled", true); 



               var id = OCMRequest[0].RequestPatientID;
               var name = OCMRequest[0].PatName;
               var patient = new Option(name, id, true, true);
                $('#id').val(OCMRequest[0].OID);
                $('#patient').append(patient).trigger('change');
                $('#clinician').val(OCMRequest[0].RequestClinicianID).trigger('change');
                $('#ward').val(OCMRequest[0].RequestWardID).trigger('change');
                $('#bed').val(OCMRequest[0].bed);
                $('#fasting').val(OCMRequest[0].RequestFasting).trigger('change');
                $('#priority').val(OCMRequest[0].RequestPriority).trigger('change');
                $('#clinicalDetail').val(OCMRequest[0].RequestClinicalDetail);
                $('#notes').val(OCMRequest[0].RequestNotes);


                if(OCMRequest[0].RequestWardID == null || OCMRequest[0].RequestWardID == '') {

                  $('.wardDiv').attr('style', 'display: none !important');  
                  $('.clinicDiv').attr('style', 'display: flex !important');

                } else {
                  
                  $('.wardDiv').attr('style', 'display: flex !important');
                   $('.clinicDiv').attr('style', 'display: none !important');
                }

                 $.ajax({
                        type: 'post',
                        url:"{{ route( 'getClinicList') }}",
                        data: {'id' : id, _token: CSRF_TOKEN,},
                        dataType: 'json',                   
                        success: function(accounts){ 
                            $("#clinic").html('');
                             $( accounts ).each(function( index ) {
                                var data = {
                                        id: accounts[index].id,
                                        text: accounts[index].text
                                        };
                                     var newOption = new Option(data.text, data.id, false, false);
                                     $('#clinic').append(newOption).trigger('change');  

                                      if(OCMRequest[0].clinic == accounts[index].id) {
                                     $('#clinic').val(OCMRequest[0].clinic).trigger('change');
                                    } 


                                })
                   
                            

                            }
                        });


                

                    $('.cloneExTime').remove();
                    
                    if(clinician != '') {

                       $('.clinicianInfo').attr('style', 'display: block !important');
                    } 
                    else {

                      $('.clinicianInfo').attr('style', 'display: none !important');
                    }

                    
                    $('.patientInfo').attr('style', 'display: block !important');
                    var age = moment().diff(moment(OCMRequest[0].DoB, 'YYYY-MM-DD'), 'years');

                    var Sex = OCMRequest[0].Sex;
                    if(Sex == 'M') {  Sex = 'Male'; } else { Sex = 'Female'; }
                    var Sex = $('#patSex').text(Sex);
                    $('#patname').text(OCMRequest[0].PatName);
                    $('#patage').text(age);
                    $('#patmrn').text(OCMRequest[0].MRN);
                    $('#patchart').text(OCMRequest[0].Chart);
                    var DoB = moment(OCMRequest[0].DoB).format('DD MMMM YYYY');
                    $('#patdob').text(DoB);
                    $('#pataddress').text(OCMRequest[0].Address0);
                    $('#patvisits').text(OCMRequest[0].Visits);

                    //console.log(OCMRequestDetails)
                        $(OCMRequestDetails).each(function( index ) {
                            
                              if(OCMRequestDetails[index].TestDescription == null)  {

                                TestDescription = '';
                              }
                              
                              $('.addonInfo').append('<div class="col-md-4 bg-light p-1"><input readonly class="form-control" value="'+OCMRequestDetails[index].name+'"></div><div class="col-md-8 bg-light p-1"><textarea rows="1" readonly class="form-control">'+TestDescription+'</textarea></div>')

        
                        }) 
     

                             $.get("{{route('ClearProfileQuestions')}}", 
                             {
                              session: session,
                            }, 
                            function(data){


                             })
                 }





           if(mode == 'clone') { 

              

               var id = OCMRequest[0].RequestPatientID;
               var name = OCMRequest[0].PatName;
               var patient = new Option(name, id, true, true);
                $('#id').val(OCMRequest[0].OID);
                $('#patient').append(patient).trigger('change');
                $('#clinician').val(OCMRequest[0].RequestClinicianID).trigger('change');
                $('#ward').val(OCMRequest[0].RequestWardID).trigger('change');
                $('#bed').val(OCMRequest[0].bed);
                $('#fasting').val(OCMRequest[0].RequestFasting).trigger('change');
                $('#outofhours').val(OCMRequest[0].outofhours).trigger('change');
                $('#priority').val(OCMRequest[0].RequestPriority).trigger('change');
                $('#clinicalDetail').val(OCMRequest[0].RequestClinicalDetail);
                $('#notes').val(OCMRequest[0].RequestNotes);


                if(OCMRequest[0].RequestWardID == null || OCMRequest[0].RequestWardID == '') {

                  $('.wardDiv').attr('style', 'display: none !important');  
                  $('.clinicDiv').attr('style', 'display: flex !important');

                } else {
                  
                  $('.wardDiv').attr('style', 'display: flex !important');
                   $('.clinicDiv').attr('style', 'display: none !important');
                }

                 $.ajax({
                        type: 'post',
                        url:"{{ route( 'getClinicList') }}",
                        data: {'id' : id, _token: CSRF_TOKEN,},
                        dataType: 'json',                   
                        success: function(accounts){ 
                            $("#clinic").html('');
                             $( accounts ).each(function( index ) {
                                var data = {
                                        id: accounts[index].id,
                                        text: accounts[index].text
                                        };
                                     var newOption = new Option(data.text, data.id, false, false);
                                     $('#clinic').append(newOption).trigger('change');  

                                      if(OCMRequest[0].clinic == accounts[index].id) {
                                     $('#clinic').val(OCMRequest[0].clinic).trigger('change');
                                    } 


                                })
                   
                            

                            }
                        });


                

                    $('.cloneExTime').remove();
                    
                    if(clinician != '') {

                       $('.clinicianInfo').attr('style', 'display: block !important');
                    } 
                    else {

                      $('.clinicianInfo').attr('style', 'display: none !important');
                    }

                    
                    $('.patientInfo').attr('style', 'display: block !important');
                    var age = moment().diff(moment(OCMRequest[0].DoB, 'YYYY-MM-DD'), 'years');

                    var Sex = OCMRequest[0].Sex;
                    if(Sex == 'M') {  Sex = 'Male'; } else { Sex = 'Female'; }
                    var Sex = $('#patSex').text(Sex);
                    $('#patname').text(OCMRequest[0].PatName);
                    $('#patage').text(age);
                    $('#patmrn').text(OCMRequest[0].MRN);
                    $('#patchart').text(OCMRequest[0].Chart);
                    var DoB = moment(OCMRequest[0].DoB).format('DD MMMM YYYY');
                    $('#patdob').text(DoB);
                    $('#pataddress').text(OCMRequest[0].Address0);
                    $('#patvisits').text(OCMRequest[0].Visits);


                  }




           if(mode == 'clonePatient') { 

              var Patient = data['Patient'];

               var id = Patient[0].id;
               var name = Patient[0].PatName;
               var patient = new Option(name, id, true, true);
                $('#id').val(Patient[0].OID);
                $('#patient').append(patient).trigger('change');
                $('#clinician').val(Patient[0].Clinician).trigger('change');
                $('#ward').val(Patient[0].Ward).trigger('change');
                $('#bed').val(Patient[0].bed);
                $('#outofhours').val('No').trigger('change');
                $('#fasting').val('No').trigger('change');
                $('#priority').val('Normal').trigger('change');
                $('#clinicalDetail').val(Patient[0].RequestClinicalDetail);
                $('#notes').val(Patient[0].RequestNotes);


                if(Patient[0].Ward == null || Patient[0].Ward == '') {

                  $('.wardDiv').attr('style', 'display: none !important');  
                  $('.clinicDiv').attr('style', 'display: flex !important');

                } else {
                  
                  $('.wardDiv').attr('style', 'display: flex !important');
                   $('.clinicDiv').attr('style', 'display: none !important');
                }

                 $.ajax({
                        type: 'post',
                        url:"{{ route( 'getClinicList') }}",
                        data: {'id' : id, _token: CSRF_TOKEN,},
                        dataType: 'json',                   
                        success: function(accounts){ 
                            $("#clinic").html('');
                             $( accounts ).each(function( index ) {
                                var data = {
                                        id: accounts[index].id,
                                        text: accounts[index].text
                                        };
                                     var newOption = new Option(data.text, data.id, false, false);
                                     $('#clinic').append(newOption).trigger('change');  

                                })
                                                   
                                      $('#clinic').val(null).trigger('change');

                            }
                        });
         

                    $('.cloneExTime').remove();
                    
                    if(clinician != '') {

                       $('.clinicianInfo').attr('style', 'display: block !important');
                    } 
                    else {

                      $('.clinicianInfo').attr('style', 'display: none !important');
                    }

                    
                    $('.patientInfo').attr('style', 'display: block !important');
                    var age = moment().diff(moment(Patient[0].DoB, 'YYYY-MM-DD'), 'years');

                    var Sex = Patient[0].Sex;
                    if(Sex == 'M') {  Sex = 'Male'; } else { Sex = 'Female'; }
                    var Sex = $('#patSex').text(Sex);
                    $('#patname').text(Patient[0].PatName);
                    $('#patage').text(age);
                    $('#patmrn').text(Patient[0].MRN);
                    $('#patchart').text(OCMRequest[0].Chart);
                    var DoB = moment(Patient[0].DoB).format('DD MMMM YYYY');
                    $('#patdob').text(DoB);
                    $('#pataddress').text(Patient[0].Address0);
                    $('#patvisits').text(Patient[0].Visits);


                  }




          $(document).on('click', '#addProduct', function (e) { 
        

               $('.tests').select2("destroy");

                var noOfDivs = $('.testInfo').length;
                
                
                var id = $('.testList > .row:last').attr('id');


                var clonedDiv = $('.testInfo').first().clone(true);
                    clonedDiv.appendTo(".testList");

                 $('.tests').select2({
                
                                      placeholder:'Choose from the list',
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


                 if(mode == 'add-on') {

                 $('.select2-selection--single').attr('style', 'background-color:#e9ecef');
                  $('.select2-selection--single:last').attr('style', 'background-color:#fff');
                 }  
                        $('.testList > .row:last').attr('id',id);
                        $('#'+id).find('.remove').attr('id',parseFloat(id));

                var id = $('.testList > .row:last').attr('id');
                         $('#'+id).find('.tests').val('').trigger('change');
                         $('#'+id).find('#description').val('');

        });



$(document).on('click', '.search', function (event) { 


  var mrn = $('#mrn').val();
  var clinicians = $('#clinicians').val();
  var wards = $('#wards').val();


   $('#table').DataTable().destroy();
   load_data(mrn, clinicians, wards);
  
        });
 
    load_data();

    function load_data(mrn = '', clinicians = '', wards = '')
     {
        var table = $('#table').DataTable({

        
        "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
        dom: 'frtip', //"Bfrtip",


        processing: true,
        serverSide: true,
        pageLength:10,
        // stateSave: true,
        ajax: {
            url:'{{ route("PatientList") }}',
            data:{mrn:mrn, clinicians:clinicians, wards:wards}
           },
         columns: [
            {data: 'MRN', name: 'MRN'}, 
            {data: 'PatName', name: 'PatName'}, 
            {data: 'Sex', name: 'Sex'},
            {data: 'DoB', name: 'DoB'},
            {data: 'Ward', name: 'Ward'},
            {data: 'Clinician', name: 'Clinician'},
            {data: 'Address0', name: 'Address0'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        "order":[[1, 'asc']]
            });

        }

            




                 $(document).on('click', '.addPatient', function (e) { 

                    var id = this.id;
                    var name = $(this).attr('name');
                    var ward = $(this).attr('ward');
                    var clinician = $(this).attr('clinician');
                    var clinicianDetails = $(this).attr('clinicianDetails');
                    var Sex = $(this).attr('Sex');
                     if(Sex == 'M') {  Sex = 'Male'; } else { Sex = 'Female'; }
                    var DoB = $(this).attr('DoB');
                    var MRN = $(this).attr('MRN');
                    var Chart = $(this).attr('Chart');
                    var Visits = $(this).attr('Visits');
                    var Address0 = $(this).attr('Address0');
                    $('.patientInfo').attr('style', 'display: block !important');

                    var patient = new Option(name, id, true, true);
                    $('#patient').append(patient).trigger('change');
                    $('#ward').val(ward).trigger('change');
                    $('#clinicalDetail').val(clinicianDetails);
                    $('#clinician').val(clinician).trigger('change');

                    if(clinician != '') {

                       $('.clinicianInfo').attr('style', 'display: block !important');
                    } 
                    else {

                      $('.clinicianInfo').attr('style', 'display: none !important');
                    }

                    var age = moment().diff(moment(DoB, 'YYYY-MM-DD'), 'years');

                    $('#patname').text(name);
                    $('#patSex').text(Sex);
                    $('#patage').text(age);
                    $('#patmrn').text(MRN);
                    $('#patchart').text(Chart);
                    $('#patdob').text(DoB);
                    $('#patvisits').text(Visits);
                    $('#pataddress').text(Address0);

                    $('#selectPatient').modal('hide');   
               
                    
                $.ajax({
                        type: 'post',
                        url:"{{ route( 'getClinicList') }}",
                        data: {'id' : id, _token: CSRF_TOKEN,},
                        dataType: 'json',                   
                        success: function(accounts){ 
                            $("#clinic").html('');

                            if(accounts.length > 0) {

                             $( accounts ).each(function( index ) {
                                var data = {
                                        id: accounts[index].id,
                                        text: accounts[index].text
                                        };
                                     var newOption = new Option(data.text, data.id, false, false);
                                     $('#clinic').append(newOption).trigger('change');   
                                })
                             
                             if(clinic != undefined) {
                                 $('#clinic').val(clinic).trigger('change');
                                 $('#clinic').select2('open');  
                             } 
                                 $('.wardDiv').attr('style', 'display: none !important');
                                 $('.clinicDiv').attr('style', 'display: flex !important');

                            } else {

                                 $('.clinicDiv').attr('style', 'display: none !important');
                                 $('.wardDiv').attr('style', 'display: flex !important');

                            }

                          }



                        }); 

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

                        var session = $('#session').val();
                        loadQuestions(session);
                      }
                    

            }); 
            


            // if not  edit mode 
            if(mode == 'on') {

                $('.AddUpdatebtn').attr('id','btnUpdate');

            }
            else if(mode == 'add-on') { 

                 $('.AddUpdatebtn').attr('id','btnAddOn');
            }
             else {

                $('.AddUpdatebtn').attr('id','btnAdd');
            }



            //add and update js code

                $(".AddUpdatebtn").click(function (event) {


                        $(".AddUpdatebtn").prop("disabled", true);

                        //stop submit the form, we will post it manually.
                        event.preventDefault();

                        // Get form
                        var form = $('#form')[0];

                        // Create an FormData object
                        var data = new FormData(form);

                        if(this.id == 'btnAdd') {

                            var url = "{{ route('saveRequest') }}";        
                           
                        }
                        
                        else if(this.id == 'btnAddOn') {

                            var url = "{{ route('addOnRequest') }}";   


                        } else {

                            var url = "{{ route('updateRequest') }}";   


                        }


                        $.ajax({
                            type: "POST",
                            enctype: 'multipart/form-data',
                            url: url,
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
                                          
                                  
                                         window.location = "{{route('Requests')}}/"+data.url; 
   
                                         // $(".AddUpdatebtn").prop("disabled", false);
                                        
                                         var uniq = (new Date()).getTime();
                                          localStorage.setItem('request', uniq);
                                         

                                    } else {
                                         Lobibox.notify('warning', {
                                                pauseDelayOnHover: true,
                                                continueDelayOnInactiveTab: false,
                                                position: 'top right',
                                                msg: data.error,
                                                icon: 'bx bx-info-circle'
                                            });
                                         $(".AddUpdatebtn").prop("disabled", false);
                                    }
                                }



                            });

                    

                    });




             $(document).on('click', '#addMultiple', function () { 

                 var value =  this.value;
                            var tests =  $('#patient').val();
                            var text =  $(this).find('option:selected').text();


                             if(tests == null || tests == '') {

                              $(this).val(null).trigger("change"); 
                               Lobibox.notify('warning', {
                                              pauseDelayOnHover: true,
                                              continueDelayOnInactiveTab: false,
                                              position: 'top right',
                                              msg: 'Please select Patient first.',
                                              icon: 'bx bx-info-circle'
                                          });
                            return false;   
                            }


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

                                  $(".addSelected").prop("disabled", false);
                             } else {

                                 $(".addSelected").prop("disabled", true);
                             }

                       });


                      $(document).on('click', '.selectAll ', function (e) {

                            $('#table2 tbody tr').addClass("selected");
                            if($("#table2").DataTable().rows('.selected').data().length > 0) {

                                  $(".addSelected").prop("disabled", false);
                             } 

                        });

                       $(document).on('click', '.deSelectAll ', function (e) {
  
                            $('#table2 tbody tr').removeClass("selected");
                             $(".addSelected").prop("disabled", true);

                        });



                     $(document).on('click', '.addSelected', function (e) {
                           
     
                              var ids = $.map($("#table2").DataTable().rows('.selected').data(), function (item) {
                                    return item.id;
                                });

                              var existingProfileIDs = profileIDs();

                                  if(existingProfileIDs == undefined) {

                                    existingProfileIDs = '';
                                  }
                                
                                if($("#table2").DataTable().rows('.selected').data().length > 0) {

                                    var patient =  $('#patient').val();
                                    var this_ = $('#'+id+'.testInfo').find('.tests');


                                    let panelIDs = ids.join(",");

                                     $.get("{{route('getProfiles')}}", 
                                            {
                                              panelIDs : panelIDs,
                                              existingProfileIDs: existingProfileIDs,
                                              rid: $("#id").val(),
                                              mode: mode
                                            }, 
                                            function(response){ 

                                              //console.log(response)
               
                                                  $( response ).each(function( index ) {  
                                                      
                                                      var ProfileID = response[index].ProfileID;
                                                      var ProfileName = response[index].ProfileName;
                                                     

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
                                      
                                                            placeholder:'Choose from the list',
                                                                matcher: function(params, data) {
                                                                        
                                                                        // Do not display the item if there is no 'text' property
                                                                        if (typeof data.text === 'undefined')
                                                                        { return null; }
                                                                        
                                                                        // If there are no search terms, return all of the data
                                                                        if (params.term === '' || typeof params.term === 'undefined') { 
                                                                            return data; 
                                                                        } else {

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

                                                                                                        
                                                       loadQuestions(session);
                                                        
                                                        if(mode == 'add-on') {

                                                           addOn()
                                                        }


                                                     }

                                                   })
                                        });

                                    $('#addMultipleModal').modal('hide');  



                                }


                        });   



                     $(document).on('click', '.addAddOn', function (e) { 

                          var id = this.id;

                            if($('#'+id).find('.addonvalue').val() == 'Yes') {

                              $('#'+id).find('.addon').prop("checked", false);
                              $('#'+id).find('.addonvalue').val('No');


                            } else {

                              $('#'+id).find('.addon').prop("checked", true);
                              $('#'+id).find('.addonvalue').val('Yes');
                            }

                           
                     })

           $(document).on('click', '#showSamples', function (e) { 

                    $('#selectSampleID').modal('show'); 

                 })


     })  

</script>
        
@endpush
