





@include('layouts.header')

    <!-- Select2 -->
    <link href="{{ asset('plugins/select2/css/select2.min.css?1112') }}" rel="stylesheet" >
  <link href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css?1112') }}" rel="stylesheet" >
<style>
    .whit label{
        color:#FFFFFF;
    }
    .int{
        min-height:23rem;
        margin-top:1rem;
        
    }
   #Comments::placeholder {
    font-weight: bold;
    opacity: 10;
    /* color: red; */
}
label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 700;
    padding-top: 5px;
}
.collapse1{
overflow-x:scroll;
overflow-y:scroll;
width:10 em;
height:150px;
}
.collapse2{
overflow-x:scroll;
width:32 em;
}
table{
  /* height:150px; */
}
.scroll{
  width: ;
  height: 15rem;
  overflow-x: scroll;
  overflow-y:scroll;

}
::-webkit-scrollbar{
    height: 10px;
    width: 2px;
    background: gray;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}

::-webkit-scrollbar-thumb:horizontal{
    background: #000;
    border-radius: 10px;
}
.card-body{
    padding:0
}
.card-header{
    padding:0
}
.card-header select{
    width:100%
}
.int2{
    min-height:18rem;
    margin-top:1rem;
}

/* #biop{
    width:100%

} */
/* thead{
  position:sticky;
  top:0;
  z-index:1;
} */
</style>
  <body>
    
 
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Demographics 
               
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
                                      <div class="row">
                                       <div class="col-md-12 whit ">
                         <input type="hidden" class="form-control biochemistry2" name="biochemistry2">
                          <input type="hidden" class="form-control coagulation2" name="coagulation2">
                           <input type="hidden" class="form-control external2" name="external2">
                             <div class="row " style="
    padding: 10px;

">
                                 <div class="col-md-3 p-3" style="    content:space-around; background:rgb(13 71 161 / 60%)">
                            <div style="display:flex; justify " >
                    <label class="form-label mb-0 col-md-4">Sample #</label>
                                     <input type="number" name="sid"  id="sid" value="<?php if(count($rows) > 0) {echo $rows['SampleID'];} ?>" class="form-control getsample">
                                     </div>    
                                     
                                     <div style="display:flex; justify content:space-aroud" class="mb-0 mt-2">

                               <label class="form-label   col-md-4">Date</label>
                                     
                                       
                                     <input type="datetime-local" name="sampledate" style="width:70%"  class="form-control"    value="<?php if (count($rows)>0) { echo  \Carbon\Carbon::parse($rows['SampleDate'])->format('Y-m-d\TH:i:s');} ?>">
</div>

<div style="display:flex; " class="mb-0 mt-2 ">

                                     <label class="form-label col-md-4">Rec. Date</label>
                      <input type="datetime-local" style="width:70%" name="recieved" value="<?php if(count($rows) > 0) {echo \Carbon\Carbon::parse($rows['SampleDate'])->format('Y-m-d\TH:i:s');}?>" class="form-control">
</div>
<div style="display:flex; " class="mb-0 mt-2 ">

                  <label for="Urgent" class="col-md-4">Urgent</label>    
                 <div class="input-group">
  <div class="input-group-prepend">
 
    <div class="d-flex
    ">
        
  <input type="text" value="Yes" class="form-control" aria-label="Text input with radio button" readonly>
   
  <input type="text" value="No" class="form-control" aria-label="Text input with radio button" readonly>


     <div class="input-group-text">
     <input type="radio" name="urgent"  aria-label="Radio button for following text input" <?php if(count($rowsocm2) > 0)
   { if($rowsocm2['Urgent'] == 1) { echo'checked';}} ?> >
</div>
</div>
  </div>
</div>
</div>

