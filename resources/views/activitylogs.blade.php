@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Activity Logs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Activity Logs </li>
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
                                      
                                      <th>Username</th>  
                                    <!--   <th>Patient</th>
                                      <th>RquestID</th>
                                      <th>Episode</th>
                                      <th>TestID</th>
                                      <th>SampleID</th> -->
                                      <th>ActionGroup</th>
                                      <th style="width:600px">Action</th>
                                      <th>Datetime</th>
                                      <th>IP</th>
                                      <th>BrowserInfo</th>
                                      <th>Reason</th>
                                      <th>Notes</th>
                                      <th>InfoAdded</th>
                                      <th>Updated</th>
                                      <th>InfoAddedBy</th>
                                      <th>InfoUpdatedBy</th>
                                      <th></th>
                                      
                                   
                                    </tr>
                                  </thead> 


                                   <tfoot>
                                    <tr>
                                      
                                      <th>Username</th>  
                                    <!--   <th>Patient</th>
                                      <th>RquestID</th>
                                      <th>Episode</th>
                                      <th>TestID</th>
                                      <th>SampleID</th> -->
                                      <th>ActionGroup</th>
                                      <th style="width:300px">Action</th>
                                      <th>Datetime</th>
                                      <th>IP</th>
                                      <th>BrowserInfo</th>
                                      <th>Reason</th>
                                      <th>Notes</th>
                                      <th>InfoAdded</th>
                                      <th>Updated</th>
                                      <th>InfoAddedBy</th>
                                      <th>InfoUpdatedBy</th>
                                      <th></th>
                                      
                                   
                                    </tr>
                                  </tfoot> 


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

         "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
        dom: 'lBfrtip', //"Bfrtip",


        processing: true,
        serverSide: true,
        "pageLength": 10,
        ajax: {
            url: "{{ route('activitylogs') }}",
            method: 'POST'
        },
         columns: [

            {data: 'UserName', name: 'a.name'},
            // {data: 'PatientID', name: 'PatientID'},
            // {data: 'RequestID', name: 'RequestID'},
            // {data: 'EpisodeID', name: 'EpisodeID'},
            // {data: 'TestID', name: 'TestID'},
            // {data: 'SampleID', name: 'SampleID'},
            {data: 'ActionType', name: 'ActionType'},
            {data: 'Action', name: 'Action'},
            // {data: 'DateTimeOfRecord', name: 'DateTimeOfRecord'},
             {data: 'DateTimeOfRecord',
                    render: function (data, type, row) {
                      return moment(new Date(data).toString()).format('DD-MM-YYYY HH:mm');
                    }
                  },
            {data: 'IP', name: 'IP'},
            {data: 'BrowserInfo', name: 'BrowserInfo'},
            {data: 'Reason', name: 'Reason'},
            {data: 'Notes', name: 'Notes'},
            {data: 'InfoAddedBy', name: 'InfoAddedBy'},
            {data: 'InfoUpdatedBy', name: 'InfoUpdatedBy'},
            {data: 'InfoDateTime', name: 'InfoDateTime'},
            {data: 'InfoModifiedDateTime', name: 'InfoModifiedDateTime'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "order":[[3, 'desc']],

         dom: "Blfrtip",
                buttons: [
                
                    {
                        title:'Activity Logs',
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
                { "visible": false, "targets": [4,5,6,7,8,9,10,11] }
                ], 

           initComplete: function () {
             
             this.api().columns(0).every(function () {
                var column = this;
                var input = document.createElement("input");
                input.classList.add("form-control");
                input.classList.add("text-center");
                input.classList.add("p-0");
                input.placeholder = "Username";
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });

               this.api().columns(1).every(function () {
                var column = this;
                var input = document.createElement("input");
                input.classList.add("form-control");
                input.classList.add("text-center");
                input.classList.add("p-0");
                input.placeholder = "Action Group";
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });

             this.api().columns(2).every(function () {
                var column = this;
                var input = document.createElement("input");
                input.classList.add("form-control");
                input.classList.add("text-center");
                input.classList.add("p-0");
                input.placeholder = "Action";
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });

             this.api().columns(3).every(function () {
                var column = this;
                var input = document.createElement("input");
                input.classList.add("form-control");
                input.classList.add("text-center");
                input.classList.add("p-0");
                input.placeholder = "Datetime";
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });

              this.api().columns(6).every(function () {
                var column = this;
                var input = document.createElement("input");
                input.classList.add("form-control");
                input.classList.add("text-center");
                input.classList.add("p-0");
                input.placeholder = "Reason";
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });

               this.api().columns(7).every(function () {
                var column = this;
                var input = document.createElement("input");
                input.classList.add("form-control");
                input.classList.add("text-center");
                input.classList.add("p-0");
                input.placeholder = "Notes";
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });
         
             
           $(".delete").remove();       

                    

        }
    });


  table.on('click', '.delete', function() {

        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')) {
            $tr = $tr.prev('parent');
        }

        var data = table.row($tr).data();
        var tr_id = '#'+table.row($tr).data().ActivityID;

        swal({
          title: "Are you sure?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.post("{{ route('Deleteactivitylog') }}",
            {
                id: data.ActivityID 
            });
              $(tr_id).fadeOut(1000);
                $(tr_id).css("background", "#4bca52");
                setTimeout(function() {
                    $(tr_id).css("background", "none");
                    table.ajax.reload( null, false );
                    }, 900);
           } 
        });

 });

    



            


    });

</script>
@endpush
