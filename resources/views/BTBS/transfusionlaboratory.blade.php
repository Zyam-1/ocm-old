@include('layouts.header')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Sample Info
               <a class="btn btn-info btn-sm" href="{{route('home')}}"><i class="fas fa-arrow-left"></i> Go Back </a>
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
                  <form id="form">
                        {{ csrf_field() }}

                                                 
                        <div class="card card-primary card-outline">
                            <div class="card-body ">  
                            <div class="row">
                                <div class="col-md-5 border-right">
                                
                                <div class="d-flex">
                                <div id="side_one">
                                    <div class="ch d-flex justify-content-between align-items-center">
                                        <button class="btn btn-warning">C/H</button>
                                        <div class="ch2 d-flex">
                                            <h6 class="mt-2 mr-3">CAVAN Chart#</h6>
                                            <button class="btn btn-danger">Unlock</button>
                                        </div>
                                    </div>
                                    <div class="input-group chart my-2">
                                        <button class="btn btn-secondary">&plus;</button>
                                        <button class="btn btn-secondary ml-1">&#8722;</button>
                                            <label for="chart" class="ml-2 mt-1">Chart</label>
                                            <input type="text" name="chart" id="chart" value="<?php if($rows!=""){ echo $rows['patnum'];}?>" class="ml-1 form-control">
                                            <label for="ae" class="ml-2 mt-1">A/E</label>
                                            <input type="text" name="ae" id="ae"  class="ml-1 form-control">
                                    </div>
                                    <div class="input-group my-2">
                                        <label for="samplenum" class="ml-2 mt-1">Sample#</label>
                                        <input type="text" name="samplenum" id="samplenum" value="<?php if($rows!=""){ echo $rows['SampleID'];}?>" class="ml-1 form-control">
                                       
                                        <label for="typenex" class="ml-2 mt-1">TYPENEX</label>
                                        <input type="text" name="typenex" id="typenex"  class="ml-1 form-control">
                                    </div>
                                    <input type="text" name="reportres" id="reportres" class="form-control mb-2">
                                </div>
                                    <div class="sidebtns ml-2">
                                        <button class="searchbtn btn btn-secondary mt-4">Search <span id="num_search">(3)</span></button>
                                        <button class="historybtn btn btn-secondary mt-4">History</button>
                                    </div>
                                </div>

                                <div>
                                <div class="row">
                                    <div class="col-md-8 p-0">
                                        <div class="input-group mt-2">
                                            <label for="namepat" class="ml-2 mt-1">Name</label>
                                            <input type="text" name="namepat" id="namepat" value="<?php if($rows!=""){ echo $rows['name'];}?>" class="ml-1 form-control">
                                        </div>
                                        <div class="input-group mt-2">
                                            <label for="mname" class="ml-2 mt-1">M.Name</label>
                                            <input type="text" name="mname" id="mname" class="ml-1 form-control">
                                        </div>
                                        <div class="input-group mt-2">
                                            <label for="address1" class="ml-2 mt-1">Addr 1</label>
                                            <input type="text" name="address1" id="address1" value="<?php if($rows!=""){ echo  $rows['addr1'];}?>" class="ml-1 form-control">
                                        </div>

                                        <div class="input-group mt-2">
                                            <label for="address2" class="ml-2 mt-1">Addr 2</label>
                                            <input type="text" name="address2" id="address2" value="<?php if($rows!=""){ echo $rows['addr2'];}?>" class="ml-1 form-control">
                                        </div>
                                        <div class="input-group mt-2">
                                            <label for="address3" class="ml-2 mt-1">Addr 3</label>
                                            <input type="text" name="address3" id="address3"  value="<?php if($rows!=""){ echo $rows['addr3'];}?>"  class="ml-1 form-control">
                                        </div>
                                        <div class="input-group mt-2">
                                            <label for="address4" class="ml-2 mt-1">Addr 4</label>
                                            <input type="text" name="address4" id="address4"  value="<?php if($rows!=""){ echo $rows['addr4'];}?>"   class="ml-1 form-control">
                                        </div>
                                        <div class="input-group mt-2">
                                            <label for="remark" class="ml-2 mt-1">Remark</label>
                                            <input type="text" name="remark" id="remark" class="ml-1 form-control">
                                        </div>
                                        <div class="input-group mt-2">
                                            <label for="selectward" class="ml-2 mt-1">Ward</label>
                                            <input type="text" name="ward"value="<?php if($rows!=""){ echo $rows['ward'];}?>" id="remark" class="ml-1 form-control">
                                        </div>
                                        <div class="input-group mt-2">
                                            <label for="selectdr" class="ml-2 mt-1">Clin</label>
                                            <input type="text" name="clinician" value="<?php if($rows!=""){ echo $rows['clinician'];}?>"id="remark" class="ml-1 form-control">
                                        </div>
                                        <div class="input-group mt-2">
                                            <label for="gp" class="ml-2 mt-1">GP</label>

                                            <input type="text" name="gp" value="<?php if($rows!=""){ echo $rows['GP'];}?>"id="gp" class="ml-1 form-control">
                                        </div>
                                        <div class="input-group mt-2">
                                            <label for="selectcond" class="ml-2 mt-1">Cond</label>
                                            <input type="text" name="conditions" class="ml-2 form-control" value="<?php if($rows!=""){ echo $rows['conditions'];}?>">
                                        </div>
                                        <div class="input-group mt-2">
                                            <label for="selectproc" class="ml-2 mt-1">Proc</label>
                                            <input type="text" name="procedure" class="ml-2 form-control" value="<?php if($rows!=""){ echo $rows['procedure'];}?>">

                                        </div>
                                        <div class="input-group mt-2">
                                            <label for="selectspec" class="ml-2 mt-1">Spec</label>
                                            <input type="text" name="specialprod" class="ml-2 form-control" value="<?php if($rows!=""){ echo $rows['specialprod'];}?>">
                                        </div>
                                        <div class="input-group mt-2">
                                            <label for="samplecomment" class="ml-2 mt-1">Sample Comment</label>
                                            <input type="text" name="samplecomment" value="<?php if($rows!=""){ echo $rows['SampleComment'];}?>" id="samplecomment" class="ml-1 form-control">
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group mt-2">
                                            <label for="dob" class="ml-2 mt-1">D.O.B</label>
                                            <input type="text" name="dob" id="dob" value="<?php if($rows!=""){ 
                                                echo \Carbon\Carbon::parse($rows['DoB'])->format('d-m-Y');
                                                }?>"class="ml-1 form-control">
                                        </div>
                                        <div class="input-group mt-2">
                                            <label for="age" class="ml-2 mt-1">Age</label>
                                            <input type="text" name="age" id="age" value="<?php if($rows!=""){ echo $rows['age'];}?>"class="ml-1 form-control">
                                        </div>
                                        <div class="input-group mt-2">
                                            <label for="sex" class="ml-2 mt-1">Sex</label>
                                            <input type="text" name="sex" id="sex" value="<?php if($rows!=""){ echo $rows['sex'];}?>"class="ml-1 form-control">
                                        </div>

                                        <div>
                                        <img src="" alt="" width="100" height="100" class="m-3 d-none">        
                                        </div>
                                        <div class="mt-5">
                                            <label for="checkby">Checked By</label>
                                            <input type="text" name="checkby"  value="<?php if($rows!=""){ echo $rows['Checker'];}?>"id="checkby" class="ml-1 form-control">
                                        </div>
                                        <div class="mt-3">
                                            <label for="sampledate">Sample Date</label>
                                            <input type="text" name="sampledate"  value="<?php if($rows!=""){ 
                                                echo \Carbon\Carbon::parse($rows['SampleDate'])->format('d-m-Y');
                                                }?>" id="sampledate" class="ml-1 form-control">
                                        </div>
                                        <div class="mt-3">
                                            <label for="sampletime">Sample Time</label>
                                            <input type="text" name="sampletime" id="sampletime" value="<?php if($rows!=""){ 
                                                echo \Carbon\Carbon::parse($rows['SampleDate'])->format('H:i');
                                                }?>" class="ml-1 form-control">
                                        </div>
                                        <div class="mt-3">
                                            <label for="datetime">Date/Time Recieved</label>
                                            <input type="text" name="datetime"value="<?php if($rows!=""){ 
                                                echo \Carbon\Carbon::parse($rows['DateReceived'])->format('d-m-Y H:i');
                                                }?>" id="datetime" class="ml-1 form-control">
                                        </div>

                                    </div>
                                    </div>
                                    </div>

                            
                                                            
                            
                                </div>          
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-8 pr-0">
                                            <div class="shadow p-3 mb-3 bg-white rounded">
                                                <h5 class="mb-3">Grouping</h5>
                                                <div class="input-group mt-2">
                                                    <label for="suggest" class="ml-2 mt-1">Suggest</label>
                                                    <input type="text" name="suggest" id="suggest" value="<?php if($rows!=""){ echo $rows['fgsuggest'];}?>"class="ml-2 form-control">
                                                </div>
                                                <div class="input-group mt-2">
                                                    
                                                    <label for="report" class="ml-2 mt-1">Report</label>
                                                    <select name="report"id="report" class="ml-2 form-select form-control">
                                                       <?php $arrayBlood = ['O Neg', 'O Pos', 'A Neg', 'A Pos', 'B Neg', 'B Pos', 'AB Neg', 'AB Pos', 'O Dvi', 'A Dvi', 'B Dvi', 'AB Dvi', 'Control ?', 'Error'];
                                                            if($rows == ""){
                                                                foreach($arrayBlood as $ar){
                                                                    echo "<option>$ar</option>";
                                                                }
                                                            } else {
                                                                echo "<option>".$rows['fgroup']."</option>";
                                                                foreach($arrayBlood as $ar){
                                                                if($ar == $rows['fgroup']){

                                                                } else {
                                                                    echo "<option>$ar</option>";
                                                                }
                                                            }
                                                        }
                                                       ?>

                                                    </select>
                                                </div>
                                                <div class="input-group mt-2">
                                                    <label for="kel" class="ml-2 mt-1">kel</label>
                                                    <select name="kel" id="kel" class="ml-2 form-select form-control">
                                                    <?php $arrayK= ['K+', 'K-'];
                                                            if($rows == ""){
                                                                foreach($arrayK as $ar){
                                                                    echo "<option>$ar</option>";
                                                                }
                                                            } else {
                                                                echo "<option>".$rows['Kell']."</option>";
                                                                foreach($arrayK as $ar){
                                                                if($ar == $rows['Kell']){

                                                                } else {
                                                                    echo "<option>$ar</option>";
                                                                }
                                                            }
                                                        }
                                                       ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="shadow p-3 mb-3 bg-white rounded">
                                                <h5 class="mt-3">Electronic X-Matching</h5>
                                                <div>
                                                    <div class="form-check form-check-inline mt-2">
                                                        <label class="form-check-label mr-1" for="prevsample">Previous Samples</label>
                                                        <input class="form-check-input" type="checkbox" id="prevsample" value="option1" <?php if($previousSample!=""){ if($previousSample == 1){ echo "checked";}}?>>
                                                        <input class="form-check-input" type="checkbox" id="prevscreen" value="option2" <?php if($prevAB!=""){ if($prevAB == 1){ echo "checked";}}?>>
                                                        <label class="form-check-label" for="prevscreen">Previous A/B Screens</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mt-2">
                                                        <label class="form-check-label mr-1" for="prevgroup">Previous Group agreement</label>
                                                        <input class="form-check-input" type="checkbox" id="prevgroup" value="option1" <?php  if($prevgroupagreement!=""){
                                                        if($prevgroupagreement == 1){ echo "checked";}}?>>
                                                        <input class="form-check-input" type="checkbox" id="noadverse" value="option2" <?php if($adverseReaction !=""){ if($adverseReaction == 0){ echo "checked";}}?>>
                                                        <label class="form-check-label" for="noadverse">No Adverse Reactions</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mt-2">
                                                        <label class="form-check-label mr-1" for="currscreen">Current A/B Screen</label>
                                                        <input class="form-check-input" type="checkbox" id="currscreen" value="option1" <?php if($currentAB !=""){  if($currentAB == 1){ echo "checked";}}?>>
                                                        <input class="form-check-input" type="checkbox" id="prevelig" value="option2" <?php if($NotEligible !=""){  if($NotEligible == 0){ echo "checked";}}?>>
                                                        <label class="form-check-label" for="prevelig">Previously Eligible</label>
                                                    </div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" id="visiondata" value="option1" <?php if($unmodcurrentAB !=""){  if($unmodcurrentAB == 1){ echo "checked";}}?>>
                                                        <label class="form-check-label mr-1" for="visiondata">Vision Data</label>
                                                    </div>
                                                    <div class="mt-3 d-flex text-center">
                                                        <h6 class="mt-2">Not Eligible</h6>
                                                        <button class="btn btn-primary mx-1">View</button>
                                                    </div>
                                                    <div>
                                                        <h6 class="mt-3">Expired</h6>
                                                    </div>
                                                    <div>
                                                        <h6>AB Report</h6>
                                                        <textarea name="abreport" id="abreport" width="100" class="form-control">
                                                        <?php if($rows!=""){ echo $rows['AIDR'];}?>
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-6 pr-0">
                                                    <button class="btn btn-primary mx-1">Print Label</button>
                                                    <button class="btn btn-primary m-1">Phone Results</button>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <button class="btn btn-primary w-100 mx-1">Print Form</button>
                                                    <button class="btn btn-primary w-100 m-1">Work Lists</button>
                                                    <button class="btn btn-primary w-100 m-1">Lab</button>
                                                    <button class="btn btn-primary w-100 m-1">Genotype</button>
                                                </div>
                                                <div class="col-md-12">
                                                    <button class="btn btn-primary w-100 m-1">Request Details</button>
                                                    <button class="btn btn-primary w-100 m-1">Print DAT</button>

                                                    <div class="mt-3">
                                                        <table class="my-3 table table-striped tableDAT">
                                                            <thead>
                                                                <tr>   
                                                                    <th>DAT</th>
                                                                    <th>POS</th>
                                                                    <th>NEG</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="d-flex ml-2"> -->
                                            <!-- </div> -->
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary mt-1">Enter External Notes</button>
                                            <button class="btn btn-primary mt-1">View Reports</button>
                                            <button class="btn btn-primary mt-1">Cancel</button>
                                            <button class="btn btn-primary mt-1" id="updatesave">Save F2</button>
                                            <button type="submit" id="bloodtransfusion" class="btn btn-primary mt-1">Save & Hold</button>
                                            <button class="btn btn-primary mt-1">Order</button>
                                           
                                      </div>
                                    </div>
                                </div> 
                                
                            <div class="col-md-12">
                                <h5 class="mt-5">Cross Match</h5>
                                <a href="#" class="btn btn-primary mt-1 ml-5">Hide Current</a>
                                <a href="{{ route('IssueBatch') }}" class="btn btn-primary mt-1 ml-3">Issue Batch Product</a>
                                <!-- <button id="manual" class="btn btn-primary mt-1 ml-3">Manual Prepare</button> -->



                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary mt-1" data-toggle="modal" data-target="#exampleModalCenter">
                                    Manual Prepare
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" style="max-width: 860px;!important" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="modalreload">
                                    



                                    <div class="row" >
                                <div class="col-md-9 m-auto justify-content-center">
                                    <label for="isbt128" class="ml-2 mt-1">ISBT128</label>
                                    <input type="text" id="isbt128" name="isbt128" value="<?php if($rowsNew!=""){ echo $rowsNew['ISBT128'];}?>" class="ml-1 form-control d-inline w-25">
                                    <input type="hidden" id="labnumber" name="labnumber" value="{{ (request()->segment(2)) }}" id="labnumber" class="ml-1 form-control d-inline w-25">
                                    <div class="input-group mt-2">
                                        <label for="product" class="ml-2 mt-1">Product</label>
                                        <input type="text" id="product" name="product" value="<?php if($rowsNew2!=""){ echo $rowsNew2['Wording'];}?>" id="product" class="ml-1 form-control">
                                    </div>  
                                    <div class="input-group mt-2">
                                        <div class="row">
                                            <div class="col-4 d-flex">
                                                <label for="expiry" class="ml-2 mt-1">Expiry</label>
                                                <input type="text" id="expiry" value="<?php if($rowsNew!=""){ echo $rowsNew['DateExpiry'];}?>" name="expiry" id="expiry" class="ml-1 form-control w-100 ">
                                            </div>
                                            <div class="col-4 d-flex">
                                                <label for="grouprh" class="ml-2 mt-1">Group/Rh</label>
                                                <input type="text" id="grouprh"name="grouprh"value="<?php if($rowsNew!=""){ echo $rowsNew['GroupRH'];}?>" class="ml-1 form-control w-100">
                                            </div>
                                            <div class="col-4 d-flex">
                                                <label for="kel" class="ml-2 mt-1">Kel</label>
                                                <input type="text" name="kel" id="kel" class="ml-1 form-control w-100">
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="input-group mt-2">
                                        <label for="screen" class="ml-2 mt-1">Screen</label>
                                        <input type="text" id="screen"name="screen" value="<?php if($rowsNew!=""){ echo $rowsNew['Screen'];}?>"id="screen" class="ml-1 form-control w-25">
                                    </div>  
                                    <div class="input-group mt-2 mb-3">
                                        <label for="status" class="ml-2 mt-1">Status</label>
                                        <input type="text" id="status"name="status" value="<?php if($rowsNew!=""){ echo $rowsNew['Event'];}?>" id="status" class="ml-1 form-control w-25">
                                    </div>  

                                    <div class="shadow p-3 bg-white rounded w-50 m-auto">
                                        <input type="text" name="blank" id="blank" class="form-control w-75">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-9 mt-3">
                                    <table id="table" class="table table-striped">
                                        <thead>
                                            <tr>   
                                                <th>ISBT128</th>
                                                <th>Expiry Date</th>
                                                <th>Group Rh</th>
                                                <th>Latest</th>
                                                <th>Screen</th>
                                            </tr>
                                        </thead>
                                        <tbody id='pendingtable' class="bg-light">
                                           
                                        </tbody>
                                    </table>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="form-check mt-2">
                                                <label class="form-check-label mr-4" for="roomtemp">Room Temp</label>
                                                <input class="form-check-input" type="checkbox" id="roomtemp" value="option1">
                                            </div>
                                            <div class="form-check mt-2">
                                                <label class="form-check-label mr-4" for="coombs">Coombs</label>
                                                <input class="form-check-input" type="checkbox" id="coombs" value="option2">
                                            </div>
                                            <div class="form-check mt-2">
                                                <label class="form-check-label mr-4" for="enzyme">Enzyme</label>
                                                <input class="form-check-input" type="checkbox" id="enzyme" value="option2">
                                            </div>
                                        </div>
                                        <div class="all-radio">

                                            <div class="d-flex">
                                                <div class="form-check mr-2">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        0
                                                    </label>
                                                    <input class="form-check-input ml-1" type="radio" name="flexRadioDefault1" id="flexRadioDefault1">
                                                </div>
                                                <div class="form-check ml-3">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault2">

                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        &plus;
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="d-flex">
                                                <div class="form-check mr-2">
                                                    <label class="form-check-label" for="flexRadioDefault3">
                                                        0
                                                    </label>
                                                    <input class="form-check-input ml-1" type="radio" name="flexRadioDefault1" id="flexRadioDefault3">
                                                </div>
                                                <div class="form-check ml-3">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault4">

                                                    <label class="form-check-label" for="flexRadioDefault4">
                                                        &plus;
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="d-flex">
                                                <div class="form-check mr-2">
                                                    <label class="form-check-label" for="flexRadioDefault5">
                                                        0
                                                    </label>
                                                    <input class="form-check-input ml-1" type="radio" name="flexRadioDefault1" id="flexRadioDefault5">
                                                </div>
                                                <div class="form-check ml-3">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault6">

                                                    <label class="form-check-label" for="flexRadioDefault6">
                                                        &plus;
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <button class="btn btn-warning" id="issue">Issue</button>
                                            <button class="btn btn-primary">X-M</button>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary mt-3" id='pending'>Mark As Pending</button>
                                    <button type="button" class="d-none" id="hiddenbtn"></button>
                                    <button class="btn btn-primary mt-4" id="mark">Remove from pending list</button>
                                    <button class="btn btn-danger mt-3">Cancel</button>
                                </div>
                            </div>
         
             




                                    </div>
                                    <!-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div> -->
                                    </div>
                                </div>
                                </div>



                                <a href="{{ route('Electronicissue') }}" class="btn btn-primary mt-1 ml-2">Electronic Issue</a>
                                <a href="" class="btn btn-primary mt-1 ml-2">Issue to Unknown</a>
                                <button class="btn btn-primary mt-1 ml-2" id="suggestUnits">Suggest Units</button>

                                <div class="mt-3">
                                    <table class="my-3 table table-striped tableLast">
                                        <thead>
                                            <tr>   
                                                <th>Unit</th>
                                                <th>Group</th>
                                                <th>Expiry</th>
                                                <th>Type</th>
                                                <th>Latest</th>
                                                <th>R</th>
                                                <th>C</th>
                                                <th>E</th>
                                                <th>Product</th>
                                                <th>Op</th>
                                                <th>Date</th>
                                                <th>Event Start</th>
                                                <th>Event End</th>
                                                <th>Identity</th>
                                            </tr>
                                        </thead>
                                   
                                    <tbody>
                                       
                                        <?php 
                                            if(count($rows11)>0){
                                                for ($i=0; $i < count($rows11); $i++) { 
                                           
                                            ?>
                                             <tr>
                                            <td></td>
                                            <td><?php  echo $rows11[$i]['GroupRH'];?></td>
                                            <td><?php  echo $rows11[$i]['DateExpiry']; ?></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><?php echo $rowsbarcode11[$i]['Wording']; ?></td>
                                            <td><?php echo $rows11[$i]['Operator'];?></td>
                                            <td><?php echo $rows11[$i]['DateTime'];?></td>
                                            <td><?php echo $rows11[$i]['EventStart']; ?></td>
                                            <td><?php echo $rows11[$i]['EventEnd']; ?></td>
                                            <td></td>
                                            </tr>
                                            <?php 
                                             } 
                                            }
                                             ?>
                                       
                                    </tbody>
                                    </table>
                                </div>
                            </div>

                            </div>
                        </div>
                    </div>
                    <div id="result" class="text-danger"></div>

                  </form>        

        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>



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
<script >
$(document).ready(function() {
    var response2;

    var modalFlag = 1;
    var elements = $('#exampleModalCenter').attr('class');
    if(elements.includes('fade show')){
        if(modalFlag%2 == 0){
            modalFlag++;
        }
    } else {
        modalFlag = 2;
    }
    console.log(elements);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#updatesave').click(function (){
        event.preventDefault();

    let myform = document.getElementById('form');
    let sampleid = document.getElementById('samplenum');
    var formData = new FormData(myform);

        // console.log(formData);
        $.ajax({
            method: 'post',
            url: 'Transfusionlab',
            data: formData,
            contentType: false,
            processData: false,
            cache: false,

        }).done(function (response) {
            window.scrollTo({ top: 0, behavior: 'smooth' });

             location.reload();
        });
    })