<div style=" " class="mb-0 mt-2 d-flex">
<label for="Urgent" class="col-md-4">Fasting</label>    
                 <div class="input-group">
  <div class="input-group-prepend">
    <div class="d-flex">
    <input type="text" readonly value="Yes" class="form-control" aria-label="Text input with radio button" >
   <input type="text" value="No" readonly class="form-control" aria-label="Text input with radio button">
  <div class="input-group-text">
    <input type="radio"  name="fasting"  aria-label="Radio button for following text input" <?php if(count($rowsocm2) > 0) { if($rowsocm2['fasting'] == 1) { echo'checked';}} ?>>
    </div>
  </div>
  </div>
</div>
</div>                          
             </div>
             
             <div class="col-md-6 w-100 p-3" style="background:rgb(13 71 161 / 80%)">
             <div class="row">
                 <div class="col-md-6">
                 <div class="col-md-12 d-flex" >
             <label class="form-label mb-0 col-md-5">Facility</label>
                                     <input type="text" name="hospital" value="<?php if(count($rows) > 0) {echo $rows['Hospital'];}?>" class="form-control">
                                     </div>
                                     <div class="col-md-12 d-flex mb-0 mt-2">
                                     <label class="form-label col-md-5">Surname</label>
                                     <input type="text" name="sname" width="70%" value="<?php if(count($rows) > 0) {echo $rows['SurName'];}?>" class="form-control">
                                     </div>
                                     <div class="col-md-12 d-flex mb-0  mt-2">
                                     <label for="dob2" class="form-label col-md-4 ">D.O.B</label>
              
              <input id="inp1"  type="date" name="dob2"  class="form-control"  style="width:70%" value="<?php if (count($rows)>0) { echo  \Carbon\Carbon::parse($rows['SampleDate'])->format('Y-m-d');} ?>">
                                     </div>
                                     <div class="col-md-12 mb-0 mt-2  d-flex">
                 <input class="form-control"placeholder="Address 1" id="address" name="address" value="<?php if(count($rows) > 0) {echo $rows['Addr0'];}?>"/>
                                     </div>
                                     <div class="col-md-12 mb-0 mt-2">
                 <input class="form-control" id="address" placeholder="Address 2" name="address" value="<?php if(count($alldata) > 0) {echo $alldata['Address2'];}?>"/>
                                     </div>
                                     <div class="col-md-12"></div>
                 </div>
                 
                 <div class="col-md-6">
                 <div class="col-md-12 d-flex">                        
             <label class="form-label mb-0 col-md-4">Chart </label>
                                     <input type="text" name="chart" value="<?php if(count($rows) > 0) {echo $rows['Chart'];}?>" class="form-control">
             
             
                                     </div>
                                     <div class="col-md-12 mb-0 mt-2 d-flex">
                                     <label class="form-label mb-0 col-md-6">Forename </label>
                                    <input type="text" name="fname"  placeholder=""  value="<?php if(count($rows) > 0) {echo $rows['ForeName'];}?>" class="form-control">
                 </div>
                 <div class="col-md-12 d-flex mb-0 mt-2">
               <label class="form-label col-md-4 " for="age2">Age</label>
            <div class="input-group">
            <input type="text" id="age2" name="age" class="form-control " value="<?php if(count($rows) > 0) {echo $rows['Age'];}?>" placeholder="" />
            
        <label for="" class="ml-2 mr-1">Sex</label>
            <input type="text" id="age2" name="sex" class="form-control " value="<?php if(count($rows) > 0) {echo $rows['Sex'];}?>" placeholder="" />
        
            </div>
              
               </div>
               <div class="col-md-12 mb-0  mt-2">
                     
                         <input class="form-control "placeholder="Address 2" id="address2" name="address2" value="<?php if(count($rows) > 0) {echo $rows['Addr1'];}?>"/>
                     </div>
                     <div class="col-md-12 mb-0 mt-2">
                     
                         <input class="form-control " id="address2" placeholder="Address 4"name="address4" value="<?php if(count($alldata) > 0) {echo $alldata['Address3'];}?>"/>
                     </div>
                 </div>
             </div>
             
             
             </div>
             
             
             
             <div class="col-md-3 p-3 hello" style="background:rgb(13 71 161 / 60%); padding:1rem" >
             
             <div class="form-outline d-flex col-md-12">
                 <label class="form-label mb-0 col-md-4" for="ward">Ward</label>
                 <select name="ward" id="wardselect" style= "" class="form-control">
             
                 <option value="<?php if(count($rows) > 0) {echo $rows['Ward'];}?>"><?php if(count($rows) > 0) {echo $rows['Ward'];}?></option>
                 @foreach($wardsarray as $ward)
             
                     <option value="{{$ward}}">{{$ward}}</option>
                     
             @endforeach
             
                 </select> 
             </div>
             <div class="form-outline d-flex col-md-12 mb-0 mt-2">
                 <label class="form-label col-md-4" for="clinician">Clinician</label>
                 <select name="clinician" id="clinicianselect" class="form-control" style= "">
             
                 @foreach ($cliarray as $clinician)
                 <option value="{{$clinician}}">{{$clinician}}</option>
                    @endforeach
                 </select>  
               </div>
               <div class="form-outline d-flex col-md-12 mb-0 mt-2">
                 <label class="form-label col-md-4 " for="gp">GP</label>
                 <select name="gp" id="selectgp" style=""class="form-control">
             
                 @foreach($getgparray as $getgp)
                     <option value="{{$getgp}}">{{$getgp}}</option>
             
                     @endforeach
                 </select>  
              
               </div>
               <div class="form-outline mb-0 mt-2 d-flex">
                 <label class="form-label col-md-4" for="gp">Practise</label>
                 <select name="gp" id="selectgp" class="form-control practicegp">
             
                 <option value="<?php if(count($alldata) > 0) {echo $alldata['GP_Pracitce_Address'];}?>"><?php if(count($alldata) > 0) {echo $alldata['GP_Pracitce_Address'];}?></option>
           <?php 
           foreach($mygps as $mygp){
           ?>
                 <option><?php echo $mygp['Practice']; ?></option>
                <?php 
            }

                ?>
                 </select> 
                
              
               </div>
               <div class="form-outline d-flex mb-0 mt-2">
                 <label class="form-label col-md-4" for="gp">Copy to</label>
                 <select name="gp" id="selectgp" class="form-control copyto" >
             
                   @foreach($getgparray as $getgp)
                     <option value="{{$getgp}}">{{$getgp}}</option>
             
                     @endforeach
                 </select>  
              
               </div>
             </div>
             </div>
             </div>
         

             <div class="col-md-12">
                         <div class="card card-primary card">
                            <div class="card-body ">  
                
                   
                <div class="row pt-0">
                    <div class="col-md-12">
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
    <div class="col-md-12 ">
        <div class="row mb-2 mt-2">
      
        <div style="border:1px solid black ; background-color:rgba(255,243,205,255)" class="col-md-6 pt-1" >
        <label for="">Comments</label>
        <input type="text" id ="Comments" placeholder="" style="border:none; background:none" value="<?php if(count($rowsocm2) > 0) {echo $rowsocm2['notes'];}?>">
   </div>
   <div style="border:1px solid black; background-color:rgba(255,243,205,255)" class="col-md-6 pt-1">
   <label >
    Alerts
