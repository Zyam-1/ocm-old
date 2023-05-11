@include('layouts.header')
<link rel="stylesheet" href="{{ asset('plugins/jquery.ui.min.css') }}">


<link rel="stylesheet" href="{{asset('plugins/Convenient-Pagination-Plugin-With-Bootstrap-And-jQuery-UI-Pagination-js/dist/pagination.css')}}">
  <style>
/*    .th:first-child,th:last-child{
      : 0px;
    }*/
  </style>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Plausible Ranges
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
    <h6>Plausible Ranges</h6>

    <div class="row">   
        
    
    <div class="col-md-6 mt-2 mb-2">
   <label class="form-label">Sample Type</label>
   <select class="form-select form-control">
   <option disabled selected>Choose An Option</option> 
    <option>Serum</option> 
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
     
      <th scope="col">Long Name</th>
      <th scope="col">Short Name</th>
       <th scope="col">Plausible Low</th>
      <th scope="col">Plausible High</th>


      <th name="action">Action</th>

    </tr>
  </thead>
  <tbody>


  </tbody>
</table>    
</div>    
    
</div>

<div class="row">
    <div class="col-md-12 text-right">
        <div id="pagination-demo"></div>
    </div>
</div>
<div class="buttons">
<button class="btn btn-primary">Emport To Excel</button>  
<button class="btn btn-success">Print</button> 
<button class="btn btn-primary">Exit</button>
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
