
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="{{asset('plugins/bootstrap5.min.css')}}" rel="stylesheet">

  

 

    <title>OCM/NetAcquire</title>
    <style>
        html,
        body {
        height: 100%;
        }
    </style>
  </head>
  <body>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper h-100 d-flex align-items-center justify-content-center">
      <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="d-flex justify-content-center">
                    <img class="img-fluid" src="{{asset('dist/img/logo.png')}}" alt="ocm logo" style="height:200px; width:200px;">
                </div>
                <a href="{{ route('home') }}" class="d-flex justify-content-center btn btn-primary fs-4">OCM</a>
            </div>
            <div class="col-6">
                <div class="d-flex justify-content-center">
                    <img class="img-fluid" src="{{asset('dist/img/netacquire.jpg')}}" alt="ocm logo" style="height:200px; width:250px;">
                </div>
                <a href="{{ route('Dashboardnet') }}" class="d-flex justify-content-center btn btn-success fs-4">LIMS</a>
            </div>
        </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>


  <script src="{{asset('plugins/bootstrap5.min.js')}}"></script>


  </body>
</html>