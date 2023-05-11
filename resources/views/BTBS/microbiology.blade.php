@include('layouts.header')

<style>
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
th{
  padding:10px;
}
</style>

    <!-- Select2 -->
  <link href="{{ asset('plugins/select2/css/select2.min.css?1112') }}" rel="stylesheet" >
  <link href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css?1112') }}" rel="stylesheet" >
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Microbiology
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


                  <form id="form" >
                                       {{ csrf_field() }}
                                                 
                         <div class="card card-primary card-outline">
                            <div class="card-body ">  
                 <div class="col-md-12">
                   
                 </div>          
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label class="form-label">Sample ID</label>
                        <input type="number" id="sampleid" name="sid" value="<?php if($data!=''){ echo $data['SampleID'];} ?>" class="form-control">
                    </div>
                   <!--  <div class="col-md-3">
                        <label class="form-label">MRU</label>
                        <input type="text" name="mru" class="form-control" >
                    </div> -->
                       <div class="col-md-3">
                         <label class="form-label">Chart #</label>
                        <input type="text" name="canavan" class="form-control" value="<?php if($data!=''){ echo $data['Chart'];} ?>">
                    </div>
                  <div class="col-md-3 ">
                        <label class="form-label">Add To Consultant List</label>
                        <div class="input-group">
                            <input type="text" name="addto" class="form-control"><a href="#" class="btn btn-primary">Scan</a>
                        </div>
                </div>
                   <div class="col-md-3">
                         <label class="form-label">D.O.B</label>
                        <input type="text" name="dob" class="form-control"  value="<?php if($data!=''){ $date=$data['DoB'];
                    $date2=explode(':',$date);
                    echo $date2[0];
                    } ?>">
                    </div>
              
                </div>
                <div class="row mt-3">
                   
                        <div class="col-md-3">
                         <label class="form-label">Surname</label>
                        <input type="text" name="sname" class="form-control" value="<?php if($data!=''){ echo $data['SurName'];} ?>">
                    </div>
                    <div class="col-md-3">
                         <label class="form-label">Forename</label>
                        <input type="text" name="fname" class="form-control" value="<?php if($data!=''){ echo $data['ForeName'];} ?>">
                    </div>
                                          <div class="col-md-3">
                         <label class="form-label">Age</label>
                        <input type="text" name="age" class="form-control"  value="<?php if($data!=''){ echo $data['Age'];} ?>">
                    </div>
                        <div class="col-md-3">
                         <label class="form-label">Sex</label>
                        <div class="input-group">
                            <input type="text" value="<?php if($data!=''){ echo $data['Sex'];} ?>" name="sex" class="form-control" ><a href="#" class="btn btn-primary">Search</a>
                        </div>
                    </div>
<!--                               <div class="col-md-3 ">
                          <label class="form-label "><p> </p></label>
                        <input type="text" name="fname" class="form-control" value="Lisawaun:Medical 2">
                    </div> -->
                   <!--    <div class="col-md-3">
                          <label class="form-label">Site Details</label>
                        <input type="text" name="fname" class="form-control" value="<?php if($ocmRequest!=''){ echo $ocmRequest['TestCode'].$ocmRequest['TestDescription'];} ?>" >
                    </div> -->
                </div>
                <div class="row mt-3">
          
