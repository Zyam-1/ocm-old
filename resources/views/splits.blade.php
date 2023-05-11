@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">BioChemistry Splits
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

    <div class="row">
      <div class="col-md-3 "  style=" height: 500px; overflow-y:scroll;">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Type</th>
              <th>Analyte</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>.</td>
              <td>.</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-9">
        <div class="row">
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-12 text-center" >
                <h5>BioChemistry 1</h5>
              </div>
            </div>
             <div class="row">
              <div class="col-md-12 text-center" style="height:220px;overflow-y: scroll;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Analyte</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>.</td>
                      <td>.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            
            <div class="row">
              <div class="col-md-12 text-center" >
                <h5>Split 2</h5>
              </div>
            </div>
             <div class="row">
              <div class="col-md-12 text-center" style="height:220px;overflow-y: scroll;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Analyte</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>.</td>
                      <td>.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
          <div class="col-md-4">
            
                        <div class="row">
              <div class="col-md-12 text-center" >
                <h5>Drug</h5>
              </div>
            </div>
             <div class="row">
              <div class="col-md-12 text-center" style="height:220px;overflow-y: scroll;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Analyte</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>.</td>
                      <td>.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>


          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            

            <div class="row">
              <div class="col-md-12 text-center" >
                <h5>Endo</h5>
              </div>
            </div>
             <div class="row">
              <div class="col-md-12 text-center" style="height:220px;overflow-y: scroll;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Analyte</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>.</td>
                      <td>.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>


          </div>
          <div class="col-md-4">
            

           <div class="row">
              <div class="col-md-12 text-center" >
                <h5>Special Chemistry</h5>
              </div>
            </div>
             <div class="row">
              <div class="col-md-12 text-center" style="height:220px;overflow-y: scroll;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Analyte</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>.</td>
                      <td>.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>



          </div>
          <div class="col-md-4">
            

              <div class="row">
              <div class="col-md-12 text-center" >
                <h5>Urinary Chemistry</h5>
              </div>
            </div>
             <div class="row">
              <div class="col-md-12 text-center" style="height:220px;overflow-y: scroll;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Analyte</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>.</td>
                      <td>.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>


          </div>

        </div>
      </div>
    </div>
<div class="row mt-3">
  <div class="col-md-12">
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
