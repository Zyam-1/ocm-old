





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
            <h1 class="m-0">Biochemistry 
               
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

                  <form id="form" method="get">
                                       {{ csrf_field() }}
                                      
         
                         <div class="card card-primary card-outline">
                            <div class="card-body ">  
                 <div class="col-md-12">
                   
                 </div>          
                <div class="row mt-3">
                    <div class="col-md-2">

                   

                        <label class="form-label">Sample ID</label>
                        <input type="number" name="sid" id="sid" value="<?php if(count($rows) > 0) {echo $rows['SampleID'];} ?>" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">MRU</label>
                        <select name="mru" id="mru" class="form-control">
                            <option >MRU</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-8">
                                <label class="form-label">Other Samples</label>
                                <select name="othersample" id="othersample" class="form-control">
                                    <option value="othersample">Other Samples</option>
                                </select>
                            </div>
                            <div class="col-2 mt-4">
                                <a href="#" class="btn btn-primary mt-1">Scan</a>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-md-2">
                         <label class="form-label">Chart #</label>
                        <input type="text" name="canvanNumber" value="<?php if(count($rows) > 0) {echo $rows['Chart'];}?>" class="form-control">
                    </div>
                        <div class="col-md-2">
                         <label class="form-label">Surname</label>
                        <input type="text" name="sname"  value="<?php if(count($rows) > 0) {echo $rows['SurName'];}?>" class="form-control">
                    </div>
                    <div class="col-md-2">
                         <label class="form-label">Forename</label>
                        <input type="text" name="fname"  value="<?php if(count($rows) > 0) {echo $rows['ForeName'];}?>" class="form-control">
                    </div>
             
                    <div class="col-md-2 mt-2">
                          <label class="form-label">Sample Date</label>
                        
                          
                          <input type="datetime-local" name="sampledate" class="form-control"   value="<?php if (count($rows)>0) { echo  \Carbon\Carbon::parse($rows['SampleDate'])->format('Y-m-d\TH:i:s');} ?>"> 
                          

                          
                    </div>
                    <div class="col-md-2 mt-2">
                          <label class="form-label">GP</label>
                        <input type="text" name="gp" class="form-control"  value="<?php if(count($rows) > 0) {echo $rows['GP'];}?>">
                    </div>
                    
                    <div class="col-md-2 mt-2">
                        <label class="form-label"> </label>
                        <div class="input-group mt-2">
                            <input type="text" name="fname" class="form-control" ><a href="#" class="btn btn-primary">Search</a>
                        </div>
                    </div>
              



                    <div class="col-md-2">

                    
                         <label class="form-label mt-2">D.O.B</label>
                        <input type="date" name="dob" value="<?php if (count($rows)>0) { echo  \Carbon\Carbon::parse($rows['DoB'])->format('Y-m-d');} ?>" class="form-control" >
                
                    </div>
                    <div class="col-md-2">
                         <label class="form-label mt-2">Age</label>
                        <input type="text" name="age" class="form-control" id="getage"  value="<?php if(count($rows) > 0) {echo $rows['Age'];}?>">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label mt-2">Sex</label>
                        <div class="input-group">
                            <input type="text" name="sex" id="getsex" class="form-control"  value="<?php if(count($rows) > 0) {echo $rows['Sex'];}?>" ><a href="#" class="btn btn-primary">Search</a>
                        </div>
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="col-md-10">
                       <!--Start Tabs -->
    <nav>
  
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link demo  {{ (request()->segment(2) ==  'Demographics' ) ? 'active' : '' }}" id="demographics-tab" data-toggle="tab" href="#demographics" role="tab" aria-controls="demographics" aria-selected="true">Demographics</a>
        <a class="nav-item nav-link heam  {{ (request()->segment(2) ==  'Haematology' ) ? 'active' : '' }}" id="cs-tab" data-toggle="tab" href="#cs" role="tab" aria-controls="cs" aria-selected="false">Haematology</a>
        <a class="nav-item nav-link bio {{ (request()->segment(2) ==  'Biochemistry' ) ? 'active' : '' }}" id="Biochemistry-tab" data-toggle="tab" href="#Biochemistry" role="tab" aria-controls="Biochemistry" aria-selected="false">Biochemistry</a>
        <a class="nav-item nav-link coag  {{ (request()->segment(2) ==  'Coagulation' ) ? 'active' : '' }}" id="coagulation-tab" data-toggle="tab" href="#coagulation" role="tab" aria-controls="coagulation" aria-selected="false">Coagulation</a>
        <a class="nav-item nav-link exter  {{ (request()->segment(2) ==  'External' ) ? 'active' : '' }}" id="External-tab" data-toggle="tab" href="#External" role="tab" aria-controls="External" aria-selected="false">External</a>
        </div>
    </nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade {{ (request()->segment(2) ==  'Demographics' ) ? 'show active' : '' }}" id="demographics" role="tabpanel" aria-labelledby="nav-home-tab">
    <!-- <form> -->
    <div class="">
    <div class="row pt-3">
    <div class="col-md-6">
    <div class="row pt-3">  


    <div class="col-md-6">
    <div class="form-outline">
  <label class="form-label mb-0" for="chartNumber">Chart #:</label>
  <input type="text" id="chartNumber" name="chartNumber"   value="<?php if(count($rows) > 0) {echo $rows['Chart'];}?>" class="form-control form-control" />
 
  </div>
  </div>
 

       <div class="col-md-6">
         <label class="form-label mb-0">Recieved In Lab</label>
         <input type="datetime-local" name="recieved" value="<?php if(count($rows) > 0) {echo \Carbon\Carbon::parse($rows['SampleDate'])->format('Y-m-d\TH:i:s');}?>" class="form-control">
       </div>



  </div>
  <div class="wrapper pt-3">
  <!-- <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" name="pregnant" id="pregnent"value="option2"  />
    <label class="form-check-label" for="pregnant">Pregnant</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" name="penecilin" id="penecilin"value="option24" />
    <label class="form-check-label" for="penecilin">Penecilin Allergy</label>
  </div> -->
  <div class="row pt-3">
  <div class="col-md-4">
  <div class="form-outline datepicker w-100">
  <label for="dob2" class="form-label  mb-0">D.O.B</label>
  <div>
  <input id="inp1" type="date" name="dob2" class="form-control"   value="<?php if (count($rows)>0) { echo  \Carbon\Carbon::parse($rows['SampleDate'])->format('Y-m-d');} ?>">
  </div>
  </div>
  </div>
  <div class="col-md-4">
  <div class="form-outline">
  <label class="form-label  mb-0" for="age2">Age</label>
  <input type="text" id="age2" name="age2" class="form-control form-control" value="<?php if(count($rows) > 0) {echo $rows['Age'];}?>" placeholder="" />
 
  </div>
  </div>
  <div class="col-md-4">
  <div class="form-outline">
  <label class="form-label  mb-0" for="sex2">Sex</label>
  <input type="text" id="sex2" name="sex2" class="form-control form-control" value="<?php if(count($rows) > 0) {echo $rows['Sex'];}?>" placeholder="Male" />
 
  </div>
  </div>
  </div>
  <div class="row pt-3">
  <div class="col-md-12">
  <div class="form-outline">
    <label class="form-label mb-0 " for="address">Address</label>
    <input class="form-control"placeholder="Addr0" id="address" name="address" value="<?php if(count($rows) > 0) {echo $rows['Addr0'];}?>"/>
    <input class="form-control mt-1"placeholder="Addr1" id="address2" name="address2" value="<?php if(count($rows) > 0) {echo $rows['Addr1'];}?>"/>
  </div>
  </div>
  </div>
  <div class="row pt-3">
  <div class="col-md-12">
  <div class="form-outline">
    <label class="form-label mb-0 " for="hospital">Hospital</label>
    <input class="form-control mt-1" id="hospital" name="hospital" value="<?php if(count($rows) > 0) {echo $rows['Hospital'];}?>"/>
  </div>
  </div>
  </div>
  <div class="row pt-3">
  <div class="col-md-12">
  <div class="form-outline">
    <label class="form-label mb-0 " for="ward">Ward</label>
    <select name="ward" id="wardselect" class="form-control">

    <option value="<?php if(count($rows) > 0) {echo $rows['Ward'];}?>"><?php if(count($rows) > 0) {echo $rows['Ward'];}?></option>
    @foreach($wardsarray as $ward)

        <option value="{{$ward}}">{{$ward}}</option>
        
