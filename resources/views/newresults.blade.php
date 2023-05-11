@include('layouts.header')

<link rel="stylesheet" href="{{ asset('plugins/jquery.ui.min.css') }}">
<link rel="stylesheet" href="{{asset('plugins/Convenient-Pagination-Plugin-With-Bootstrap-And-jQuery-UI-Pagination-js/dist/pagination.css')}}">
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">List of New Results
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
    <div class="border p-3">
        <div class="row">
      <div class="col-md-12">
        <h5>Add New Organism Group</h5>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <label class="form-label">Code</label>
        <input type="text" name="code" value="" class="form-control">
      </div>
           <div class="col-md-6">
        <label class="form-label">Text</label>
        <input type="text" name="text" value="" class="form-control">
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-12">

        <input type="hidden" name="orignalcode" class="form-control" value="">

          <button class="btn btn-primary savebtn" type="button">Save</button>

      </div>
    </div>  
    </div>

   <div class="row mt-3 ">
    <div class="col-md-3 ">
      <label class="form-label">Search :  <input type="search"  class="form-control"></label>
        
    </div>
     
   </div>
  <div class="row mt-3">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped mytable">
            <thead>
              <tr>
                <th>Code</th>
                <th>Text</th>
                <th name="action">Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <div id="page-content"></div>
<div class="row">
  <div class="col-md-12 text-right">
    <div id="pagination-demo">
     

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


<script src="{{ asset('plugins/jquery.ui.min.js') }}"></script>


<script src="{{asset('plugins/Convenient-Pagination-Plugin-With-Bootstrap-And-jQuery-UI-Pagination-js/dist/pagination.js')}}"></script>


   <script>
   

</script>
        
@endpush
