@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Add New Analyte 
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
    <form id="formcoag">
    {{ csrf_field() }}
    
    <h6>Add New Analyte </h6>



    <div class="row">                
    <div class="col-md-6 ">
        <label class="form-label">Short Name</label>
        <input type="text" name="sname" class="form-control">
      </div>

      <div class="col-md-6">
    <label class="form-label" for="comment">Long Name</label>
    <input type="text" name="sname" class="form-control">
    </div>  

    </div>

    <div class="row">                

    <div class="col-md-6 mt-2">
   <label class="form-label">Analyser</label>
   <select class="form-select form-control">
   <option disabled selected>Choose An Option</option> 
    <option>1</option> 
    <option>2</option> 
    <option>3</option> 

   </select>
   </div>  

  <div class="col-md-6 mt-2">
<label class="form-label" for="comment">Analyser Code</label>
<input type="text" name="analysercode" class="form-control">
</div>  

</div>


<div class="row">                

<div class="col-md-6 mt-2">
<label class="form-label">SampleType</label>
<select class="form-select form-control">
<option disabled selected>Choose An Option</option> 
<option>1</option> 
<option>2</option> 
<option>3</option> 

</select>
</div>  

<div class="col-md-6 mt-2">
<label class="form-label">Units</label>
<select class="form-select form-control">
<option disabled selected>Choose An Option</option> 
<option>1</option> 
<option>2</option> 
<option>3</option> 

</select>
</div> 

</div>


    <div class="buttons mt-3">
    <button class="btn btn-primary" id = "savebtn">Save</button>
    <button class="btn btn-warning">Clear</button> 
    <button class="btn btn-success">Exit</button>   
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

        
@endpush