@endforeach

    </select> 
 
  </div>
  </div>
  </div>
  <div class="row pt-3">
  <div class="col-md-12">
  <div class="form-outline">
    <label class="form-label mb-0 " for="clinician">Clinician</label>
    <select name="clinician" id="clinicianselect" class="form-control">

    @foreach ($cliarray as $clinician)
    <option value="{{$clinician}}">{{$clinician}}</option>
       @endforeach
    </select>  
  </div>
  </div>
  </div>
  <div class="row pt-3">
  <div class="col-md-12">
  <div class="form-outline">
    <label class="form-label mb-0 " for="gp">GP</label>
    <select name="gp" id="selectgp" class="form-control">

    @foreach($getgparray as $getgp)
        <option value="{{$getgp}}">{{$getgp}}</option>

        @endforeach
    </select>  
 
  </div>
  </div>
  </div>
  <div class="row pt-3">
  <div class="col-md-12">
  <div class="form-outline">
  <label class="form-label mb-0 " >Comments</label>
  <select name="listcomment" id="listcomment" class="form-control">
    @foreach($ocmcom as $getcom)
        <option value="{{$getcom}}">{{$getcom}}</option>
    @endforeach
    </select>  
  <textarea class="form-control mt-4"placeholder="" id="showlist" rows="5"></textarea>
 
  </div>
  </div>
  </div>
  <div class="row pt-3">
    <div class="col-md-12">
        <h5 class="my-3">Reject Sample</h5>
        <div class="row">
            <div class="col-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="check1">
                    <label class="form-check-label" for="check1">
                        Reject Biochemistry Sample
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="check2">
                    <label class="form-check-label" for="check2">
                        Reject Haematology Sample
                    </label>
                </div>
            </div>
            <div class="col-6">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="check3">
                <label class="form-check-label" for="check3">
                    Reject Coagulation Sample
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="check4">
                <label class="form-check-label" for="check4">
                    Reject External Sample
                </label>
            </div>
            </div>
        </div>
    
       
    </div>
  </div>
 
  </div>
 
 
 
 
 
 
 
 
  </div>
    <div class="col-md-6">
    <div class="row pt-3">
    <div class="col-md-6">
    <div class="form-outline datepicker w-100">
  <label for="rundate" class="form-label mb-0">Run Date</label>
  <div>
  <input id="inp1" type="datetime-local" name="rundate" class="form-control" value="<?php if(count($rows) > 0) {echo \Carbon\Carbon::parse($rows['RunDate'])->format('Y-m-d\TH:i:s');}?>">
  </div>
  </div>    
    </div>
    <div class="col-md-6">
    <div class="form-outline datepicker w-100">
  <label for="sampledate" class="form-label  mb-0">Sample Date</label>  
  <input id="sampledate" type="datetime-local" name="sampledate" class="form-control" value="<?php if (count($rows)>0) { echo  \Carbon\Carbon::parse($rows['SampleDate'])->format('Y-m-d\TH:i:s');} ?>">
  <div>
  </div>
  </div>    
    </div>    
    </div>
    <div class="wrapper pt-3">
        <div class="row pt-3">
       

            <div class="col-md-4">
                    <input class="form-check-input ml-1" type="radio" name="urgent" id="urgent" <?php if(count($rowsocm2) > 0) { if($rowsocm2['Urgent'] == 1) { echo'checked';}} ?>/>
                    <label class="form-check-label ml-4" for="urgent" >Urgent</label>
                    
                </div>

                <div class="col-md-4">
                    <input class="form-check-input" type="radio" name="fasting" id="fasting" <?php if(count($rowsocm2) > 0) { if($rowsocm2['fasting'] == 1) { echo'checked';}} ?>/>
                    <label class="form-check-label" for="fasting">Fasting</label>
                </div>

                <div class="col-md-4">
                    <input class="form-check-input" type="radio" name="routine" id="outhours" <?php if(count($rowsocm2) > 0) { if($rowsocm2['RooH'] == 1) { echo'checked';}} ?>/>
                    <label class="form-check-label" for="outhours">Out Of Hours</label>
                </div>

        </div>
  
  <div class="row pt-3">
       <div class="col-md-12 text-center pt-3">
         <h4>Patient AntiBiotics/Intended AntiBiotics</h4>
       </div>
 
     </div>

 
     <div class="row pt-3">
       <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>   
                        <th>Question</th>
                        <th>Answers</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ocmque as $ocmdata)
                    <tr>
                        <td>{{$ocmdata['question']}}</td>
                        <td>{{$ocmdata['answer']}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
       </div>

       <div class="col-md-12">
            <label class="form-label" for="clinicaldetails">Cl Details</label>
            <textarea class="form-control" name="clinicaldetails"  id="clinicaldetails" rows="3" ><?php if(count($rowsocm2) > 0) {  echo $rowsocm2['ClDetails']; } ?></textarea>
       </div>
         <div class="col-md-12">
          <label class="form-label mt-2">Note</label>
         <textarea class="form-control" name="text" rows="3" ><?php if(count($rowsocm2) > 0) {  echo $rowsocm2['notes']; } ?></textarea>
       </div>
     </div>
 
   <div class="col-md-12 pt-3 mt-2">
        <a href="#" class="btn btn-primary">Order External Tests</a>
        <a href="#" class="btn btn-success">Order Tests</a>

        <a href="#" class="btn btn-warning">Save & Hold</a>
        <button class="btn btn-secondary" id="demographicsSave" >Save</button>
    </div>
 
  </div>
     
     
     
     
 
    </div>
   
  </div>
 
 
  </div>
   <!-- </form>   -->
  </div>
 
 
<div class="tab-pane fade  {{ (request()->segment(2) ==  'Haematology' ) ? 'show active' : '' }}" id="cs" role="tabpanel" aria-labelledby="nav-profile-tab">
   
    <div class="row mt-4">
            <div class="col-12" >
                <table  class="table table-striped" >
                    <thead>
                        <tr>   
                            <th>Test Name</th>
                            <th>Result</th>
                            <th>Ranges</th>
                            <th>Units</th>
                            <th>Flags</th>
                            <th>Analyser</th>
                            <th>VP</th>
                            <th>Cmt</th>
                            
                            <th>Result</th>
                        </tr>
                    </thead>
                    <tbody >
                     
                    <?php  

                             if(count($haemarray) > 0){

                               
                               // exit();

                                 foreach($haemarray as $data){

                      ?>

<tr>
                            
                            <td>  <?php  echo $data['SourceValue'];?></td>
                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['result'])?></td>
                           <td> .</td>
                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['units'])?></td>

                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['flags'])?></td>
                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['analyser'])?></td>
                            <td>.</td>
                          
                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['comment'])?></td>
                            <!-- data-toggle="modal" data-target="#exampleModal" -->
                            <td><button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary addrbtn" onClick="reply_click(this.id)" id="<?php  echo $data['Code']; ?>"> <i class="fa fa-plus"></i></button></td>
                            </tr>
                     <?php }};?>
                      
                    </tbody>
                </table>

              

                <div class="row">


                    <div class="col-md-8">


                    <div class="form-row">
                      
                        <div class="form-group mx-2">
                            <select class="form-control" id="select1">
                                <option>Serum</option>
                                <option>1</option>
                            </select>
                        </div>
                    </div>


                        <div>
                            <label for="specimancomments" class="form-label">Speciman Comments</label>
                           
                            <textarea name="specimancomments" id="haemspeci" cols="30" rows="5" class="form-control"></textarea>
                          
                        </div>

                    </div>


                    <div class="col-md-4 ">
                    <div class="col-md-12 text-right">
             
                
             <button class="btn btn-secondary my-3 ml-1">Order Test</button>
             <button id="save" class="btn btn-success my-3 ml-1 savespecimen">Save</button>
             <button class="btn btn-success my-3 ml-1 valid1">Validate and Save</button>
            <button  type="button" id="button3" class="btn btn-primary">Enter results</button>

         </div>
                    
                    
                </div>




                   
                </div>
            </div>
            <!-- <div class="col-2">
             
                
                <button class="btn btn-secondary my-3 ml-1">Order Test</button>
                <button id="save" class="btn btn-success my-3 ml-1">Save</button>
                <button class="btn btn-success my-3 ml-1">Validate</button>

            </div> -->
        </div>