<!--                        <div class="col-md-3 mt-2">
                          <label class="form-label"> </label>
                        <div class="input-group">
                            <input type="text" name="fname" class="form-control" ><a href="#" class="btn btn-primary">Search</a>
                        </div>
                    </div> -->
              

                </div>
            
                <div class="row mt-3">
                    <div class="col-md-4 mt-2">
                        <label class="form-label"></label>
                        <div class="input-group"><input type="text" name="comment" class="form-control"><a href="#" class="btn btn-primary">Unlock Demographics</a></div>
                    </div>
                    <div class="col-md-3 mt-4 mx-0 text-center">
                        <a href="#" class="btn btn-primary mt-1">B</a>
                         <a href="#" class="btn btn-primary mt-1">M</a>
                         <a href="#" class="btn btn-primary mt-1">H</a>
                    </div>

                    <div class="col-md-5 mt-2">
                        <label class="form-label"></label>
                        <input type="text" name="field" class="form-control">
                    </div>
                </div>


                <div class="row pt-4">
                    <div class="col-md-10">
                       <!--Start Tabs -->
                       <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="demographics-tab" data-toggle="tab" href="#demographics" role="tab" aria-controls="demographics" aria-selected="true">Home</a>
      <a class="nav-item nav-link" id="cs-tab" data-toggle="tab" href="#cs" role="tab" aria-controls="cs" aria-selected="false">Profile</a>
      <a class="nav-item nav-link" id="Identification-tab" data-toggle="tab" href="#Identification" role="tab" aria-controls="Identification" aria-selected="false">Contact</a>
    </div>
  </nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="demographics" role="tabpanel" aria-labelledby="nav-home-tab">
    <form>
    <div class="container">
    <div class="row pt-3">
    <div class="col-md-6">
  <div class="row pt-3">  
  <div class="col-md-6">
    <div class="form-outline">
  <label class="form-label mb-0" for="chart">Chart#:</label>
  <input type="number" id="chart" class="form-control form-control" value="<?php if($data!=''){ echo $data['Chart'];} ?>" placeholder="74625" />
 
  </div>
  </div>
  <div class="col-md-6">
  <div class="form-outline">
  <label class="form-label  mb-0" for="sample">EXT Sample ID:</label>
  <input type="number" id="sample" class="form-control form-control" placeholder="" value="<?php if($data!=''){ echo $data['ExtSampleID'];} ?>" />
 
  </div>
  </div>
 
  </div>
  <div class="wrapper pt-3">
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="pregnent"  id="pregnent"value="1"  <?php if($data!=''){
    echo ($data['Pregnant']==1)?"checked":"" ;
  }?>/>
  <label class="form-check-label" for="pregnent">Pregnent</label>
 
  </div>
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="penecilin" id="penecilin" value="1" />
  <label class="form-check-label" for="penecilin">Penecilin Allergy</label>
 
  </div>
  <div class="row pt-3">
  <div class="col-md-4">
  <div class="form-outline datepicker w-100">
  <label for="dob" class="form-label  mb-0">D.O.B</label>
  <div>
  <input id="inp1" type="text" name="dob" value="<?php if($data!=''){ $date=$data['DoB'];
  $date2=explode(':',$date);
  echo $date2[0];
  } ?>"  class="form-control">
  </div>
  </div>
  </div>
  <div class="col-md-4">
  <div class="form-outline">
  <label class="form-label  mb-0" for="age">Age</label>
  <input type="text" id="age" class="form-control form-control" value="<?php if($data!=''){ echo $data['Age'];} ?>" placeholder="" />
 
  </div>
  </div>
  <div class="col-md-4">
  <div class="form-outline">
  <label class="form-label  mb-0" for="sex">Sex</label>
  <input type="text" id="sex" class="form-control form-control" value="<?php if($data!=''){ echo $data['Sex'];} ?>" placeholder="Male" />
 
  </div>
  </div>
  </div>
  <div class="row pt-3">
  <div class="col-md-12">
  <div class="form-outline">
  <label class="form-label mb-0 " for="address">Address</label>
  <textarea class="form-control"placeholder="Lisawaun" id="address"    rows="1"><?php if($data!=''){ echo $data['Addr0'];} ?></textarea>
 
  </div>
  </div>
  </div>
  <div class="row pt-3">
  <div class="col-md-12">
  <div class="form-outline">
  <label class="form-label mb-0 " for="hospital">Hospital</label>
  <textarea class="form-control"placeholder="Cavan" id="cootihill" rows="1"><?php if($data!=''){ echo $data['Hospital'];} ?></textarea>
 
  </div>
  </div>
  </div>
  <div class="row pt-3">
  <div class="col-md-12">
  <div class="form-outline">
  <label class="form-label mb-0 " for="ward">Ward</label>
  <textarea class="form-control"placeholder="Medical2" id="ward" rows="1"><?php if($data!=''){ echo $data['Addr0'];} ?></textarea>
 
  </div>
  </div>
  </div>
  <div class="row pt-3">
  <div class="col-md-12">
  <div class="form-outline">
  <label class="form-label mb-0 " for="clinician">Clinician</label>
  <textarea class="form-control"placeholder="Dr James Hayee" id="clinician" rows="1"><?php if($data!=''){ echo $data['Clinician'];} ?></textarea>
 
  </div>
  </div>
  </div>
  <div class="row pt-3">
  <div class="col-md-12">
  <div class="form-outline">
  <label class="form-label mb-0 " for="gp">GP</label>
  <textarea class="form-control"placeholder="" id="GP" rows="1"><?php if($data!=''){ echo $data['GP'];} ?></textarea>
 
  </div>
  </div>
  </div>
  <div class="row pt-3">
  <div class="col-md-12">
  <div class="form-outline">
  <label class="form-label mb-0 " for="comments">Comments</label>
  <textarea class="form-control"placeholder="" id="comments" rows="1"></textarea>
 
  </div>
  </div>
  </div>
  <div class="row pt-3">
  <div class="col-md-12">
  <div class="form-outline">
  <label class="form-label mb-0 " for="blank"></label>
  <textarea class="form-control"placeholder="" id="blank" rows="5"></textarea>
 
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
  <input id="inp1" type="text" name="rundate" class="form-control" value="<?php if($data!=''){ echo $data['RunDate'];} ?>">
  </div>
  </div>    
    </div>
    <div class="col-md-6">
    <div class="form-outline datepicker w-100">
  <label for="sampledate" class="form-label  mb-0">Sample Date</label>
  <div>
  <input id="inp1" type="text" name="sampledate" class="form-control" value="<?php if($data!=''){ echo $data['SampleDate'];} ?>">
  </div>
  </div>    
    </div>    
    </div>
    <div class="wrapper pt-3">
      <div class="row pt-3">
        <div class="col-md-12 ">
  <input class="form-check-input" type="radio" name="routine" id="pregnent"value="option1"  />
  <label class="form-check-label" for="pregnent">Routine</label>
 
  </div>
  <div class="col-md-12">
  <input class="form-check-input" type="radio" name="routine" id="penecilin"value="option1" />
  <label class="form-check-label" for="penecilin">Out Of Hours</label>
 
  </div>
      </div>
   <div class="row pt-3">
       <div class="col-md-6">
         <label class="form-label">Recieved In Lab</label>
         <input type="text" name="recieved" class="form-control" value="<?php if($data!=''){ echo $data['RecDate'];} ?>">
       </div>
     </div>
   <div class="row pt-3">
       <div class="col-md-6">
                <label class="form-label">Site</label>
         <input type="text" name="site" class="form-control" value="<?php if($ocmRequest!=''){ echo $ocmRequest['TestCode'];} ?>">
       </div>
            <div class="col-md-6">
                <label class="form-label">Site Details</label>
         <input type="text" name="sitedet" class="form-control" value="<?php if($ocmRequest!=''){ echo $ocmRequest['TestDescription'];} ?>">
       </div>
     </div>
  <div class="row pt-3">
       <div class="col-md-12 text-center pt-3">
         <h4>Patient AntiBiotics/Intended AntiBiotics</h4>
       </div>
 
     </div>
