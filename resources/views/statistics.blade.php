@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Statistics </h1>
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

                 
                        
            
                        
                       

                            <div class="card card-primary card-outline">
                            <div class="card-body">                  
                              

                                  <form id="form">
                                            {{ csrf_field() }}

                                          <div class="row">

                                            
                                                <div class="col-md-4">
                                                  <p><b>Between Dates</b></p>
                                                  <div class="col-sm-4">
                                                  <input type="date" class="form-control" id="fromdate" name="fromdate" value="" />
                                                  <input type="date" class="form-control" id="todate" name="todate" value="" />                                        
                                                  </div>
                                                  
                                           
                                                   

                                               </div>

                                                <div class="col-md-1">
                                                 <p><b>Discipline</b></p>
                                                 <input type="radio" name="Discipline" value ="Bio">
                                                 <label for="Discipline">Biochemistry</label><br>
                                                 <input type="radio" name="Discipline" value ="Coag">
                                                 <label for="Discipline">Coagulation</label><br>
                                                 <input type="radio" name="Discipline" value ="Haem">
                                                 <label for="Discipline">Haematology</label>
                                               </div>

                                                <div class="col-md-2">
                                                  <p class="text-white">S</p>
                                                 <input type="radio" name="Discipline" value ="End">
                                                 <label for="Discipline">Endocrinology</label><br>
                                                 <input type="radio" name="Discipline" value ="Imm">
                                                 <label for="Discipline">Immunology</label><br>
                                                 <input type="radio" name="Discipline" value ="Ext">
                                                 <label for="Discipline">External</label>
                                               </div>

                                               <div class="col-md-2">
                                                 <p><b>Criteria</b></p>
                                                 <input type="radio" name="Criteria" value ="GP">
                                                 <label for="Criteria">GP</label><br>
                                                 <input type="radio" name="Criteria" value ="Clinician">
                                                 <label for="Criteria">Clinician</label><br>
                                                 <input type="radio" name="Criteria" value ="Ward">
                                                 <label for="Criteria">Ward</label>
                                               </div>

                                               <div class="col-md-2">
                                                 <p><b>Hospital</b></p>
                                                 <input type="radio" name="Hospital" value="Cavan">
                                                 <label for="Hospital">Cavan</label><br>
                                                 
                                               </div>


                                          </div>
                                          <div class="ml-2">
                                          <button type="button" class="btn btn-primary Start">Start</button>
                                                  </div> 
                                          </div>
                                         
                                          <div class="col-md-12 table-responsive">
                                                    <table class="table table-striped" id='table2'>
                                                      <thead>
                                                        <tr id="tableth">
                                                        
                                                        </tr>
                                                      </thead> 
                                                      <tbody id="tabletbody">
                                                        
                                                      </tbody>
                                                     </table>
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

$(document).ready(function () {

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

    var from;
    var to;
    var Discipline;
    var Criteria;
    var shortnameArr=[0];

    var tableth = document.getElementById('tableth');
    var tabletbody = document.getElementById('tabletbody');
  $(document).on('click', '.Start', function (event) { 

 from= $("#fromdate").val();
 to = $("#todate").val();
 Discipline = $("input[name='Discipline']:checked").val()
 Criteria = $("input[name='Criteria']:checked").val()


load_data(from , to , Discipline, Criteria);
console.log(shortnameArr)
event.preventDefault();

});



function load_data(from = '', to = '', Discipline = '', Criteria = '') {

var table;
var cj=0;
$.ajax({
  type: 'get',
  url: "{{ route('StatisticsData') }}",
  data: {
    from: from,
    to: to,
    Discipline: Discipline,
    Criteria: Criteria
  },
  success: function(response) {
    $("#tableth").empty();
    $("#tabletbody").empty();

    if (response.aldpt && response.aldpt.length > 0) {
      tableth.innerHTML += "<th>"+Criteria+"</th>"
      for (let i = 0; i < response.aldpt.length; i++) {
        tableth.innerHTML += "<th>"+response.aldpt[i]['shortname']+"</th>";
      }
      alert(response.aldpt.length)
      for (let k = 0; k < response.criterianame.length; k++) {
        let row = "<tr><th>" + response.criterianame[k][Criteria] + "</th>";
        for (let j = (k)*response.aldpt.length; j < (k+1)*response.aldpt.length; j++) {
          
            row += "<td>" + response.totals[j] + "</td>";
        }
        row += "</tr>";
        tabletbody.innerHTML += row;
      }

    }

    $('#table2').DataTable({

    "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
    dom: 'lBfrtip', //"Bfrtip",
    });
  },
});


}



$(document).on('click', '.getsid', function() {
  var id;
  id=$(this).attr('id');
  // $('#'+id).removeClass('btn-secondary').addClass('btn-primary');

event.preventDefault();
});
});
</script>
@endpush