</div>
   <div class="tab-pane fade {{ (request()->segment(2) ==  'Biochemistry' ) ? 'show active' : '' }}" id="Biochemistry" role="tabpanel" aria-labelledby="nav-contact-tab">
       
        <div class="row mt-4">
            <div class="col-12">
                <table class="table table-striped" id="random">
                    <thead>
                        <tr>   
                            <th>Test Name</th>
                            <th>Result</th>
                            <th>Ranges</th>
                            <th>Units</th>
                            <th>Flags</th>
                            <th>Analyser</th>
                            <th>VP</th>
                            <th>Cmt</th>
                            <th>Result</th>
                        </tr>
                    </thead>
                    <tbody id = "biobody">
                   
                        <?php  
                        
                        if(count($array) > 0){

                               
                            // exit();

                              foreach($array as $data){

                         ?>
                         

                         <tr>
                            
                            <td>  <?php  echo $data['SourceValue'];?></td>
                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['result'])?></td>
                           <td> .</td>
                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['units'])?></td>
                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['flags'])?></td>
                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['analyser'])?></td>
                            <td>.</td>
                          
                            <td class><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['comment'])?></td>
                            <!-- data-toggle="modal" data-target="#exampleModal" -->
                            <td><button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary addrbtn" onClick="reply_click(this.id)" id="<?php  echo $data['Code']; ?>"> <i class="fa fa-plus"></i></button></td>
                            </tr>
                          
                        <?php }}
             
                        ?>


                       
                    </tbody>
                </table>

                <div class="row">

                    <div class="col-8">
                    <div class="form-row">
                        <div class="form-group mx-2">
                            <select class="form-control" id="select1">
                                <option>Serum</option>
                                <option>1</option>
                            </select>
                        </div>
                    </div>
                        <div>
                            <label for="specimancomments" class="form-label">Speciman Comments</label>
                        
                            <textarea name="specimancomments" id="biospeci" cols="30" rows="5" class="form-control"></textarea>
                            
                        </div>
                    </div>

                    <div class="col-md-4 ">
                    <div class="col-md-12 text-right">
             
                
             <button class="btn btn-secondary my-3 ml-1">Order Test</button>
             <button class="btn btn-success my-3 ml-1 savespecimen">Save</button>
             <button class="btn btn-success my-3 ml-1 valid1">Validate and Save</button>

         </div>
                  


                </div>

                   
                   
                </div>
            </div>
          
        </div>
    </div>

    <div class="tab-pane fade  {{ (request()->segment(2) ==  'Coagulation' ) ? 'show active' : '' }}" id="coagulation" role="tabpanel" aria-labelledby="nav-contact-coag">
        
        <div class="row mt-4">
                <div class="col-12">
                    <table class="table table-striped" >
                        <thead>
                            <tr>   
                                <th>Test Name</th>
                                <th>Result</th>
                                <th>Ranges</th>
                                <th>Units</th>
                                <th>Flags</th>
                                <th>Analyser</th>
                                <th>VP</th>
                                <th>Cmt</th>
                                
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody >
                        <?php  
                             
                             if(count($coagarray) > 0){

                               
                                // exit();
    
                                  foreach($coagarray as $data){
                      ?>
                      
                      <tr>
                        
                            
                            <td>  <?php  echo $data['SourceValue'];?></td>
                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['result'])?></td>
                           <td> .</td>
                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['units'])?></td>
                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['flags'])?></td>
                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['analyser'])?></td>
                            <td>.</td>
                          
                            <td class><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['comment'])?></td>
                            <!-- data-toggle="modal" data-target="#exampleModal" -->
                            <td><button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary addrbtn" onClick="reply_click(this.id)" id="<?php  echo $data['Code']; ?>"> <i class="fa fa-plus"></i></button></td>
                            </tr>



                     <?php }}?>
                           
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-8">
                        <div class="form-row">
                            <div class="form-group mx-2">
                                <select class="form-control" id="select1">
                                    <option>Serum</option>
                                    <option>1</option>
                                </select>
                            </div>
                        </div>
                            <div>
                                <label for="specimancomments" class="form-label">Speciman Comments</label>
                           
                                <textarea name="specimancomments" id="coagspeci" cols="30" rows="5" class="form-control"></textarea>
                              
                            </div>
                        </div>


                        <div class="col-md-4 ">
                        <div class="col-md-12 text-right">
                   
                   <button class="btn btn-secondary my-3 ml-1">Order Test</button>
                   <button class="btn btn-success my-3 ml-1 savespecimen">Save</button>
                   <button class="btn btn-success my-3 ml-1 valid1">Validate and Save</button>

               </div>

                   
                </div>
                    
                    </div>
                </div>
              
            </div>
        </div>
    <div class="tab-pane fade {{ (request()->segment(2) ==  'External' ) ? 'show active' : '' }}" id="External" role="tabpanel" aria-labelledby="nav-contact-external">
        
        <div class="row mt-4">
                <div class="col-12">
                    <table class="table table-striped" >
                        <thead>
                            <tr>   
                                <th>Test Name</th>
                                <th>Result</th>
                               
                                <th>Units</th>
                                <th>Flags</th>
                                <th>Analyser</th>
                                <th>VP</th>
                                <th>Cmt</th>
                              
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  
                             

                             if(count($extarray) > 0){

                               
                                // exit();
    
                                  foreach($extarray as $data){
                      ?>
                      
                      <tr>

                 
                            <td>  <?php  echo $data['Analyte']; ?></td>
                            <td><?php  echo $data['result']; ?></td>
                            <td><?php  echo $data['units'];?></td>
                            <td>
                                .        </td>

                            <td>.</td>
                            <td>.</td>
                            <td>.</td>
                         
                            
                          
                            
                            <!-- data-toggle="modal" data-target="#exampleModal" -->
                            <td><button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary addrbtn"  onClick="reply_click(this.id)" id="<?php  echo $data['Analyte']; ?>"> <i class="fa fa-plus"></i></button></td>
                            </tr>
                     <?php }}?>
                           
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-8">
                        <div class="form-row">
                            <div class="form-group mx-2">
                                <select class="form-control" id="select1">
                                    <option>Serum</option>
                                    <option>1</option>
                                </select>
                            </div>
                        </div>
                            <div>
                                <label for="specimancomments" class="form-label">Speciman Comments</label>
                            
                                <textarea name="specimancomments" id="extspeci" cols="30" rows="5" class="form-control"></textarea>
                             
                            </div>
                        </div>

                        <div class="col-md-4 ">
                        <div class="col-md-12 text-right">
                 
                  
                 <button class="btn btn-secondary my-3 ml-1">Order Test</button>
                 <button class="btn btn-success my-3 ml-1 savespecimen">Save</button>
                 <button class="btn btn-success my-3 ml-1 valid1">Validate and Save</button>

             </div>

                 
                </div>


                    </div>
                </div>
             
            </div>
        </div>
    </div>

                       <!--End Tabs-->
                    </div>
                    <div class="col-md-2 mt-5">
                        <!--Start  buttons-->
             
        <div class="row pt-4">
      <div class="col-md-12 text-center">
        <a href="#" class="btn btn-secondary w-100">Select Printers</a>
      </div>
    </div>
        <div class="row pt-4">
      <div class="col-md-12 text-center">
        <a href="#" class="btn btn-primary w-100">Print & Hold</a>
      </div>
    </div>
        <div class="row pt-4">
      <div class="col-md-12 text-center">
        <a href="#" class="btn btn-warning w-100">Print </a>
      </div>
    </div>
        
        <div class="row pt-4">
      <div class="col-md-12 text-center">
        <a type="button" data-toggle="modal" data-target="#exampleModal3" href="#" class="btn btn-success w-100">Phone Results</a>
      </div>
      </div>
        <div class="row pt-4">
      <div class="col-md-12 text-center">
        <a href="{{route('PatientHistory')}}/<?php if(count($rows) > 0) {echo $rows['Chart'];}?>" class="btn btn-danger w-100">History</a>
      </div>
      </div>

                        <!--end-->
                    </div>
                </div>


                   
           
                            </div>
                           </div>
                            <div id="result" class="text-danger"></div>

                  </form>     
                  
                  


                  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Result</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body overflow-hidden">
        <!-- <form method="post"  id="formmodal"> -->
                
                    <div class="row">
                        <label class="form-label" for="results">Result</label>
                        <input type="number" name="results" id="results"  class="form-control resultdis" >
                    </div>
                    <div class="row">

                <label class="form-label mt-3" for="selectunits"> Units</label> 
                    <!-- <select name="selectunits" class="form-control" style="width:100%;" id="selectunits"> 
                      
                    </select> -->
                    <input class="form-control extunits1" type="text" name='selectunits' id='unitsext'>

                        <!-- <label class="form-label mt-3" for="units"> Units</label>
                        <input type="text" name="units" id="units" value="" class="form-control unitdis" > -->
                        <input type="hidden" id="sampleid" name="sampleid"  class="form-control" value="<?php if(count($rows) > 0) { echo $rows['SampleID']; }?>">
                        <label class="mt-3" for="tcomment">Comments</label>
                        <textarea  class="form-control " name="tcomment" id="tcomment" cols="30" rows="4"></textarea>
                        <input type="hidden" name="code" id="rcode" class="form-control" >
                        <input type="hidden" name="dept" id="deptabc" class="form-control tabfield" >
                        <button type="button" id="placeholder" class="btn btn-primary my-3 savemodal1 ">Save changes</button>

                     
                    </div>

                    <!-- <input type="hidden"> -->

                    
        <!-- </form> -->
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





  <!-- Modal Phone Results -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
  <div class="modal-dialog modal-lg"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3Label">Net Acquire - Phone Log</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body overflow-hidden">
        <!-- <form method="post"  id="formmodal"> -->
                
                    
                    
                        <form   id="formphone">
                            @csrf
                        <!-- <label class="form-label" for="comment"> Comments</label>
                        <input type="text" name="comment" id="comment" value="" class="form-control" >
                        <input type="hidden"  class="form-control tabfield" >
                        <button type="button"   class="btn btn-primary savemodal1 my-3 ">Save changes</button> -->


            <div class="row">
                    <div class="col-md-7 ml-4">

                
                                    
                        <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox"  id="Haemphone" name="Haemresultsphoned" value = "H" <?php if(count($rowsph)>0) { if($rowsph['Discipline'][0] == 'H'){ echo 'checked';} } ?>   >
                        <label class="form-check-label" for="Haemphone" >
                            Haematology Results Phoned
                        </label>
                         </div>
                    
                         <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox"  id="Biophone" name="Bioresultsphoned" value = "B"  <?php if(count($rowsph)>0) { if($rowsph['Discipline'][1] == 'B'){ echo 'checked';} } ?> >
                        <label class="form-check-label" for="Biophone" >
                            Biochemistry Results Phoned
                        </label>
                        </div>
                    

                        <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="Coagphone" name="Coagresultsphoned" value = "C" <?php if(count($rowsph)>0) { if($rowsph['Discipline'][2] == 'C'){ echo 'checked';} } ?> >
                        <label class="form-check-label" for="Coagphone">
                            Coagulation Results Phoned
                        </label>
                        </div>


                        <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="Immune" name="Immuneresultsphoned" value="I" disabled>
                        <label class="form-check-label" for="Immune">
                            Immunology Results Phoned
                        </label>
                        </div>


                        <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="Bloodphone" name="Gasresultsphoned" value = "G" <?php if(count($rowsph)>0) { if($rowsph['Discipline'][3] == 'G'){ echo 'checked';} } ?> >
                        <label class="form-check-label" for="Bloodphone">
                            Blood Gas Results Phoned
                        </label>
                        </div>


                        <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox"  id="Extphone" name="resultsphoned[]" value = "E" disabled>
                        <label class="form-check-label" for="Extphone">
                            External Results Phoned
                        </label>
                        </div>


                        <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="Microphone" name="Microresultsphoned" value = "M" <?php if(count($rowsph)>0) { if($rowsph['Discipline'][4] == 'M'){ echo 'checked';} } ?> >
                        <label class="form-check-label" for="Microphone">
                            Microbiology Results Phoned
                        </label>
                        </div>

                        <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="Endophone" name="resultsphoned[]" value= "EN" disabled>
                        <label class="form-check-label" for="Endophone">
                            Endocrinology Results Phoned
                        </label>
                        </div>

                        <hr>

                        <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="notphoned" name="notphoned" value = "N" <?php if(count($rowsph)>0) { if($rowsph['Discipline'][5] == 'N'){ echo 'checked';} } ?> >
                        <label class="form-check-label" for="notphoned">
                            Results Not Phoned
                        </label>
                        </div>


                        <div class="form-check form-check-inline mt-3">
                        
                        <label class="form-check-label" for="gps">GPs</label>
                        <input class="form-check-input ml-3" type="radio" name="phonegp" id="gps" >
                        </div>
                        <div class="form-check form-check-inline mt-3">
                        <input class="form-check-input" type="radio" name="phonegp" id="wards" checked>
                        <label class="form-check-label ml-2" for="wards">Wards</label>
                        </div>

                        <div class="form-outline mt-3">
                        <label class="form-label mb-0 " for="phoneto">Phone To</label>
                        <select name="phoneto" id="phoneto" class="form-control">
                            <option value="<?php if(count($rows) > 0) {echo $rows['Ward'];}?>"><?php if(count($rows) > 0) {echo $rows['Ward'];}?></option>
                        </select> 
                        </div>

                       
                            <div class="form-outline mt-2 mb-4">
                        <label class="form-label mb-0 " for="phonecomment">Comment</label>
                        <select name="phonecomment" id="phonecomment" class="form-control" >
                            @foreach($phoarray as $phocom)
                            <option >{{$phocom}}</option>
                            @endforeach
                        </select> 
                        </div>
                      
                        
                    </div>
                    <!-- Column -->


                    <div class="col-md-4">

                        <label class="form-label" for="phonesid"> SampleID</label>
                        <input type="text" name="phonesid" id="phonesid" value="<?php if(count($rows) > 0) {echo $rows['SampleID'];}?>" class="form-control" >
                        <input type="hidden"  class="form-control tabfield" >

                        <label class="form-label mt-2" for="phoneby"> Phoned By</label>
                        <input type="text" name="phoneby" id="phoneby" value="{{ Auth::user()->name }}" class="form-control" >
                        <input type="hidden"  class="form-control tabfield" >
                        

                        <label class="form-label mt-2" for="phonedate"> Date/Time</label>
                        <input  type="datetime-local" name="phonedate" id="phonedate" value="<?php if(count($rowsph) > 0){  echo \Carbon\Carbon::parse($rowsph['DateTime'])->format('Y-m-d\TH:i:s'); } ?>" class="form-control" >
                        <input type="hidden"  class="form-control tabfield" >



                        <div class="form-check mt-4">
                        <input class="form-check-input" type="radio" name="phonecall" id="callin" value="IN" <?php if (count($rowsph)>0) { 
                            if($rowsph['Direction'] == 'IN'){
                                echo 'checked';
                            }
                            } ?>>
                        <label class="form-check-label" for="callin">
                            Call In
                        </label>
                        </div>
                        <div class="form-check mt-2">
                        <input class="form-check-input" type="radio" name="phonecall" id="callout" value="OUT" <?php if (count($rowsph)>0) { 
                            if($rowsph['Direction'] == 'OUT'){
                                echo 'checked';
                            }
                            } ?>>
                        <label class="form-check-label" for="callout">
                            Call Out
                        </label>
                        </div>

                        
                    </div>

                    
            </div>
            
            <button type="button"  id="addphoneres" class="btn btn-primary  float-right">Save Details</button> 
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
<script type="text/javascript" src="https://andreivictor.ro/select2-searchInputPlaceholder.js"></script>
<script>
var clicked_id;
var heam_id;
var Ext_id;
var Coag_id;
var activetab="";