</label>
   </div>
   </div>
  <div style="display:flex;flex-wrap:wrap" class="collapse2">
    <table class="table table-striped">
        <thead>
            <td>Demographics</td>
            <td>Biochemistry</td>
            <td>Coagulation</td>
            <td>Haematology</td>
            <td>Microbiology</td>
            <td>External</td>
            <td>Blood Trans</td>
            <td>Histology</td>
            <td>Clin Details</td>
            <td>Menu</td>
            <td>Management</td>
        </thead>
    </table>

    </div>
    <div class="row mt-2">
    <div class="col-md-6">
        <div class="row">
        <div class="col-md-5">
    <label>Demographic comments</label>
</div>
<div class="col-md-6">   
     <textarea  class="form-control" name="" id="" rows="3"></textarea>
</div>
  

    
</div>
</div>

    <div class="col-md-6">
    <div class="row ">

    <label>Rejections</label>
  
 
   <input class=" ml-2"  
   type="text" value="Biochemistry" readonly>
   <input class="ml-2" type="radio" name=""  id="">
   

<input class="ml-2" 
type="text" value="Microbiology" readonly>
<input   class="ml-2" type="radio" name="" id="">


</div>
<div class="row mt-2">
<label class="text-white">Rejections</label>

<input class="ml-2" 
type="text" value="Heamatology">
<input   class="ml-2" type="radio" name="" id="">


