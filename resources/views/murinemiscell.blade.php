@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Miscellaneous
                <a class="btn btn-info btn-sm" href=""><i class="fas fa-arrow-left"></i> Go Back </a>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Payments</li>
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
    <div class="card-body table-responsive">                  
    <form id="form">
    {{ csrf_field() }}
    <div class="border p-3">
        <div class="row">
      <div class="col-md-12">
        <h5>Add New Organism Group</h5>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <label class="form-label">Code</label>
        <input type="text" name="" class="form-control">
      </div>
           <div class="col-md-6">
        <label class="form-label">Text</label>
        <input type="text" name="" class="form-control">
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-12">
        <button class="btn btn-primary">Add</button>
      </div>
    </div>  
    </div>
        <div class="border p-3 mt-3">
        <div class="row">
      <div class="col-md-12">
        <h5>List Type</h5>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2 mx-3">
         <input type="radio" name="listType" class="form-check-input ">
        <label class="form-check-label">Orgnaism Groups</label>
       
      </div>
      <div class="col-md-2 mx-3">
         <input type="radio" name="listType" class="form-check-input ">
        <label class="form-check-label">O vaa</label>
       
      </div>
     <div class="col-md-2 mx-3">
         <input type="radio" name="listType" class="form-check-input ">
        <label class="form-check-label">Gram stains</label>
       
      </div>
        <div class="col-md-2 mx-3">
         <input type="radio" name="listType" class="form-check-input ">
        <label class="form-check-label">Qualifiers</label>
       
      </div>
        <div class="col-md-2 ">
         <input type="radio" name="listType" class="form-check-input ">
        <label class="form-check-label">Gram Quantity</label>
       
      </div>
           
    </div>
        <div class="row mt-2">
      <div class="col-md-2 mx-3">
         <input type="radio" name="listType" class="form-check-input ">
        <label class="form-check-label">Wet Preps</label>
       
      </div>
      <div class="col-md-2 mx-3">
         <input type="radio" name="listType" class="form-check-input ">
        <label class="form-check-label">Casts</label>
       
      </div>
     <div class="col-md-2 mx-3">
         <input type="radio" name="listType" class="form-check-input ">
        <label class="form-check-label">Crystals</label>
       
      </div>
        <div class="col-md-2 mx-3">
         <input type="radio" name="listType" class="form-check-input ">
        <label class="form-check-label">Miscellaneous</label>
       
      </div>
        <div class="col-md-2 ">
         <input type="radio" name="listType" class="form-check-input ">
        <label class="form-check-label">Identification Notes</label>
       
      </div>

           
    </div>

  </div>
  <div class="row mt-3">
    <div class="col-md-10">
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Code</th>
                <th>Text</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>.</td>
                <td>.</td>

              </tr>
                <tr>
                <td>.</td>
                <td>.</td>
                
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="row">
        <div class="col-md-12">
          <button class="btn btn-primary w-100">Organisms</button>
        </div>
      </div>
          <div class="row mt-2">
        <div class="col-md-12">
          <button class="btn btn-info w-100">Move Up</button>
        </div>
      </div>
          <div class="row mt-2">
        <div class="col-md-12">
          <button class="btn btn-secondary w-100">Move Down</button>
        </div>
      </div>
        <div class="row mt-2">
        <div class="col-md-12">
          <button class="btn btn-success w-100">Print</button>
        </div>
      </div>
        <div class="row mt-2">
        <div class="col-md-12">
          <button class="btn btn-warning w-100">Cancel</button>
        </div>
      </div>
    </div>
  </div>



    </form>
                                          


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

<script type="text/javascript">

</script>
        
@endpush
