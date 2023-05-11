@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Auto Validation
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
<div class="col-md-12">
  <textarea class="form-control" >In order for a sample to pass automatic validation-Results for parameter marked as include must be between Low and High values-</textarea>
</div>
</div>
<div class="row mt-4">
  <div class="col-md-12">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Parameter</th>
          <th>Low</th>
          <th>High</th>
          <th>Include</th>
          

        </tr>
      </thead>
      <tbody>
        <tr>
          <td>.</td>
          <td>.</td>
          <td>.</td>
          <td>.</td>

        </tr>
      </tbody>
    </table>
  </div>
</div>
<div class="row mt-4">
  <div class="col-md-12">
    <button class="btn btn-primary">Save</button>
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
