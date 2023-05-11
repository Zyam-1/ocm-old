@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">View Running Means </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Panels </li>
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

                                            <div class="col-md-2">
                                                    <p>Department</p>             
                                                    <input type ="radio" id = "Heamatology" name="Department" value="Heamatology" id="Heamatology" checked="checked" >
                                                    <label for="Heamatology">Haematology</label> 

                                                   <div>
                                                      <input type ="radio" id = "Biochemistry" name="Department" value="Biochemistry" id="Biochemistry">
                                                      <label for="Biochemistry">Biochemistry</label> 
                                                   </div>              
 <!-- idhr -->
                                            </div>
                                            <div class="col-md-2">
                                                          
                                                    <label for="Parameter">Parameter</label>
                                                    <select name="Parameter" id="Parameter" class="form-control form-select">
                                                    </select>
                                            </div>

                                            <div class="col-md-1">
                                                    <label for="Datapoints">Data Points</label>      
                                                    <input type="number" name="Datapoints" class="form-control" value="100" > 
                                            </div>              
                                                    
                                            <div class="col-md-1">
                                                    <p>Smoothing</p>

                                                    <div>
                                                    <label for="Smoothing">0.89</label> 
                                                    <input type ="radio" name ="smoothing" value="0.89" checked="checked" >
                                                    </div>

                                                    <div>
                                                    <label for="Smoothing">0.91</label> 
                                                    <input type ="radio" name ="smoothing" value="0.91">
                                                    </div>

                                                    <div>
                                                    <label for="Smoothing">0.93</label> 
                                                    <input type ="radio" name ="smoothing" value="0.93">
                                                    </div>


                                                             
                                            </div>

                                                  <div class="col-md-1">
                                                     <p class="text-white">S</p>
                                                    <div>
                                                    <input type ="radio" name="smoothing" value="0.95">
                                                    <label for="Smoothing">0.95</label> 
                                                    </div>
                                                    
                                                    <div>
                                                    <input type ="radio" name ="smoothing" value="0.97">
                                                    <label for="Smoothing">0.97</label> 
                                                    </div>

                                                    <div>
                                                    <input type ="radio" name ="smoothing" value="0.99">
                                                    <label for="Smoothing">0.99</label> 
                                                    </div>   
                                                  
                                                  </div >
                                                      <div class="col-md-5"> 
                                                        <p class="text-white">S</p>
                                                    <button class="btn-lg btn-primary">  <i class="fas fa-undo"></i>Exit</button>
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
<script src="{{ asset('plugins/dataTables.fixedHeader.min.js') }}" type="text/javascript"></script>


<script type="text/javascript">
$(document).ready(function() {
  var from;
  var to;
  var patname;

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            
        }
    });
    
    $(document).ready(function() {
    $("input[name='Department']").change(function() {
       var Dept=$(this).val()
       $.ajax({
                        type: "Get",
                        url: "{{ route( 'viewrunningdata') }}",
                        data: {
                                Dept:Dept
                        },
                        dataType: 'json',  
                        contentType: false,
       
                        success: function(data) {

                          if (Dept=='Heamatology') {
                            var select = document.getElementById("Parameter");
                          var options=data;
                          $('#Parameter').empty()
                          for(var i = 0; i < options.length; i++) {
                             var opt = data[i].AnalyteName;
                             var el = document.createElement("option");
                             el.textContent = opt;
                             el.value = opt;
                             select.appendChild(el);
                            }
                          }
                          if(Dept=='Biochemistry'){
                          var select = document.getElementById("Parameter");
                          var options=data;
                          $('#Parameter').empty()
                          for(var i = 0; i < options.length; i++) {
                             var opt = data[i];
                             var el = document.createElement("option");
                             el.textContent = opt;
                             el.value = opt;
                             select.appendChild(el);
                            }
                          }
                          
                           
                            }

                        });

    });
});
    
  });


</script>
@endpush
