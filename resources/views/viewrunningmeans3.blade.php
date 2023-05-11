@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Totals For Haematology </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Panels </li>
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
                              
                                            <div class="col-sm-6">
                                  <form id="form">
                                            {{ csrf_field() }}
                                            

                                          <div class="row" class="col-md-6">

                                                <div class="col-sm-3" class="row">
                                                  <input type="text" name="text" class="form-control form-select">
                                                </div>
                                         </div>

                                            <div class="col-sm-3" class="float-right">
                                                 <label class="">Current Stock</label>
                                                 <span>
                                                  <input type="text" name="t1" class="form-control">
                                                    </span>
                                             </div>

                                                 <div class="col-sm-3" class="float-right">
                                                    <label>Monitor Reagent Usage</label>
                                                    <input class="checkbox "type="checkbox" id="vehicle1"class="form-control form-select">
                                                 </div>

                                             <div class="col-sm-3">
                                                <button type="button" class="btn btn-primary">Add</button><br>
                                                
                                             </div>
                                                
                                        </form>
                                                  </div>  
            
                                          </div>

                                          
                                    </div> 

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
<script src="{{ asset('plugins/dataTables.fixedHeader.min.js') }}" type="text/javascript"></script>


<script type="text/javascript">



</script>
@endpush
