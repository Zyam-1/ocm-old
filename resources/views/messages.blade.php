@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Messages </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Messages </li>
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
                           <form id="form">

                                <div class="card-body row">                  
                                        
                                                
                                                 <div class="col-md-3 mt-2 Daterange">
                                                 <label class="d-block">Date From / To <span>*</span></label>                    
                                                <input type="date" placeholder="" class="form-control" style="width:49%;display: inline-block;" id="date1" name="date1" value="{{$data['date1']}}">
                                                <input type="date" placeholder="" class="form-control" style="width:49%;display: inline-block;" id="date2" name="date2" value="{{$data['date2']}}">
                                                 </div>



                                                <div class="col-md-2  mt-2 Users" >
                                                <label>Sender</label>
                                                <select class="form-control" name="sender" id="sender">
                                                    <!-- <option value="">All</option> -->
                                                     @foreach ($data['Receivers'] as $Sender)
                                                      <option value="{{$Sender->id}}">{{$Sender->name}}</option>
                                                     @endforeach
                                                </select>
                                                </div>


                                                <div class="col-md-2  mt-2 Users" >
                                                <label>Receiver</label>
                                                <select class="form-control" name="receiver" id="receiver">
                                                    <option value="">All</option>
                                                     @foreach ($data['Receivers'] as $Receiver)
                                                      <option value="{{$Receiver->id}}">{{$Receiver->name}}</option>
                                                     @endforeach
                                                </select>
                                                </div>

                                                <div class="col-md-2  mt-2" >
                                                <label>Subject</label>
                                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                                </div>


                                                <div class="col-md-1  mt-2" >
                                                <label>SampleID</label>
                                                <input type="text" class="form-control" name="sampleid" id="sampleid" placeholder="Sample ID">
                                                </div>


                                 
                                               
                                                <div class="col-md-2 mt-2">
                                                <label>Status</label>
                                                <select class="form-control" name="status" id="status">
                                                    <option value="">All</option>
                                                    <option>Read</option>
                                                    <option>Unread</option>
                                                    
                                                </select>
                                                </div>

                             

                                        <div class="col-md-12 text-right">
                                            <button type="button" style="padding: 4px;" class="btn btn-primary mt-2 float-right showMessages"><i class="fas fa-search"></i> Show Messages</button>
                                        </div>         
                            </div>
                           </form>  
                        </div> 

            
                         <div class="card card-primary card-outline">
                            <div class="card-body table-responsive">                  
                                <table id="table" class="table mb-0 table-striped">
                                  
                                  <thead>
                                    <tr>
                            
                                      <th>ID</th>
                                      <th>Sender</th>
                                      <th>Receiver</th>
                                      <th>Subject</th>
                                      <th>Message</th>
                                      <th>Request</th>
                                      <th>Sample</th>
                                      <th>Status</th>
                                      <th>Date Time</th>
                                      <th>Read at</th>
                                      <th></th>
                                   
                                    </tr>
                                  </thead> 


                                </table>                 
                            </div>
                        </div> 
     

                             <!-- Modal -->
                <div class="modal fade" id="messagebox" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-md  modal-dialog-centered">
                        <div class="modal-content">
                           <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white"><span id="subjectText"></span></h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                    Message
                                    <div id="messageText"></div>

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


<script type="text/javascript">
    $(document).ready(function () {


        $( "#sender" ).select2();
        $( "#receiver" ).select2();
        $( "#status" ).select2();


  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$(document).on('click', '.showMessages', function (event) { 


  var from_date = $('#date1').val();
  var to_date = $('#date2').val();
  var sender = $('#sender').val();
  var receiver = $('#receiver').val();
  var subject = $('#subject').val();
  var sampleid = $('#sampleid').val();
  var status = $('#status').val();



   $('#table').DataTable().destroy();
  
   load_data(from_date, to_date, sender, receiver, subject, sampleid, status);
  
        });
 
 
 load_data();



function load_data(from_date = '', to_date = '', sender = '', receiver = '', subject = '', sampleid = '', status = '')
 {


 var table = $('#table').DataTable({

         "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
        dom: 'lBfrtip', //"Bfrtip",


        processing: true,
        serverSide: true,
        // stateSave: true,
        ajax: {
            url: "{{ route('Messages') }}",
             data: {
                from_date:from_date, 
                to_date:to_date, 
                sender:sender, 
                receiver:receiver, 
                subject:subject,
                sampleid:sampleid,
                status:status
            },
            method: 'POST'
        },
         columns: [
            {data: 'id', name: 'id'},
            {data: 'assignedfrom', name: 'assignedfrom'},
            {data: 'assignedto', name: 'assignedto'},
            {data: 'subject', name: 'subject'},
            {data: 'message', name: 'message'},
            {data: 'request', name: 'request'},
            {data: 'sampleid', name: 'sampleid'},
            {data: 'status', name: 'status'},

            {data: 'datetime',
                    render: function (data, type, row) {
                      return moment(new Date(data).toString()).format('DD-MM-YYYY HH:mm');
                    }
                  },
            {data: 'datetimeread',
                render: function (data, type, row) {
                  return moment(new Date(data).toString()).format('DD-MM-YYYY HH:mm');
                }
              },
      
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "order":[[8, 'desc']],

         dom: "Blfrtip",
                buttons: [
                
                    {
                        title:'TestProfiles',
                        text: 'Excel',
                        footer: true,
                        extend: 'excelHtml5',
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    },
                    {
                    title:'TestProfiles', 
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
                        title:'TestProfiles',
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
                { "visible": false, "targets": [0,4,5] }
                ], 

                 "createdRow": function( row, data, dataIndex ) {

          
                    $(row).children(':nth-child(3)').addClass('ShowMessage').css('cursor','pointer').attr('title','View Message');

                }


    });

   $('#table tbody').on('click', '.ShowMessage', function () {
                       var data = table.row($(this).closest('tr')).data();

                        $('#messagebox').modal('show');
                        $('#subjectText').text(data[Object.keys(data)[2]]);
                        $('#messageText').text(data[Object.keys(data)[3]]);
                 });



 table.on('click', '.addRequest', function() {

                $tr = $(this).closest('tr');
                if($($tr).hasClass('child')) {
                    $tr = $tr.prev('parent');
                }

                var data = table.row($tr).data();
                var tr_id = '#'+table.row($tr).data().id;
                
                swal({
                  title: "Are you sure you want to add a new episode ?",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {

                    window.location = './Requests/requestPatient/'+data.id;
 

                   } 
                });

            });

            
}

});
 

</script>
@endpush
