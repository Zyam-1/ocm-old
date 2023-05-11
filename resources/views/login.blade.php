<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ \App\Http\Controllers\business::businessinfo()[0]->name }}</title>

  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/' . \App\Http\Controllers\business::businessinfo()[0]->file) }}"/>
   
  <!-- Google Font: Source Sans Pro -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('plugins/notifications/css/lobibox.min.css') }}" />
    <!-- Select2 -->
  <link href="{{ asset('plugins/select2/css/select2.min.css?1112') }}" rel="stylesheet" >
  <link href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css?1112') }}" rel="stylesheet" >

<style type="text/css">
      
      :root {
       --main-color:#6c757d; 
       --main-font:inherit;
       --main-font_weight:400; 
       --font-link: url(); 

    
      }

      .login-box, .register-box {
      width: 450px;
      }


      .lobibox-notify.lobibox-notify-success{
          border-color: var(--main-color);
          background-color: var(--main-color);
          color: #FFF;
      }

  .card-header {
     background-color: transparent;
     border-bottom: 0px solid rgba(0,0,0,.125);
     padding: 20px; 
     position: relative; 
     border-top-left-radius: 0; 
     border-top-right-radius: 0; 
}

.card-body {
    padding-top: 0;
}
.select2-container .select2-selection--single {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    height: auto;
    user-select: none;
    -webkit-user-select: none;
}
.select2-container--default .select2-selection--single .select2-selection__arrow b {
    border-color: #888 transparent transparent transparent;
    border-style: solid;
    border-width: 5px 4px 0 4px;
    height: 0;
    left: 50%;
    margin-left: -4px;
    margin-top: -2px;
    position: absolute;
    top: 20px;
    width: 0;
}
.select2-container .select2-selection--single .select2-selection__rendered {
    display: block;
    padding-left: 0px;
    padding-right: 20px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* cyrillic-ext */
@font-face {
  font-family: Montserrat;
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: var(--font-link) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: Montserrat;
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: var(--font-link) format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family:Montserrat;
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: var(--font-link) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family:  Montserrat;
  font-style: normal;
  font-weight:400;
  font-display: swap;
  src: var(--font-link) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: Montserrat;
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: var(--font-link) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}



  </style>

</head>
<body class="hold-transition login-page">


<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-secondary">
    <div class="card-header text-center px-5 pb-2">
      <img id="logo" style="filter: grayscale(100%);" src="{{ asset('images/' . \App\Http\Controllers\business::businessinfo()[0]->file) }}" alt="{{ config('app.name') }}" class="mx-auto w-50 d-block brand-image" style="opacity:1">
      <a href="{{ route('login') }}" class="h1"><b>{{ config('app.name') }}</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form id="form" autocomplete="off">

        <div class="hidden">
        <input type="" />
      </div>

      <style type="text/css">
        .hidden {display:none;}
      </style>
            {{ csrf_field() }}
        <div class="input-group mb-3">
           <select class="form-control" name="email" id="email">
              <option value="" disabled selected>Enter your email *</option>
              @foreach ($data as $user)
              <option value="{{$user->email}}">{{$user->email}}</option>    
               @endforeach
              </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="password"  placeholder="Password" autocomplete="off" readonly 
    onfocus="this.removeAttribute('readonly');" style="color:rgba(0,0,0,0.1);" >
          <input type="hidden" id="userPassword" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="button" class="btn btn-secondary btn-block" id="submit">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a class="text-secondary forgotPassword" href="{{ route('forgotPassword') }}">I forgot my password</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
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


<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/select2.js') }}"></script>


    <script>
    
 $(document).ready(function () {


   $('#email').select2({
      minimumInputLength:3
   });

  $(document).on('select2:select', '#email', function () { 

      
      loadInfo()
      $('#password').focus();

      })

    $(document).on('select2:open', '#email', function () { 

                    $(".select2-search__field")[0].focus();
               })





  $("#password").keyup(function(e) {
    // var password = $("#password").val();

   
            
  var password = $("#password").val();
  
          console.log(password);
            var digits = password.toString().split('');
            var realDigits = digits.map(String)
            
             // for (var i = 0, len = password.length; i < len; i += 1) {
                // console.log(realDigits);
             $("#password").val('');
             $( realDigits ).each(function( index ) {
                //console.log( "*" );
                $("#password").val($("#password").val()+"*");
              });


              //alert(e.key)
              //$("#password").attr('type','password')
              if(e.key != 'Enter' && e.key != 'Backspace') {
if(e.key!='Shift'){
                $('#userPassword').val($('#userPassword').val()+e.key) 
}
              }

              if(e.key == 'Backspace') {

                  $('#password').val('' );
                  $('#userPassword').val('' );
              }

               
              
        });
 

   function loadInfo() { 


        let email = $('#email').val();
        // let position = email.search("@");

        // if(position <= 0) {

        //   return false;
        // }

        $.ajax({
          type: 'get',
          url:"{{ route( 'getUserTheme') }}",
          data: {'email' : email},
          dataType: 'json',                   
          success: function(response){
            // console.log(response.data[0].font_link);

            // font_family=response.data[0].font;

              if ($.isEmptyObject(response.error)){
                       
                       console.log(response);

                       
                       $("body").get(0).style.setProperty("--main-color",'#'+response.data[0].colorscheme);

                       $("#submit").css('background','#'+response.data[0].colorscheme);
                       $("#submit").css('border-color','#'+response.data[0].colorscheme);
                       $(".forgotPassword").attr('style','color:#'+response.data[0].colorscheme+' !important;');
                       $('.card-outline').attr('style','border-top:3px solid #'+response.data[0].colorscheme+' !important;');
                      //  // $('body').css('font-weight',response.data[0].font_weight);
                      //  // $('body').css('font-family',response.data[0].font);
                      //  // $('body').css('font-weight',response.data[0].font_weight);
                      //  // $('body').css('font-family',response.data[0].font);
                       $("body").get(0).style.setProperty("--main-color", '#'+response.data[0].colorscheme+' !important;');
                       // $('#currentLink').attr('href',response.data[0].font_link);
                       // alert('url('+response.data[0].font_link+')'+'!important');
                    
                       // $("body").get(0).style.setProperty("--font-link", 'url('+response.data[0].font_link+')');
                  

                      $('#logo').attr('style', '');    
                         
                    }

           }
         })  


 }

   $(document).on('click', '#password', function () { 

          loadInfo();

   })
   var wage = document.getElementById("password");
//  console,log
// $("#password").keypress(function(e){

wage.addEventListener("keydown", function (e) {
 
   //checks whether the pressed key is "Enter"

    if (e.code === "Enter") { 
  //stop submit the form, we will post it manually.
login();
    }


    
});


$("#submit").click(function (event) {

        
login();
   
});




function login(){
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
    url: "login",
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
                        icon: 'bx bx-check-circle',
                        delay:1000000
                    });

                 if(data.new == 1) {

                  window.location.replace("{{route('MyProfile')}}");

                 } else {

                  
                   window.location.replace("{{route('ocmnet')}}");
                
                 }
                 
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
}



});

window.localStorage.setItem('openOnePage', Date.now());
 var onLocalStorageEvent = function(e){
    
   if(e.key == "openOnePage"){
  
        window.localStorage.setItem('pageAlreadyOpen', Date.now());
        }
        
        if(e.key == "pageAlreadyOpen"){
        
            window.location.href="https://www.google.com";
        
            return false;
          
        }
    
    };     
        window.addEventListener('storage', onLocalStorageEvent, false);

    </script>


</body>
</html>
