@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Define External Panels 
                <a class="btn btn-success btn-sm" href=""><i class="fas fa-arrow-left"></i> Go Back </a>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Payments</li>
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
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12">

  <div id="accordion" class="border" style="overflow-y:scroll;height: 400px;">

  <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapseTwo" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + 0
      </a>
    </div>
    <div id="collapseTwo" class="collapse" data-parent="#accordion">
      <div class="card-body">
       
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapseThree" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + 1
      </a>
    </div>
    <div id="collapseThree" class="collapse" data-parent="#accordion">
      <div class="card-body">
       
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsefour" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + 2
      </a>
    </div>
    <div id="collapsefour" class="collapse" data-parent="#accordion">
      <div class="card-body">
  
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsefive" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + 3
      </a>
    </div>
    <div id="collapsefive" class="collapse" data-parent="#accordion">
      <div class="card-body">
      
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsesix" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + 4
      </a>
    </div>
    <div id="collapsesix" class="collapse" data-parent="#accordion">
      <div class="card-body">
       
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapseseven" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + 5
      </a>
    </div>
    <div id="collapseseven" class="collapse" data-parent="#accordion">
      <div class="card-body">
    
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapseeight" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + 6
      </a>
    </div>
    <div id="collapseeight" class="collapse" data-parent="#accordion">
      <div class="card-body">
   
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsenine" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + 7
      </a>
    </div>
    <div id="collapsenine" class="collapse" data-parent="#accordion">
      <div class="card-body">
    
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapseten" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + 8
      </a>
    </div>
    <div id="collapseten" class="collapse" data-parent="#accordion">
      <div class="card-body">
    
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapseeleven" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + 9
      </a>
    </div>
    <div id="collapseeleven" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsetwel" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + A
      </a>
    </div>
    <div id="collapsetwel" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsethirt" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + B
      </a>
    </div>
    <div id="collapsethirt" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapseFourt" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + C
      </a>
    </div>
    <div id="collapseFourt" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsefift" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + D
      </a>
    </div>
    <div id="collapsefift" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsesixt" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + E
      </a>
    </div>
    <div id="collapsesixt" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsevent" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + F
      </a>
    </div>
    <div id="collapsevent" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapseeighte" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + G
      </a>
    </div>
    <div id="collapseeighte" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsenint" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + H
      </a>
    </div>
    <div id="collapsenint" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsetwen" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + I
      </a>
    </div>
    <div id="collapsetwen" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsetwenone" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + J
      </a>
    </div>
    <div id="collapsetwenone" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsetwentwo" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + K
      </a>
    </div>
    <div id="collapsetwentwo" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsetwenthree" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + L
      </a>
    </div>
    <div id="collapsetwenthree" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsetwenfour" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + M
      </a>
    </div>
    <div id="collapsetwenfour" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsetwenfive" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + N
      </a>
    </div>
    <div id="collapsetwenfive" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsetwensix" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + O
      </a>
    </div>
    <div id="collapsetwensix" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsetwenseve" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + P
      </a>
    </div>
    <div id="collapsetwenseve" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsetweneight" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + Q
      </a>
    </div>
    <div id="collapsetweneight" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsetwennine" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + R
      </a>
    </div>
    <div id="collapsetwennine" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsethirty" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + S
      </a>
    </div>
    <div id="collapsethirty" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsethirtyone" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + T
      </a>
    </div>
    <div id="collapsethirtyone" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#collapsethirtytwo" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + U
      </a>
    </div>
    <div id="collapsethirtytwo" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#thirtythree" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + V
      </a>
    </div>
    <div id="thirtythree" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#thirtyfour" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + W
      </a>
    </div>
    <div id="thirtyfour" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#thirtyfive" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + X
      </a>
    </div>
    <div id="thirtyfive" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#thirtysix" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + Y
      </a>
    </div>
    <div id="thirtysix" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>
        <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#thirtyseven" style="cursor: pointer;">
      <a class="collapsed card-link text-dark" >
        + Z
      </a>
    </div>
    <div id="thirtyseven" class="collapse" data-parent="#accordion">
      <div class="card-body">
 
      </div>
    </div>
  </div>


</div>

          </div>

        </div>
      </div>
      <div class="col-md-6">
                
            <div class="row">
              <div class="col-md-12">
                <div id="accordion" class="border" style="height: 400px; overflow-y: scroll;cursor: pointer;">

  <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#thiryeight">
      <a class="collapsed card-link text-dark" >
        + Ante natal
      </a>
    </div>
    <div id="thiryeight" class="collapse" data-parent="#accordion">
      <div class="card-body">
     
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#thirynine">
      <a class="collapsed card-link text-dark" >
        + Arthralgia
      </a>
    </div>
    <div id="thirynine" class="collapse" data-parent="#accordion">
      <div class="card-body">
    
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#forty">
      <a class="collapsed card-link text-dark" >
        + Chlamydia Trachomatis
