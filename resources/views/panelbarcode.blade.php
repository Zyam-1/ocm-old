@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Panel Barcode 
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
   <div class="col-md-3">
     <select class="select form-control">
         <option value="">Serum</option>
         <option value=""></option>
         <option value=""></option>
         <option value=""></option>
         <option value=""></option>
     </select>  
     </div>                                   
    </div>
<div class="row pt-3">
<div class="col-md-12">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Panel Name</th>
      <th scope="col">Barcode</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>.......</td>
      <td>.......</td>
    </tr>
    <tr>
      <td>.......</td>
      <td>.......</td>
    </tr>
  </tbody>
</table>    
</div>    
    
</div>
<button class="btn btn-warning mt-3">cancel</button>
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
