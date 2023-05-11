
@include('layouts.header')

    <!-- Select2 -->
    <link href="{{ asset('plugins/select2/css/select2.min.css?1112') }}" rel="stylesheet" >
  <link href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css?1112') }}" rel="stylesheet" >

  <body>
    
 
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">BarCodes
               
               <a class="btn btn-info btn-sm"><i class="fas fa-arrow-left"></i> Go Back </a>
             </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Clients</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


     <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

                  <form id="form" method="get">
                                       {{ csrf_field() }}
                                      
         
                 <div class="card card-primary card-outline">
                 <div class="card-body ">  
                 <div class="col-md-12">
                   
                 </div>
                 <div class="row">
                     <div class="col-md-12">
                         <h5>Scan Entries Using Barcode Reader</h5>
                     </div>
                 </div>
                    <div class="row mt-3">
                     <div class="col-md-6">
                        <label class="form-label">Cancel</label>
                        <input type="text" name="" class="form-control">
                     </div>
                     <div class="col-md-6">
                        <label class="form-label">Save</label>
                        <input type="text" name="" class="form-control">
                     </div>
                 </div>
                <div class="row mt-2">
                     <div class="col-md-6">
                        <label class="form-label">Clear</label>
                        <input type="text" name="" class="form-control">
                     </div>
                     <div class="col-md-6">
                        <label class="form-label">Random</label>
                        <input type="text" name="" class="form-control">
                     </div>
                 </div>
                      <div class="row mt-2">
                     <div class="col-md-6">
                        <label class="form-label">Fasting</label>
                        <input type="text" name="" class="form-control">
                     </div>
                     <div class="col-md-6">
                        <label class="form-label">Set Analyser 'A'</label>
                        <input type="text" name="" class="form-control">
                     </div>
                 </div>
                <div class="row mt-2">
                     <div class="col-md-6">
                        <label class="form-label">Set Analyser 'A'</label>
                        <input type="text" name="" class="form-control">
                     </div>
                     <div class="col-md-6">
                        <label class="form-label">FBC</label>
                        <input type="text" name="" class="form-control">
                     </div>
                 </div>
                <div class="row mt-2">
                     <div class="col-md-6">
                        <label class="form-label">ESR</label>
                        <input type="text" name="" class="form-control">
                     </div>
                     <div class="col-md-6">
                        <label class="form-label">Retics</label>
                        <input type="text" name="" class="form-control">
                     </div>
                 </div>
                 <div class="row mt-2">
                     <div class="col-md-6">
                        <label class="form-label">Monospot</label>
                        <input type="text" name="" class="form-control">
                     </div>
                 </div>
                 <div class="row mt-3">
                     <div class="col-md-12">
                         <button class="btn btn-warning">Cancel</button>
                     </div>
                 </div>



                 </div>
                 </div>        
</form>

                    

                    <!-- <input type="hidden"> -->

                    
        <!-- </form> -->
      </div>
    </div>
  </div>
</div>



  </body>
@extends('layouts.footer')

@push('script')


<script>
    
</script>




@endpush