var idleTime = 0;
function reply_click(id)
{
    // clicked_id1="";
    // Ext_id="";
    // Coag_id="";
    // heam_id=data;

      


  
//  $('#unitsext').hide();
 
    $("#rcode").val(id);


    dept = $("#deptabc").val();

    sampleid = $("#sampleid").val();
    code = $("#rcode").val();

    
//     if(dept == 'External'){

//        $('#selectunits').hide();
//        $('#unitsext').show();
        
//     }
//     else {
     
//         $('#selectunits').select2({
//     dropdownParent: $('#exampleModal')
//  });
//     }
 

    var getsex = $("#getsex").val();
    var getage = $("#getage").val();
    


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $.ajax({

        url: "{{route('Biochemistrynew2')}}",
        method: 'get',
        data: {
        age : getage,
        getsex: getsex,
        dept : dept,
        code : code,
        sampleid : sampleid
       
   
        },
        }).done(function (response) {

        // result = $('#results',response).val();
        // units = $('#units',response).val();
		// comm = $('#comment',response).val();

        // console.log(results);
        // console.log(units);
       

            $("#results").val(response.result);
            $(".extunits1").val(response.units);
           

           var testdefi = response.testdefi;
        //    console.log(testdefi);

           for(var i=0;i<testdefi.length;i++){
            $('#selectunits').append(new Option(testdefi[i], testdefi[i]));

           }


         

           
        //    $('#units').val(testdefi);
        $("#selectunits").val(response.units).trigger('change');


        });
}



