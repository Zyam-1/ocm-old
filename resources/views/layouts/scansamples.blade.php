<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ \App\Http\Controllers\business::businessinfo()[0]->name }}</title>
  
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/' . \App\Http\Controllers\business::businessinfo()[0]->file) }}"/>

  <!-- Google Font: Source Sans Pro -->

 

  
  <!-- Font Awesome Icons -->
  <link href="{{ asset('plugins/fontawesome-free/css/all.min.css?1112') }}" rel="stylesheet" >

  
  <!-- IonIcons -->
  <link href="{{ asset('plugins/ionicons.min.css') }}" rel="stylesheet" >
  
  <!-- Theme style -->
  <link href="{{ asset('dist/css/adminlte.css?1114') }}" rel="stylesheet" >
  <link href="{{ asset('css/icons.css?1112') }}" rel="stylesheet">
  <link href="{{ asset('plugins/notifications/css/lobibox.min.css?1112') }}" rel="stylesheet"/>
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css?1112') }}">
  
  <!-- DataTables -->
  <link href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css?1112') }}" rel="stylesheet" >
  <link href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css?1112') }}" rel="stylesheet" >
  <link href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css?1112') }}" rel="stylesheet" >

  <!-- Select2 -->
  <link href="{{ asset('plugins/select2/css/select2.min.css?1112') }}" rel="stylesheet" >
  <link href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css?1112') }}" rel="stylesheet" >

  <!-- fancyfileuploader -->
  <link rel="stylesheet" href="{{ asset('plugins/fancy-file-uploader/fancy_fileupload.css?1112') }}" />

  <!-- daterange picker -->
  <link href="{{ asset('plugins/daterangepicker/daterangepicker.css?1112') }}" rel="stylesheet" >

  <!-- Tempusdominus Bootstrap 4 -->
  <link href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css?1112') }}" rel="stylesheet" >

  <!-- Bootstrap4 Duallistbox -->
  <link href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css?1112') }}" rel="stylesheet" >
  
  <!-- BS Stepper -->
  <link href="{{ asset('plugins/bs-stepper/css/bs-stepper.min.css?1112') }}" rel="stylesheet" >

  <link href="{{ asset('css/custom.css?1128') }}" rel="stylesheet"/>

<?php 
    // $font = Auth::user()->font;
    // $font_weight = Auth::user()->font_weight;

    $font = Auth::user()->font;
    $font_weight = Auth::user()->font_weight;
    $font_link= Auth::user()->font_link;
?>
<style type="text/css">
      
      :root {
       --main-color:#{{Auth::user()->colorscheme}}; 
       --main-font:{{$font}};
       --main-font_weight:{{$font_weight}}; 
       --main-font_link:{{$font_link}}; 
      }

      body {

        src:url(/ocm/public/Nunito/static/Nunito-Medium.ttf);
        font-family: var(--main-font);
        font-weight: var(--main-font_weight) !important;
  
      }


/* cyrillic-ext */
@font-face {
  font-family: <?php echo Auth::user()->font;?>;
  font-style: normal;
  font-weight: <?php echo Auth::user()->font_weight;?>;
  font-display: swap;
  src: url(<?php echo Auth::user()->font_link;?>) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family:  <?php echo Auth::user()->font;?>;
  font-style: normal;
  font-weight: <?php echo Auth::user()->font_weight;?>;
  font-display: swap;
  src: url(<?php echo Auth::user()->font_link;?>) format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family:<?php echo Auth::user()->font;?>;
  font-style: normal;
  font-weight: <?php echo Auth::user()->font_weight;?>;
  font-display: swap;
  src: url(<?php echo Auth::user()->font_link;?>) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family:  <?php echo Auth::user()->font;?>;
  font-style: normal;
  font-weight: <?php echo Auth::user()->font_weight;?>;
  font-display: swap;
  src: url(<?php echo Auth::user()->font_link;?>) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: <?php echo Auth::user()->font;?>;
  font-style: normal;
  font-weight: <?php echo Auth::user()->font_weight;?>;
  font-display: swap;
  src: url(<?php echo Auth::user()->font_link;?>) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}



.dropdown-menu {
    overflow-y: scroll;
    max-height: 350px;
    background-color: #fff;
    margin: 0 0 10px 0;
}
.dropdown-menu::-webkit-scrollbar {
    width:5px;
}
.dropdown-menu::-webkit-scrollbar-track {
    -webkit-box-shadow:inset 0 0 6px rgba(0,0,0,1); 
    border-radius:5px;
}
.dropdown-menu::-webkit-scrollbar-thumb {
    border-radius:5px;
    -webkit-box-shadow: inset 0 0 6px black; 
}

@media (min-width: 768px) {
body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
    transition: margin-left 0.3s ease-in-out;
    margin-left: 0px !important;
}
}
.card-body {
    height:80vh;
}
</style>
<script type="text/javascript">
  var main_color = '#'+'{{Auth::user()->colorscheme}}';
</script>


</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="bg-light p-3">

<div class="wrapper ">
   
  <!-- /.row -->
</div>
<!-- /.content-wrapper -->
<h1>Scan Samples</h1>
@include('layouts.scansampletemplate')


</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/charts.js') }}"></script>
<script type="text/javascript">

 
  let text = $('.content-header .m-0').html();
  if(text != undefined) {
  let position = text.search("href=");
  if(position > -1) {

    $('#pageTitle').html(text).css('position','relative').css('top','-4px');
    
  } else {

    $('#pageTitle').html(text);
  } 
}



</script>


<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('dist/js/adminlte.js?2') }}"></script>
<!-- Sweet Alerts -->
<script src="{{ asset('plugins/sweetalert.min.js') }}" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('plugins/date.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/inputplaceholder.js') }}"></script>

<!-- toastr notifications / alerts --> 
<script src="{{ asset('plugins/notifications/js/notifications.min.js') }}"></script>
<script src="{{ asset('plugins/notifications/js/notification-custom-script.js') }}"></script> 

<!-- InputMask -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>

<!-- date-range-picker -->
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Bootstrap Switch -->
<script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>

<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.js') }}"></script>
<script type="text/javascript">
  $(function () {
  bsCustomFileInput.init();
  });

</script>

<script>

  function DateFormat(value){

     $.ajax({
        type: 'get',
        url:"{{ route( 'DateJS') }}/"+value,              
        success: function(response){ 

                 $('#patdob').text(response);
                  $('#patDoB').text(response);
            }
        });
   }




  document.body.style.zoom = "{{Auth::user()->resolution}}%";

  function setPageHeight() {

  var wrapper = $(".wrapper").height();
  var footer = $(".main-footer").height();
  
  var resolution = 100-{{Auth::user()->resolution}};

    if(resolution > 0) {

       var height = wrapper*resolution/100+wrapper-footer;
      $('.content-wrapper').attr('style','min-height:'+height+'px !important')

    }

    // alert(wrapper)
    // alert(footer)
    // alert(resolution)

  }

  setPageHeight();



</script>

 @stack('script')
</body>
</html>