<!--      <div class="row pt-3">
       <div class="col-md-6">
          <label class="form-label">Anti Biotics</label>
         <input type="text" name="anti" class="form-control" value="Doxycycline Cipofloaxain">
       </div>
           <div class="col-md-6">
          <label class="form-label">Int.Anti Biotics</label>
         <input type="text" name="intanti" class="form-control"  value="Doxycycline Cipofloaxain">
       </div>
     </div> -->
 
     <div class="row pt-3">
       <div class="col-md-12">
          <label class="form-label">Clinical Details</label>
  
         <input type="text" name="clinical" class="form-control"  value="<?php if($data!=''){ echo $data['ClDetails'];} ?>" >
       </div>
         <div class="col-md-12">
          <label class="form-label"> Notes</label>
         <textarea class="form-control" name="text" rows="3"  ></textarea>
       </div>
     </div>
 
   <div class="col-md-12 pt-3 mt-2">
    <a href="#" class="btn btn-primary">Order External Tests</a>
      <a href="#" class="btn btn-success">Order Tests</a>
        <a href="#" class="btn btn-warning">Save & Hold</a>
          <a href="#" class="btn btn-secondary">Save</a>
  </div>
 
  </div>
     
     
     
     
 
    </div>
   
  </div>
 
 
  </div>
   </form>  
  </div>
 
 
  <div class="tab-pane fade" id="cs" role="tabpanel" aria-labelledby="nav-profile-tab">
 
   <div class="col-md-12">
                      <div class="row pt-3">
                          <div class="col-3">
                              <div class=" align-items-center">
                                  <label class="form-label">1</label>
                                  <select name="select_c11" id="select_c11"    class="form-select form-control  changeselect addselect2" >
                                      <option disabled selected hidden>Choose  an Option</option>
                                  @foreach($optione1s as $optione1)
                                  <option >{{$optione1['Text']}}</option>
                                  @endforeach


                                  </select>
                              </div>
                              <div id="demo2" class="mt-2">
                              <select name="select_c12" id="selectc12" class="form-select form-control mt-2 select_c12" >
                                  <option ></option>

                                
                              </select> 
                              </div>
                             
                            <div class="mt-2">
                                  <select name="select_c13" class="option3select" class="form-select form-control ">
                                    <option disabled hidden selected>Choose an Option</option>
                                @foreach($selectoptione3 as $option3select)
                                  <option >{{$option3select['Text']}}</option>
                              @endforeach

                              </select>
                            </div>
 
                              <div class="mt-3  " style="display:flex;">
                              
                              <div class="mt-5">
                                  <button class="btn btn-warning">&#8599;</button><br>
                                  <button class="btn btn-warning mt-2">&#8600;</button><br>
 
                                  <button class="btn btn-danger mt-2">R</button><br>
                                  <button class="btn btn-secondary mt-2">S</button>
                              </div>
                              <div class="scroll">
                              <table id="table " class="table table-striped">
                                      <thead >
                                          <tr>  
                                              <th>Antibiotic</th>
                                              <th>S/R</th>
                                              <th>Rprt</th>
                                              <th>Res</th>
                                              <th>Date Time</th>
                                              <th>Operator</th>
                                              <th>Code</th>
                                              
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>.</td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                       
                                      </tbody>
                                  </table>
                              </div>