$(document).ready(function() {

    var examl;
    var demographics_id=0;

   var haemspecimen;
    
    var currentlink = window.location.href;
    console.log(currentlink);


    

    var demoactive = document.getElementById('demographics-tab').className;
    var heamactive = document.getElementById('cs-tab').className;
    var bioactive = document.getElementById('Biochemistry-tab').className;
    var coagactive = document.getElementById('coagulation-tab').className;
    var extactive = document.getElementById('External-tab').className;

    var check1 = demoactive.includes('active');
    var check2 = heamactive.includes('active');
    var check3 = bioactive.includes('active');
    var check4 = coagactive.includes('active');
    var check5 = extactive.includes('active');
  

    if(check1){
        activetab="Demographics";
       $(".tabfield").val(activetab);
       console.log(activetab);
    //    $department = 'Demographics';

    } else if(check2){
        activetab="Haematology";
        $(".tabfield").val(activetab);
        console.log(activetab);
       

    } else if(check3){
        activetab="Biochemistry";
        $(".tabfield").val(activetab);
        console.log(activetab);
     

    } else if(check4){
        activetab="Coagulation";
        $(".tabfield").val(activetab);
        console.log(activetab);
     

    } else if(check5){
        activetab="External";
        $(".tabfield").val(activetab);
        console.log(activetab);
        // $(".resultdis").prop('disabled', true);

    }


    $('#demographics-tab').click(function() {
       activetab="Demographics";
       $(".tabfield").val(activetab);

       console.log(activetab);
    });
    $('#cs-tab').click(function() {
        activetab="Haematology";
        $(".tabfield").val(activetab);
        console.log(activetab);
    });
    $('#Biochemistry-tab').click(function() {
        activetab="Biochemistry";
        $(".tabfield").val(activetab);

        console.log(activetab);
    });
    $('#coagulation-tab').click(function() {
        activetab="Coagulation";
        $(".tabfield").val(activetab);

        console.log(activetab);
    });
    $('#External-tab').click(function() {
        activetab="External";
        $(".tabfield").val(activetab);

        console.log(activetab);

        $('#selectunits').hide();


    });

   

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#demographicsSave').click(function(){



    var sampleid=document.getElementById("sid");
    var sampleid2 = sampleid.value;
      
     let formmy=document.getElementById("form");
     let formd=new FormData(formmy);

     console.log(sampleid2);
    
     $.ajax({
            url: "{{route('Results')}}/"+sampleid2,
            method: 'get',

            }).done(function (response) {
                    // $("#result").html(response);

                    if (!$.isEmptyObject(response.error)){
                                         Lobibox.notify('warning', {
                                                pauseDelayOnHover: true,
                                                continueDelayOnInactiveTab: false,
                                                position: 'top right',
                                                msg: response.error,
                                                icon: 'bx bx-info-circle'
                                            });
                                  
                                            return false;

                                       } 

                        


                    window.location="{{route('Results')}}/Demographics/"+sampleid2;
                    
                  
            });
            event.preventDefault();
    }); 

    
    var res1;
    var units1;

    var res2;
    var units2;
    
    var code1;
    var code2;




    $('.savemodal1').click(function(){

        
        


        var comment=$("#tcomment").val();
       
        var depart=document.getElementById("deptabc");
        var dept = depart.value;


        var code=document.getElementById("rcode");
        var code = code.value;

        var sampleid=document.getElementById("sampleid");
        var sampleid2 = sampleid.value;
   
        let unitsval=document.getElementById("selectunits");
        let units= unitsval.value;

        

        let resval2=document.getElementById("results");
        let resval= resval2.value;

    


      var getsex = $("#getsex").val();
      var getage = $("#getage").val();



      let extunitsval=$(".extunits1").val();
        // let units= unitsval.value;
      
  
     
      $.ajax({

        
         
             url: "{{route('Biochemistrynew')}}",
             method: 'post',
             data: {
                sampleid : sampleid2,
                units: units,
                code: code,
                resval: resval,
                comment:comment,
                dept: dept,
                age : getage,
                sex : getsex,
                extunits: extunitsval
       
                
             
             },

             }).done(function (response) {    
                console.log(response);

                var PlausibleLow;
                var PlausibleHigh;

                if(response){
                PlausibleLow = response.rows11['PlausibleLow'];
                PlausibleHigh = response.rows11['PlausibleHigh'];

                console.log(PlausibleLow);
                console.log(PlausibleHigh);
                }

                
            $(".modal").modal('hide');
                
            
            if(response.success == true){

                                                Lobibox.notify('success', {
                                                pauseDelayOnHover: true,
                                                continueDelayOnInactiveTab: false,
                                                position: 'top right',
                                                msg: 'Results Updated Successfully',
                                                icon: 'bx bx-info-circle'
                                            });

                var tabfield = $(".tabfield").val();
                console.log("tabfield",tabfield);
                var sid = $("#sid").val();
                console.log("sid",sid);

                window.location = "{{route('Results')}}/"+tabfield+"/"+sid;
            }
            else {
                Lobibox.notify('warning', {
                                                pauseDelayOnHover: true,
                                                continueDelayOnInactiveTab: false,
                                                position: 'top right',
                                                msg: 'Result must be between ' + PlausibleLow + ' and ' + PlausibleHigh,
                                                icon: 'bx bx-info-circle'
                                            });

            }


        
                
             });
             event.preventDefault();
                
     }); 






     $('#addphoneres').click(function(){


    



                //stop submit the form, we will post it manually.
                event.preventDefault();

// Get form
var form = $('#formphone')[0];

// Create an FormData object
var data = new FormData(form);



$.ajax({
    type: "POST",
    enctype: 'multipart/form-data',
    url: "{{ route('addphone') }}",
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    timeout: 600000,
    success: function(response) {
        console.log(response);
          
        if (!$.isEmptyObject(response.success)){
                                         Lobibox.notify('success', {
                                                pauseDelayOnHover: true,
                                                continueDelayOnInactiveTab: false,
                                                position: 'top right',
                                                msg: response.success,
                                                icon: 'bx bx-info-circle'
                                            });
                                  
                                            return false;

                                       } 
    
    
    
    }
    });    

})