$('#bloodtransfusion').click(function(){
{
var sampleid=document.getElementById("samplenum");
var sampleid2 = sampleid.value;
  
//  let formmy=document.getElementById("form");
//  let formd=new FormData(formmy);

//  console.log(sampleid2);

 $.ajax({
        url: "{{route('Transfusionlab')}}/"+sampleid2,
        method: 'get',

        }).done(function (response) {
                if(response.success == true){
             
            } else  {
                Lobibox.notify('warning', {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: "Sample ID Does Not Exist",
                    icon: 'bx bx-check-circle'
                });
            }
               window.location="{{route('Transfusionlab')}}/"+sampleid2;
        });
        event.preventDefault();
}


}); 

var wage = document.getElementById("samplenum");

$("#samplenum").keyup(function(e) {

if(e.key == 'Enter') {
  $('#bloodtransfusion').trigger('click');
}
});

$(document).on('click', '#suggestUnits', function (event) {
    event.preventDefault();

    swal({
            title: "Please Enter Packets",
            // text: "Please Enter Packets.",
            icon: "warning",
            content: "input",
            buttons: true,
            dangerMode: true,
            })
    .then((willDelete) => {
        if (willDelete) {
            var bpackets = $(".swal-content__input").val();
            // alert(text);
            $.ajax({
                type: 'post',
                url:"{{ route( 'NetacquirePacket') }}",
                data: {
                    'bpackets' : bpackets,
                },
                dataType: 'json',                   
                success: function(response){ 
                }
            });
        } 
        });
    });


    // Units Pending

    
    var checkMarkFlag = 0;

