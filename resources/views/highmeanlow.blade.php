@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
  <div class="row mb-0">
    <div class="col-sm-6">
      <h1 class="m-0">High Mean Low QC</h1>
    </div><!-- /.col -->
    <div class="col-sm-6  d-none d-sm-none d-md-block ">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
        <li class="breadcrumb-item active">High Mean Low QC</li>
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
                                
                                      <div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="row">
                                    <div class="col-md-4 form-check mr-3">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                                        <label class="form-check-label" for="flexCheckIndeterminate">
                                          Serum
                                        </label>
                                      </div>
                                      <div class="col-md-4 form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                                        <label class="form-check-label" for="flexCheckIndeterminate">
                                          Urine
                                        </label>
                                        <div >

                                   
                            
                                        </div>
                                      
                                    </div>
                                    <div class="col-12" style="height: 280px;">
                                      <div class="card" style="height:100%;">
                                        <div class="card-body"></div>
                                      </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-10">
                            
                                        <div class="row">
                                            <div class="col-md-6">
                                                        <label class="d-inline" for="lang">Control</label>
                                                    
                                                    
                                                        <select name="types" id="lang" class="form-control d-inline my-1 w-50">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            </select>
                                                  
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex justify-content-center align-items-center">
                                                        <input type="date" class="form-control w-25" id="accident_date" name="accident_date">
                                                  
                                                    
                                                        <label class="mt-2 mx-2" for="lang2">and Previous</label>
                                                        <input id=demoInput type=number min=100 max=110>
                                                        <button class="ml-1 btn btn-primary" onclick="increment()">+</button>
                                                        <button class="btn btn-danger" onclick="decrement()">-</button>
                                                          <script>
                                                              function increment() {
                                                                  document.getElementById('demoInput').stepUp();
                                                                }
                                                                function decrement() {
                                                                  document.getElementById('demoInput').stepDown();
                                                                }
                                                            </script>
                                                    <label class="mt-2" for="lang2">Days</label>
                                                </div>
                                            </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">

                                    </div>
                                    <div class="col-md-4">
                                        <div class="high">
                                            <label for="t1">High</label>
                                            <input class="form-control " type="text" name="name" id="t1" placeholder="*">
                                        </div>
                                        <div class="mean">
                                            <label for="t2">Mean</label>
                                            <input class="form-control " type="text" name="name" id="t2" placeholder="*">
                                        </div>
                                        <div class="low">
                                            <label for="t3">Low</label>
                                            <input class="form-control " type="text" name="name" id="t3" placeholder="*">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">

                                    </div>
                                    <div class="col-md-4">
                                        <div class="2sd">
                                            <label for="t4">2SD</label>
                                            <input class="form-control " type="text" name="name" id="t4" placeholder="*">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                        <h6>Plot</h6>
                                        <div class="col-md-3 form-check ml-3">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                              All
                                            </label>
                                          </div>
                                          <div class="col-md-3 form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                              Daily Mean
                                            </label>
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                                        <label class="form-check-label" for="flexCheckIndeterminate">
                                          Both
                                        </label>
                                        </div>
                                    </div>
                                
                                </div>
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


<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/4.7.0/css/font-awesome.min.css">
  <title>High Mean Low</title>

  <style>
  </style>
</head>
<body>


  <div class="card">
    <div class="row">
        <div class="col-md-2">
            <div class="row">
            <div class="col-md-4 form-check ml-5">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                <label class="form-check-label" for="flexCheckIndeterminate">
                  Serum
                </label>
              </div>
              <div class="col-md-4 form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                <label class="form-check-label" for="flexCheckIndeterminate">
                  Urine
                </label>
                <div >
    
                </div>
             </div>
        </div>
        </div>
        <div class="col-md-10">
    
                <div class="row">
                    <div class="col-md-6">
                                <label class="mt-4" for="lang">Control</label>
                            
                            
                                <select name="types" id="lang" class="form-control my-2 w-50">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    </select>
                           
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-center align-items-center">
                                <input type="date" class="form-control w-25" id="accident_date" name="accident_date">
                           
                            
                                <label class="mt-2" for="lang2">and Previous</label>
                                <input id=demoInput type=number min=100 max=110>
                                <button onclick="increment()">+</button>
                                <button onclick="decrement()">-</button>
                                   <script>
                                       function increment() {
                                          document.getElementById('demoInput').stepUp();
                                        }
                                        function decrement() {
                                          document.getElementById('demoInput').stepDown();
                                        }
                                    </script>
                            <label class="mt-2" for="lang2">Days</label>
                        </div>
                    </div>
        </div>
        <div class="row">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">
                <div class="high">
                    <label for="t1">High</label>
                    <input class="form-control " type="text" name="name" id="t1" placeholder="*">
                </div>
                <div class="mean">
                    <label for="t2">Mean</label>
                    <input class="form-control " type="text" name="name" id="t2" placeholder="*">
                </div>
                <div class="low">
                    <label for="t3">Low</label>
                    <input class="form-control " type="text" name="name" id="t3" placeholder="*">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">
                <div class="2sd">
                    <label for="t4">2SD</label>
                    <input class="form-control " type="text" name="name" id="t4" placeholder="*">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <h6>Plot</h6>
                <div class="col-md-2 form-check ml-5">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                    <label class="form-check-label" for="flexCheckIndeterminate">
                      All
                    </label>
                  </div>
                  <div class="col-md-2 form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                    <label class="form-check-label" for="flexCheckIndeterminate">
                      Daily Mean
                    </label>
                    
                 </div>
                 <div class="col-md-2">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                <label class="form-check-label" for="flexCheckIndeterminate">
                  Both
                </label>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
{{-- 
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
<script src="{{ asset('plugins/dataTables.fixedHeader.min.js') }}" type="text/javascript"></script> --}}

</body>
</html> -->