$('.valid1').click(function(){


    var comment = '';
    var sample = $('#sid').val();
    console.log(sample);

    var depart=document.getElementById("deptabc");
    var dept = depart.value;
// let phonevar = document.getElementById('sid');
// let data = new FormData(phonevar);


    
    if(activetab == "Haematology") {
    haemspecimen = document.getElementById('haemspeci').value;
    comment = haemspecimen;
    }
    else if(activetab == "Biochemistry") {
    biospecimen = document.getElementById('biospeci').value;
    comment = biospecimen;
    }
    else if(activetab == "Coagulation") {
    coagmspecimen = document.getElementById('coagspeci').value;
    comment = coagmspecimen;
    }
    else if(activetab == "External") {
    extspecimen = document.getElementById('extspeci').value;
    comment = extspecimen;
    }

$.ajax({


    url: "{{route('validatedata')}}",
             method: 'post',
             data: {
                sid: sample,
                depart: dept,
                comment: comment
        

             }

}).done(function (response) {    



    if (!$.isEmptyObject(response.success)){
                                         Lobibox.notify('success', {
                                                pauseDelayOnHover: true,
                                                continueDelayOnInactiveTab: false,
                                                position: 'top right',
                                                msg: response.success,
                                                icon: 'bx bx-info-circle'
                                            });
                                  
                                            return false;

                                       } 


// $(".modal").modal('hide');
// console.log(response);


});
event.preventDefault();
});







