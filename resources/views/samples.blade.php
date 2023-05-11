@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Sample Collection 
                <button class="btn btn-info btn-sm goBack" id="{{route('Requests')}}/Requested"><i class="fas fa-arrow-left"></i> GO BACK </button>
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

                            <h1 id="printTitle" class="mt-4 mb-0 d-none">{{ \App\Http\Controllers\business::businessinfo()[0]->name }}</h1>

                            <div class="card-body table-responsive"  id="PrintDiv">                  
                                
                                             <span class="float-right d-none">
                                                 <button class="btn btn-primary" id="print">Print</button>
                                             </span>


                                            <h3 class="profile-username text-left mb-1">Patient Info</h3>

                                            <p class="text-dark text-left m-0">
                                                <b id="patname">John Doe</b>
                                                <b id="PatSurName" class="d-none">John</b>
                                                <b id="PatForeName" class="d-none">Doe</b>
                                                <b id="patSex0" class="d-none"></b>
                                             </p>
                                             <p class="text-dark text-left m-0">
                                             DOB - <b id="patDoB"></b>
                                             </p>
                                             <p class="text-dark text-left m-0">
                                                <span id="patSex_"></span> / 
                                                <span id="patage">20</span> yrs
                                            </p>
                                            <p class="text-dark text-left m-0 mb-2" id="pataddress">11 Grattan Street Portlaoise Co. Laois Ireland</p>

                                            <hr/>

                                            <div class="row">

                                            
                                              <div class="col-md-4">
                                                <label>Patient MRN : </label> <span id="patchart">00000</span>
                                                <br>
                                                 <label>Clinician : </label> <span id="clinician">John Doe</span>
                                                 <br>
                                                 <label>Location : </label> <span id="ward">John Doe</span>
                                                 <br> <label>Status : </label>
                                                 <button class="btn btn-primary btn-xs" id="status"></button>
                                            </div>



                                             <div class="col-md-4">
                                        <label>Date Time : </label> <span id="datetime">
                                        {{\App\Http\Controllers\Controller::DateTime($response['OCMRequest'][0]->ExecutionDateTime)}}</span>
                                                <br>
                                                <label>Request #  </label> <span id="requestid">00000</span>
                                                <br>
                                                <label>Request Episode : </label> <span id="episodeTxt">1</span>
                                            </div>


                                            <div class="col-md-4">
                                                <label>Fasting : </label> <span id="fasting"></span>
                                                <br>
                                                <label>Out of Hours :  </label> <span id="outofhours"></span>
                                                <br>
                                                <label>Priority : </label> <span id="priority"></span>
                                            </div>


                                            <div class="col-md-12"><hr></div>

                                            <div class="col-md-6" id="clinicianNotesDiv">
                                                <label>Clinician Details : </label> 
                                                <textarea readonly rows="5" class="form-control bg-light" id="clinicianNotes"></textarea>
                                            </div>

                                            <div class="col-md-6" id="notesDiv">
                                                <label>Notes : </label> 
                                                <textarea readonly rows="5" class="form-control bg-light" id="notes"></textarea>
                                            </div>

                                            <div class="col-md-12 mt-2">

                                              <form class="g-3"  id="form">
                                                {{ csrf_field() }}
                                              <div class="row testList 
                                              @if($response['BarcodesGenerated'] != 'Yes')
                                              
                                              @endif

                                              ">
                                               <!-- d-none -->
                                                <div class="col-md-12">
                                                    <h3 class="profile-username text-left mb-1">Samples Information</h3>
                    
                                                    <input type="hidden" name="requestID" id="requestID" value="{{$response['OCMRequest'][0]->ReqestID}}"> 
                                                    <input type="hidden" name="episode" id="episode" value="{{$response['OCMRequest'][0]->RequestEpisodeID}}"> 
 
                                                </div>


                                                   
                                            @foreach ($response['OCMRequestTestsDetails'] as $OCMRequestTestsDetail)
                                            <div class="col-md-4 sampleIDs" id="{{$OCMRequestTestsDetail->PhlebotomySampleID}}">
                                                
                                                <?php 
                                                // print_r($response['OCMRequestTestsDetails']);

                                                if(
                                                  $response['OCMRequest'][0]->RequestState == 'Requested'
                                                  &&
                                                  $OCMRequestTestsDetail->PhlebotomySampleCollected == null
                                                  && $OCMRequestTestsDetail->PhlebotomySampleID != ''
                                                  ) {

                                                      ?>

                                              <button type="button" id="{{$OCMRequestTestsDetail->PhlebotomySampleID}}" data="{{$response['OCMRequest'][0]->ReqestID}}" class="btn btn-dark btn-xs float-right removeSample"><i class="fas fa-times"></i></button>

                                                      <?php
                                                  }
                                                  elseif(
                                                    $response['OCMRequest'][0]->RequestState == 'Requested'
                                                  
                                                    && $OCMRequestTestsDetail->PhlebotomySampleID != ''
                                                    ) {

                                                        ?>

                                                <button type="button" id="{{$OCMRequestTestsDetail->PhlebotomySampleID}}" data="{{$response['OCMRequest'][0]->ReqestID}}" class="btn btn-dark btn-xs float-right removeSample"><i class="fas fa-times"></i></button>

                                                        <?php
                                                    }

                                                ?>

                                                <!--  <a target="_blank" href="../../PrintSampleBarCodes/{{$response['OCMRequest'][0]->ReqestID}}/{{$response['OCMRequest'][0]->RequestEpisodeID}}/{{$OCMRequestTestsDetail->PhlebotomySampleID}}" type="button" class="mr-1 btn btn-xs btn btn-info float-right ">
                                                    <i class="fas fa-print"></i>
                                                </a> -->


                                                <div class="jumbotron p-3 bg-light">
                                                @if($OCMRequestTestsDetail->print != 'null')     
                                                <div class="bg-white">
                                                    <div class="p-2"><b>{{$response['OCMRequest'][0]->PatName}}</b>
                                                        
                                                        <div id="sampleInfo-{{$OCMRequestTestsDetail->PhlebotomySampleID}}">
                                                            @if($OCMRequestTestsDetail->PhlebotomySampleCollected == 'Yes') 
                                                        <span  title="Sample Collected" class=" float-right btn-success p-1"><i class="fas fa-check"></i></span> 
                                                        @else
                                                        <span  title="Sample Not Collected Yet" class="float-right btn-danger p-1"><i class="fas fa-hand-holding-water"></i></span>
                                                        @endif
                                                        </div>

                                                    </div>
                                                    <div class="px-2"><b>
                                     

                                                        {{\App\Http\Controllers\Controller::Date($response['OCMRequest'][0]->DoB)}}
                                                         {{$response['OCMRequest'][0]->Sex}} 
                                                     &nbsp; &nbsp; &nbsp; &nbsp;   
                                                     MRN {{$response['OCMRequest'][0]->Chart}}</b></div>

                                                     <div class="px-2"><b>
                                                        <!-- {{$OCMRequestTestsDetail->Hospital}}/ -->
                                                        {{$response['OCMRequest'][0]->Ward}}
                                                        <!-- /{{$response['OCMRequest'][0]->bed}} -->
                                                         </b></div>
                                               
                                                <div class="p-2 text-center">
                                                @if($OCMRequestTestsDetail->PhlebotomySampleID != '')
                                                <h3 style="height: 1px;width: 5rem;">   
                                                <?php
                                                echo DNS1D::getBarcodeSVG($OCMRequestTestsDetail->PhlebotomySampleID, 'C39',1,45)
                                                
                                                
                                                ?>
                                                </h3>
                                                
                                                <br>
  
                                                @endif
                                                </div> 

                                                 <div class="row px-2 pb-2 text-center">
                                                    <div class="col-md-12">
                                                        <b>
                                                        <?php 
                                                 
                                                          $tes =  App\Http\Controllers\requests::TestCodes($OCMRequestTestsDetail->sample);
                                                          $res = implode('/',$tes);
                                                        echo $res;
                                                            ?>  
                                                           
                                                        </b>
                                                    </div>
                                                </div>

                                                <div class="row px-2 pb-2">
                                                    <div class="col-md-4  bg-white" style="overflow: hidden;height: 22px;">
                                                        <b>{{$OCMRequestTestsDetail->Sample}}</b>
                                                    </div>
                                                    <div class="col-md-4  bg-white" style="overflow: hidden;height: 22px;">
                                                        <b>{{$OCMRequestTestsDetail->specialhandling}}</b>
                                                    </div>
                                                    <div class="col-md-4 text-right bg-white" style="overflow: hidden;height: 22px;">
                                                        <b>{{$OCMRequestTestsDetail->Hospital}}</b>
                                                    </div>
                                                </div>

                                                </div>
                                                @endif
                                      
                                                @if($OCMRequestTestsDetail->PhlebotomySampleDateTime != '')
                                               <div class="text-left mt-2"><b>Collection at : {{$OCMRequestTestsDetail->PhlebotomySampleDateTime}}</b></div>
                                                @endif
                                                
                                                 <input type="hidden" name="id[]" id="id" value="{{$OCMRequestTestsDetail->sample}}"> 

                                                

                                                <input class="form-control" type="hidden" name="print[]" 
                                                @if($OCMRequestTestsDetail->print != '') 
                                                value="{{$OCMRequestTestsDetail->print}}"
                                                @else
                                                value="2"
                                                @endif
                                                >
                                                 <input type="hidden" name="specialhandling[]" id="specialhandling" value="{{$OCMRequestTestsDetail->specialhandling}}"> 
                                                <textarea rows="5" placeholder="Comments"

                                                @if($response['SampleCollected'] == 'Yes')
                                                readonly
                                                style="background: white;" 
                                                @endif
                                                 name="comments[]"  class="form-control mt-2">{{$OCMRequestTestsDetail->comment}}</textarea>

                                                </div>
                                            </div>
                                            @endforeach

                                              </div>
                                              </form>

                                            </div>

                                            </div>




                                            
                                          
                                <div class="col-md-12">
                                    

            

                                     @if($response['BarcodesGenerated'] == 'Yes')
                                    
                                    @if($response['SampleCollected'] == 'No')
                                    @if($response['OCMRequest'][0]->RequestState == 'Requested')
                                    <button id="btnAdd" type="button" class="mr-1 btn btn-dark Discard float-right">
                                    Discard Samples Info 
                                    </button>
                                    @endif
                                    @if($response['OCMRequest'][0]->PatientConfirmation != 1)
                                    <button id="btnAdd" type="button" class="mr-1 btn btn-danger ConfirmPatient float-right">
                                    Confirm Patient 
                                    </button>
                                    @else
                                    <button id="btnAdd" type="button" class="mr-1 btn btn-success ConfirmCollection float-right">
                                    Confirm Collection 
                                    </button>
                                     @endif
                                    @endif
                                    @else
                                     <button id="btnAdd" type="button" class="mr-1 btn btn-warning AddUpdatebtnPrint float-right">
                                    Generate & Print Barcodes Label
                                    </button>
                                    
                                     @endif


                                     <button class="btn btn-info  mr-1 goBack float-right" id="{{route('Requests')}}/Requested"><i class="fas fa-arrow-left"></i> Exit Page </button>



                                </div> 


                            </div>
                        </div> 


                           <!-- Modal -->
                <div class="modal fade" id="ConfirmPatientModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-md  modal-dialog-centered">
                        <div class="modal-content">
                           <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white">Scan Patient's Wristband</h5>
                               <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body p-0 pt-0">
                            
                                <!--         <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active closeWebCam" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">QR Code Scanner</a>
                        <a class="nav-item nav-link openWebCam" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Web Cam</a>
                    </div>
                </nav> -->
                <div class="tab-content py-0 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active p-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                       <form id="qrScanForm">
                        
                            
                            <textarea class="form-control" name="qrcode" id="qrcode" rows="1" placeholder="Scan Patient's Wristband"></textarea>
                            <button  type="button" class="mr-1 mt-2 mb-2 btn btn-danger ScanBtn float-right">
                                    Confirm Patient 
                                    </button>


                       </form>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="text-center loadingCamera"><b>Loading Camera....</b></div>    
                         <video style="width: 100%;"  id="preview"></video>
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

