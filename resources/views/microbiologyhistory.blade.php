@include('layouts.header')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">
            
            Microbiology History
        
        <a class="btn btn-info btn-sm" href="{{route('Patients')}}/All"><i class="fas fa-plus"></i> Go to Patient List </a>

                

            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Requests</li>
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
                           <form id="form">

                                <div class="card-body p-2  row justify-content-center">                  
                           
                                    <div class="col-md-4 mt-2 ml-2">
                                        <label for="name">Name</label>
                                        <input class="form-control" type="text" id="name" value="<?php if(count($demo) > 0){ echo $demo[0]['PatName']; }?>">
                                    </div> 
                                    <div class="col-md-3 mt-2 ml-2">
                                        <label for="dob">Date Of Birth</label>
                                        <input class="form-control" type="date" id="dob" value="<?php if(count($demo) > 0){ $a = explode(' ',$demo[0]['DoB']); echo $a[0]; }?>">
                                    </div> 
                                    <div class="col-md-3 mt-2 ml-2">
                                        <label for="age">Age</label>
                                        <input class="form-control" type="text" id="age" value="<?php if(count($demo) > 0){ echo $demo[0]['Age']; }?>">
                                    </div> 
                             
                                </div>
                                <div class="card-body p-2 row justify-content-center">                  
                                    <div class="col-md-3 ml-2">
                                        <label for="chart">Chart</label>
                                        <input class="form-control" type="text" id="chart" value="<?php if(count($demo) > 0){ echo $demo[0]['Chart']; }?>">
                                    </div> 
                                    <div class="col-md-3 ml-2">
                                        <label for="sex">Sex</label>
                                        <input class="form-control" type="text" id="sex" value="<?php if(count($demo) > 0){ echo $demo[0]['Sex']; }?>">
                                    </div> 
                                    <div class="col-md-4 ml-2">
                                        <label for="address">Address</label>
                                        <input class="form-control" type="text" id="address" value="<?php if(count($demo) > 0){ echo $demo[0]['Addr0']; }?>">
                                    </div> 
                                </div>

                                <div class="row pl-5 pt-3 pb-3">
                                  <div class="col-md-10">
                                      <input class="form-control  mb-2" type="text" id="empty1" value="">
                                  </div> 
                                  <div class="col-md-2">
                                    <div class="form-check  mb-2">
                                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                      <label class="form-check-label" for="flexRadioDefault1">
                                        Lab View
                                      </label>
                                    </div>
                                  </div> 
                                  <div class="col-md-10">
                                    <input class="form-control" type="text" id="empty2" value="">
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                      <label class="form-check-label" for="flexRadioDefault2">
                                        Ward View
                                      </label>
                                    </div>
                                  </div>
                                </div>

                                <div>
                                <table class="my-3 table table-striped tableLast p-2">
                                        <thead>
                                            <tr>   
                                                <th>Sample ID</th>
                                                <th>Run Date</th>
                                                <th>Sample Date</th>
                                                <th>Report Date</th>
                                                <th>Sample Details</th>
                                                <th>Hospital</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>

                                        <tbody>
                                          <?php if(count($demo)) {
                                            foreach($demo as $d) {
                                            ?>
                                            <td><?php echo $d['SampleID'];?></td>
                                            <td><?php echo $d['RunDate'];?></td>
                                            <td><?php echo $d['SampleDate'];?></td>
                                            <td><?php echo $d['RecordDateTime'];?></td>
                                            <td><?php echo $d['RecordDateTime'];?></td>
                                            <td><?php echo $d['Hospital'];?></td>
                                        </tbody>
                                        <?php } }?>
                                  </table>
                                </div>

                           </form>  
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

<script type="text/javascript" src="{{asset('plugins/Chart.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('plugins/chartjs-plugin-annotation.min.js')}}"></script>


@endpush