$(document).ready(function() {
document.getElementById("issue").disabled = true;

var isbt="";

$("#isbt128").keyup(function(e) {
    if(e.key == 'Enter') {
        $('#hiddenbtn').trigger('click');
        e.preventDefault();
        return false;
    }
});

$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});

$('#hiddenbtn').click(function(){
    event.preventDefault();

    var isbt1282=document.getElementById("isbt128");
    var isbt128 = isbt1282.value;

 $.ajax({
        method: 'get',
        url: "{{route('Unitspending')}}",
        data:{
            isbt128:isbt128
        }
        }).done(function (response) {
            response2 = response;
            $("#product").val(response.rowsNew2.Wording);
            $("#expiry").val(response.rowsNew.DateExpiry);
            $("#isbt128").val(response.rowsNew.ISBT128);
            $("#grouprh").val(response.rowsNew.GroupRH);
            $("#status").val(response.rowsNew.Event);
            $("#screen").val(response.rowsNew.Screen);

        });

}); 
$('#issue').click(function(){  

    document.getElementById("issue").disabled = true;
    pendingtable.innerHTML = "";
    var sampleid=document.getElementById("labnumber");
    var sampleid2 = sampleid.value; 


    $.ajax({
        method: 'post',
        url: "{{route('Unitspending')}}",
        data: {
            isbt128:isbt,
            sampleid2:sampleid2,
        }
        }).done(function (response) {
            if(response.success == true){
                Lobibox.notify('success', {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: "Data Updated Successfully",
                    icon: 'bx bx-check-circle'
                });
            }
        });
        event.preventDefault();

}); 