$('.savespecimen').click(function(){


var comment = '';
var sample = $('#sid').val();
console.log(sample);

var depart=document.getElementById("deptabc");
var dept = depart.value;
// let phonevar = document.getElementById('sid');
// let data = new FormData(phonevar);



if(activetab == "Haematology") {
haemspecimen = document.getElementById('haemspeci').value;
comment = haemspecimen;
}
else if(activetab == "Biochemistry") {
biospecimen = document.getElementById('biospeci').value;
comment = biospecimen;
}
else if(activetab == "Coagulation") {
coagmspecimen = document.getElementById('coagspeci').value;
comment = coagmspecimen;
}
else if(activetab == "External") {
extspecimen = document.getElementById('extspeci').value;
comment = extspecimen;
}

$.ajax({


url: "{{route('savespecimendata')}}",
         method: 'post',
         data: {
            sid: sample,
            depart: dept,
            comment: comment
    

         }

}).done(function (response) {    



if (!$.isEmptyObject(response.success)){
                                     Lobibox.notify('success', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: response.success,
                                            icon: 'bx bx-info-circle'
                                        });
                              
                                        return false;

                                   } 


// $(".modal").modal('hide');
// console.log(response);


});
event.preventDefault();
});
$('#button3').click(function(){


    var sampleid=document.getElementById("sid");
    var sampleid2 = sampleid.value;
      

$.ajax({


    url: "{{route('Enterresults')}}",
             method: 'post',
             data: {
                sampleid2:sampleid2
             },

}).done(function (response) {    



    if (!$.isEmptyObject(response.success)){
                                         Lobibox.notify('success', {
                                                pauseDelayOnHover: true,
                                                continueDelayOnInactiveTab: false,
                                                position: 'top right',
                                                msg: response.success,
                                                icon: 'bx bx-info-circle'
                                            });
                                  
                                            // return false;
                                            window.location="";

                                       } 


// $(".modal").modal('hide');
// console.log(response);


});
event.preventDefault();

});








     $('#selectgp').select2();
     $("#listcomment").change(function(){
      var comment=$(this).val();
      $("#showlist").val('');
      $('#showlist').val(comment);
     })

     $('#wardselect').select2();

     $('#clinicianselect').select2();

    //  $('#phonecomment').select2();


     $('#phonecomment').select2({
    dropdownParent: $('#exampleModal3')
 });
     
    

    
        
}); 




     

    
</script>




@endpush