<input class=" ml-2"  
type="text" value="Coagulation"readonly>
<input class="ml-2" type="radio" name="" id="">


<input class="ml-2" 
type="text" value="External" readonly>
<input   class="ml-2" type="radio" name="" id="">


</div>

</div>





</div>















<div class="row">
<div class="col-md-3">
<div class="card int">
    <div class="card-header">
    Biochemistry

    </div>
    <div  class="card-header ">
     
        <select class="dropdown-menu" name="" id="biop" >
        @foreach($bparr as $key=>$value)
            <option value="{{$value}}" class="form-control " >{{$value}}</option>
            @endforeach
         </select>
   

    </div>
    <div  class="card-body collapse1" >
   <table id="dels" class="table table-striped biodata">

<thead>

<tr>    
<th>
        Order Element
    </th>
<th>
    Analyser
</th>
<th>Actions</th></tr>


</thead>
<tbody id="addbio1">
</tbody>
</table>    
</div>
    

    </div>

    <button class="btn btn-warning mb-4">Unlock Demographics</button>
</div>


<div class="col-md-3">
<div class="card int">
    <div class="card-header">
    Heam/Coag
    </div>
    <div  class="card-header">
    <select name="" id="biop2" >
        @foreach($bparr2 as $key=>$value)
            <option value="{{$value}}" class="form-control" >{{$value}}</option>
            @endforeach
         </select>

    </div>
    <div  class="card-body collapse1">
    <table id="dels2" class="table table-striped">

<thead>

<tr>    
<th>
        Order Element
    </th>
<th>
    Analyser
</th>
<th>Actions</th></tr>


</thead>
<tbody id="addbio2">
</tbody>
</table> 
    </div>
   
 
    </div>
</div>

<div class="col-md-3">
<div class="card int">
    <div class="card-header">
External

    </div>
    <div  class="card-header">
   <select name="" id="biop3" >
        @foreach($ext as $key=>$value)
            <option value="{{$value}}" class="form-control" >{{$value}}</option>
            @endforeach
         </select>
   


    </div>
    <div  class="card-body collapse1">
    <table id="dels3" class="table table-striped">

<thead>

<tr>    
<th>
        Order Element
    </th>

<th>Actions</th></tr>


</thead>
<tbody id="addbio3">
</tbody>
</table> 
    </div>
    
 
    </div>
</div>
<div class="col-md-3">
<div class="card int2">
    <div class="card-header p-2">
    <h5>Microbiology</h5>

    </div>
    <div  class="card-header p-2">
    <h5>Current antibiotic</h5>

    </div>
    <div  class="card-header p-2">
    <h5>Additional antibiotic</h5>
    </div>
    <div  class="card-header p-2">
    <select name="gp" id="selectgp" style=""class="form-control">
    
     @foreach($site50 as $getgp)
       <option value="{{$getgp}}">{{$getgp}}</option>
         
    @endforeach
             </select>  
    </div>
    <div  class="card-header p-2">
    <h5>Site details</h5>
    </div>
    <div  class="card-body p-2">
    <h5>Clinical Details</h5>
 
    </div>

    </div>
    <input class="ml-2 mb-2" 
    type="text" value="Pregnant" readonly>
   <input   class="ml-2 " type="radio" name=""  id="">
   <input class="ml-2 mb-2" 
    type="text" value="Penicillin Allergy" readonly>
   <input   class="ml-2 " type="radio" name=""  id="">
 
    <div>
    <button type="button"  class="btn btn-info savedata">Save</button>
    <button class="btn btn-primary">Save Hold</button>
    <button class="btn btn-danger">Cancel</button>
    </div>
