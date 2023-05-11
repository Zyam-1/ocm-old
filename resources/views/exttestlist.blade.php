@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Test List
                <a class="btn btn-success btn-sm" href=""><i class="fas fa-arrow-left"></i> Go Back </a>
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
    <div class="row">    
     <div class="col-md-6">
     <div class="row">
     <div class="col-md-12">
     <label class="form-label mb-0" for="analyte">Analyte Name</label>
     <input type="text" id="analyte" class="form-control form-control" placeholder="" />  
     </div> 
     <div class="col-md-6">
     <label class="form-label mb-0 mt-2" for="medibridge">Medibridge Code</label>
     <input type="text" id="medibridge" class="form-control form-control" placeholder="" />   
     </div> 
     <div class="col-md-6">
     <label class="form-label mb-0 mt-2" for="biomnis">Biomnis Code</label>
     <input type="text" id="biomnis" class="form-control form-control" placeholder="" />  
     </div>
     <div class="col-md-6">
     <label class="form-label mb-0 mt-2" for="sample">Sample Type</label>

    <select id="sample" class="select form-control">
    <option value="1">Select option</option>
    <option value="2"></option>
    <option value="2"></option>
    <option value="3"></option>
    <option value="4"></option>
    <option value="5"></option>
    <option value="6"></option>
    <option value="7"></option>
    </select>  
     </div>
        <div class="col-md-6">
     <label class="form-label mb-0 mt-2" for="sample">Department</label>

    <select id="department" class="select form-control">
    <option value="1">Select option</option>
    <option value="2"></option>
    <option value="2"></option>
    <option value="3"></option>
    <option value="4"></option>
    <option value="5"></option>
    <option value="6"></option>
    <option value="7"></option>
    </select>  
     </div>
      <div class="col-md-6">
     <label class="form-label mb-0 mt-2" for="units">Units</label>
     <input type="text" id="units" class="form-control form-control" placeholder="" />   
     </div>
       <div class="col-md-6">
     <label class="form-label mb-0 mt-2" for="comments">Comments</label>
     <input type="text" id="comments" class="form-control form-control" placeholder="" />   
     </div> 
     </div>  
     </div>  
      <div class="col-md-6">
      <div class="row">
      <div class="col-md-8">
      <label class="form-label mb-0" for="sta">Send To Address</label>
      <select id="sta" class="select form-control">
    <option value="1">Select option</option>
    <option value="2"></option>
    <option value="2"></option>
    <option value="3"></option>
    <option value="4"></option>
    <option value="5"></option>
    <option value="6"></option>
    <option value="7"></option>
    </select>
     </div>
     <div class="col-md-4  mt-3"> 
     <button class="btn btn-primary mt-1">Add To Address</button>  
     </div> 
       </div>
         <div class="col-md-12 mt-2">
          <h6 >Normal Ranges : </h6>  
       </div> 

     
       <div class="row">
         <div class="col-md-6">
           <div class="col-md-12">
              <label class="form-label mt-1">Male</label>  
                 <input type="text" name="" placeholder="High " class="form-control">
           </div>
         </div>
              <div class="col-md-6">
           <div class="col-md-12">
              <label class="form-label mt-1">Male</label>  
                 <input type="text" name="" placeholder="Low " class="form-control">
           </div>
         </div>
         

       </div>
              <div class="row mt-3">
         <div class="col-md-6">
           <div class="col-md-12">
              <label class="form-label mt-1">Female</label>  
                 <input type="text" name="" placeholder="High " class="form-control">
           </div>
         </div>
              <div class="col-md-6">
           <div class="col-md-12">
              <label class="form-label mt-1">Female</label>  
                 <input type="text" name="" placeholder="Low " class="form-control">
           </div>
         </div>
         

       </div>



    
     </div>                     
    </div>
           <div class="row mt-3">
         <div class="col-md-12">
           <button class="btn btn-primary">Add To List</button>
         </div>
       </div>
    <div class="row">
      <div class="col-md-12 mt-3">
        <div style="height: 150px;overflow-y: scroll;">
                  <table class="table table-striped">
          <thead>
            <tr>
              <th>Analyte Name</th>
              <th>Male Low</th>
              <th>Male High</th>
              <th>Fem Low</th>
              <th>Fem High</th>
              <th>Units</th>
              <th>Address Send To</th>
              <th>Sample Type</th>
              <th>MB Cde</th>
              <th>Biomnis</th>
              <th>Department</th>
              <th>Comment</th>

            </tr>
          </thead>
          <tbody>
            <tr>
              <td>.</td>
              <td>.</td>
              <td>.</td>
              <td>.</td>
              <td>.</td>
              <td>.</td>
              <td>.</td>
              <td>.</td>
              <td>.</td>
              <td>.</td>

            </tr>
          </tbody>
        </table>
        </div>

      </div>
    </div>
<div class="row mt-2">
  <div class="col-md-12">
    <button class="btn btn-info">Export To Excel</button>
    <button class="btn btn-primary">Save</button>
    <button class="btn btn-warning">Cancel</button>
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