<script src="{{asset('plugins/sweetalert2@11.js')}}"></script>
<script src="{{asset('plugins/moment.min.js')}}"></script>
<script src="{{asset('plugins/instascan.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function () {

                           
                           

                            var response = @json($response);  


                              qr = '';

                             var Sex = response.OCMRequest[0].Sex;
                             if(Sex == 'M') {  Sex = 'Male'; } else { Sex = 'Female'; }

                            
                            var today = new Date();
                            var birthDate = new Date(response.OCMRequest[0].DoB);
                            var age = today.getFullYear() - birthDate.getFullYear();
                            var m = today.getMonth() - birthDate.getMonth();
                            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                                age--;
                            }

                            $('#patage').html(age);



                            $('#patname').text(response.OCMRequest[0].PatName);
                            $('#PatSurName').text(response.OCMRequest[0].PatSurName);
                            $('#PatForeName').text(response.OCMRequest[0].PatForeName);
                          
                            $('#patSex0').text(response.OCMRequest[0].Sex);
                            $('#patSex_').text(Sex);

                           
                            DateFormat(response.OCMRequest[0].DoB)
                            $('#pataddress').text(response.OCMRequest[0].Address0);
                            
                            $('#patmrn').text(response.OCMRequest[0].MRN);
                            $('#patchart').text(response.OCMRequest[0].Chart);
                            $('#requestid').text(response.OCMRequest[0].ReqestID);
                            $('#episodeTxt').text(response.OCMRequest[0].RequestEpisodeID);

                            $('#fasting').text(response.OCMRequest[0].RequestFasting);
                            $('#outofhours').text(response.OCMRequest[0].outofhours);
                            $('#priority').text(response.OCMRequest[0].RequestPriority);
                            

                            if(response.OCMRequest[0].Ward != null) { 

                            if(response.OCMRequest[0].bed != null) {
                            $('#ward').text(response.OCMRequest[0].Ward+' - Bed '+ response.OCMRequest[0].bed);
                            } else {
                            $('#ward').text(response.OCMRequest[0].Ward);   
                            }

                            } else {

                            if(response.OCMRequest[0].bed != null) {
                            $('#ward').text(response.OCMRequest[0].clinic+' - Bed '+ response.OCMRequest[0].bed);
                            } else {
                            $('#ward').text(response.OCMRequest[0].clinic);   
                            }
                            }

                            

                            $('#clinician').text(response.OCMRequest[0].Clinician);
                            $('#status').text(response.OCMRequest[0].RequestState);
                            // $('#datetime').text(response.ExecutionDateTime);
                            $('#clinicianNotes').val(response.OCMRequest[0].RequestClinicalDetail);
                            $('#notes').val(response.OCMRequest[0].RequestNotes);
        
                              if(response.OCMRequest[0].RequestClinicalDetail == '' || response.OCMRequest[0].RequestClinicalDetail == null) {
                                $('#clinicianNotesDiv').css('display','none')
                              }
                              if(response.OCMRequest[0].RequestNotes == '' || response.OCMRequest[0].RequestNotes == null) {
                                $('#notesDiv').css('display','none')
                              }

                             var sr = 0;
                             var tr_id = 0;

                          
                      

                   $(document).on('click', '.goBack', function () {  
                        
                        var id = this.id;
                        var rid = response.OCMRequest[0].ReqestID;

                                $.ajax({
                                        type: 'get',
                                        url:"{{ route( 'checkPendingSamples') }}",
                                        data: {'rid' : rid, _token: CSRF_TOKEN,},
                                        dataType: 'json',                   
                                        success: function(response){ 

                                                if(response == 1) {

                                                     window.location = '../../Requests/All'; 
                                                } 
                                                else {


                                                     Swal.fire({
                                                      title: "You have pending samples in this request.",
                                                      icon: "warning",
                                                      buttons: true,
                                                      showCancelButton: true,
                                                      dangerMode: true,
                                                      confirmButtonColor: '#e64942',
                                                      confirmButtonText: "Create New Request Using Pending Samples",
                                                      cancelButtonText: "Cancel Pending Samples"
                                                    })
                                                    .then((willDelete) => {
                                                      
                                                      if (willDelete) {
                                                        
                                                        if (willDelete.isConfirmed) {
                                                                
                                                                $.ajax({
                                                                    type: 'post',
                                                                    url:"{{ route( 'createRequestFromPendingSamples') }}",
                                                                    data: {'rid' : rid,  _token: CSRF_TOKEN},
                                                                    dataType: 'json',                   
                                                                        success: function(response2){

                                                                             if(response2 == 1) {

                                                                                window.location = '../../Requests/Requested'; 

                                                                             }

                                                                         }
                                                                 }) 
                                                            }
                                                            else {


                                                                $.ajax({
                                                                    type: 'post',
                                                                    url:"{{ route( 'getPendingSampleIDs') }}",
                                                                    data: {'rid' : rid,  _token: CSRF_TOKEN},
                                                                    dataType: 'json',                   
                                                                        success: function(response3){

                                                                               console.log(response3) 
                                                                               if(response3.length) {

                                                                                $( response3 ).each(function( index ) {  

                                                                                $.ajax({
                                                                                    type: 'get',
                                                                                    url:"{{ route( 'discardSamplesID') }}",
                                                                                    data: {'id' : response3[index].PhlebotomySampleID,'rid' : rid},
                                                                                    dataType: 'json',                   
                                                                                    success: function(response){

                                                                                        window.location = '../../Requests/SentToTheLab';        

                                                                                     }
                                                                                         })

                                                                                 })  
                                                                               }
                                                                               

                                                                               

                                                                         }
                                                                 })


                                                                
                                                           }


                                                       } 
                                                    });


                                                }
                                        }
                                      })  

                       }) 
                      

                      $(document).on('click', '.addSampleInfo', function () {  
                        
                        var id = $(this).attr('id');
                            id = id.split("-"); 
                            id = id[1]; 
                        var tr = $('#tbody-'+id).find('tr:last').attr('id');
                        var clonedDiv = $('#'+tr).clone(true).appendTo('#tbody-'+id); 

                        var tr = $('#tbody-'+id).find('tr:last').attr('id');
                        id2 = parseFloat(tr)+1;
                        var tr = $('#tbody-'+id).find('tr:last').attr('id',id2);
                                 $('#tbody-'+id).find('tr:last').find('#barcode').remove();
                                 $('#tbody-'+id).find('tr:last').find('#notes').val('');
                                 $('#tbody-'+id).find('tr:last').find('#sid').val('');

                       }) 


                      

                       $(document).on('click', '.remove', function () {  
                        
                         var tr_id = $(this).closest('tr').attr('id');
                          var tbody = $(this).closest('tbody').attr('id');
                              var rowCount = $('table >#'+tbody+' >tr').length;
  
                            if(rowCount == 1) {

                             Lobibox.notify('warning', {
                                    pauseDelayOnHover: true,
                                    continueDelayOnInactiveTab: false,
                                    position: 'top right',
                                    msg: 'Atleast add 1 Sample.',
                                    icon: 'bx bx-info-circle'
                                });

                                }  else {
                                  $('#'+tbody).find("#"+tr_id).remove();
                                }



                       })   


            //add and update js code

                 $(".AddUpdatebtnPrint").click(function (event) {


                        $(".AddUpdatebtnPrint").prop("disabled", false);

                        //stop submit the form, we will post it manually.
                        event.preventDefault();

                        // Get form
                        var form = $('#form')[0];

                        // Create an FormData object
                        var data = new FormData(form);
                        data.append("printS", "yes");

                          var url = "{{ route('saveRequestSamples') }}"

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
                                console.log(data);
                                    if ($.isEmptyObject(data.error)){
                                         Lobibox.notify('success', {
                                                pauseDelayOnHover: true,
                                                continueDelayOnInactiveTab: false,
                                                position: 'top right',
                                                msg: data.success,
                                                icon: 'bx bx-check-circle'
                                            });

                                     window.open("../../PrintSampleBarCodes/"+data.rid+'/'+data.eid);

                                     location.reload();
          
                                    } else {
                                         Lobibox.notify('warning', {
                                                pauseDelayOnHover: true,
                                                continueDelayOnInactiveTab: false,
                                                position: 'top right',
                                                msg: data.error,
                                                icon: 'bx bx-info-circle'
                                            });
                                         $(".AddUpdatebtnPrint").prop("disabled", false);
                                    }
                                }

                            });


                    

                    });






                  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                   $(".ConfirmCollection").click(function (event) {


                       var requestID = $('#requestID').val();
                       var episode = $('#episode').val();
    
   

                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 
                                                   
                                        sampleIDs(requestID,episode,CSRF_TOKEN);

                        

                                           function sampleIDs() {
                                                   
                                                   $.ajax({
                                                    type: 'get',
                                                    url:"{{ route( 'checkSampleStatus') }}",
                                                    data: {'rid' : requestID, 'eid' : episode, _token: CSRF_TOKEN,},
                                                    dataType: 'json',                   
                                                    success: function(response){ 
                                                                    
                                                                    // console.log(response.sampleID)
                                                                    // console.log(response.sampleID.length)

                                                             if(response.sampleID != '') {

                                                                separator = ',';
                                                                implodedArray = '';
                                                      
                                                                for(let i = 0; i < response.sampleID.length; i++) {
                                                      
                                                                    // add a string from original array
                                                                    implodedArray += response.sampleID[i];
                                                      
                                                                    // unless the iterator reaches the end of
                                                                    // the array add the separator string
                                                                    if(i != response.sampleID.length - 1){
                                                                        implodedArray += separator; 
                                                                    }
                                                                }
                                                      
                                                               // console.log(implodedArray);


                                                                 Swal.fire({
                                                                  title: 'Please Scan Barcode',
                                                                  input: 'text',
                                                                  position: 'top-end',
                                                                  confirmButtonText: "Confirm Collection",
                                                                  showCancelButton: true,
                                                                  inputValidator: (value) => {
                                                                    return new Promise((resolve) => {
                                                                        

                  if (value != '') {
                      
                        $.ajax({
                          type: 'get',
                          url:"{{ route( 'saveSampleStatus') }}",
                          data: {'rid' : requestID, 'eid' : episode, 'id' : implodedArray, 'value' : value, _token: CSRF_TOKEN,},
                          dataType: 'json',                   
                          success: function(respons2e){ 

                              
                                      
                                    if(respons2e.success == 0)  {

                              
                                      resolve(respons2e.msg)

                                    } else {


                                      $('#sampleInfo-'+respons2e.checked).html('<span  title="Sample Collected" class=" float-right btn-success p-1"><i class="fas fa-check"></i></span>'); 

                                        sampleIDs(requestID,episode,CSRF_TOKEN);
                                    }
                                    

                                  }
                            })

                    } else {
                      resolve('You need to scan Barcode.')
                    }      



                  })
                }
              })

                                                         
                                                            } 
                                                            else {

                                                                var form = $('#form')[0];
                                                                var data = new FormData(form);
                                                                $.ajax({
                                                                    type: "POST",
                                                                    enctype: 'multipart/form-data',
                                                                    url: "{{ route('saveRequestSamplesNotes') }}",
                                                                    data: data,
                                                                    processData: false,
                                                                    contentType: false,
                                                                    cache: false,
                                                                    timeout: 600000

                                                                    });
                                        
                                                                location.reload()

                                                            }
                                                     }       
                                                            
                                                     })

                                               }    

                    })

                   $(document).on('click', '.ConfirmPatient', function () { 

                        


                        $('#ConfirmPatientModal').modal({backdrop: 'static', keyboard: false}) 
                        $('#ConfirmPatientModal').modal('show'); 
                  
                        $('#ConfirmPatientModal').on('shown.bs.modal', function (e) {


                                $('#qrcode').focus();

                        
                         })



                   })

                    $(document).on('click', '.ScanBtn', function () { 


                       var requestID = $('#requestID').val();
                       var episode = $('#episode').val(); 

                    var patmrn = $('#patchart').text(); 
                    var content = $('#qrcode').val();   
                    var PatForeName = $('#PatForeName').text(); 
                    var PatSurName = $('#PatSurName').text(); 
                    
                    var psex = $('#patSex0').text();
                        if(psex == 'M') {  psex = 'Male'; } else { psex = 'Female'; } 
                    
                    var pdob = $('#patDoB').text(); 
                        pdob = pdob.replace("-", "/");
                        pdob = pdob.replace("-", "/");

                        
                    currentContent = patmrn+"~"+PatSurName+"~"+PatForeName+"~"+pdob+"~"+psex;



                    
                                $("#qrcode").val(currentContent)
                                content = content.replace(/(\r\n|\r|\n)/g, '~');
                            
                             // alert(currentContent)
                             //    alert(content)

                             //    return false;



                                if(currentContent === content) {
                                    
                                     Lobibox.notify('success', {
                                      pauseDelayOnHover: true,
                                      continueDelayOnInactiveTab: false,
                                      position: 'top right',
                                      msg: 'QR Code Matched. Now Proceeding ...',
                                      icon: 'bx bx-info-circle'
                                      });


                 
                                        var form = $('#form')[0];
                                        var data = new FormData(form);
                                        $.ajax({
                                            type: "POST",
                                            enctype: 'multipart/form-data',
                                            url: "{{ route('saveRequestSamplesNotes') }}",
                                            data: data,
                                            processData: false,
                                            contentType: false,
                                            cache: false,
                                            timeout: 600000

                                            });



                                      $.ajax({
                                            type: 'get',
                                            url:"{{ route( 'PatientConfirmation') }}",
                                            data: {'rid' : requestID, 'eid' : episode, _token: CSRF_TOKEN,},
                                            dataType: 'json',                   
                                            success: function(response){ 

                                            setTimeout(function () {
                                                location.reload(true);
                                              }, 1000);

                                            } 

                                        })

                                      

                                } else {

                                     Lobibox.notify('warning', {
                                      pauseDelayOnHover: true,
                                      continueDelayOnInactiveTab: false,
                                      position: 'top right',
                                      msg: 'QR Code Not Matched! Try Again.',
                                      icon: 'bx bx-info-circle'
                                  });
                                   
                                }


                    })
                   

                      $(document).on('click', '.closeWebCam', function () { 


    
                            const video = document.querySelector('video');

                            // A video's MediaStream object is available through its srcObject attribute
                            const mediaStream = video.srcObject;

                            // Through the MediaStream, you can get the MediaStreamTracks with getTracks():
                            const tracks = mediaStream.getTracks();

                            // Tracks are returned as an array, so if you know you only have one, you can stop it with: 
                            tracks[0].stop();

                            // Or stop all like so:
                            tracks.forEach(track => track.stop())

                      })


                   $(document).on('click', '.openWebCam', function () { 

                        var requestID = $('#requestID').val();
                       var episode = $('#episode').val(); 

                    var pname = $('#patname').text(); 
                    var psex = $('#patSex0').text(); 
                    var pdob = $('#patDoB').text(); 

                    currentContent = pname+","+pdob+","+psex;


                           let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
                             scanner.addListener('scan', function (content) {
                                 //console.log(currentContent);
                                 
                                content = content.replace(/(\r\n|\r|\n)/g, ',');
                                 //console.log(content);

                                if(currentContent === content) {
                                    
                                     Lobibox.notify('success', {
                                      pauseDelayOnHover: true,
                                      continueDelayOnInactiveTab: false,
                                      position: 'top right',
                                      msg: 'QR Code Matched. Now Proceeding ...',
                                      icon: 'bx bx-info-circle'
                                      });

                                     var form = $('#form')[0];
                                        var data = new FormData(form);
                                        $.ajax({
                                            type: "POST",
                                            enctype: 'multipart/form-data',
                                            url: "{{ route('saveRequestSamplesNotes') }}",
                                            data: data,
                                            processData: false,
                                            contentType: false,
                                            cache: false,
                                            timeout: 600000

                                            });


                                      $.ajax({
                                            type: 'get',
                                            url:"{{ route( 'PatientConfirmation') }}",
                                            data: {'rid' : requestID, 'eid' : episode, _token: CSRF_TOKEN,},
                                            dataType: 'json',                   
                                            success: function(response){ 

                                            setTimeout(function () {
                                                location.reload(true);
                                              }, 1000);

                                            } 

                                        })

                                      

                                } else {

                                     Lobibox.notify('warning', {
                                      pauseDelayOnHover: true,
                                      continueDelayOnInactiveTab: false,
                                      position: 'top right',
                                      msg: 'QR Code Not Matched! Try Again.',
                                      icon: 'bx bx-info-circle'
                                  });
                                   
                                }
                             });
                             Instascan.Camera.getCameras().then(function (cameras) {
                                if (cameras.length > 0) {
                                 scanner.start(cameras[0]);
                                 $('.loadingCamera').remove();
                                } else {
                                 console.error('No cameras found.');
                                }
                             }).catch(function (e) {
                                console.error(e);
                             });
                            })



                   $(document).on('click', '.close', function () { 

                        location.reload();

                   })

                    


                 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                   $(".Discard").click(function (event) {


                       var requestID = $('#requestID').val();
                       var episode = $('#episode').val();
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 
                         

                                    Swal.fire({
                                      title: "Are you sure?",
                                      icon: "warning",
                                      buttons: true,
                                      showCancelButton: true,
                                      dangerMode: true,
                                      confirmButtonColor: '#e64942',
                                    })
                                    .then((willDelete) => {
                                      if (willDelete) {
                                        
                                        if (willDelete.isConfirmed) {
                                        $.ajax({
                                            type: 'get',
                                            url:"{{ route( 'discardSamplesInfo') }}",
                                            data: {'rid' : requestID, 'eid' : episode, _token: CSRF_TOKEN},
                                            dataType: 'json',                   
                                            success: function(response){

                                                    location.reload();

                                             }
                                                 }) 
                                            }


                                       } 
                                    });

          


                                                


                  

                       })
                 


        var id = $('#PrintDiv').attr('id');

     $("#print").click(function(){
        
        $('#print').css('display','none')
        $('.main-footer').css('display','none')
        $('#printTitle').attr('style', 'display: block !important');
        printTitle
        function printData()
        {
           var divToPrint=document.getElementById(id);
           newWin= window.print();
           newWin.document.write(divToPrint.innerHTML);
           newWin.print();
           newWin.close();
        }
        printData();
            
        });

     document.getElementsByTagName("BODY")[0].onafterprint = function() {myFunction()};

        function myFunction() {

           $('#print').css('display','block')
            $('.main-footer').css('display','block')
            $('#printTitle').attr('style', 'display: none !important'); 
        }


     })  



  $(document).on('click', '.removeSample', function () {  
    // $(".sampleIDs")
    var count=Array.from(document.querySelectorAll(".sampleIDs"));
console.log(count.length);
if(count.length==1){
  console.log("yes")
  Lobibox.notify('warning', {
                                    pauseDelayOnHover: true,
                                    continueDelayOnInactiveTab: false,
                                    position: 'top right',
                                    msg: 'Atleast have 2 labels.',
                                    icon: 'bx bx-info-circle'
                                });
                                return false;

}


                        var id = $(this).attr('id');
                        var rid = $(this).attr('data');
                        
                             Swal.fire({
                                      title: "Are you sure?",
                                      icon: "warning",
                                      buttons: true,
                                      showCancelButton: true,
                                      dangerMode: true,
                                      confirmButtonColor: '#e64942',
                                    })
                                    .then((willDelete) => {
                                      if (willDelete) {
                                        
                                        if (willDelete.isConfirmed) {
                                        
                                        $.ajax({
                                            type: 'get',
                                            url:"{{ route( 'discardSamplesID') }}",
                                            data: {'id' : id,'rid' : rid},
                                            dataType: 'json',                   
                                            success: function(response){
                              console.log("1");
                                                    location.reload();

                                             }
                                                 }) 
                                            }


                                       } 
                                    });


                       }) 



</script>

                                         
                                        
                                          

@endpush
