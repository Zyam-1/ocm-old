@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
  <div class="row mb-0">
    <div class="col-sm-6">
      <h1 class="m-0">Print Results</h1>
    </div><!-- /.col -->
    <div class="col-sm-6  d-none d-sm-none d-md-block ">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
        <li class="breadcrumb-item active">Glucose Tolerance Test</li>
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
                                
                                <div class="row">
                                    <div class="col-4">
                                        <input type="date" name="date1" id="date1" class="form-control">
                                    </div>
                                   
                                    <div class="col-4">
                                        <input type="number" name="num1" id="num1" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <input type="number" name="num2" id="num2" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check-inline">
                                            <div class="ml-1">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio" value="Haematology">Haematology
                                                </label>
                                                </div>
                                                <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="optradio" value="Biochemistry">Biochemistry
                                                </label>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                        <label class="form-check-label w-100">
                                                <input type="radio" class="form-check-input" name="optradio" value="valid">Valid, not Printed
                                        </label>
                                        <label class="form-check-label w-100">
                                                <input type="radio" class="form-check-input" name="optradio" value="onlyvalid">Only Valid
                                        </label>
                                        <label class="form-check-label w-100">
                                                <input type="radio" class="form-check-input" name="optradio" value="all">All
                                        </label>
                                        </div>
                                        <button class="btn btn-secondary">Print</button>
                                    </div>
                                    <div class="col-6">
                                       
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
