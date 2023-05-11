@include('layouts.header')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

     <!-- Main content -->
    <div class="content">
      <div class="container-fluid">


      <div class="row">


<div class="col-md-12">   
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">

        <div class="">
  <div class="row">
   

    <?php if(count($data['patientdetails']) == 0) {

        echo "<h3>No Patient Details Found.</h3>";

    } else { ?> 

    <div class="col-sm col-md-4"> 
    <h3>Patient Details</h3>
        <p>Patient: {{$data['patientdetails'][0]->name}}</p>
      
        <p>Address 1 : {{$data['patientdetails'][0]->addr1}}</p>
        <p>Address 2 :{{$data['patientdetails'][0]->addr2}}</p>
        <p>Address 3 : {{$data['patientdetails'][0]->addr3}}</p>
        <p>Address 4 : {{$data['patientdetails'][0]->addr4}}</p>
    </div>
    <div class="col-sm col-md-4" style="margin-top:2.5rem;">
      <p>MRN : {{$data['patientdetails'][0]->patnum}}</p>
      <p>D.O.B : {{$data['patientdetails'][0]->DoB}} </p>
      <p>Sex : {{$data['patientdetails'][0]->sex}}
     
      <p>Group : {{$data['patientdetails'][0]->fgroup}} </p>

     


    </div>
    <div class="col-sm col-md-4" style="margin-top:2.5rem;">
   <p>AB Report : {{$data['patientdetails'][0]->AIDR}}</p>
   <p>Sample Date : {{$data['patientdetails'][0]->SampleDate}}</p>
    </div>

  
  <div class="row px-2 col-md-12">
    Remarkss : 
  </div>
  
   <?php  }?>   


  </div>



</div>

 







</div>
</div>
</div>
</div>

<div class="row">


<div class="col-md-12">   
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">

        <div>
             <h4>Kleihauer</h4>
  <table id="table_id" class="table table-striped ">
<thead>
  <tr>
    <th>Sample Data</th>
    <th>Lab Number</th>
    <th>Result</th>
    <th>Comment</th>
    </tr>  
  </thead>
    <tbody>

     @foreach($data['kleihauer'] as $kleihauer)

    <tr>
      <td>{{$kleihauer->DateTime}}</td>
      <td>{{$kleihauer->SampleID}}</td>
      <td>Fetal Cells {{$kleihauer->FetalCells}}</td>
      <td>{{$kleihauer->RH}} - {{$kleihauer->Report}}</td>
      
      </tr> 
    @endforeach


    </tbody>
  </table>
</div>  


</div>
</div>
</div>
</div>


<div class="row">


<div class="col-md-12">   
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">

<div>
<h4>Product History</h4>
  <table id="table_i" class=" table table-striped">
<thead>
  <tr>
    <th>Product</th>
    <th>Group</th>
    <th>Unit Number</th>
    <th>Available To</th>
    <th>Status</th>
    <th>Date Time</th>
    </tr>  
  </thead>
    <tbody>
    
    @if(count($data) < 1)
    <div class="alert alert-warning">
        <strong>Sorry!</strong> No Product Found.
    </div>                                      
@else 
    
    @foreach($data['btproducts'] as $btproducts)
    <tr>
      <td>{{$btproducts->name}}</td>
      <td>{{$btproducts->fgroup}}</td>
      <td>{{$btproducts->unitnumber}}</td>
      <td>{{$btproducts->availableto}}</td>
      <td><?php 

            if($btproducts->status == 'p') {

                echo 'Pending';
            }
            elseif($btproducts->status == 'Process') {

                echo 'Processing';
            }
            elseif($btproducts->status == 'Issued') {

                echo 'Issued';
            }
        ?></td>
      <td>{{$btproducts->receiveddate}}</td>
      
      </tr> 
    @endforeach
      
@endif 
</tbody>
  </table>
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
<script type="text/javascript">
        $(document).ready( function () {
        $('#table_id').DataTable();
    } );
    $(document).ready( function () {
        $('#table_i').DataTable();
    } );
</script>

@endpush
