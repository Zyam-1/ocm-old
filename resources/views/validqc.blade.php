@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
  <div class="row mb-0">
    <div class="col-sm-6">
      <h1 class="m-0">Valid QC</h1>
    </div><!-- /.col -->
    <div class="col-sm-6  d-none d-sm-none d-md-block ">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
        <li class="breadcrumb-item active">Valid QC</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main content -->
<div class="content">
<div class="container-fluid">

              <div class="row">
                  
                  <div class="col-md-12">    
                  <div class="card card-primary card-outline">
                      <div class="card-body">                  
                          

                            <form id="form">
                                      {{ csrf_field() }}
                                      <div>
                                      <div class="row">
                                        <div class="col-md-3"> 
                                          <a class="btn btn-primary" style="color: aliceblue;">Click on Parameter to Delete</a>
                                        </div>
                                        <div class="col-md-3"> 
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" value="" id="flexCheckIndeterminate">
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                              Serum
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" value="" id="flexCheckIndeterminate">
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                              Urine
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <div>
                                            <input type="date" class="form-control w-50" id="accident_date" name="accident_date">
                                          </div>
                                          <div>
                                          
                                            <select name="types" id="lang" class="form-control my-2 w-100">
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            </select>
                                          </div> 
                                        </div>
                                        <div class="col-md-3"> 
                                          <div class="row">
                                            <div class="col-md-6">
                                              <a class="btn btn-danger" style="color: aliceblue;">Refresh</a>
                                            </div>
                                            <div class="col-md-6">
                                              <a class="btn btn-secondary" style="color: aliceblue;">Cancel</a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="table-responsive">
                                        <table class="table table-striped">
                                          <thead>
                                            <tr>
                                              <th scope="col">Parameter</th>
                                              <th scope="col">Tests</th>
                                              <th scope="col">Run Time</th>
                                              <th scope="col">Value</th>
                                              <th scope="col"></th>
                                              <th scope="col">Mean</th>
                                              <th scope="col">Low</th>
                                              <th scope="col">High</th>
                                              <th scope="col">2 SD</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                          </tbody>
                                        </table>
                                      </div>
                                      </div>
                                    </div>
                             
                            </form>
                     
                  </div>
                                  
                    
                      
              </div> 

              
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

<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>

</script>
@endpush



<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>valid qc</title>
  <style>
  </style>
</head>
<body>


  <div class="card">
    <div class="row">
      <div class="col-md-3"> 
        <a class="btn btn-primary" style="color: aliceblue;">Click on Parameter to Delete</a>
      </div>
      <div class="col-md-3"> 
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
          <label class="form-check-label" for="flexCheckIndeterminate">
            Serum
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
          <label class="form-check-label" for="flexCheckIndeterminate">
            Urine
          </label>
        </div>
      </div>
      <div class="col-md-3">
        <div>
          <input type="date" class="form-control w-50" id="accident_date" name="accident_date">
        </div>
        <div>
        
          <select name="types" id="lang" class="form-control my-2 w-100">
          <option value="">1</option>
          <option value="">2</option>
          <option value="">3</option>
          </select>
        </div> 
      </div>
      <div class="col-md-3"> 
        <div class="row">
          <div class="col-md-6">
            <a class="btn btn-danger" style="color: aliceblue;">Refresh</a>
          </div>
          <div class="col-md-6">
            <a class="btn btn-secondary" style="color: aliceblue;">Cancel</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Parameter</th>
            <th scope="col">Tests</th>
            <th scope="col">Run Time</th>
            <th scope="col">Value</th>
            <th scope="col"></th>
            <th scope="col">Mean</th>
            <th scope="col">Low</th>
            <th scope="col">High</th>
            <th scope="col">2 SD</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
{{-- 
  <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('plugins/dataTables.fixedHeader.min.js') }}" type="text/javascript"></script> --}}

</body>
</html> -->