</div>
                         
 
                              <select name="select_c14" id="select_c14" class="form-select form-control mt-2">
                                  <option value="1"></option>
                              </select>
 
                          </div>
                          <div class="col-3">
                              <div class=" align-items-center">
                                  <label class="form-label">2</label>
                                  <select name="select_c21" id="select_c21"  class="form-select form-control select_c21">
                                  <option  selected hidden disabled>Choose an Option</option>
                                 @foreach($optione1s as $optione1)
                                  <option >{{$optione1['Text']}}</option>
                                  @endforeach


                                  </select>
                              </div>
                            <div id="demo3" class="mt-2">
                                  <select name="select_c22" id="select_c22" class="form-select form-control mt-2" >
                                     <option ></option>

                              </select>
                            </div>
                                <div class="mt-2">
                                  <select name="select_c23" class="option3select" class="form-select form-control ">
                                    <option disabled hidden selected>Choose an Option</option>
                                @foreach($selectoptione3 as $option3select)
                                  <option >{{$option3select['Text']}}</option>
                              @endforeach

                              </select>
                            </div>
                       
 
                           
                            <div class="mt-3  " style="display:flex;">
                              
                              <div class="mt-5">
                                  <button class="btn btn-warning">&#8599;</button><br>
                                  <button class="btn btn-warning mt-2">&#8600;</button><br>
 
                                  <button class="btn btn-danger mt-2">R</button><br>
                                  <button class="btn btn-secondary mt-2">S</button>
                              </div>
                              <div class="scroll">
                              <table id="table " class="table table-striped">
                                      <thead >
                                          <tr>  
                                              <th>Antibiotic</th>
                                              <th>S/R</th>
                                              <th>Rprt</th>
                                              <th>Res</th>
                                              <th>Date Time</th>
                                              <th>Operator</th>
                                              <th>Code</th>
                                              
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>.</td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                       
                                      </tbody>
                                  </table>
                              </div>
