@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Units and Presicion
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
    <label class="form-label">Sample Type</label>
    <select class="form-control form-select">
      <option selected disabled hidden>Choose an option</option>
      <option>Serum</option>

    </select>
  </div>
    <div class="col-md-4">
        <label class="form-label">Category</label>
    <select class="form-control form-select">
      <option selected disabled hidden>Choose an option</option>
      <option>Human</option>

    </select>
  </div>
    <div class="col-md-4">
        <label class="form-label">Hospital</label>
    <select class="form-control form-select">
      <option selected disabled hidden>Choose an option</option>
      <option>Cavan</option>

    </select>
  </div>
</div>
<div class="row mt-4">
  <div class="col-md-12">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Long Name</th>
          <th>Short Name</th>
          <th>Units</th>
          <th>Dec.Places</th>
          <th>Code</th>

        </tr>
      </thead>
      <tbody>
        <tr>
          <td>.</td>
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
