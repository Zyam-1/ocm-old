@include('layouts.header')
  <style >
    ul{
      list-style-type: none;
    }
    .addscroll{
      height:13.3rem;
      overflow-y: scroll;
    }
  </style>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Netaquire Sounds
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
  <div class="col-md-10">
    <label class="form-label">Critical Error : </label>
    <input type="text" name="" class="form-control">
  </div>
  <div class="col-md-1 mt-4">
    <button class="btn btn-info mt-1 w-100">...</button>
  </div>
  <div class="col-md-1 mt-4">
    <button class="btn btn-primary mt-1 w-100">Test</button>
  </div>
 
</div>
<div class="row mt-2">
  <div class="col-md-10">
    <label class="form-label">Server Error : </label>
    <input type="text" name="" class="form-control">
  </div>
  <div class="col-md-1 mt-4">
    <button class="btn btn-info mt-1 w-100">...</button>
  </div>
  <div class="col-md-1 mt-4">
    <button class="btn btn-primary mt-1 w-100">Test</button>
  </div>
 
</div>
<div class="row mt-2">
  <div class="col-md-10">
    <label class="form-label">Information : </label>
    <input type="text" name="" class="form-control">
  </div>
  <div class="col-md-1 mt-4">
    <button class="btn btn-info mt-1 w-100">...</button>
  </div>
  <div class="col-md-1 mt-4">
    <button class="btn btn-primary mt-1 w-100">Test</button>
  </div>
 
</div>
<div class="row mt-2">
  <div class="col-md-10">
    <label class="form-label">Question : </label>
    <input type="text" name="" class="form-control">
  </div>
  <div class="col-md-1 mt-4">
    <button class="btn btn-info mt-1 w-100">...</button>
  </div>
  <div class="col-md-1 mt-4">
    <button class="btn btn-primary mt-1 w-100">Test</button>
  </div>
 
</div>
<div class="row mt-3">
  <div class="col-md-12">
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
