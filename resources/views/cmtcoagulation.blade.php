@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Comment Of Coagulation
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
        <h5>Add new Clinician</h5>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <label class="form-label">Code</label>
        <input type="text" name="" class="form-control">
      </div>
           <div class="col-md-6">
        <label class="form-label">Text</label>
        <textarea name="" class="form-control" rows="1"></textarea>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-12">
        <button class="btn btn-primary">Add</button>
      </div>
    </div>  
    </div>
        <div class=" p-4 mt-3">
        <div class="row">
      <div class="col-md-12">
        <h5>List Type</h5>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 ">
         <input type="radio" name="listType" class="form-check-input ">
        <label class="form-check-label">Biochemistry Comments</label>
       
      </div>
      <div class="col-md-3 ">
         <input type="radio" name="listType" class="form-check-input ">
        <label class="form-check-label">Hematology  Comments</label>
       
      </div>
     <div class="col-md-3 ">
         <input type="radio" name="listType" class="form-check-input ">
        <label class="form-check-label">Coagulation  Comments</label>
       
      </div>
        <div class="col-md-3 ">
         <input type="radio" name="listType" class="form-check-input ">
        <label class="form-check-label">Demographics  Comments</label>
       
      </div>

           
    </div>
        <div class="row mt-2">

        <div class="col-md-3 ">
         <input type="radio" name="listType" class="form-check-input ">
        <label class="form-check-label">Semen  Comments</label>
       
      </div>
      <div class="col-md-3 ">
         <input type="radio" name="listType" class="form-check-input ">
        <label class="form-check-label">Cinical Details</label>
       
      </div>
      <div class="col-md-3 ">
         <input type="radio" name="listType" class="form-check-input ">
        <label class="form-check-label">Micro Comments</label>
       
      </div>
     <div class="col-md-3 ">
         <input type="radio" name="listType" class="form-check-input ">
        <label class="form-check-label">Film Comments</label>
       
      </div>


           
    </div>

  </div>
  <div class="row mt-3">
    <div class="col-md-6">
      <label class="form-label">Item to be Displayed in List</label>
     <select class="form-control form-select">
       <option>36</option>
       <option></option>

     </select>
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
                 <th>InUse</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>.</td>
                <td>.</td>
                <td>.</td>

              </tr>
                <tr>
                <td>.</td>
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
           <button class="btn btn-danger w-100">Delete</button>
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
      <div class="row">
        <div class="col-md-12">
          <button class="btn btn-primary">Save</button>
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
