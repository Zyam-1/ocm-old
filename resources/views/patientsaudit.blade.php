@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Patients Audit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Patients Audit</li>
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
                            <div class="card-body table-responsive">                  
                                <table id="table" class="table mb-0 table-striped" style="width:100%">
                                  
                                  <thead>
                                    <tr>
                                      
                                       <th>Chart</th>  
                                      <th>PatName</th>
                                      <th>Sex</th>
                                      <th>DoB</th>
                                      <th>Ward</th>
                                      <th>Clinician</th>
                                      <th>Address</th>
                                      <th>Address1</th>
                                      <th>Entity</th>
                                       <th>Episode</th>
                                        <th>RegionalNumber</th> 
                                        <th>DateTimeAmended</th>
                                        <th>NewEntry</th> 
                                        <th>AandE</th>
                                        <th>MRN</th>
                                        <th>AdmitDate</th>
                                        <th>GP</th>
                                        <th>Address2</th>
                                        <th>Address3</th>
                                        <th>eMedRenalFlag</th>
                                        <th>PatSurName</th>
                                        <th>PatForeName</th>
                                        <th>PrivatePatient</th>
                                        <th>PatTitle</th>
                                        <th>AreaCode</th>
                                        <th>PatPhone</th>
                                        <th>InsurancePolicyNumber</th>
                                        <th>InsurancePolicyExpiry</th>
                                        <th>InsurancePlanType</th>
                                        <th>InsuranceCompanyName</th>
                                        <th>MedicalCardNumber</th>
                                        <th>ADTmessage</th>
                                        <th>GP_Practice_Address</th>
                                        <th>GP_Practice_Identifier</th>
                                        <th>GP_Medical_Council_Number</th>
                                        <th>GP_Name</th>
                                        <th>HistoryNumber</th>
                                        <th>Facility</th>
                                        <th>Eircode</th>
                                        <th>County</th>
                                        <th>BedNumber</th>
                                        <th>Consultant</th>
                                        <th>DischargeDate</th>
                                        <th>DischargedTo</th>

                                      
                                  </thead> 
                                      
                                   
                                    </tr>


                                </table>                 
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


<script type="text/javascript">
    $(document).ready(function () {

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


 var table = $('#table').DataTable({

         "lengthMenu": [ [15, 25, 50, 100, 200, 500, -1], [15, 25, 50,100, 200, 500, "All"] ],
        dom: 'lBfrtip', //"Bfrtip",


        processing: true,
        serverSide: true,
        "pageLength": 15,
        ajax: {
            url: "{{ route('PatientAudit') }}",
            method: 'post'
        },
         columns: [

               {data: 'Chart', name: 'Chart'},
            {data: 'PatName', name: 'PatName'},
            {data: 'Sex', name: 'Sex'},
            {data: 'DoB', name: 'DoB'},
            {data: 'Ward', name: 'Ward'},
            {data: 'Clinician', name: 'Clinician'},
            {data: 'Address0', name: 'Address0'},
            {data: 'Address1', name: 'Address1'},
            {data: 'Entity', name: 'Entity'},
            {data: 'Episode', name: 'Episode'},
            {data: 'RegionalNumber', name: 'RegionalNumber'},
            {data: 'DateTimeAmended', name: 'DateTimeAmended'},
            {data: 'NewEntry', name: 'NewEntry'},
            {data: 'AandE', name: 'AandE'},
            {data: 'MRN', name: 'MRN'},
            {data: 'AdmitDate', name: 'AdmitDate'},
            {data: 'GP', name: 'GP'},
            {data: 'Address2', name: 'Address2'},
            {data: 'Address3', name: 'Address3'},
            {data: 'eMedRenalFlag', name: 'eMedRenalFlag'},
            {data: 'PatSurName', name: 'PatSurName'},
            {data: 'PatForeName', name: 'PatForeName'},
            {data: 'PrivatePatient', name: 'PrivatePatient'},
            {data: 'PatTitle', name: 'PatTitle'},
            {data: 'AreaCode', name: 'AreaCode'},
            {data: 'PatPhone', name: 'PatPhone'},
            {data: 'InsurancePolicyNumber', name: 'InsurancePolicyNumber'},
            {data: 'InsurancePolicyExpiry', name: 'InsurancePolicyExpiry'},
            {data: 'InsurancePlanType', name: 'InsurancePlanType'},
            {data: 'InsuranceCompanyName', name: 'InsuranceCompanyName'},
            {data: 'MedicalCardNumber', name: 'MedicalCardNumber'},
            {data: 'ADTmessage', name: 'ADTmessage'},
            {data: 'GP_Practice_Address', name: 'GP_Practice_Address'},
            {data: 'GP_Practice_Identifier', name: 'GP_Practice_Identifier'},
            {data: 'GP_Medical_Council_Number', name: 'GP_Medical_Council_Number'},
            {data: 'GP_Name', name: 'GP_Name'},
            {data: 'HistoryNumber', name: 'HistoryNumber'},
            {data: 'Facility', name: 'Facility'},
            {data: 'Eircode', name: 'Eircode'},
            {data: 'County', name: 'County'},
            {data: 'BedNumber', name: 'BedNumber'},
            {data: 'Consultant', name: 'Consultant'},
            {data: 'DischargeDate', name: 'DischargeDate'},
            {data: 'DischargedTo', name: 'DischargedTo'}
            
        ],
        "order":[[1, 'asc']],

         dom: "Blfrtip",
                buttons: [
                
                    {
                        title:'P',
                        text: 'Excel',
                        footer: true,
                        extend: 'excelHtml5',
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    },
                    {
                        text: 'Print',
                        title:'Activity Logs',
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

           initComplete: function () {
             
             this.api().columns(0).every(function () {
                var column = this;
                var input = document.createElement("input");
                input.classList.add("form-control");
                input.classList.add("text-center");
                input.classList.add("p-0");
                input.placeholder = "Chart";
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });

              

        }
    });



 });

    





</script>
@endpush
