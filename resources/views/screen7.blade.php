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
                              

                                  <form id="form">
                                            {{ csrf_field() }}

                                            <div class="">
        <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-3">
                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
                <div>
                  <input id="twitter" type="checkbox">
                <label for="twitter"><i class="fa-solid fa-plus"></i>A&E</label>
                <div class="text">hello</div>
                </div>
                 <div>
                <input id="facebook" type="checkbox">
                <label for="facebook"><i class="fa-solid fa-plus"></i>InPatients</label>
                 <div class="text">hello</div>
              </div>
               <div>
                <input id="facebook" type="checkbox">
                <label for="facebook"><i class="fa-solid fa-plus"></i>MGH</label>
                 <div class="text">hello</div>
              </div>
               <div>
                <input id="facebook" type="checkbox">
                <label for="facebook"><i class="fa-solid fa-plus"></i>other Hospitals</label>
                 <div class="text">hello</div>
              </div>
               <div>
                <input id="facebook" type="checkbox">
                <label for="facebook"><i class="fa-solid fa-plus"></i>Out Patients</label>
                 <div class="text">hello</div>
              </div>
               <div>
                <input id="facebook" type="checkbox">
                <label for="facebook"><i class="fa-solid fa-plus"></i>Renal Dylasis</label>
                 <div class="text">hello</div>
              </div>
            </div>
            <div class="col-md-3">
                <div class="parent">
                  <div class="form-check form-check-inline mt-1">
                    <input class="form-check-input" type="radio" name="Source" id="Source1" value="Clinician">
                    <label class="form-check-label" for="Source1">Clinician</label>
                    </div>
                    <div class="form-check form-check-inline mt-1">
                    <input class="form-check-input" type="radio" name="Source" id="Source2" value="Ward">
                    <label class="form-check-label" for="Source2">Ward</label>
                    </div>
                    <div class="form-check form-check-inline mt-1">
                    <input class="form-check-input" type="radio" name="Source" id="Source3" value="GP" >
                    <label class="form-check-label" for="Source3">GP</label>
                    </div>
                </div>
                <div class="btn1">
                    <a class="btn btn-primary mt-4 " style="color: aliceblue;">Cancel</a>
                </div>
                <div class="btn2">
                    <a class="btn btn-primary mt-4 " style="color: aliceblue;">Add New Panel</a>
                </div>
                <div class="btn3">
                    <a class="btn btn-primary mt-4 " style="color: aliceblue;">Remove Panel</a>
                </div>
                <div class="btn4">
                    <a class="btn btn-primary mt-4 " style="color: aliceblue;">Remove Item</a>
                </div>
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
<script src="{{ asset('plugins/dataTables.fixedHeader.min.js') }}" type="text/javascript"></script>


<script type="text/javascript">



</script>
@endpush