</div>
             
                              <select name="select_c24" id="select_c24" class="form-select form-control mt-2">
                                  <option value="1"></option>
                              </select>
 
                          </div>
                          <div class="col-3">
                              <div class=" align-items-center">
                                  <label class="form-label">3</label>
                                  <select name="select_c31" id="select_c31"  class="form-select form-control select_c31">
                                      <option selected hidden disabled>Choose an Option</option>
                                    @foreach($optione1s as $optione1)
                                  <option >{{$optione1['Text']}}</option>
                                  @endforeach

                                  </select>
                              </div>
                             <div id="demo4" class="mt-2">
                                  <select name="select_c32" id="select_c32" class="form-select form-control mt-2" > 
                                    <option ></option>

                              </select>
                             </div>
                            <div class="mt-2">
                                  <select name="select_c33" class="option3select" class="form-select form-control ">
                                    <option disabled hidden selected>Choose an Option</option>
                                @foreach($selectoptione3 as $option3select)
                                  <option >{{$option3select['Text']}}</option>
                              @endforeach

                              </select>
                            </div>
                           
                            <div class="mt-3  " style="display:flex;">
                              
                              <div class="mt-5">
                                  <button class="btn btn-warning">&#8599;</button><br>
                                  <button class="btn btn-warning mt-2">&#8600;</button><br>
 
                                  <button class="btn btn-danger mt-2">R</button><br>
                                  <button class="btn btn-secondary mt-2">S</button>
                              </div>
                              <div class="scroll">
                              <table id="table " class="table table-striped">
                                      <thead >
                                          <tr>  
                                              <th>Antibiotic</th>
                                              <th>S/R</th>
                                              <th>Rprt</th>
                                              <th>Res</th>
                                              <th>Date Time</th>
                                              <th>Operator</th>
                                              <th>Code</th>
                                              
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>.</td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                       
                                      </tbody>
                                  </table>
                              </div>
</div>
             
                              <select name="select_c34" id="select_c34" class="form-select form-control mt-2">
                                  <option value="1"></option>
                              </select>
 
                          </div>
                          <div class="col-3">
                              <div class=" align-items-center">
                                  <label class="form-label">4</label>
                                  <select name="select_c41" id="select_c41"  class="form-select form-control select_c41">
                                      <option selected disabled hidden>Choose a Option</option>
                                    @foreach($optione1s as $optione1)
                                  <option >{{$optione1['Text']}}</option>
                                  @endforeach
                                  </select>
                              </div>
                            <div id="demo5" class="mt-2">
                                  <select name="select_c42" id="select_c42" class="form-select form-control mt-2" >
                                  <option ></option>

                              </select>
                            </div>
                               <div class="mt-2">
                                  <select name="select_c43" class="option3select" class="form-select form-control ">
                                    <option disabled hidden selected>Choose an Option</option>
                                @foreach($selectoptione3 as $option3select)
                                  <option >{{$option3select['Text']}}</option>
                              @endforeach

                              </select>
                            </div>
                          
 
                            <div class="mt-3  " style="display:flex;">
                              
                              <div class="mt-5">
                                  <button class="btn btn-warning">&#8599;</button><br>
                                  <button class="btn btn-warning mt-2">&#8600;</button><br>
 
                                  <button class="btn btn-danger mt-2">R</button><br>
                                  <button class="btn btn-secondary mt-2">S</button>
                              </div>
                              <div class="scroll">
                              <table id="table " class="table table-striped">
                                      <thead >
                                          <tr>  
                                              <th>Antibiotic</th>
                                              <th>S/R</th>
                                              <th>Rprt</th>
                                              <th>Res</th>
                                              <th>Date Time</th>
                                              <th>Operator</th>
                                              <th>Code</th>
                                              
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>.</td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                       
                                      </tbody>
                                  </table>
                              </div>