</div>
<div >


</div>
</div>
    </div>
   </div>
  
   
    
   <!-- </form>   -->

 
 
 
<div class="tab-pane fade  {{ (request()->segment(2) ==  'Haematology' ) ? 'show active' : '' }}" id="cs" role="tabpanel" aria-labelledby="nav-profile-tab">
   
<div class="row mt-3">
    <div class="col-md-4">
<label class="form-label">Haematology Lists</label>
<select class="form-control form-select getlist">
    <option selected disabled hidden>Choose Lists</option>
    <option>Auto Validation</option>
    <option>BarCodes</option>
    <option>Normal Ranges</option>
    <option>Test Code Mapping</option>

</select>
    </div>
</div>

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
                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['VP'])?></td>
                          
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
                            <select class="form-control" >
                            <option><?php if(count($haemarray) > 0){ echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$haemarray[0]['Code'], $haemarray[0]['dept'])['SampleType']); }?></option>
                               
                            </select>
                        </div>
                    </div>


                        <div>
                            <label for="specimancomments" class="form-label">Speciman Comments</label>
                           
                            <textarea name="specimancomments" id="haemspeci" cols="30" rows="5" class="form-control emptyclass"></textarea>
                          
                        </div>

                    </div>


                    <div class="col-md-4 ">
                    <div class="col-md-12 text-right">
             
                
             <button class="btn btn-secondary my-3 ml-1">Order Test</button>
             <button id="save" class="btn btn-success my-3 ml-1 savespecimen">Save</button>
             <button class="btn btn-success my-3 ml-1 valid1">Validate and Save</button>
            <button  type="button" id="button3" class="btn btn-primary">Auto Enter</button>

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
       
      <div class="row mt-3">
          <div class="col-md-4">
              <label class="form-label">BioChemistry Lists</label>
              <select class="form-control form-select getlist3">
              <option selected disabled hidden>Choose Lists</option>
              <option>Known To Analyser</option>
              <option>New Analyte</option>
              <option>Normal and Flag Ranges</option>
              <option>Plausible Range</option>
              <option>Assign Panels</option>
              <option>Auto Validation</option>
              <option>Data Check</option>
              <option>Edit Existing Analyte</option>
              <option>Fasting Ranges</option>
              <option>In Use</option>
              <option>New Result</option>
              <option>Print Sequence</option>
              <option>Re Run Times</option>
              <option>Set H/I/L</option>
              <option>Splits</option>
              <option>Test Code Mapping</option>
              <option>Units and Precision</option>   
              </select>


          </div>
      </div>
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
                           <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['range'])?></td>
                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['units'])?></td>
                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['flags'])?></td>
                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['analyser'])?></td>
                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['VP'])?></td>
                          
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
                            <select class="form-control" >
                            <option><?php if(count($array) > 0){ echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$array[0]['Code'], $array[0]['dept'])['SampleType']); }?></option>

                        
                            </select>
                        </div>
                    </div>
                        <div>
                            <label for="specimancomments" class="form-label">Speciman Comments</label>
                        
                            <textarea name="specimancomments" id="biospeci" cols="30" rows="5" class="form-control emptyclass"></textarea>
                            
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
       
       <div class="row mt-3">
           <div class="col-md-4">
               <label class="form-label">Coagulation Lists</label>
               <select class="form-control form-select getvalue2" >
                   <option selected disabled hidden>Choose an Option</option>
                   <option>Add Text</option>
                   <option>Coagulation Panels</option>
                   <option>Normal Ranges</option>
                   <option>Test Code Mapping</option>

               </select>
           </div>
       </div> 
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
                           <td> <?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['range'])?></td>
                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['units'])?></td>
                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['flags'])?></td>
                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['analyser'])?></td>
                            
                            <td><?php echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$data['Code'], $data['dept'])['VP'])?></td>
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
                                <select class="form-control" >
                                <option><?php if(count($coagarray) > 0){ echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$coagarray[0]['Code'], $coagarray[0]['dept'])['SampleType']); }?></option>
                                 
                                </select>
                            </div>
                        </div>
                            <div>
                                <label for="specimancomments" class="form-label">Speciman Comments</label>
                           
                                <textarea name="specimancomments" id="coagspeci" cols="30" rows="5" class="form-control emptyclass"></textarea>
                              
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
                            
                            <td><?php if ($data['Printed'] == 1 && $data['Valid'] == 1){echo 'VP';}
                                    elseif ($data['Valid']==1 && $data['Printed']==0){echo 'V';}
                                    elseif ($data['Valid']==0 && $data['Printed']==1){echo 'P';}
                                    else {echo '';}
                            
                            ?></td>
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
                                <select class="form-control" >
                                <option><?php if(count($coagarray) > 0){ echo (\App\Http\Controllers\addresults::getid($rows['SampleID'],$coagarray[0]['Code'], $coagarray[0]['dept'])['SampleType']); }?></option>
                                    
                                </select>
                            </div>
                        </div>
                            <div>
                                <label for="specimancomments" class="form-label">Speciman Comments</label>
                            
                                <textarea name="specimancomments" id="extspeci" cols="30" rows="5" class="form-control emptyclass"></textarea>
                             
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
                        <input type="hidden" name="code" id="rcode" class="form-control">
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
                        <input  type="datetime-local" name="phonedate" id="phonedate" value="<?php if(count($rowsph) > 0){  echo \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->format('Y-m-d\TH:i:s'); } ?>" class="form-control" >
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

            </div>

        </form>

                    

                    <!-- <input type="hidden"> -->

                    
        <!-- </form> -->
      </div>
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

            $("#results").val(response.result);
            $("#unitsext").val(response.units).trigger('change');
           

        });
}



