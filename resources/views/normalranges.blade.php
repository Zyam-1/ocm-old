@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Normal Ranges
                <a class="btn btn-info btn-sm" href=""><i class="fas fa-arrow-left"></i> Go Back </a>
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
      <div class="col-md-3 "  style=" height: 500px; overflow-y:scroll;">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Short Name</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>.</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-9">


      <div class="row mt-2 mb-4">                

      <div class="col-md-4">
    <label class="form-label" for="comment">Long Name</label>
    <input type="text" name="sname" class="form-control">
    </div>  

    <div class="col-md-4">
   <label class="form-label">Sample Type</label>
   <select class="form-select form-control">
   <option disabled selected>Choose An Option</option> 
    <option>1</option> 
    <option>2</option> 
    <option>3</option> 

   </select>
   </div>  

   <div class="col-md-4">
   <label class="form-label">Category</label>
   <select class="form-select form-control">
   <option disabled selected>Choose An Option</option> 
    <option>1</option> 
    <option>2</option> 
    <option>3</option> 

   </select>
   </div>  

    </div>


    <div class="row pt-2">
<div class="col-md-12">
    <table id = "table" class="table table-striped mytable">
  <thead>
    <tr>
     
      <th scope="col">Age From</th>      
      <th scope="col">Age To</th>
       <th scope="col">Low</th>
       <th scope="col">High</th>
       <th scope="col">Low</th>
      <th name="action">High</th>
      <th scope="col">Flag Low</th>
      <th name="action">Flag High</th>
      <th scope="col">Flag Low</th>
      <th name="action">Flag High</th>
          <th name="action">Flag Ranges</th>

    </tr>
  </thead>
  <tbody>


  </tbody>
</table>    
</div>    
    
</div>



      </div>
    </div>
<div class="row mt-3">
  <div class="col-md-12">
  <button class="btn btn-primary">Remove Age Ranges</button>
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
