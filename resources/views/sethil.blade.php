@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Set H/I/L
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
  <div class="col-md-4">
    <div class="row">
      <div class="col-md-12 text-center">
        <h5>Lipaemic</h5>
      </div>
    </div>
        <div class="row mt-2">
      <div class="col-md-12 text-center">
       <input type="text" name="Lipaemic1" placeholder="1+" class="form-control">
      </div>
    </div>
  <div class="row mt-2">
      <div class="col-md-12 text-center">
       <input type="text" name="Lipaemic2" placeholder="2+" class="form-control">
      </div>
    </div>
  <div class="row mt-2">
      <div class="col-md-12 text-center">
       <input type="text" name="Lipaemic3" placeholder="3+" class="form-control">
      </div>
    </div>
  <div class="row mt-2">
      <div class="col-md-12 textLipaemic4Lipaemic4-center">
       <input type="text" name="" placeholder="4+" class="form-control">
      </div>
    </div>
  <div class="row mt-2">
      <div class="col-md-12 text-center">
       <input type="text" name="Lipaemic5" placeholder="5+" class="form-control">
      </div>
    </div>
  <div class="row mt-2">
      <div class="col-md-12 text-center">
       <input type="text" name="Lipaemic6" placeholder="6+" class="form-control">
      </div>
    </div>
  </div>
  <div class="col-md-4">
    
     <div class="row">
      <div class="col-md-12 text-center">
        <h5>Icteric</h5>
      </div>
    </div>
        <div class="row mt-2">
      <div class="col-md-12 text-center">
       <input type="text" name="Icteric1" placeholder="1+" class="form-control">
      </div>
    </div>
  <div class="row mt-2">
      <div class="col-md-12 text-center">
       <input type="text" name="Icteric2" placeholder="2+" class="form-control">
      </div>
    </div>
  <div class="row mt-2">
      <div class="col-md-12 text-center">
       <input type="text" name="Icteric3" placeholder="3+" class="form-control">
      </div>
    </div>
  <div class="row mt-2">
      <div class="col-md-12 text-center">
       <input type="text" name="Icteric4" placeholder="4+" class="form-control">
      </div>
    </div>
  <div class="row mt-2">
      <div class="col-md-12 text-center">
       <input type="text" name="Icteric5" placeholder="5+" class="form-control">
      </div>
    </div>
  <div class="row mt-2">
      <div class="col-md-12 text-center">
       <input type="text" name="Icteric6" placeholder="6+" class="form-control">
      </div>
    </div>


  </div>
  <div class="col-md-4">
    
     <div class="row">
      <div class="col-md-12 text-center">
        <h5>Haemolysed</h5>
      </div>
    </div>
        <div class="row mt-2">
      <div class="col-md-12 text-center">
       <input type="text" name="Haemolysed1" placeholder="1+" class="form-control">
      </div>
    </div>
  <div class="row mt-2">
      <div class="col-md-12 text-center">
       <input type="text" name="Haemolysed2" placeholder="2+" class="form-control">
      </div>
    </div>
  <div class="row mt-2">
      <div class="col-md-12 text-center">
       <input type="text" name="Haemolysed3" placeholder="3+" class="form-control">
      </div>
    </div>
  <div class="row mt-2">
      <div class="col-md-12 text-center">
       <input type="text" name="Haemolysed4" placeholder="4+" class="form-control">
      </div>
    </div>
  <div class="row mt-2">
      <div class="col-md-12 text-center">
       <input type="text" name="Haemolysed5" placeholder="5+" class="form-control">
      </div>
    </div>
  <div class="row mt-2">
      <div class="col-md-12 text-center">
       <input type="text" name="Haemolysed6" placeholder="6+" class="form-control">
      </div>
    </div>



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
