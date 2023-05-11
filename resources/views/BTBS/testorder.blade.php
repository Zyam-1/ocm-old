
@include('layouts.header')
<link href="{{asset('plugins/frola_editor.min.css')}}" rel='stylesheet' type='text/css' />

<link rel="stylesheet" href="{{asset('plugins/bootstrap-icons.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap-icon-picker/dist/css/bootstrapicons-iconpicker.css')}}">
<!--Link for iconpicker-->
<style>
.lists  ul li{
    font-size: 12px;
    font-weight: 400;
  }
  .panel {
   
    overflow: auto;
    height: 540px;
  }
  .panel1{
    
     overflow-x: scroll;
     overflow-y: hidden;
     /* height: 70px;*/
  }
  .panel2{
    overflow-x: scroll;
  }
  .width{
    width:100px;
  }
  .width1{
    width:200px;
  }
</style>

  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header)-->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Test Order
               <a class="btn btn-info btn-sm" href=""><i class="fas fa-arrow-left"></i> Go Back </a>
             </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Create Produt</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


     <!-- Main content -->
    <div class="content">
      <div class="container-fluid lists">


                  <form id="form" >
                      


                      {{ csrf_field() }}
                             @csrf                     
                         <div class="card card-primary card-outline">
                            <div class="card-body ">  

                            <div class="row">
                              <div class="col-md-10">
                                <h3>Test Order</h3>
                              </div>
                              <div class="col-md-2">
                                <a href="/ticketsnew/ProductsTable" class="btn btn-primary ">Show Products</a>
                              </div>
                            </div>



                          <!--Start Content-->
                          <div class="row">
                            <div class="col-md-4">
                              <label class="form-label">Sample Number:</label>
                              <input type="number" name="snumber"  class="form-control">
                            </div>
                             <div class="col-md-4">
                              <label class="form-label">Test Code:</label>
                              <input type="number" name="tcode"  class="form-control">
                            </div>
                                                        <div class="col-md-4">
                              <label class="form-label"></label>
                              <input type="text" name="snumber"  class="form-control mt-2" value="Glucose Bottle In Use">
                            </div>
                          </div>
                          <div class="row mt-4 mx-3">
                          <div class="col-md-12">
                          <div class="row">
                                                         <div class="col-md-2">
                              <input type="checkbox" name="request" class="form-check-input "><label class="form-check-label">Add on Request</label>
                            </div>
                            <div class="col-md-2">
                              <input type="checkbox" name="urgent" class="form-check-input "><label class="form-check-label">Urgent</label>
                            </div>
                            <div class="col-md-2">
                              <input type="radio" name="random" class="form-check-input "><label class="form-check-label">Random</label>
                            </div>
                            <div class="col-md-2">
                              <input type="radio" name="random" class="form-check-input "><label class="form-check-label">Fasting</label>
                            </div>
                            <div  class="col-md-2">
                               <label class="form-label">Test Names</label>
                            </div>
                            <div class="col-md-1">
                               <input type="radio" name="tnumber" class="form-check-input"><label class="form-check-label">Long</label>
                            </div>
                            <div class="col-md-1">
                               <input type="radio" name="tnumber" class="form-check-input"><label class="form-check-label">Short</label>
                            </div>

                          </div>
                          </div>

                          </div>
                          <div class="row mt-4">
                            <div class="col-md-6">
                              <div class="row">
                                <div class="col-md-9 border bg-primary">
                                  <h5 class="text-center mt-1 ">Serum</h5>
                                </div>
                                <div class="col-md-3 border bg-primary">
                                  <h5 class="text-center mt-1">Blood</h5>
                                </div>
                              </div>
                              <div class="row mt-2">
                                <div class="col-md-2 border bg-primary">
                                  <h5 class="text-center mt-1">Panels</h5>
                                </div>
                                <div class="col-md-10 border bg-primary">
                                  <h5 class="text-center mt-1 ">Tests</h5>
                                </div>
                              </div>
                            <div class="row">
                           <div class="col-md-2">
                           <div class="row">
                            <div class="col-md-12 border">
                                <ul  class="panel list-group" >
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled width1"  >New Iron Protein</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" >U/E</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" >Liver</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" >U&E LFT</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" >Fasting Lipid</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" >Bone</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" >Drug</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" >Iron Studies</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" >TFT</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" >B12/Fol</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" >Homeone</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" >Codiac sore</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" >Igs</li>



                                </ul>
                              </div>
                           </div>
                           </div>
                           <div class="col-md-8" >
                           <div class="row border" style=" height: 540px;">
                              <div class="col-md-4">
                             
                                <ul  class="list-group">
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled">FLUA</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled">NA.C</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled">K.C</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled">CL.C</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled">UREA</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled">Creabirine</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled">Creac</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled">CKL</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled">ASTL</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled">LD</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled">GLUC</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled">TP</li>
                                 <li class="list-group-item bg-light p-2 border-0 list-unstyled">ALP</li>
                       
                           
                                </ul>
                             
                             </div>
                            <div class="col-md-4">
                             
                                <ul  class="list-group">
                                   <li class="list-group-item bg-light p-2 border-0 list-unstyled">HDL.R</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">Fe.PI</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">AMYL</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">UIBC</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">Pict</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">SAL</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">ETOH</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">LI</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">TSH</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">FT4</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">FT3</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">B12||</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">Folate</li>


                                </ul>
                             
                             </div>
                                    <div class="col-md-4">
                              
                                <ul class="list-group">
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">AFP3</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">CA15-3</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">CA19-9</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">Testos</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">PTH</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">Vanco</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">S.Osma</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">LH</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">Destrad</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">PROG</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">UA</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">VRD</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">CA125</li>

                                </ul>
                            
                             </div>
                           </div>

                           </div>
                           <div class="col-md-2">
                             <div class="row">
                              <div class="col-md-12 border">
                                <ul class="list-group panel2" >
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width">HbA1c IFCC</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width" ></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>

                                </ul>
                              </div>
                             </div>
                           </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                             <!----->
                             <div class="row">
                               <div class="col-md-2 border bg-primary"><h5 class="text-center mt-1">Urine</h5></div>
                               <div class="col-md-3 border bg-primary"><h5 class="text-center mt-1">CSF</h5></div>
                               <div class="col-md-3 border bg-primary"><h5 class="text-center mt-1">Immuno</h5></div>
                               <div class="col-md-4 border bg-primary"><h5 class="text-center mt-1">Haematology</h5></div>
                             
                             </div> 
                             <div class="row mt-2">
                               <div class="col-md-2 border bg-primary"><h5 class="text-center mt-1">Panels</h5></div>
                               <div class="col-md-3 border bg-primary"><h5 class="text-center mt-1">Tests</h5></div>
                               <div class="col-md-3 border bg-primary"><h5 class="text-center mt-1">Tests</h5></div>
                               <div class="col-md-4 border bg-primary"><h5 class="text-center mt-1">Sapphire/IPU</h5></div>
                              
                             </div>
                             <div class="row">
                               <div class="col-md-2">
                                 <div class="row">
                                   <div class="col-md-12">
                                   <ul class="panel1 list-group" >
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" >ACR</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" >Calcium Creahi</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" >Protein Creabini</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" ></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" ></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" ></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" ></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" ></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" ></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" ></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" ></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" ></li>  
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" ></li>  
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" ></li>  
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" ></li>  
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width1" ></li>

                                </ul>
                                   </div>
                                 </div>
                                 <div class="row">
                                   <div class="col-md-12 border bg-primary">
                                     <h5 class="text-center mt-1">Tests</h5>
                                   </div>
                                 </div>
                                  <div class="row">
                                   <div class="col-md-12 border">
                                   <ul class="list-group" style="overflow-x: scroll;">
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width">NA.CU</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width">K.CU</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width">CACU</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width">CL.CU</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width">UPRO</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width">uAIB</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width">Uinary Creabinine</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width">U.Osmo</li>

                     
                  
                                 
                                
                                 

                                </ul>
                                   </div>
                                 </div>
                               </div>
                               <div class="col-md-3">
                                 <div class="row">
                                   <div class="col-md-12 border">
                                  <ul class="list-group" style="overflow-x:scroll;">
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width">GLUCC</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width">CPRO</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width">CSF Prot</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>  
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                
                                 
                                
                              
                                </ul>
                                   </div>
                                 </div>
                                 <div class="row">
                                   <div class="col-md-12 border bg-primary">
                                     <h5 class="text-center mt-1">Sweat</h5>
                                   </div>
                                 </div>
                                 <div class="row">
                                   <div class="col-md-12 border">
                                  <ul class="list-group">
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">SW-CL</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                
                                 
                              
                                </ul>
                                   </div>
                                 </div>
                               </div>
                               <div class="col-md-3">
                                 <div class="row">
                                   <div class="col-md-12 border">
                                     <ul  class="list-group">
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>  
                              
                                </ul>
                                   </div>
                                 </div>
                                 <div class="row">
                                   <div class="col-md-12 border bg-primary">
                                     <h5 class="text-center mt-1" style="font-size:12px;">Coagolation</h5>
                                   </div>
                                 </div>
                                <div class="row">
                                   <div class="col-md-12 border bg-primary">
                                     <h5 class="text-center mt-1" >Panels</h5>
                                   </div>
                                 </div>
                                <div class="row">
                                   <div class="col-md-12 border">
                                   <ul  class="list-group" style="overflow-x:scroll">
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width">Coag Screen</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width">Coag+DD</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width">Covid</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled width"></li>  
                              
                                </ul>
                                   </div>
                                 </div>
                               </div>
                               <div class="col-md-4">
                                 <div class="row">
                                   <div class="col-md-12 border">
                                    <ul class="list-group">
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">ESR</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">Monospct</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">Malaria</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">Sickledex</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled"></li>  
                              
                                </ul>
                                   </div>
                                 </div>
                                  <div class="row">
                                   <div class="col-md-12 border bg-primary">
                                     <h5 class="text-center mt-1">Coagolation</h5>
                                   </div>
                                 </div>
                                    <div class="row">
                                   <div class="col-md-12 border bg-primary">
                                     <h5 class="text-center mt-1">Tests</h5>
                                   </div>
                                 </div>
                                 <div class="row">
                                   <div class="col-md-12 border">
                                   <ul class="list-group">
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">APTT</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">D Dimer</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">Fbrinogen</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">INR</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">PT</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">Rejected</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">CBC</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">NRBC</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">RET</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">SP</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">FBC</li>
                                  <li class="list-group-item bg-light p-2 border-0 list-unstyled">PLT-F</li> 
                              
                                </ul>
                                   </div>
                                 </div>

                               </div>

                             </div>

                        

                              
                            </div>
                          </div>
                            <div class="row mt-2">
                            <div class="col-md-2 mt-2">
                              <a href="" class="btn btn-primary">Save Request</a>
                            </div>
                             <div class="col-md-1 mt-2">
                              <a href="" class="btn btn-primary">Clear</a>
                            </div>
                             <div class="col-md-1 mt-2">
                              <a href="" class="btn btn-primary">Exit</a>
                            </div>
                          </div>
                            </div>
                          </div>




                  </form>        

        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>



@extends('layouts.footer')

@push('script')

   <script src="{{asset('plugins/jquery.min.js')}}"></script>
   



@endpush