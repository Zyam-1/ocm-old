  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://customsoftware.ie">Custom Software Ltd</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">

    <a href="{{ route('home') }}">
      <img src="{{ asset('images/' . \App\Http\Controllers\business::businessinfo()[0]->file) }}" alt="{{ config('app.name') }}"  style="opacity:1;width: 32px;position: relative;top: -5px;"> &nbsp;
    </a>

      <b style="position: relative;top: -3px;">{{ \App\Http\Controllers\business::businessinfo()[0]->name }}</b>
    </div>
  </footer>
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