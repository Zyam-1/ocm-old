@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Blood Transfusion Products </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active"> Blood Transfusion Products </li>
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
                        
                        <div class="col-md-4">    
                        <div class="card card-primary card-outline">
                            <div class="card-body">                  
                                <h5>Product  Info</h5>   

                                  <form id="form">
                                            {{ csrf_field() }}
                                            <div class="row">
                                            
                                            <div class="col-md-12">
                                            <label  class="col-form-label">Name <span>*</span></label>
                                                 <input type="text" class="form-control" id="name" name="name" value="" />
                                                 <input type="hidden" class="form-control" id="id" name="id" value="" />
                                             </div>
                                              <div class="col-md-12">
                                            <label  class="col-form-label">Barcode</label>
                                                 <input type="text" class="form-control" id="barcode" name="barcode" value="" />
                                             </div>
                                              <div class="col-md-12">
                                            <label  class="col-form-label">Generic<span>*</span></label>
                                                 <input type="text" class="form-control" id="generic" name="generic" value="" />
                                             </div>
                                               <div class="col-md-12">
                                            <label  class="col-form-label">Batch</label>
                                                 <input type="text" class="form-control" id="batch" name="batch" value="" />
                                             </div>

                                            
                                            <div class="col-md-12 pt-2">
                                            <label  class="col-form-label">Expiry</label>
                                              <div class="input-group mb-2">
                                                
                                                <select class="form-control"  id="dppType" name="dppType">
                                                  <option>Hours</option>
                                                  <option>Days</option>
                                                  <option>Months</option>
                                                </select>
                                               <input type="number" class="form-control" id="dpp" name="dpp" value="" />
                                                </div>

                                             </div>



                                             <div class="col-md-12 pt-2">
                                                <label  class="col-form-label">In Use <span>*</span></label>
                                            
                                            <div class="row px-2">
                                              
                                             <div class="custom-control custom-radio">
                                              <input class="custom-control-input" type="radio" id="inuse1" name="inuse" value="1" checked>
                                              <label for="inuse1" class="custom-control-label">Yes</label>
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div class="custom-control custom-radio">
                                              <input class="custom-control-input" type="radio" id="inuse2" name="inuse" value="0">
                                              <label for="inuse2" class="custom-control-label">No</label>
                                            </div>

                                            </div>

                                             </div>  

    
                                             <div class="col-md-12 mt-3">
                                                <button type="button" class="btn btn-info ml-1 float-right clear">Clear Form</button>

                                                <button type="button" class="btn btn-primary float-right AddUpdatebtn">Save Now</button>
                                             </div> 


                                             
                                        
                                           </div>   
                                        </form>
                                          


                            </div>
                        </div>
                        </div>

                    <div class="col-md-8">
                         <div class="card card-primary card-outline">
                            <div class="card-body table-responsive">                  
                                <table id="table" class="table mb-0 table-striped">
                                  
                                  <thead>
                                    <tr>
                            
            
                                      <th>Name</th>
                                      <th>Barcode</th>
                                      <th>Batch</th>
                                      <th>Generic</th>
                                      <th>InUse</th>
                                      <th>Created</th>
                                      <th>Updated</th>
                                      <th>Created By</th>
                                      <th>Updated By</th>
                                      <th></th>
                                   
                                    </tr>
                                  </thead> 

                                  <tfoot>
                                    <tr>
                                  
    
                                      <th>Name</th>
                                      <th>Barcode</th>
                                      <th>Batch</th>
                                      <th>Generic</th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th> </th>
                                      <th></th>
                                    
                                    </tr>
                                  </tfoot> 


                                </table>                 
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

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  $('#dppType').select2();

 var table = $('#table').DataTable({

         "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
        dom: 'lBfrtip', //"Bfrtip",


        processing: true,
        serverSide: true,
        // stateSave: true,
        ajax: {
            url: "{{ route('BTAddons') }}",
            method: 'POST'
        },
         columns: [
            {data: 'name', name: 'name'},
            {data: 'barcode', name: 'barcode'},
            {data: 'batch', name: 'batch'},
            {data: 'generic', name: 'generic'},
            {data: 'inuse', name: 'inuse'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'created_by', name: 'created_by'},
            {data: 'updated_by', name: 'updated_by'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "order":[[0, 'asc']],

         dom: "Blfrtip",
                buttons: [
                
                    {
                        title:'Facilities',
                        text: 'Excel',
                        footer: true,
                        extend: 'excelHtml5',
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    },
                    {
                    title:'Facilities', 
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
                        title:'Facilities',
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
                { "visible": false, "targets": [5,6,7,8] }
                ], 



        initComplete: function () {

             this.api().columns(0).every(function () {
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
             this.api().columns(1).every(function () {
                var column = this;
                var input = document.createElement("input");
                input.classList.add("form-control");
                input.classList.add("text-center");
                input.classList.add("p-0");
                input.placeholder = "Barcode";
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
                input.placeholder = "Batch";
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
                input.placeholder = "Generic";
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });
            
                             $(".update").remove();
                             $('.col-md-4').remove();
                              $(".col-md-8").toggleClass("col-md-12");
                              $('#table').css('width','100%');
                  



                           $(".delete").remove();
                             
        



                            $(".update").remove();
                             
                    
        }
    });

table.on('click', '.update', function() {


        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')) {
            $tr = $tr.prev('parent');
        }



        var data = table.row($tr).data();
        var tr_id = '#'+table.row($tr).data().id;

        var id = table.row($tr).data().id;

              $.get("{{route('BTAddon')}}", 
               {
                id: id,
              }, 
              function(data){
                //console.log(data)
                if(data.length > 0) {

                    $('#id').val(data[0].id);
                    $('#name').val(data[0].name);
                    $('#barcode').val(data[0].barcode);
                    $('#generic').val(data[0].generic);
                    $('#batch').val(data[0].batch);

                     $('#dppType').val(data[0].dppType).trigger('change');
                    $('#dpp').val(data[0].dpp);


                    if(data[0].inuse == 1) {
                        $("#inuse1").prop("checked", true);
                    } else {
                        $("#inuse2").prop("checked", true);
                    }
                    


                }
              });
   })

  table.on('click', '.delete', function() {

        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')) {
            $tr = $tr.prev('parent');
        }

        var data = table.row($tr).data();
        var tr_id = '#'+table.row($tr).data().id;

        swal({
          title: "Are you sure?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {

                $.ajax({
                        type: 'post',
                        url:"{{ route( 'deleteBTProduct') }}",
                        data: {'id' : data.id},
                        dataType: 'json',                   
                        success: function(response){ 
                   
                                   if ($.isEmptyObject(response.error)){



                                         $(tr_id).fadeOut(1000);
                                            $(tr_id).css("background", "#4bca52");
                                            setTimeout(function() {
                                                $(tr_id).css("background", "none");
                                                table.ajax.reload( null, false );
                                                }, 900);

                                            
                                    } else {
                                         Lobibox.notify('warning', {
                                                pauseDelayOnHover: true,
                                                continueDelayOnInactiveTab: false,
                                                position: 'top right',
                                                msg: response.error,
                                                icon: 'bx bx-info-circle'
                                            });


                                    }    

                            }
                        });

           } 
        });

 });

    
           $(".clear").click(function (event) {
                 $('#form')[0].reset()
                 $('#id').val('')
           })

            //add and update js code

            $(".AddUpdatebtn").click(function (event) {

               
                    //stop submit the form, we will post it manually.
                    event.preventDefault();

                    // Get form
                    var form = $('#form')[0];

                    // Create an FormData object
                    var data = new FormData(form);


                    // append account names to form 
                     var accountname = $(".accountname");
                     
                        for(var i = 0; i < accountname.length; i++){
                            
                             data.append("accountname[]", $(accountname[i]).text());

                        }
                        


                    if($('#id').val() > 0) {

                        var url = "{{ route('updateBTProduct') }}";        
                       
                    } else {


                            
                             Lobibox.notify('warning', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: "You Don't have the permission.",
                                            icon: 'bx bx-info-circle'
                                        });
                            return false;                                          
                              

                        var url = "{{ route('addBTProduct') }}";   
                      

                    }


                    $.ajax({
                        type: "POST",
                        enctype: 'multipart/form-data',
                        url: url,
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        success: function(data) {
                            //console.log(data);
                                if ($.isEmptyObject(data.error)){
                                     Lobibox.notify('success', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: data.success,
                                            icon: 'bx bx-check-circle'
                                        });
                                      table.ajax.reload( null, false );
                                      
                                      $('#form')[0].reset()
                                      $('#id').val('')

                                } else {
                                     Lobibox.notify('warning', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: data.error,
                                            icon: 'bx bx-info-circle'
                                        });
                                }
                            }

                        });


      

        });



            


    });

</script>
@endpush