</div>
             
                              <select name="select_c44" id="select_c44" class="form-select form-control mt-2">
                                  <option value="1"></option>
                              </select>
 
                          </div>
                      </div>
                      <div class="row pt-3">
                          <div class="col-6">
                              <textarea name="c_textarea1" id="c_textarea1" rows="5" class="mt-2 form-control w-100" placeholder="Medical Scientist Comments"></textarea>
                          </div>
                          <div class="col-6">
                              <textarea name="c_textarea2" id="c_textarea2" rows="5" class="mt-2 form-control w-100" placeholder="Consultant Comments"></textarea>
                          </div>
                      </div>
 
                      <button class="btn btn-primary w-25 mt-3">Lock Results</button>
                  </div>    
 
   </div>
   <div class="tab-pane fade" id="Identification" role="tabpanel" aria-labelledby="nav-contact-tab">
 
    <div class="col-md-12">
                      <div class="row pt-3">
                          <div class="col-md-3">
                              <label for="select_organism1" class="form-label">Organism 1</label>
                              <select name="select_organism1" id="select_organism1" class="form-select form-control">
                                  <option value="1"></option>
                              </select>
                              <textarea name="text_organism1" id="text_organism1" class="w-100 form-control mt-3" rows="15"></textarea>
                          </div>
                          <div class="col-md-3">
                              <label for="select_organism2" class="form-label">Organism 2</label>
                              <select name="select_organism2" id="select_organism2" class="form-select form-control">
                                  <option value="1"></option>
                              </select>
                              <textarea name="text_organism2" id="text_organism2" class="w-100 form-control mt-3" rows="15"></textarea>
                          </div>
                          <div class="col-md-3">
                              <label for="select_organism3" class="form-label">Organism 3</label>
                              <select name="select_organism3" id="select_organism3" class="form-select form-control">
                                  <option value="1"></option>
                              </select>
                              <textarea name="text_organism3" id="text_organism3" class="w-100 form-control mt-3" rows="15"></textarea>
                          </div>
                          <div class="col-md-3">
                              <label for="select_organism4" class="form-label">Organism 4</label>
                              <select name="select_organism4" id="select_organism4" class="form-select form-control">
                                  <option value="1"></option>
                              </select>
                              <textarea name="text_organism4" id="text_organism4" class="w-100 form-control mt-3" rows="15"></textarea>
                          </div>
                      </div>
                      <button class="btn btn-primary mt-3" id="gramstainsbtn">Gram Stains Wet Prep</button>
                   </div>  
 
    </div>
  </div>
                       <!--End Tabs-->
                    </div>
                    <div class="col-md-2">
                        <!--Start  buttons-->
                        <div class="row pt-4">
      <div class="col-md-12 text-center">
        <a href="#" class="btn btn-primary w-100">Interim</a>
      </div>
    </div>
        <div class="row pt-4">
      <div class="col-md-12 text-center">
        <a href="#" class="btn btn-secondary w-100">Print</a>
      </div>
    </div>
        <div class="row pt-4">
      <div class="col-md-12 text-center">
        <a href="#" class="btn btn-primary w-100">Phone Results</a>
      </div>
    </div>
        <div class="row pt-4">
      <div class="col-md-12 text-center">
        <a href="#" class="btn btn-warning w-100">Print ?</a>
      </div>
    </div>
        <div class="row pt-4">
      <div class="col-md-12 text-center">
        <a href="#" class="btn btn-primary w-100">Set Valid Date</a>
      </div>
    </div>
        <div class="row pt-4">
      <div class="col-md-12 text-center">
        <a href="#" class="btn btn-secondary w-100">Save & Hold</a>
      </div>
    </div>
        <div class="row pt-4">
      <div class="col-md-12 text-center">
        <a href="#" class="btn btn-success w-100">Save Details</a>
      </div>
    </div>
        <div class="row pt-4">
      <div class="col-md-12 text-center">
        <a href="#" class="btn btn-warning w-100">History</a>
      </div>
    </div>
        <div class="row pt-4">
      <div class="col-md-12 text-center">
        <a href="#" class="btn btn-danger w-100">Cancel</a>
      </div>
    </div>
                        <!--end-->
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
<script >

