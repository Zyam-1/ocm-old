<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('plugins/googlefont2.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('plugins/notifications/css/lobibox.min.css') }}" />
</head>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ route('forgotPassword') }}" class="h1"><b>{{ config('app.name') }}</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      <form id="form">
               {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="button" class="btn btn-primary btn-block" id="submit">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="{{ route('login') }}">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<!-- toastr notifications / alerts --> 
<script src="{{ ('plugins/notifications/js/notifications.min.js') }}"></script>
<script src="{{ ('plugins/notifications/js/notification-custom-script.js') }}"></script> 

    <script>
    
 $(document).ready(function () {
$("#submit").click(function (event) {


        //stop submit the form, we will post it manually.
        event.preventDefault();

        // Get form
        var form = $('#form')[0];

        // Create an FormData object
        var data = new FormData(form);

        //$("#login").prop("disabled", true);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "forgotPassword",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function(data) {
                    if ($.isEmptyObject(data.error)){
                         Lobibox.notify('success', {
                                pauseDelayOnHover: true,
                                continueDelayOnInactiveTab: false,
                                position: 'top right',
                                msg: data.success,
                                icon: 'bx bx-check-circle'
                            });
                    } else {
                         Lobibox.notify('warning', {
                                pauseDelayOnHover: true,
                                continueDelayOnInactiveTab: false,
                                position: 'top right',
                                msg: data.error,
                                icon: 'bx bx-info-circle'
                            });
                    }
                }

        
        });

        });
});


    </script>


</body>
</html>
