@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Normal Ranges
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
       <form>
        <h6>Cougulation Defination</h6>
       <div class="row">
       <div class="col-md-4 mt-3 border">
       <ul style="list-style: none;">
    <li>...</li>
    <li>...</li>
    <li>...</li>
    <li>...</li>
    <li>...</li>
    <li>...</li>
    <li>...</li>
  </ul>  
       </div> 
       <div class="col-md-8 mt-3 border">
       <h6>Age Ranges</h6>  
               <div class="row pt-3">
<div class="col-md-12">
                      <table class="table table-striped"  >
                    <thead>
                      <tr>
                        <th scope="col">Range#</th>
                        <th scope="col">Age From</th>
                        <th scope="col">Age To</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>.......</td>
                        <td>.......</td>
                        <td>.......</td>

                      </tr>
                      <tr>
                        <td>.......</td>
                        <td>.......</td>
                        <td>.......</td>
                      </tr>
                    </tbody>
                  </table>  
                  <button class="btn btn-success mb-2">Amend Age Ranges</button>  
</div>   

    
</div>
       </div> 
       </div> 
       <div class="row">
      <div class="col-md-12">
     <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-normal-tab" data-toggle="tab" href="#nav-normal" role="tab" aria-controls="nav-normal" aria-selected="true">Normal Range</a>
    <a class="nav-item nav-link" id="nav-flag-tab" data-toggle="tab" href="#nav-flag" role="tab" aria-controls="nav-flag" aria-selected="false">Flag Range</a>
    <a class="nav-item nav-link" id="nav-plausible-tab" data-toggle="tab" href="#nav-plausible" role="tab" aria-controls="nav-plausible" aria-selected="false">Plausible</a>
    <a class="nav-item nav-link" id="nav-delta-tab" data-toggle="tab" href="#nav-delta" role="tab" aria-controls="nav-delta" aria-selected="false">Delta Check</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-normal" role="tabpanel" aria-labelledby="nav-normal-tab">
    <div class="row">
    <div class="col-md-6">
    <label class="form-label mb-0 mt-2">Female</label>  
    <input type="number" name="high" class="form-control mt-2" placeholder="high">
        <input type="number" name="low" class="form-control mt-2" placeholder="low">

    </div>  
      <div class="col-md-6">
    <label class="form-label mb-0 mt-2">Male</label>  
    <input type="number" name="high" class="form-control  mt-2" placeholder="high">
        <input type="number" name="low" class="form-control mt-2" placeholder="low">

    </div>
    </div>
  </div>
  <div class="tab-pane fade" id="nav-flag" role="tabpanel" aria-labelledby="nav-flag-tab">...</div>
  <div class="tab-pane fade" id="nav-plausible" role="tabpanel" aria-labelledby="nav-plausible-tab">...</div>
  <div class="tab-pane fade" id="nav-delta" role="tabpanel" aria-labelledby="nav-delta-tab">...</div>
</div>
      </div>   
       </div>

<h6 class="mt-4">Specifics(applies to all age ranges)</h6>
<div class="row">
<div class="col-md-6">
<div class="row">
<div class="col-md-12">
<label class="form-label mb-0">Code</label>
<input type="number" name="code" class="form-control" placeholder="044"> 
</div> 
</div>
<div class="row">
<div class="col-md-12">
<label class="form-label mb-0 mt-2">Test Name</label>
<input type="text" name="test" class="form-control" placeholder="INR"> 
</div> 
</div>
<div class="row">
<div class="col-md-12">
<label class="form-label mb-0 mt-2">Decimal Point</label>
<input type="number" name="decimal" class="form-control" placeholder="2"> 
</div> 
</div>
<div class="row">
<div class="col-md-12">
<label class="form-label mb-0 mt-2">Bar Code</label>
<input type="number" name="barcode" class="form-control " placeholder="INR"> 
</div> 
</div>
</div> 
<div class="col-md-6">
<div class="row">
<div class="col-md-12">
<label class="form-label mb-0">Units</label>
<select class="form-select form-control" name="units">
<option></option>
<option></option>  
<option></option>  
<option></option>  
<option></option>  
<option></option>  
<option></option>    
</select>  
</div>  
</div> 
<div class="row">
<div class="col-md-12 mt-4">
<input type="checkbox" name="printable"> 
<label class="form-label ">Printable</label> 
</div>  
</div> 
<div class="row">
<div class="col-md-12 mt-4">
<input type="checkbox" name="printable"> 
<label class="form-label mt-2">In Use</label> 
</div>  
</div> 
<div class="row">
<div class="col-md-12 mt-4">
<input type="checkbox" name="printable"> 
<label class="form-label mt-2">Print Ref Ranges</label> 
</div>  
</div> 
</div> 
</div>
<button class="btn btn-warning mt-3">Cancel</button>
    


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

        
@endpush