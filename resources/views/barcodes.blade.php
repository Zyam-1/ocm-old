@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Barcodes 
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
    <h6>Search enteries using Barcode Reader</h6>



    <div class="row">                
    <div class="col-md-6 ">
        <label class="form-label">Cancel</label>
        <input type="text" name="cancel" class="form-control">
      </div>

      <div class="col-md-6">
    <label class="form-label" for="comment">Save</label>
    <input type="text" name="Save" class="form-control">
    </div>  

    </div>

    
    <div class="row mt-2">                
    <div class="col-md-6 ">
        <label class="form-label">Clear</label>
        <input type="text" name="Clear" class="form-control">
      </div>

      <div class="col-md-6">
    <label class="form-label" for="comment">Random</label>
    <input type="text" name="Random" class="form-control">
    </div>  

    </div>




    <div class="row mt-2">                
    <div class="col-md-6 ">
        <label class="form-label">Fasting</label>
        <input type="text" name="Fasting" class="form-control">
      </div>
      <div class="col-md-6">
    <label class="form-label" for="comment">Set Analyser 'A'</label>
    <input type="text" name="setanalA" class="form-control">
    </div>  
    </div>


    <div class="row mt-2">                
      <div class="col-md-6">
    <label class="form-label" for="comment">Set Analyser 'B'</label>
    <input type="text" name="setanalB" class="form-control">
    </div>
    
    <div class="col-md-6 ">
        <label class="form-label">FBC</label>
        <input type="text" name="FBC" class="form-control">
      </div>
    </div>


    
    <div class="row mt-2">                
      <div class="col-md-6">
    <label class="form-label" for="comment">ESR</label>
    <input type="text" name="ESR" class="form-control">
    </div>
    
    <div class="col-md-6 ">
        <label class="form-label">Retics</label>
        <input type="text" name="retics" class="form-control">
      </div>
    </div>



    <div class="row mt-2">                
      <div class="col-md-6">
    <label class="form-label" for="comment">MonoSpot</label>
    <input type="text" name="monospot" class="form-control">
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
