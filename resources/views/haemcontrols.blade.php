@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
  <div class="row mb-0">
    <div class="col-sm-6">
      <h1 class="m-0">Haematology Controls QC</h1>
    </div><!-- /.col -->
    <div class="col-sm-6  d-none d-sm-none d-md-block ">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
        <li class="breadcrumb-item active">Haematology Controls QC</li>
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
                                
                                      <div >
                                        <label class="mt-4" for="lang">Lot Number</label>
                                        <select name="types" id="lang" class="form-control my-2  w-25">
                                          <?php for ($i=0; $i < count($arr1); $i++) { 
                                         ?>
                                         <option value="<?php echo $arr1[$i];?>" id="getsid"><?php echo $arr1[$i]; ?></option>
                                          <?php  }?>
                                            </select>
                                            <div class="row">
                                                <div class="col-md-12">
                                                  <div class="table-responsive">
                                                    <table class="table" id="table2">
                                                        <thead>
                                                          <tr>
                                                            <th >RunDate </th>
                                                          
                                                            <th>Run Time</th>
                                                            <th>RBC</th>
                                                            <th>WBC</th>
                                                            <th>Hgb</th>
                                                            <th>MCV</th>
                                                            <th>Hct</th>
                                                            <th>MCH</th>
                                                            <th >MCHC</th>
                                                            <th>RDWCV</th>
                                                            <th>Plt</th>
                                                            <th >MPV</th>
                                                            <th >Plcr</th>
                                                            <th >PDW</th>
                                                            <th >LymA</th>
                                                            <th >LymP</th>
                                                            <th >MonoA</th>
                                                            <th >MonoP</th>
                                                            <th >NeutA</th>
                                                            <th >NeutP</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                        
                                                            
                                                        </tbody>
                                                      </table>
                                                      </div>
                                                </div>
                                            </div>

                                            <div >
                                                
                                                    <!-- <p>Click on Paramter to show graph.</p> -->
                                              
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('plugins/moment.min.js') }}"></script>
<script src="{{ asset('plugins/instascan.js') }}"></script>

<script>

$(document).ready(function () {

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
// var sid = $('#getsid').val()
// console.log(sid)
var id;
     $( "#lang" ).select2({
                    placeholder:'Choose a LotNumber',
                    allowClear:true
                   });
$(document).on('select2:select', '#lang', function () { 
   id = $(this).val();
  
   $('#table2').DataTable().destroy();
         load_data(id);
      // return id;

 });

function load_data(id = '')
     {
  
      var table = $('#table2').DataTable({

      // "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],

      processing: true,
      serverSide: true,
      // stateSave: true,
      ajax: {
            type: 'get',
            url:"{{ route( 'haemcontData') }}",
            data: {id : id},  
      },
      columns: [
          {data: 'Rundate', name: 'Rundate'},
          {data: 'RunDateTime', name: 'RunDateTime'},  
          {data: 'RBC', name: 'RBC'},
          {data: 'WBC', name: 'WBC'},
          {data: 'Hgb', name: 'Hgb'},
          {data: 'MCV', name: 'MCV'},
          {data: 'Hct', name: 'Hct'},
          {data: 'MCH', name: 'MCH'},
          {data: 'MCHC', name: 'MCHC'},
          {data: 'RDWCV', name: 'RDWCV'},
          {data: 'Plt', name: 'Plt'},
          {data: 'MPV', name: 'MPV'},
          {data: 'Plcr', name: 'Plcr'},
          {data: 'PDW', name: 'PDW'},
          {data: 'LymA', name: 'LymA'},
          {data: 'LymP', name: 'LymP'},
          {data: 'MonoA', name: 'MonoA'},
          {data: 'MonoP', name: 'MonoP'},
          {data: 'NeutA', name: 'NeutA'},
          {data: 'NeutP', name: 'NeutP'},
      ],
 

     });

var conceptName = $('#lang').find(":selected").val();


    };
  });
</script>
@endpush

