@include('layouts.header')




<link href="{{ asset('plugins/select2/css/select2.min.css?1112') }}" rel="stylesheet" >
  <link href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css?1112') }}" rel="stylesheet" >
<style>

</style>

<body>
<div class="content-wrapper" >

<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
  <div class="row mb-0">
    <div class="col-sm-6">
      <h1 class="m-0">Demographics 
         
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
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="content">
      <div class="container-fluid">
      <div class="card card-primary card-outline">
      <div class="card-body table-responsive"> 

      <div class="col-md-12">
        <div class="row">
            <div class="col-md-4 d-flex">
            
            
            <label for="cars">Sample Type</label>

<select name="sampletype" id="sampletype" class="form-control">
  <option value="volvo">Serum </option>
  
</select>
            
            </div>
           
          
        </div>
      </div>
   <table class="table table-striped">
    <thead>
    <th>LongName</th>
    <th>Short Name</th>
    <th>Enable Delta Check</th>
    <th>Data Value(Absolute)</th>
    <th>Days</th>
    </thead>

    <tbody>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>

    </tbody>
   </table>
</div>


</div>
</div>
</div>
</div>

</body>

@include('layouts.footer')
