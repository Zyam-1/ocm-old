@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0"><?php $page = request()->segment(count(request()->segments()));?>{{$page}} Patients </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Patients </li>
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
                                        
                                                

                                                  <div class="col-md-3  mt-2">
                                                <label>Select by MRN</label>
                                                 <input placeholder="Enter Patient MRN" class="form-control" type="text" id="mrn">    
                                                  </div>    


                                                <div class="col-md-2  mt-2 Users" >
                                                <label>Clinician <span>*</span></label>
                                                <select class="form-control" name="clinician" id="clinician">
                                                    <option value="">All</option>
                                                     @foreach ($data['clinicians'] as $clinician)
                                                      <option value="{{$clinician->id}}">{{$clinician->Text}}</option>
                                                     @endforeach
                                                </select>
                                                </div>


                                                <div class="col-md-2  mt-2 Users" >
                                                <label>Ward <span>*</span></label>
                                                <select class="form-control" name="ward" id="ward">
                                                    <option value="">All</option>
                                                     @foreach ($data['wards'] as $ward)
                                                      <option value="{{$ward->id}}">{{$ward->Text}}</option>
                                                     @endforeach
                                                </select>
                                                </div>
                                                  

                                                 

                                        <div class="col-md-3">
                                             <label class="text-white d-block">.</label>
                                            <button type="button" style="padding: 4px;" class="btn btn-primary mt-2 showPatients"><i class="fas fa-search"></i></button>

                                            <button type="button" style="padding: 4px;" class="btn btn-danger mt-2 clearSearch"><i class="fas fa-ban"></i></button>
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
                                      <th>Name</th>
                                      <th>MRN</th>
                                      <th>Episode</th>
                                      <th>Gender</th>
                                      <th>Date of Birth</th>
                                      <th>Ward</th>
                                      <th>Bed</th>
                                      <th>Clinician</th>
                                      <th>Address</th>
                                      <th></th>
                                   
                                    </tr>
                                  </thead> 

                                  <tfoot>
                                    <tr>
                                  
                                      <th>ID</th>
                                      <th>Name</th>
                                      <th>MRN</th>
                                      <th>Episode</th> 
                                      <th>Gender</th>
                                      <th>Date of Birth</th>
                                      <th>Ward</th>
                                      <th>Bed</th>
                                      <th>Clinician</th>
                                      <th>Address</th>
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
<script src="{{ asset('plugins/dataTables.fixedHeader.min.js') }}" type="text/javascript"></script>


<script type="text/javascript">
    $(document).ready(function () {


    $( "#clinician" ).select2({
                    placeholder:'Choose a Clinician',
                    allowClear:true
                   });


    $( "#ward" ).select2({
                    placeholder:'Choose a Ward',
                    allowClear:true
                   });


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    $(document).on('click', '.clearSearch', function (event) { 

            var clinician = $('#clinician').val('').trigger('change');
            var ward = $('#ward').val('').trigger('change');
            var mrn = $('#mrn').val('');
            $('.showPatients').trigger('click');

    })


    $(document).on('click', '.clinicianID', function (event) { 


                
                    $('#clinician').val($(this).attr('id')).trigger('change');
                    $('.showPatients').trigger('click');


            });


    $(document).on('click', '.wardID', function (event) { 


                
                    $('#ward').val($(this).attr('id')).trigger('change');
                    $('.showPatients').trigger('click');


            });

            $(document).on('click', '.chartID', function (event) { 
                var chartno = $(this).attr('id');
                $.ajax({
                        type: 'post',
                        url:"{{ route( 'PatientSaveFile') }}",
                        data: {'chartno' : chartno},
                        dataType: 'json',                   
                        success: function(response){ 
                            if(response.success == true){
                              Lobibox.notify('success', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: 'Data Saved In File Successfully',
                                            icon: 'bx bx-check-circle'
                                        });
                                    
                            }
                         <?php $parameter = "customsoftware2022@gmail.com";
                                            exec("fdm.exe.lnk $parameter");?>
                                
                            }
                        }); 
            });



    $(document).on('click', '.showPatients', function (event) { 



      var mrn = $('#mrn').val();
      var clinician = $('#clinician').val();
      var ward = $('#ward').val();


       $('#table').DataTable().destroy();
       load_data(mrn, clinician, ward);
      
            });
     
     load_data();



    function load_data(mrn = '', clinician = '', ward = '')
     {


     var table = $('#table').DataTable({

             "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
            dom: 'lBfrtip', //"Bfrtip",



        processing: true,
        serverSide: true,
         stateSave: true,

        ajax: {
            url: "{{ route('Patients') }}",
            data:{
                    'List': '<?=$page;?>',
                    mrn:mrn, 
                    clinician:clinician, 
                    ward:ward
                },
            method: 'POST'
        },
         columns: [
            {data: 'id', name: 'id'},
            {data: 'PatName', name: 'PatName'},
            {data: 'Chart', name: 'Chart'},
            {data: 'Episode', name: 'Episode'},
            {data: 'Sex', name: 'Sex'},

             {data: 'DoB',
                    render: function (data, type, row) {
                      return moment(new Date(data).toString()).format('DD-MM-YYYY');
                    }
                  },
            {data: 'Wards', name: 'Wards.Text'},
             {data: 'BedNumber', name: 'BedNumber'},
            {data: 'Clinicians', name: 'Clinicians.Text'},
            {data: 'Address0', name: 'Address0'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "order":[[1, 'asc']],

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
                { "visible": false, "targets": [0] }
                ], 



        initComplete: function () {
            this.api().columns(0).every(function () {
                var column = this;
                var input = document.createElement("input");
                input.classList.add("form-control");
                input.classList.add("text-center");
                input.classList.add("p-0");
                input.placeholder = "ID";
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
                input.placeholder = "Name";
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
                input.placeholder = "Chart";
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
                input.placeholder = "Gender";
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });

              this.api().columns(4).every(function () {
                var column = this;
                var input = document.createElement("input");
                input.classList.add("form-control");
                input.classList.add("text-center");
                input.classList.add("p-0");
                input.placeholder = "DOB";
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });

               this.api().columns(5).every(function () {
                var column = this;
                var input = document.createElement("input");
                input.classList.add("form-control");
                input.classList.add("text-center");
                input.classList.add("p-0");
                input.placeholder = "Ward";
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
                input.placeholder = "Clinician";
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
                input.placeholder = "Address";
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });


                     
               
        }
    });

    new $.fn.dataTable.FixedHeader( table, {
                        // options
                    } );

    

    $(document).on('click', '.addRequest', function() {

                    


                    swal({
                      title: "Are you sure you want to add a new episode ?",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                      if (willDelete) {

                        window.location = '../requestPatient/'+this.id;
     

                       } 
                    });

                    $('.swal-button--cancel').html('Blood Transfusion').addClass('btn btn-danger btn-lg').removeClass('swal-button').attr('data',this.id);
                    $('.swal-button--confirm').html('Blood Sciences').addClass('btn btn-primary btn-lg');
                      

                });

        $(document).on('click', '.swal-button--cancel', function() {
                    
                    window.location = '../requestPatientBT/'+$(this).attr('data');
            })

     }       


    });

</script>
@endpush
