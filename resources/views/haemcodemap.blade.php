@include('layouts.header')

<!-- Select2 -->
<link href="{{ asset('plugins/select2/css/select2.min.css?1112') }}" rel="stylesheet" >
<link href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css?1112') }}" rel="stylesheet" >
<style>
.whit label{
    color:#FFFFFF;
}
.int{
    min-height:23rem;
    margin-top:1rem;
    
}
</style>
<body>
<div class="content-wrapper" >
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Haem Test Code Mapping
               
               <a class="btn btn-info btn-sm"><i class="fas fa-arrow-left"></i> Go Back </a>
             </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Clients</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
</div>  


<div class="content">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-body">   
                 <div class="row ">
        <label class="mr-2">Select Analyser</label>
        <select class="form-control form-select w-25" name="" id="" >
            <option value="Choose an option">Choose an option</option>
            </select>
        </div>   
        <table class="table table-striped mt-2">
            <thead>
              <tr>
                
                <th>Code</th>
                <th>Test Name</th>
                <th>Short Name</th>
                <th>Analyser Code</th>
                
              </tr>  
            </thead>
            <tbody>
                <tr>
       <td>
        <-></->
       </td>
       <td>
        <-></->
       </td>
       <td>
        <-></->
       </td>
       <td>
        <-></->
       </td>
             
                </tr>
                <tr>
       <td>
        <-></->
       </td>
       <td>
        <-></->
       </td>
       <td>
        <-></->
       </td>
       <td>
        <-></->
       </td>
             
                </tr>
                <tr>
       <td>
        <-></->
       </td>
       <td>
        <-></->
       </td>
       <td>
        <-></->
       </td>
       <td>
        <-></->
       </td>
                </tr>

            </tbody>
        </table>
        <div>
                
             

                <button class="btn btn-warning">Exit</button>
           </div>
        </div> 
        </div>

            </div>
        </div>

</div>
</div>









</body>
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


<!-- Select2 -->



@endpush