$('#pending').click(function(){
    var isbt1282=document.getElementById("isbt128");
    var isbt128 = isbt1282.value;

    $.ajax({
        method: 'post',
        url: "{{route('Unitspending2')}}",
        data: {
            isbt128:isbt128,
        }
        }).done(function (response) {
            
        });
        event.preventDefault();

    $('#issue').removeAttr('disabled');

    $('#isbt128').val('');
    $('#product').val('');
    $('#grouprh').val('');
    $('#screen').val('');
    $('#expiry').val('');
    $('#status').val('');
   
    isbt=response2.rowsNew.ISBT128;
    pendingtable.innerHTML = "<tr>  <td>"+response2.rowsNew.ISBT128+"</td>"
    +"<td>"+response2.rowsNew.DateExpiry+"</td>"
    +"<td>"+response2.rowsNew.GroupRH+"</td>"
    +"<td>"+"</td>"
    +"<td>"+response2.rowsNew.Screen+"</td>"
    +"</tr>";

}); 
var wage = document.getElementById("isbt128");


   
// $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

   
// var table=$('#table').DataTable({
 

//  columns: [

//     {data: 'isbt128', name: 'isbt128'},
// {data: 'expirydate', name: 'expirydate'},
// {data: 'grouprh', name: 'grouprh'},
// {data: 'product', name: 'product'},
// {data: 'screen', name: 'screen'},
//     // {data: 'action', name: 'action', orderable: false, searchable: false},
// ],
// "order":[[0, 'desc']],

