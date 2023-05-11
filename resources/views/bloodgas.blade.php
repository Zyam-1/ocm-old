





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
            <h1 class="m-0">Blood Gas 
               
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
                  <div class="row">
                      <div class="col-md-6">
                          <div class="row">
                              <div class="col-md-12 text-center">
                                  <h5>Low</h5>
                              </div>
                          </div>

                      </div>
                      <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-12 text-center">
                                  <h5>High</h5>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-1">
                         <div class="row">
                             <div class="col-md-12 text-center">
                                 <p>pH :</p>
                             </div>
                         </div>
                           <div class="row">
                             <div class="col-md-12 text-center mt-3">
                                 <p>pCO2 :</p>
                             </div>
                         </div>
                           <div class="row">
                             <div class="col-md-12 text-center mt-2">
                                 <p>pO2 :</p>
                             </div>
                         </div> 
                           <div class="row">
                             <div class="col-md-12 text-center mt-2">
                                 <p>HCO3 :</p>
                             </div>
                         </div> 
                           <div class="row">
                             <div class="col-md-12 text-center mt-2">
                                 <p>BE :</p>
                             </div>
                         </div>
                           <div class="row">
                             <div class="col-md-12 text-center mt-3">
                                 <p>O2S at :</p>
                             </div>
                         </div> 
                          <div class="row">
                             <div class="col-md-12 text-center mt-2">
                                 <p>Tot CO2 :</p>
                             </div>
                         </div> 
                      </div>
                      <div class="col-md-5">
                            <div class="row">
                             <div class="col-md-12">
                                 <input type="text" name="phlow" class="form-control">
                             </div>
                         </div> 
                            <div class="row">
                             <div class="col-md-12 mt-3">
                                 <input type="text" name="pco2low" class="form-control">
                             </div>
                         </div>
                           <div class="row">
                             <div class="col-md-12 mt-3">
                                 <input type="text" name="po2low" class="form-control">
                             </div>
                         </div> 
                           <div class="row">
                             <div class="col-md-12 mt-3">
                                 <input type="text" name="hco3low" class="form-control">
                             </div>
                         </div>
                           <div class="row">
                             <div class="col-md-12 mt-3">
                                 <input type="text" name="below" class="form-control">
                             </div>
                         </div> 
                           <div class="row">
                             <div class="col-md-12 mt-3">
                                 <input type="text" name="o2slow" class="form-control">
                             </div>
                         </div> 
                          <div class="row">
                             <div class="col-md-12 mt-3">
                                 <input type="text" name="totco2low" class="form-control">
                             </div>
                         </div> 
                      </div>
                      <div class="col-md-6">
                              <div class="row">
                             <div class="col-md-12 ">
                                 <input type="text" name="phhigh" class="form-control">
                             </div>
                         </div>
                            <div class="row">
                             <div class="col-md-12 mt-3">
                                 <input type="text" name="pco2high" class="form-control">
                             </div>
                         </div>  
                           <div class="row">
                             <div class="col-md-12 mt-3">
                                 <input type="text" name="po2high" class="form-control">
                             </div>
                         </div>
                           <div class="row">
                             <div class="col-md-12 mt-3">
                                 <input type="text" name="hco3high" class="form-control">
                             </div>
                         </div> 
                           <div class="row">
                             <div class="col-md-12 mt-3">
                                 <input type="text" name="behigh" class="form-control">
                             </div>
                         </div>
                           <div class="row">
                             <div class="col-md-12 mt-3">
                                 <input type="text" name="o2shigh" class="form-control">
                             </div>
                         </div> 
                          <div class="row">
                             <div class="col-md-12 mt-3">
                                 <input type="text" name="totco2high" class="form-control">
                             </div>
                         </div> 
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 mt-2 savebtn">
                          <button class="btn btn-primary" type="button">Save</button>
                            <button class="btn btn-warning">Cancel</button>
                      </div>
                    
                  </div>
                  <div class="row mt-4">
                      <div class="col-md-12 border-top"></div>
                  </div>
                  <div class="row mt-3">
                      <div class="col-md-3">
                          <div class="row">
                              <div class="col-md-12">
                                  <p>Entered By : {{Auth::user()->name}}</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="row">
                              <div class="col-md-12">
                                  <p>On : {{ Date('d-m-Y')}}</p>
                              </div>
                          </div>
                      </div>
                        <div class="col-md-3">
                          <div class="row">
                              <div class="col-md-12">
                                  <p>At : {{ Date('h:i:s')}}</p>
                              </div>
                          </div>
                      </div>
                        <div class="col-md-3">
                          <div class="row">
                              <div class="col-md-12 text-right">
                               <a class="btn btn-primary" href="/ocm/BloodGasTabel">View History</a>
                              </div>
                          </div>
                      </div>
                  </div>

                        
                    </div>

                    
            </div>
            
         
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

<script>
$(document).ready(function(){
$('.savebtn').click(function(){
let  myform=document.getElementById('form');
let data=new FormData(myform);
$.ajax({
  url:'{{route('BloodGas')}}',
  data:data,
  cache:false,
  processData:false,
  contentType:false,
  type:'Post'
}).done(function(data){

 // if ($.isEmptyObject(data.error)){

                                      Lobibox.notify('success', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: data.success,
                                            icon: 'bx bx-check-circle'
                                        });
                                     window.location='';
                                 

                                // } else {
                                //      Lobibox.notify('warning', {
                                //             pauseDelayOnHover: true,
                                //             continueDelayOnInactiveTab: false,
                                //             position: 'top right',
                                //             msg: data.error,
                                //             icon: 'bx bx-info-circle'
                                //         });
                                // }

})
event.preventDefault();
})
})
</script>




@endpush



