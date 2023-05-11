@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Add Coagulation Test 
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
    <h6>Coagulation Test </h6>



    <div class="row">                
    <div class="col-md-6 ">
        <label class="form-label mb-0">Code</label>
        <input type="text" name="sname" class="form-control mb-2">
      </div>

    

    </div>
<div class="row">
   <div class="col-md-6">
    <label class="form-label mb-0">Test Name </label>
    <input type="text" name="sname" class="form-control">
    </div>   
</div>
<div class="row">
<div class="col-md-6">
<label class="form-label mb-0">Units</label>  
<select class="form-select form-control">
<option></option>
<option></option>  
<option></option>  
<option></option>  
</select>  
</div>
<div class="col-md-2">
<button class="btn btn-primary mt-4" style="padding: 3px 14px;">Add New Unit</button>  
</div>  
</div>
<div class="buttons mt-3">
<button class="btn btn-primary">Save Details</button>
<button class="btn btn-warning">Cancel without saving</button>  
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