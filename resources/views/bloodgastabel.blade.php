





@include('layouts.header')

    <!-- Select2 -->
    <link href="{{ asset('plugins/select2/css/select2.min.css?1112') }}" rel="stylesheet" >
  <link href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css?1112') }}" rel="stylesheet" >
<style >
  .mytable{
    overflow-x: scroll;
  }
</style>
  <body>
    
 
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Blood Gas List
               
               <a class="btn btn-info btn-sm" href="/ocm/BloodGas"><i class="fas fa-arrow-left"></i> Go Back </a>
             </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Clients</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


     <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

                  <form id="form" method="get">
                                       {{ csrf_field() }}
                                      
         
                         <div class="card card-primary card-outline">
                            <div class="card-body ">  
<div class="row">
  <div class="col-md-12 mytable">
    <table class="table table-striped table1">
      <thead>
        <tr>
          <th>PH</th>
          <th>PCO2</th>
          <th>PO2</th>
          <th>HCO3</th>
          <th>BE</th>
          <th>O2SAT</th>
          <th>TotCO2</th>
          <th>PHLow</th>
          <th>PCO2Low</th>
          <th>PO2Low</th>
          <th>HCO3Low</th>
          <th>BELow</th>
          <th>O2SATLow</th>
          <th>TotCO2Low</th>
          <th>PHHigh</th>
          <th>PCO2High</th>
          <th>PO2High</th>
          <th>HCO3High</th>
          <th>BEHigh</th>
          <th>O2SATHigh</th>
          <th>TotCO2High</th>
            <th>DateTime Amended</th>
          <th>Amended By</th>

          
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
  </div>
</div>

                        
                    </div>

                    
            </div>
            
         
</form>

                    

                    <!-- <input type="hidden"> -->

                    
        <!-- </form> -->
      </div>
    </div>
  </div>
</div>



  </body>
@extends('layouts.footer')

@push('script')


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
   
$(document).ready(function() {


   
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    
var table=$('.table1').DataTable({
 
ajax: {
    
    url: "{{ route('BloodGasTabel') }}",
    
},
 columns: [

    {data: 'pH', name: 'pH'},
    {data: 'PCO2', name: 'PCO2'},
    {data: 'PO2', name: 'PO2'},
   {data: 'HCO3', name: 'HCO3'},
   {data: 'BE', name: 'BE'},
    {data: 'O2SAT', name: 'O2SAT'},
    {data: 'TotCO2', name: 'TotCO2'},
    {data: 'pHLow', name: 'pHLow'},
    {data: 'PCO2Low', name: 'PCO2Low'},
    {data: 'PO2Low', name: 'PO2Low'},
    {data: 'HCO3Low', name: 'HCO3Low'},
    {data: 'BELow', name: 'BELow'},
    {data: 'O2SATLow', name: 'O2SATLow'},
    {data: 'TotCO2Low', name: 'TotCO2Low'},
    {data: 'pHHigh', name: 'pHHigh'},
    {data: 'PCO2High', name: 'PCO2High'},
    {data: 'PO2High', name: 'PO2High'},
    {data: 'HCO3High', name: 'HCO3High'},
    {data: 'BEHigh', name: 'BEHigh'},
    {data: 'O2SATHigh', name: 'O2SATHigh'},
    {data: 'TotCO2High', name: 'TotCO2High'},
    {data: 'DateTimeAmended', name: 'DateTimeAmended'},
    {data: 'AmendedBy', name: 'AmendedBy'},

   
   // {data: 'action', name: 'action', orderable: false, searchable: false},
],
"order":[[21, 'desc']], 

  dom: "Blfrtip",
                buttons: [
                
                    {
                        title:'Users',
                        text: 'Excel',
                        footer: true,
                        extend: 'excelHtml5',
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    },
                    {
                    title:'Users', 
                    text: 'PDF', 
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    footer: true,
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    customize: function (doc) {
                    doc.content[1].table.widths = 
                              Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                          doc.styles.tableBodyEven.alignment = 'center';
                          doc.styles.tableBodyOdd.alignment = 'center'; 
                                
                        }
                    },
                    {
                        text: 'Print',
                        title:'Users',
                        extend: 'print',
                        footer: true,
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    }, 
                    'colvis'   
                ],

                columnDefs: [{
                    orderable: false,
                    targets: -1,
                },
                { "visible": false, "targets": [] }
                ], 

});



     
    




   

});  
    </script>




@endpush



