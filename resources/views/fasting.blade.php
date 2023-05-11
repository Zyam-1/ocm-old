





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
            <h1 class="m-0">Fasting Ranges
               
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
    
            <div class="card-body table-responsive ml-2">
            <h5>Glucose</h5> 
                    <div class="col-md-12">
                   
                        
                   
                    <div class="row" style="display:flex; justify-content:space-around">
                        <div class="form-group ">
                        <label for="">Low</label>
                        <input  class="form-control  " 
                        type="text">
                        </div>
                        <div class="form-group ">
                        <label for="">High</label>
                        <input class="form-control "  type="text">
                        </div>
                        <div class="form-group">
                        <label for="">Printout Text</label>
                        <input class="form-control "  type="text">
                        </div>    
                 
                    </div>
                <h5>Cholestrol</h5>   
                    <div class="row"  style="display:flex; justify-content:space-around">
                        <div class="form-group">
                        <label for="">Low</label>
                        <input  class="form-control  " 
                        type="text">
                        </div>
                        <div class="form-group">
                        <label for="">High</label>
                        <input class="form-control "  type="text">
                        </div>
                        <div class="form-group">
                        <label for="">Printout Text</label>
                        <input class="form-control "  type="text">
                        </div>    
                 
                    </div>
                 <h5>Triglyceride</h5>
                    <div class="row"  style="display:flex; justify-content:space-around">
                        <div class="form-group">
                        <label for="">Low</label>
                        <input  class="form-control  " 
                        type="text">
                        </div>
                        <div class="form-group">
                        <label for="">High</label>
                        <input class="form-control "  type="text">
                        </div>
                        <div class="form-group">
                        <label for="">Printout Text</label>
                        <input class="form-control "  type="text">
                        </div>    
                 
                    </div>
                
                     <div>
                
                         <button class="btn btn-primary"> Save Changes</button>

                         <button class="btn btn-danger">Cancel</button>
                    </div>
             
            </div>
            
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



