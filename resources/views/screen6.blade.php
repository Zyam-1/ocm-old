@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">External/Internal </h1>
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
        <div class="col-md-8">
            <div class="ml-5 row">
                <div class="col-md-3">

                </div>
                <div class="col-md-3">
                    <h6>In-House</h6>
                </div>
                <div class="col-md-3">
                    <h6>External</h6>
                </div>
                <div class="col-md-3">
                    <h6>Not Specified</h6>
                </div>
            </div>
            <table class="table  mt-3 table-striped">
                <thead>
                  <tr>
                    <th scope="col">Discipline</th>
                    <th scope="col">Tests</th>
                    <th scope="col">Samples</th>
                    <th scope="col">Tests</th>
                    <th scope="col">Samples</th>
                    <th scope="col">Tests</th>
                    <th scope="col">Samples</th>
                  </tr>
                </thead>
                <tbody>
                    {{-- <tr>
                        <th scope="col">
                            Discipline
                        </th>
                    </tr> --}}
                    <tr>
                        <th scope="col">
                            Biochemistry
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">
                            Endocrinology
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">
                            Coagulation
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">
                            Haem - FBC
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">
                            Haem - ESR
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">
                            Haem - MonoSpot
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">
                            Haem - Malaria
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">
                            Haem - Sickledex
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">
                            Haem - RA
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">
                            Haem - Films
                        </th>
                    </tr>

                </tbody>
              </table>
        </div>
        <div class=" col-md-4">
            <div class="d-flex ">
                <a class="btn btn-primary  " style="color: aliceblue;">Set Locations</a>
            
            <!-- <div class="dates"> -->
                <div class=" justify-content-center align-items-center">
                    <input form-control id=demoInput type=number min=100 max=110 class="ml-4">
                    <button onclick="increment()">+</button>
                    <button onclick="decrement()">-</button>
                       <script>
                           function increment() {
                              document.getElementById('demoInput').stepUp();
                            }
                            function decrement() {
                              document.getElementById('demoInput').stepDown();
                            }
                        </script>
                <label class="mt-2" for="lang2">Days</label>
                </div>
                </div>
            <div class="months">
                <select name="types" id="lang" class="form-control my-2 w-50">
                    <option value="">January</option>
                    <option value="">February</option>
                    <option value="">March</option>
                    <option value="">April</option>
                    <option value="">May</option>
                    <option value="">June</option>
                    <option value="">July</option>
                    <option value="">August</option>
                    <option value="">September</option>
                    <option value="">October</option>
                    <option value="">November</option>
                    <option value="">December</option>
                    </select>
            </div>
            <div class="type">
                <select name="types" id="lang" class="form-control my-2 w-50">
                    <option value="">Whole Month</option>
                    <option value="">Quarter Month</option>
                    <option value="">etc</option>
                    </select>
            </div>
            <div class="bt2">
                <a class="btn btn-primary mt-4 " style="color: aliceblue;">Calculate</a>
            </div>
            <!-- </div> -->
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
