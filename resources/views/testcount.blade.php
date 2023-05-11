@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
  <div class="row mb-0">
    <div class="col-sm-6">
      <h1 class="m-0">Test Count</h1>
    </div><!-- /.col -->
    <div class="col-sm-6  d-none d-sm-none d-md-block ">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
        <li class="breadcrumb-item active">Bl100</li>
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
                          <h5>Test Count Info</h5>   

                            <form id="form">
                                      {{ csrf_field() }}
                                      <div class="row">
                                      
                                      <div class="col-md-12">
                                      <label  class="col-form-label"><span>Between Dates</span></label>
                
                                       </div>
                                       
                                       <div class="col-md-2">
                                     
                                           <input type="date" class="form-control" id="text" name="text" value="" />
                                       </div>
                                       <div class="col-md-2">
                                     
                                     <input type="date" class="form-control" id="text" name="text" value="" />
                                     </div>
                                     <div class="col-md-8">
                                     
                                      </div>
                                      <div class="col-md-4">
                                     
 </div> 

                                     <div class="col-md-2">
                                     
                                     
                                     <div class="form-check">
                                     <label class="form-check-label" for="exampleRadios1">
   Today    
  </label>
  <input class="form-check-input ml-2" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>

</div>
                                     
                                
                                        
                                      

                                       
                                  
                                     </div>   
                                     <div class="col-md-2">
                                     
                                     <div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
  <label class="form-check-label" for="exampleRadios1">
   Last Quarter
  </label>
</div>
</div>                                
<div class="col-md-4">
                                     
 </div>  
        
 <div class="col-md-4">
                                     
                                     </div> 
                                    
                                                                         <div class="col-md-2">
                                                                         
                                                                         
                                                                         <div class="form-check">
                                                                         <label class="form-check-label" for="exampleRadios1">
                                       Last Week
                                      </label>
                                      <input class="form-check-input ml-2" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    
                                    </div>
                                                                         
                                                                    
                                                                            
                                                                          
                                    
                                                                           
                                                                      
                                                                         </div>   
                                                                         <div class="col-md-2">
                                                                         
                                                                         <div class="form-check">
                                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                      <label class="form-check-label" for="exampleRadios1">
                                      Last Full Quarter
                                      </label>
                                    </div>
                                    </div>                                
                                    <div class="col-md-4">
                                                                         
                                     </div>  
                                     <div class="col-md-4">
                                                                         
                                     </div>         
                


                                     <div class="col-md-2">
                                     
                                     
                                     <div class="form-check">
                                     <label class="form-check-label" for="exampleRadios1">
    Last Month
  </label>
  <input class="form-check-input ml-2" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>

</div>
                                     
                                
                                        
                                      

                                       
                                  
                                     </div>   
                                     <div class="col-md-2">
                                     
                                     <div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
  <label class="form-check-label" for="exampleRadios1">
   Year To Date
  </label>
</div>
</div>                                
<div class="col-md-4">
                                     
 </div>  
       
                
                                      <div class="col-md-4">
                                     
                                     </div>
                                     <div class="col-md-2">
                                     
                                     
                                     <div class="form-check">
                                     <label class="form-check-label" for="exampleRadios1">
    Last Full Month
  </label>
  <input class="form-check-input ml-2" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>

</div>
                                     
                                
                                        
                                      

                                       
                                  
                                     </div>   
                                     <div class="col-md-4">
                                     
                                    
</div>                                
<div class="col-md-2">
<button type="button" class="btn btn-primary float-right save">Calculate</button>                        
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
