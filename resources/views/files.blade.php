@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Documents
                
                  <a class="btn btn-info btn-sm" href="{{route('File')}}"><i class="fas fa-plus"></i> FILE </a>

         </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Documents </li>
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
                                  <table id="table" class="table mb-0 table-striped">
                                  
                                  <thead>
                                    <tr>
                            
            
                                      <th>File Type</th>
                                      <th>Name</th>
                                      <th>Document</th>
                                      <th>Department</th>
                                      <th>Link</th>
                                      <th>InUse</th>
                                      <th>Created</th>
                                      <th>Updated</th>
                                      <th>Created By</th>
                                      <th>Updated By</th>
                                      <th></th>
                                   
                                    </tr>
                                  </thead> 

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
        ajax: {
            url: "{{ route('Files') }}",
            method: 'POST'
        },
         columns: [

            {data: 'FileExtention', name: 'FileExtention'},
            {data: 'FileName', name: 'FileName'},
            {data: 'FileType', name: 'Lists.FileType'},
            {data: 'FileDepartment', name: 'Lists.FileDepartment'},
            {data: 'FilePath', name: 'FilePath'},
            {data: 'InUse', name: 'InUse'},
            {data: 'CreatedDateTime', name: 'CreatedDateTime'},
            {data: 'ModifiedDateTime', name: 'ModifiedDateTime'},
            {data: 'CreatedBy', name: 'CreatedBy'},
            {data: 'ModifiedBy', name: 'ModifiedBy'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "order":[[1, 'asc']],

         dom: "lfrtip",
            
        columnDefs: [{
                    orderable: false,
                    targets: -1,
                },
                { "visible": false, "targets": [6,7,8,9] }
                ], 

                initComplete: function () {

                           $(".delete").remove();
                             
                            $(".update").remove();
                             
        }

    });



  table.on('click', '.delete', function() {

        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')) {
            $tr = $tr.prev('parent');
        }

        var data = table.row($tr).data()
        var tr_id = '#'+table.row($tr).data().FileID;

        swal({
          title: "Are you sure?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.post("{{ route('deleteFile') }}",
            {
                id: data.FileID 
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

        table.on('click', '.status', function()     {

           $tr = $(this).closest('tr');
            if($($tr).hasClass('child')) {
                $tr = $tr.prev('parent');
            }

            var data = table.row($tr).data();
            var tr_id = table.row($tr).data().FileID; 

             $.post("{{ route('changeStatus') }}",
            {
                id: tr_id, 
                status: this.id,  
            },
             function(data){
                table.ajax.reload( null, false );
            });
             table.ajax.reload( null, false );         
          })      

    });

</script>
@endpush
