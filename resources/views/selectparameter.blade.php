@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
  <div class="row mb-0">
    <div class="col-sm-6">
      <h1 class="m-0">Select Parameter</h1>
    </div><!-- /.col -->
    <div class="col-sm-6  d-none d-sm-none d-md-block ">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
        <li class="breadcrumb-item active">Glucose Tolerance Test</li>
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
                          

                            <form id="form">
                                      {{ csrf_field() }}
                            <div class="row">
                              <div class="col-1">
                                  <button class="btn btn-primary w-100">Add</button>
                              </div>
                              <div class="col-2">
                                  <label class="form-check-label" for="flexCheckIndeterminate">
                                    Monitor Check Reagent
                                  </label>
                                  <input class="ml-2 form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">

                              </div>
                              <div class="col-2">
                                
                                
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    Current Stock
                                  </label>
                                <input class=" form-control d-inline" type="text" value="" id="flexCheckIndeterminate">
                              </div>
                              <div class="col-2">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    Each Assay Uses
                                  </label>
                                <input class=" form-control  d-inline" type="text" value="" id="flexCheckIndeterminate">
                              </div>
                              <div class="col-2">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    Alarm Stock less than
                                  </label>
                                <input class=" form-control d-inline" type="text" value="" id="flexCheckIndeterminate">
                                </div>
                              <div class="col-3">
                                  <div id="accordion">
                                      <div class="card">
                                        <div class="card-header" id="headingOne">
                                          <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                              Biochemistry
                                            </button>
                                          </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                          <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card">
                                        <div class="card-header" id="headingTwo">
                                          <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                              Coagulation
                                            </button>
                                          </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                          <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card">
                                        <div class="card-header" id="headingThree">
                                          <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                              Cytology
                                            </button>
                                          </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                          <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingfour">
                                          <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                              Haematology
                                            </button>
                                          </h5>
                                        </div>
                                        <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
                                          <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- <div class="card">
                                        <div class="card-header" id="headingfive">
                                          <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                              Cytology
                                            </button>
                                          </h5>
                                        </div>
                                        <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordion">
                                          <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingsix">
                                          <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                                              Cytology
                                            </button>
                                          </h5>
                                        </div>
                                        <div id="collapsesix" class="collapse" aria-labelledby="headingsix" data-parent="#accordion">
                                          <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                          </div>
                                        </div>
                                      </div>
                                    </div> -->
                                </div>
                            

                            </div>
                            <div class="row">
                                <div class="col-6">
                               
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