//   dom: "rtip",
//                 buttons: [
               
//                     {
//                         title:'Users',
//                         text: 'Excel',
//                         footer: true,
//                         extend: 'excelHtml5',
//                         exportOptions: {
//                         columns: [':visible :not(:last-child)']
//                         },
//                     },
//                     {
//                     title:'Users',
//                     text: 'PDF',
//                     extend: 'pdfHtml5',
//                     exportOptions: {
//                         columns: [':visible :not(:last-child)']
//                         },
//                     footer: true,
//                     orientation: 'landscape',
//                     pageSize: 'LEGAL',
//                     customize: function (doc) {
//                     doc.content[1].table.widths =
//                               Array(doc.content[1].table.body[0].length + 1).join('*').split('');
//                           doc.styles.tableBodyEven.alignment = 'center';
//                           doc.styles.tableBodyOdd.alignment = 'center';
                               
//                         }
//                     },
//                     {
//                         text: 'Print',
//                         title:'Users',
//                         extend: 'print',
//                         footer: true,
//                         exportOptions: {
//                         columns: [':visible :not(:last-child)']
//                         },
//                     },
//                     'colvis'  
//                 ],

//                 columnDefs: [{
//                     orderable: false,
//                     targets: -1,
//                 },
//                 { "visible": false, "targets": [] }
//                 ],

// });


// table.on('click', '.delete', function () {
     
//      var id=this.id;
     
//          swal({
//   title: "Are you sure?",
//   text: "Once deleted, you will not be able to recover this imaginary file!",
//   icon: "warning",
//   buttons: true,
//   dangerMode: true,

// }).then((willDelete) => {
//   if (willDelete) {
//                          $.ajax({
//                         type: 'get',
//                         url:"Cdelete/"+id,
//                         //data: {'id':id},
//                         dataType: '',                  
//                        success: function(){
                           
//                          table.ajax.reload(null, false);

//                               }
//                             });

   

//   }
// });

       
//     });
     
   




   

});
   

});
</script>
@endpush
