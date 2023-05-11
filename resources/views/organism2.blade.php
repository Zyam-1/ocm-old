@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Microbiology
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
<label class="form-label mb-0" for="tilte"> Organism Group</label>
<select id="sel" class="select form-control">
<option value="1">Select option</option>
<option value="2"></option>
<option value="3"></option>
<option value="4"></option>
</select>  
</div>   
<div class="col-md-6">
<label class="form-label mb-0" for="tilte">Site</label>
<select id="sel" class="select form-control">
<option value="1">Select option</option>
<option value="2"></option>
<option value="3"></option>
<option value="4"></option>
</select>  
</div>                            
    </div>
    <div class="buttons mt-3">
    <button class="btn btn-primary">New Organism Group</button>
    <button class="btn btn-success">Organism</button>
    <button class="btn btn-primary">New Site</button>
    <button class="btn btn-success">New Antibiotic</button>
    </div>
    <div class="row pt-3">
    <div class="col-md-4 border p-3">
<div class="row">
  <div class="col-md-12">
  <label>Availble Antibiotics</label> 
    <ul style="height: 300px; overflow-y:scroll; list-style-type: none;">
    <li>.........</li>
    <li>.........</li>
    <li>.........</li>
    <li>.........</li>
    <li>.........</li>
    <li>.........</li>
    <li>.........</li>
    <li>.........</li> 
    <li>.........</li> 
    <li>.........</li> 
    <li>.........</li> 
    <li>.........</li> 
    <li>.........</li> 
    <li>.........</li> 
    <li>.........</li> 
    <li>.........</li> 
    <li>.........</li>  
  </ul>
  </div>
</div>
    </div> 
    <div class="col-md-6">
    <div class="row">
      <div class="col-md-12">
            <label class="form-label mb-0">Primary List</label> 
    <textarea name="plist" rows="3" class="form-control"></textarea> 
      </div>
    </div>
        <div class="row">
      <div class="col-md-12">
            <label class="form-label mb-0">Secondary List</label> 
    <textarea name="plist" rows="3" class="form-control"></textarea> 
    <button class="btn btn-warning mt-2">Cancel</button>
      </div>
    </div>
    </div> 
    <div class="col-md-2 mt-4">
    <div class="row">
    <div class="col-md-12">
    <button class="btn btn-primary mb-2 w-100">Move Up</button> 
    <button class="btn btn-success w-100">Move Down</button>    
    </div>  
    </div>  
    <div class="row mt-4">
    <div class="col-md-12">
    <button class="btn btn-primary mb-2 w-100">Move Up</button> 
    <button class="btn btn-success w-100">Move Down</button>    
    </div>  

    </div>  
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
