@include('layouts.header')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Codes
               <a class="btn btn-info btn-sm" href=""><i class="fas fa-arrow-left"></i> Go Back </a>
             </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Clients</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


     <!-- Main content -->
    <div class="content">
      <div class="container-fluid">


            <form id="form">
            {{ csrf_field() }}
                  <div class="card card-primary card-outline">
                    <div class="card-body ">                                  
          <div class="row">
              <div class="col-md-12">
                  <label class="form-label">Serum:</label>
<select class="form-control form-select">
    <option>Serum</option>
</select>
              </div>
          </div>
          <div class="row mt-3">
              <div class="col-md-12">
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th>Panel Name</th>
                              <th>BarCode</th>

                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>.</td>
                              <td>.</td>

                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
          <div class="row mt-2">
              <div class="col-md-12">
                  <button class="btn btn-warning">Cancel</button>
              </div>
          </div>
      </div>
  </div>

            </form>        

        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>



@extends('layouts.footer')

@push('script')

@endpush