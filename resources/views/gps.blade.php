@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">GPs </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">GPs </li>
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
                                <h5 class="heading">New GP</h5>   

                                  <form id="form">
                                            {{ csrf_field() }}
                                            <div class="row">
                                            
                                            <div class="col-md-12">
                                            <label  class="col-form-label">Name <span>*</span></label>
                                                 <input type="text" class="form-control" id="name" name="name" value="" />
                                                 <input type="hidden" class="form-control" id="id" name="id" value="" />
                                             </div>
                                             

                                             <div class="col-md-12">
                                            <label  class="col-form-label">M.C# <span>*</span></label>
                                                 <input type="text" class="form-control" id="phone" name="phone" value="" />
                                             </div>

                                              <div class="col-md-12">
                                            <label  class="col-form-label">Identifier <span>*</span></label>
                                                 <input type="text" class="form-control" id="email" name="email" value="" />
                                             </div>


                                              <div class="col-md-12">
                                            <label  class="col-form-label">Address</label>
                                                 <input type="text" class="form-control" id="address" name="address" value="" />
                                             </div>


                                             <div class="col-md-12 pt-2">
                                                <label  class="col-form-label">In Use <span>*</span></label>
                                            
                                            <div class="row px-2">
                                              
                                             <div class="custom-control custom-radio">
                                              <input class="custom-control-input" type="radio" id="customRadio1" name="InUse" value="1" checked>
                                              <label for="customRadio1" class="custom-control-label">Yes</label>
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div class="custom-control custom-radio">
                                              <input class="custom-control-input" type="radio" id="customRadio2" name="InUse" value="0">
                                              <label for="customRadio2" class="custom-control-label">No</label>
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
                                      
                                      <th></th>  
                                      <th>Name</th>
                                      <th>M.C.#</th>
                                      <th>Identifier</th>
                                      <th>Address</th>
                                      <th>Active</th>
                                      <th>Created</th>
                                      <th>Updated</th>
                                      <th>Created By</th>
                                      <th>Updated By</th>
                                      <th></th>
                                   
                                    </tr>
                                  </thead> 

                                  <tfoot>
                                    <tr>
                                      
                                       <th></th>  
                                      <th>Name</th>
                                      <th>M.C.#</th>
                                      <th>Identifier</th>
                                      <th>Address</th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
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







function splitCsv(str) {
  return str.split(',').reduce((accum,curr)=>{
    if(accum.isConcatting) {
      accum.soFar[accum.soFar.length-1] += ','+curr
    } else {
      accum.soFar.push(curr)
    }
    if(curr.split('"').length % 2 == 0) {
      accum.isConcatting= !accum.isConcatting
    }
    return accum;
  },{soFar:[],isConcatting:false}).soFar
}


    $(document).ready(function () {




         $( "#department" ).select2({
                placeholder:'Choose department',
                allowClear:true
               });


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
        // stateSave: true,
        ajax: {
            url: "{{ route('GPs') }}",
            method: 'POST'
        },
         columns: [
            {data: 'listorder', name: 'listorder'},
            {data: 'GP_Name', name: 'GP_Name'},
            {data: 'GP_Medical_Council_Number', name: 'GP_Medical_Council_Number'},
            {data: 'GP_Practice_identifier', name: 'GP_Practice_identifier'},
            {data: 'GP_Practice_Address', name: 'GP_Practice_Address'},
            {data: 'InUse', name: 'InUse'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'created_by', name: 'created_by'},
            {data: 'updated_by', name: 'updated_by'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "order":[[1, 'asc']],

         dom: "Blfrtip",
                buttons: [
                
                    {
                        title:'GPs',
                        text: 'Excel',
                        footer: true,
                        extend: 'excelHtml5',
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    },
                    {
                    title:'GPs', 
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
                        title:'GPs',
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
                { "visible": false, "targets": [0,6,7,8,9] }
                ], 



        initComplete: function () {
             
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
                input.placeholder = "Phone";
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
                input.placeholder = "Email";
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
                input.placeholder = "Address";
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

        $('.heading').text('Update GP');

        var data = table.row($tr).data();
        var tr_id = '#'+table.row($tr).data().id;

        var id = table.row($tr).data().id;

              $.get("{{route('GP')}}", 
               {
                id: id,
              }, 
              function(data){
                //console.log(data)
                if(data.length > 0) {

                    $('#id').val(data[0].id);
                    $('#name').val(data[0].GP_Name);
                    $('#phone').val(data[0].phone);
                    $('#email').val(data[0].email);
                    $('#address').val(data[0].GP_Practice_Address);


                    if(data[0].InUse == 1) {
                        $("#customRadio1").prop("checked", true);
                    } else {
                        $("#customRadio2").prop("checked", true);
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
            $.post("{{ route('deleteGP') }}",
            {
                id: data.id 
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

    table.on('click', '.movedown', function() {

            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')) {
                $tr = $tr.prev('parent');
            }

            var data = table.row($tr).data();
            
            var currentRowId = table.row($tr).data().id;
            var nextRowId = $('#'+currentRowId ).next("tr").attr("id");

            var currentRow = $(this).attr('index');        
            var moveToRow = parseFloat(currentRow)+1;

              $.get("{{route('GPRowShift')}}", 
               {
                currentRow: currentRow,
                moveToRow: moveToRow,
                currentRowId: currentRowId,
                nextRowId: nextRowId
              }, 
              function(data){
                table.ajax.reload( null, false );
              });


    })

    table.on('click', '.moveup', function() {

            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')) {
                $tr = $tr.prev('parent');
            }

            var data = table.row($tr).data();
            
            var currentRowId = table.row($tr).data().id;
            var nextRowId = $('#'+currentRowId ).prev("tr").attr("id");

            var currentRow = $(this).attr('index');        
            var moveToRow = parseFloat(currentRow)-1;

              $.get("{{route('GPRowShift')}}", 
               {
                currentRow: currentRow,
                moveToRow: moveToRow,
                currentRowId: currentRowId,
                nextRowId: nextRowId
              }, 
              function(data){
                table.ajax.reload( null, false );
              });


    })





           $(".clear").click(function (event) {
                 $('#form')[0].reset()
                 $('#id').val('')
                 $('.heading').text('New GP');
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

                        var url = "{{ route('updateGP') }}";        
                       
                    } else {

                            
                             Lobibox.notify('warning', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: "You Don't have the permission.",
                                            icon: 'bx bx-info-circle'
                                        });
                            return false;                                          
                             
                        var url = "{{ route('addGP') }}";   
  
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
                                      
                                      //$('#form')[0].reset()  
                                      $('#id').val('')
                                      $('#name').val('')
                                      $('#phone').val('')
                                      $('#email').val('')
                                      $('#address').val('')


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