// function loadDoc() {
//     // alert();
//   const xhttp = new XMLHttpRequest();
//   xhttp.onload = function() {
//     document.getElementById("demo2").innerHTML = this.responseText;
//   }
//   xhttp.open("GET", "/ocm/Option1");
//   xhttp.send();
// }

</script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/select2.js') }}"></script>
<script >
    $(document).ready(function(){

    
        
   var wage = document.getElementById("sampleid");
 


         
wage.addEventListener("keyup", function (e) {
 
   //checks whether the pressed key is "Enter"

    if (e.code === "Enter") { 


    id=$("#sampleid").val();
   window.location="/ocm/Microbiology/"+id;
     
   

  
   
    }
   
   
    
    
});
// var a=request()->segment(3);
url = window.location.href.split("Microbiology");
a= url[1];

// alert(a);

var mydata=@json($data);
  console.log(mydata);
if(a!=""){  
   if(mydata == null){
          Lobibox.notify('warning', {
                                pauseDelayOnHover: true,
                                continueDelayOnInactiveTab: false,
                                position: 'top right',
                                msg: "Sampleid Does not Exist",
                                icon: 'bx bx-info-circle'
                            });
     }else{
                  Lobibox.notify('success', {
                                pauseDelayOnHover: true,
                                continueDelayOnInactiveTab: false,
                                position: 'top right',
                                msg: "Data Successfully Fetched",
                                icon: 'bx bx-check-circle'
                            });
     } 
    }

$(".changeselect").change(function(){
    selectoption=$(this).val();

  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("selectc12").innerHTML = this.responseText;
  }
  xhttp.open("GET", "/ocm/Option1/"+selectoption);
  xhttp.send();


})

$(".select_c21").change(function(){
    selectoption=$(this).val();

  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("select_c22").innerHTML = this.responseText;
  }
  xhttp.open("GET", "/ocm/Option2/"+selectoption);
  xhttp.send();
})

$(".select_c31").change(function(){
    selectoption=$(this).val();

  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("select_c32").innerHTML = this.responseText;
  }
  xhttp.open("GET", "/ocm/Option3/"+selectoption);
  xhttp.send();
})
$(".select_c41").change(function(){
    selectoption=$(this).val();

  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("select_c42").innerHTML = this.responseText;
  }
  xhttp.open("GET", "/ocm/Option4/"+selectoption);
  xhttp.send();
})
   $('.option3select').select2();
   $('.addselect2').select2();
   $('.select_c21').select2();
   $('.select_c31').select2();
   $('.select_c41').select2();

   $('#selectc12').select2();
     $('#select_c22').select2();
     $('#select_c32').select2();
    $('#select_c42').select2();




       })
</script>
@endpush