$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $.ajax({
            url: "{{route('Results')}}",
            type: 'post'

            }).done(function (response) {

               
                    // $("#result").html(response);
                console.log(response.error);


       
    });



    $("#delrow").click(function(){
        alert("ss");
// delrow();
   });
  //  function delrow(){
    
  //   var a=$('#ss tr:last').remove(); 
  //   // console.log(a);
  //   // a.last().remove();    
  //  }

 
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

        // $('#selectunits').hide();


    });

   $('.getsample').keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {

 
     var sampleid=document.getElementById("sid");
    var sampleid2 = sampleid.value;
      
     let formmy=document.getElementById("form");
     let formd=new FormData(formmy);

     console.log(sampleid2);
    
     $.ajax({
            url: "{{route('Results')}}/"+sampleid2,
            type: 'post'

            }).done(function (response) {

               
                    // $("#result").html(response);
                console.log(response.error);


        if (!$.isEmptyObject(response.error)){

                    Lobibox.notify('warning', {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: 'Sample ID not found',
                    icon: 'bx bx-info-circle'
    });
}


                    window.location="{{route('Results')}}/Demographics/"+sampleid2;
                    
                  
            });
            event.preventDefault();

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
            type: 'post'

            }).done(function (response) {

               
                    // $("#result").html(response);
                console.log(response.error);


        if (!$.isEmptyObject(response.error)){

                    Lobibox.notify('warning', {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: 'Sample ID not found',
                    icon: 'bx bx-info-circle'
    });
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
   
        let unitsval=document.getElementById("unitsext");
        let units= unitsval.value;

        

        let resval2=document.getElementById("results");
        let resval= resval2.value;

        

        
   




      var getsex = $("#getsex").val();
      var getage = $("#getage").val();



      let extunitsval=$(".extunits1").val();
        // let units= unitsval.value;
      
      
      $.ajax({

        
         
             url: "{{route('Biochemistrynew')}}",
             type: 'post',
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
                              
                                        window.location = '';

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





   $('.practicegp').select2();
   $('.copyto').select2();


     $('#selectgp').select2();
     $("#listcomment").change(function(){
      var comment=$(this).val();
      $("#showlist").val('');
      $('#showlist').val(comment);
     })

     $('#wardselect').select2();

     $('#clinicianselect').select2();
     $('#biop').select2();
     $('#biop2').select2();
     $('#biop2').select2();
     $('#biop3').select2();

     $('#phonecomment').select2();


     $('#phonecomment').select2({
    dropdownParent: $('#exampleModal3')
 });
     
    

$(".getlist").change(function(){
 getvalue=$(this).val();

 if(getvalue =='Auto Validation'){
window.open('/ocm/Autovalidation');
 }else if(getvalue =='BarCodes'){
window.open('/ocm/barcodes');
 }else if(getvalue =='Normal Ranges'){
    window.open('/ocm/normalranges');
 }else if(getvalue =='Test Code Mapping'){
    window.open('/ocm/HaemcodeMapping');
 }

})

$(".getvalue2").change(function(){

    myvalue2=$(this).val();
    if(myvalue2=='Add Text'){
 window.open('/ocm/cougulationtest');

    }else if(myvalue2=='Coagulation Panels'){
  window.open('/ocm/cougulationpanels');
    }else if(myvalue2=='Normal Ranges'){
 window.open('/ocm/cougulationdefination');  
    }else if(myvalue2=='Test Code Mapping'){
 window.open('/ocm/coagtestcode');   
    }
})  
$('.getlist3').change(function(){
   value3=$(this).val();
   if(value3=='Known To Analyser'){
 window.open('/ocm/activereq');
   }else if(value3=='New Analyte'){
 window.open('/ocm/addnewanalyte');
   }else if(value3=='Normal and Flag Ranges'){
 window.open('/ocm/normalranges');
   }else if(value3=='Plausible Range'){
 window.open('/ocm/plausibleranges');
   }else if(value3=='Assign Panels'){
 window.open('/ocm/assignpanel');
   }else if(value3=='Auto Validation'){
 window.open('/ocm/autovalid');
   }else if(value3=='Data Check'){
 window.open('/ocm/deltachecking');
   }else if(value3=='Edit Existing Analyte'){
 window.open('/ocm/biocode');
   }else if(value3=='Fasting Ranges'){
 window.open('/ocm/fasting');
   }else if(value3=='In Use'){
 window.open('/ocm/inuse');
   }else if(value3=='New Result'){
 window.open('/ocm/NewResults');
   }else if(value3=='Print Sequence'){
 window.open('/ocm/PrintSequence');
   }else if(value3=='Re Run Times'){
 window.open('/ocm/ReRundays');
   }else if(value3=='Set H/I/L'){
 window.open('/ocm/SetHIL');
   }else if(value3=='Splits'){
 window.open('/ocm/Splits');
   }else if(value3=='Test Code Mapping'){
 window.open('/ocm/BioCodeMapping');
   }else if(value3=='Units and Precision'){
 window.open('/ocm/UnitsPresicion');
   }
})  
        

$("#biop").change(function(){
        var s = $(this).children("option:selected").val();
        var sample = $('#sid').val();

        $.ajax({
        url:"{{route('biop')}}",
        data:{
            s:s,
            sample:sample
        },
        method:'POST',



})
.done(function(response){
console.log(response);
$("#addbio1").append(response);
$('.biochemistry2').val('Biochemistry');


});        
        
        
        ;
    // alert(s);
    });

    $("#biop2").change(function(){
        var s = $(this).children("option:selected").val();
        var sample = $('#sid').val();

        $.ajax({
        url:"{{route('biops')}}",
        data:{
            s:s,
            sample:sample
        },
        method:'POST',



})
.done(function(response){
console.log(response);
$("#addbio2").append(response);
$('.coagulation2').val('Coagulation');
});        
        
        
        ;
    // alert(s);
    });

   
    $("#biop3").change(function(){
        var s = $(this).children("option:selected").val();
        var sample = $('#sid').val();

        $.ajax({
        url:"{{route('extp')}}",
        data:{
            s:s,
            sample:sample
        },
        method:'POST',



})
.done(function(response){
console.log(response);
$("#addbio3").append(response);
$('.external2').val('External');
});        
        
        
        ;
    // alert(s);
    });

   


    $('#dels').on('click', '#delrow', function(e){
    // alert("!");
   $(this).closest('tr').remove()
});


$('#dels2').on('click', '#delrow2', function(e){
    // alert("!");
   $(this).closest('tr').remove()
});


$('#dels3').on('click', '#delrow3', function(e){
    // alert("!");
   $(this).closest('tr').remove()
});


$('.savedata').click(function(){




// const trs = document.querySelectorAll('#addbio1 tr');

// const result = [];

// for(let tr of trs) {
//   let th_td = tr.getElementsByTagName('td');
//   if (th_td.length == 0) {

//     th_td = tr.getElementsByTagName('th');
//   }
  
//   let th_td_array = Array.from(th_td); // convert HTMLCollection to an Array
//   th_td_array = th_td_array.map(tag => tag.innerText); // get the text of each element
//   result.push(th_td_array);
// }

// alert(result);
// myarray5=[];
// $( "biovalue" ).each(function( index ) {
//   // console.log( index);
//   myarray5.append(index);
// });

// alert(myarray5);

var ary = [];

ary=$('.biovalue ').text();
const myArray = ary.split("\n");

 // console.log(myArray);
var ary2 = [];

ary2=$('.coaghaem ').text();

const myArray2 = ary2.split("\n");



var ary3 = [];

ary3=$('.extvalue ').text();
const myArray3 = ary3.split("\n");



   
let myform=document.getElementById('form');
let data=new FormData(myform);

biochemistry2=data.get('biochemistry2');
address=data.get('address');
address2=data.get('address2');
address4=data.get('address4');
age=data.get('age');
chart=data.get('chart');
clinician=data.get('clinician');
code=data.get('code');
dept=data.get('dept');
dob2=data.get('dob2');
fname=data.get('fname');
gp=data.get('gp');
hospital=data.get('hospital');
recieved=data.get('recieved');
results=data.get('results');
sampledate=data.get('sampledate');
sampleid=data.get('sampleid');
selectunits=data.get('selectunits');
sid=data.get('sid');
sname=data.get('sname');
specimancomments=data.get('specimancomments');
tcomment=data.get('tcomment');
ward=data.get('ward');
coagulation2=data.get('coagulation2');
external2=data.get('external2');
sex=data.get('sex');
fasting=data.get('fasting');
urgent=data.get('urgent');

// data.append('myArray', myArray);
// data.append('myAarray2', myArray2);
// data.append('myAarray3', myArray3);

// data=[
//     [myArray],
//     [data],
    

//     ];

console.log(data);
var yourdata='1';
$.ajax({
    url:'{{route('Saveresults')}}',
    data:{
        biochemistry2:biochemistry2,
        address:address,
        address2:address2,
        address4:address4,
        age:age,
        chart:chart,
        clinician:clinician,
        code:code,
        dept:dept,
        dob2:dob2,
        fname:fname,
        gp:gp,
        hospital:hospital,
        recieved:recieved,
        results:results,
        sampledate:sampledate,
        sampleid:sampleid,
        selectunits:selectunits,
        sid:sid,
        sname:sname,
        specimancomments:specimancomments,
        tcomment:tcomment,
        ward:ward,
        coagulation2:coagulation2,
        external2:external2,
        sex:sex,
        fasting:fasting,
        urgent:urgent,
        myArray:myArray,
        myArray2:myArray2,
        myArray3:myArray3,


    },
    // processData:false,
    // cache:false,
    // contentType:false,
    method:'post',
}).done(function(data){
            
 if ($.isEmptyObject(data.error)){

                                      Lobibox.notify('success', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: data.success,
                                            icon: 'bx bx-check-circle'
                                        });
                                     window.location='';
                                 

                                } else {
                                     Lobibox.notify('warning', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: data.error,
                                            icon: 'bx bx-info-circle'
                                        });
                                }
})
event.preventDefault();
})


}); 




     

    
</script>




@endpush