</a>
    </div>
    <div id="forty" class="collapse" data-parent="#accordion">
      <div class="card-body">
      
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#fortyone">
      <a class="collapsed card-link text-dark" >
        + CNS screen for herpes
      </a>
    </div>
    <div id="fortyone" class="collapse" data-parent="#accordion">
      <div class="card-body">
     
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#fortytwo">
      <a class="collapsed card-link text-dark" >
        + Coeliac Screen
      </a>
    </div>
    <div id="fortytwo" class="collapse" data-parent="#accordion">
      <div class="card-body">
    
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#fortythree">
      <a class="collapsed card-link text-dark" >
        + CSF viral Screen
      </a>
    </div>
    <div id="fortythree" class="collapse" data-parent="#accordion">
      <div class="card-body">
   
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#fortyfour">
      <a class="collapsed card-link text-dark" >
        + Dialysis 3 Monthly
      </a>
    </div>
    <div id="fortyfour" class="collapse" data-parent="#accordion">
      <div class="card-body">
     
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#fortyfive">
      <a class="collapsed card-link text-dark" >
        + Dialysis Admission
      </a>
    </div>
    <div id="fortyfive" class="collapse" data-parent="#accordion">
      <div class="card-body">
     
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#fortysix">
      <a class="collapsed card-link text-dark" >
        + Gestroenleritis molecule
      </a>
    </div>
    <div id="fortysix" class="collapse" data-parent="#accordion">
      <div class="card-body">
      
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#fortyeight">
      <a class="collapsed card-link text-dark" >
        + Guillain Barre Syndrome
      </a>
    </div>
    <div id="fortyeight" class="collapse" data-parent="#accordion">
      <div class="card-body">
  
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#fortynine">
      <a class="collapsed card-link text-dark" >
        + Hepatitis A.B.C
      </a>
    </div>
    <div id="fortynine" class="collapse" data-parent="#accordion">
      <div class="card-body">
     
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#fifty">
      <a class="collapsed card-link text-dark" >
        + Hepatitis B Infection
      </a>
    </div>
    <div id="fifty" class="collapse" data-parent="#accordion">
      <div class="card-body">
   
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#fiftyone">
      <a class="collapsed card-link text-dark" >
        + Hepatitis B.C
      </a>
    </div>
    <div id="fiftyone" class="collapse" data-parent="#accordion">
      <div class="card-body">
   
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#fiftytwo">
      <a class="collapsed card-link text-dark" >
        + HIV. Hepatitis B.C
      </a>
    </div>
    <div id="fiftytwo" class="collapse" data-parent="#accordion">
      <div class="card-body">

      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#fiftythree">
      <a class="collapsed card-link text-dark" >
        + Inlectious mononucleos
      </a>
    </div>
    <div id="fiftythree" class="collapse" data-parent="#accordion">
      <div class="card-body">
  
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#fiftyfour">
      <a class="collapsed card-link text-dark" >
        + Jaundice/ lull hepatitis
      </a>
    </div>
    <div id="fiftyfour" class="collapse" data-parent="#accordion">
      <div class="card-body">
     
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#fiftyfive">
      <a class="collapsed card-link text-dark" >
        + Lymphadenopathy
      </a>
    </div>
    <div id="fiftyfive" class="collapse" data-parent="#accordion">
      <div class="card-body">
    
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#fiftysix">
      <a class="collapsed card-link text-dark" >
        + MMR Screen
      </a>
    </div>
    <div id="fiftysix" class="collapse" data-parent="#accordion">
      <div class="card-body">
       
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#fiftyseven">
      <a class="collapsed card-link text-dark" >
        + Moleculer Respiratory
      </a>
    </div>
    <div id="fiftyseven" class="collapse" data-parent="#accordion">
      <div class="card-body">
   
      </div>
    </div>
  </div>  <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#fiftyeight">
      <a class="collapsed card-link text-dark" >
        + Mycoplasma genitalium
      </a>
    </div>
    <div id="fiftyeight" class="collapse" data-parent="#accordion">
      <div class="card-body">
   
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#fiftynine">
      <a class="collapsed card-link text-dark" >
        + Pyrexio of unknown
      </a>
    </div>
    <div id="fiftynine" class="collapse" data-parent="#accordion">
      <div class="card-body">
      
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#sixty">
      <a class="collapsed card-link text-dark" >
        + Rash Macular/papular
      </a>
    </div>
    <div id="sixty" class="collapse" data-parent="#accordion">
      <div class="card-body">
     
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#sixtyone">
      <a class="collapsed card-link text-dark" >
        + Rash Vasicular
      </a>
    </div>
    <div id="sixtyone" class="collapse" data-parent="#accordion">
      <div class="card-body">
     
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#sixtytwo">
      <a class="collapsed card-link text-dark" >
        + Store Throat
      </a>
    </div>
    <div id="sixtytwo" class="collapse" data-parent="#accordion">
      <div class="card-body">
    
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#sixtythree">
      <a class="collapsed card-link text-dark" >
        + STI Blood Screen
      </a>
    </div>
    <div id="sixtythree" class="collapse" data-parent="#accordion">
      <div class="card-body">
  
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#sixtyfour">
      <a class="collapsed card-link text-dark" >
           + TFT B12  Folate
    
      </a>
    </div>
    <div id="sixtyfour" class="collapse" data-parent="#accordion">
      <div class="card-body">
     
      </div>
    </div>
  </div>
    <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#sixtyfive">
      <a class="collapsed card-link text-dark" >
           + Torch Screen Maternal
       
      </a>
    </div>
    <div id="sixtyfive" class="collapse" data-parent="#accordion">
      <div class="card-body">
   
      </div>
    </div>
  </div>
      <div class="card mb-0">
    <div class="card-header" data-toggle="collapse" href="#sixtyfive">
      <a class="collapsed card-link text-dark" >
        + Torch Screen neonale
      </a>
    </div>
    <div id="sixtyfive" class="collapse" data-parent="#accordion">
      <div class="card-body">
   
      </div>
    </div>
  </div>
   




</div>
             
            </div>
          </div>
      </div>
    </div>
<div class="row mt-3">
  <div class="col-md-12">
    <button class="btn btn-primary">Add New Panel</button>
    <button class="btn btn-danger">Remove Panel</button>
    <button class="btn btn-secondary">Remove Item</button>
    <button class="btn btn-warning">Cancel</button>

  </div>
</div>



    </form>
                                          


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

<script type="text/javascript">

</script>
        
@endpush
