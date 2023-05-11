@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Bio/Endo Totals </h1>
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

                                            <div class="">
        <div class="row">
            <div class="col-md-4">
                <h6>Between Dates</h6>
                <div class="row">
                    <div class="col-md-6">
                        <input type="date" class="form-control " id="date2" name="date2">
                    </div>
                    <div class="col-md-6">
                        <input type="date" class="form-control " id="date1" name="date1">
                    </div>
                </div>
                <div class="mt-5 row">
                    <div class="col-md-12">
                      <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="radio" name="Duration" id="Today" value="option1">
                        <label class="form-check-label" for="Today">Today</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="radio" name="Duration" id="LastWeek" value="option2">
                        <label class="form-check-label" for="LastWeek">Last Week</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="radio" name="Duration" id="LastMonth" value="option3" >
                        <label class="form-check-label" for="LastMonth">Last Month</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="radio" name="Duration" id="LastFullMonth" value="option3" >
                        <label class="form-check-label" for="LastFullMonth">Last Full Month</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="radio" name="Duration" id="LastQuarter" value="option3" >
                        <label class="form-check-label" for="LastQuarter">Last Quarter</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="radio" name="Duration" id="LastFullQuarter" value="option3" >
                        <label class="form-check-label" for="LastFullQuarter">Last Full Quarter</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="radio" name="Duration" id="YearToDate" value="option3" >
                        <label class="form-check-label" for="YearToDate">Year To Date</label>
                        </div>
                        <div class="mt-2">
                          <button class="btn btn-danger calculator" type="button">Calculator</button>
                          </div>

                    </div>
                </div>    
            </div>
            <div class="col-md-8">
            <table class="table mt-3" id="table2">
                <thead>
                  <tr>
                    <th></th>
                    <th>Alpha+Beta</th>
                    <th>Endocrinology</th>
                    <th>HbA1c</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      <p type="text" name="totals" id="totals">Totals</p>
                    </th>
                    <td><input class="form-check-input" type="text" disabled name="r1c1" id="r1c1" value="" ></td>
                    <td><input class="form-check-input" type="text" disabled name="r1c2" id="r1c2" value="" ></td>
                    <td><input class="form-check-input" type="text" disabled name="r1c3" id="r1c3" value="" ></td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <p type="text" name="gp" id="gp" >GP</p>
                    </th>
                    <td><input class="form-check-input" type="text" disabled name="r2c1" id="r2c1" value="" ></td>
                    <td><input class="form-check-input" type="text" disabled name="r2c2" id="r2c2" value="" ></td>
                    <td><input class="form-check-input" type="text" disabled name="r2c3" id="r2c3" value="" ></td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <p type="text" name="totalgp" id="totalgp">Total-GP</p>
                    </th>
                    <td><input class="form-check-input" type="text"  disabled name="r3c1" id="r3c1" value="" ></td>
                    <td><input class="form-check-input" type="text" disabled name="r3c2" id="r3c2" value="" ></td>
                    <td><input class="form-check-input" type="text" disabled name="r3c3" id="r3c3" value="" ></td>
                  </tr>
                </tbody>
              </table>
              <div class="row">
      
              <label class="mx-2" for="inp">Labels Used</label>
              <input class="form-control w-25" type="text" id="inp">
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
<script src="{{ asset('plugins/dataTables.fixedHeader.min.js') }}" type="text/javascript"></script>


<script type="text/javascript">

$(document).ready(function() {
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    var from;
    var to;

    $('.calculator').click(function (){
      from = $('#date2').val();
      
      to = $('#date1').val();
      event.preventDefault();

        $.ajax({
            method: 'get',
            url: "{{ route('getBioEndoTotals')}}",
            data: {from : from, to : to},  
           

        }).done(function (response) {
         
          // alert(response.row1col1)
          $('#r1c1').val(response.row1col1)
          $('#r1c2').val(response.row1col2)
          $('#r1c3').val(response.row1col3)
          $('#r2c1').val(response.row2col1)
          $('#r2c2').val(response.row2col2)
          $('#r2c3').val(response.row2col3)
          $('#r3c1').val(response.row3col1)
          $('#r3c2').val(response.row3col2)
          $('#inp').val(response.totallabel)
          
        });
    });

    function getDateSubtractDays(days){
  var d = new Date();
  d.setDate(d.getDate() - days);
  d=d.toJSON().slice(0,10).replace(/-/g,'-')

  return d;
}

function getMonthFromString(mon){
   return new Date(Date.parse(mon +" 1, 2012")).getMonth()+1
}

var ex1 = document.getElementById('Today');
var ex2 = document.getElementById('LastWeek');
var ex3 = document.getElementById('LastMonth');
var ex4 = document.getElementById('LastFullMonth');
var ex5 = document.getElementById('LastQuarter');
var ex6 = document.getElementById('LastFullQuarter');
var ex7 = document.getElementById('YearToDate');

ex1.onclick = handler;
ex2.onclick = handler1;
ex3.onclick = handler2;
ex4.onclick = handler3;
ex5.onclick = handler4;
ex6.onclick = handler5;
ex7.onclick = handler6;
    function handler() {
  var utc = new Date().toJSON().slice(0,10).replace(/-/g,'-');
   
  $('#date1').val(utc);
  $('#date2').val(utc);
}
function handler1() {

  let f1 = getDateSubtractDays(0);
  let f2 = getDateSubtractDays(7);
  // To
  $('#date1').val(f1);
  // // From
  $('#date2').val(f2);
}
function handler2() {

  var d = new Date();
  d.setMonth(d.getMonth()-1);
  d=d.toJSON().slice(0,10).replace(/-/g,'-')
  let f1 = getDateSubtractDays(0);
   // To
  $('#date1').val(f1);
   // From
  $('#date2').val(d);
  
}

function handler3() {
 
  var d = new Date();
  d.setDate(1);
  d.setMonth(d.getMonth()-1);
   
  var d2days = new Date(d.getFullYear(), d.getMonth()+1, 0).getDate();
  var d2 = new Date();
  d2.setDate(d2days);
  d2.setMonth(d.getMonth());
  d2=d2.toJSON().slice(0,10).replace(/-/g,'-')
  
  d=d.toJSON().slice(0,10).replace(/-/g,'-')

  // To
  $('#date1').val(d2);
  // // From
  $('#date2').val(d);
  
}

function handler4() {
  let f1 = getDateSubtractDays(0);
  let f2 = getDateSubtractDays(90);
  // To
  $('#date1').val(f1);
  // // From
  $('#date2').val(f2);
}

function handler5() {
  

  // To
  $('#date1').val();
  // // From
  $('#date2').val();
}

function handler6() {
  let f1 = getDateSubtractDays(0);
  let f2 = getDateSubtractDays(365);
  // To
  $('#date1').val(f1);
  // // From
  $('#date2').val(f2);
}
});

</script>
@endpush

