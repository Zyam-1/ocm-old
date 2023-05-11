@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Profiles </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Profiles </li>
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
                                <h5 class="heading">New Profile</h5>   

                                  <form id="form">
                                            {{ csrf_field() }}
                                            <div class="row">
                                              

                                              <div class="col-md-12">
                                            <label  class="col-form-label">User Level <span>*</span></label>
                                                 <select class="form-control" name="level" id="level">
                                                   <option>Level 1</option>
                                                   <option>Level 2</option>
                                                   <option>Level 3</option>
                                                   <option>Level 4</option>
                                                 </select>
                                             </div>
                                             <div class="col-md-12">
                                            <label  class="col-form-label">Profile Code <span>*</span></label>
                                                 <input type="text" class="form-control" id="code" name="code" value="" />
                                             </div>


                                            <div class="col-md-12">
                                            <label  class="col-form-label">Name <span>*</span></label>
                                                 <input type="text" class="form-control" id="name" name="name" value="" />
                                                 <input type="hidden" class="form-control" id="id" name="id" value="" />
                                             </div>

                                             <div class="col-md-12 pt-2">
                                            <label  class="col-form-label">Department <span>*</span></label>
                                                 <select class="form-control department" name="department" id="department">
                                                      <option></option>
                                                        @foreach ($data['Lists'] as $List)
                                                        <option value="{{$List->id}}" 
                                                            @if($List->Default == 'Yes')
                                                            selected=""
                                                            @endif
                                                             >{{$List->text}}</option>
                                                        @endforeach
                                                 </select>
                                             </div>


                                            <div class="col-md-12 pt-2">
                                            <label  class="col-form-label">Special Handling </label>
                                                 <select class="form-control" name="specialhandling" id="specialhandling">
                                                        <option></option>
                                                        @foreach ($data['SHL'] as $SHL)
                                                        <option value="{{$SHL->id}}" 
                                                            @if($List->Default == 'Yes')
                                                            selected=""
                                                            @endif
                                                             >{{$SHL->text}}</option>
                                                        @endforeach
                                                 </select>
                                             </div>


                                             <div class="col-md-12 pt-2">
                                            <label  class="col-form-label"> Diagnostics </label>
                                                 <select class="form-control" name="diagnostics[]" id="diagnostics" multiple="">
                                                        @foreach ($data['DGN'] as $DGN)
                                                        <option value="{{$DGN->text}}" 
                                                            @if($List->Default == 'Yes')
                                                            selected=""
                                                            @endif
                                                             >{{$DGN->text}}</option>
                                                        @endforeach
                                                 </select>
                                             </div>

                                               <div class="col-md-12 pt-2">
                                              <label  class="col-form-label">Duplicate Prevention Period</label>
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
                                                <label  class="col-form-label">Require Conscent Form <span>*</span></label>
                                            
                                            <div class="row px-2">
                                              
                                             <div class="custom-control custom-radio">
                                              <input class="custom-control-input" type="radio" id="rcf1" name="rcf" value="1" >
                                              <label for="rcf1" class="custom-control-label">Yes</label>
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div class="custom-control custom-radio">
                                              <input class="custom-control-input" type="radio" id="rcf2" name="rcf" value="0" checked>
                                              <label for="rcf2" class="custom-control-label">No</label>
                                            </div>

                                            </div>

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



                                             <div class="col-md-12 pt-2">
                                                <label  class="col-form-label">Blood Transfusion <span>*</span></label>
                                            
                                            <div class="row px-2">
                                              
                                             <div class="custom-control custom-radio">
                                              <input class="custom-control-input" type="radio" id="customRadio11" name="btcheck" value="1" >
                                              <label for="customRadio11" class="custom-control-label">Yes</label>
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div class="custom-control custom-radio">
                                              <input class="custom-control-input" type="radio" id="customRadio22" name="btcheck" value="0" checked> 
                                              <label for="customRadio22" class="custom-control-label">No</label>
                                            </div>

                                            </div>

                                             </div>



                                            <div class="col-md-12 pt-2">
                                                <label  class="col-form-label">Mandatory Description<span>*</span></label>
                                            
                                            <div class="row px-2">
                                              
                                             <div class="custom-control custom-radio">
                                              <input class="custom-control-input" type="radio" id="customRadio111" name="mandatory" value="1" >
                                              <label for="customRadio111" class="custom-control-label">Yes</label>
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div class="custom-control custom-radio">
                                              <input class="custom-control-input" type="radio" id="customRadio222" name="mandatory" value="0" checked> 
                                              <label for="customRadio222" class="custom-control-label">No</label>
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
                                      <th>Level</th>
                                      <th>Department</th>
                                      <th>Duplicate P.</th>
                                      <th>Code</th>
                                      <th>Special Handling</th>
                                      <th>Diagnostics</th>
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
                                      
                                      <th></th>   
                                      <th>Name</th>
                                      <th>Level</th>
                                      <th>Department</th>
                                      <th>Duplicate P.</th>
                                      <th></th>
                                      <th></th>
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
<script src="{{ asset('plugins/dataTables.fixedHeader.min.js') }}" type="text/javascript"></script>

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



         $( "#diagnostics" ).select2({
                placeholder:'Choose diagnostics',
                allowClear:true
               });
                  
         $( "#department" ).select2({
                placeholder:'Choose department',
                allowClear:true
               });

          $( "#specialhandling" ).select2({
                placeholder:'Choose specialhandlings',
                allowClear:true
               });


             $( "#dppType" ).select2({
                placeholder:'Choose period type',
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
            url: "{{ route('Profiles') }}",
            method: 'POST'
        },
         columns: [
            {data: 'fvrt', name: 'quicktestprofiles.profileID'},
            {data: 'name', name: 'name'},
            {data: 'level', name: 'level'},
            {data: 'department', name: 'C.Text'},
            {data: 'dppType', name: 'dppType'},
            {data: 'code', name: 'code'},
            {data: 'specialhandling', name: 'D.Text'},
            {data: 'diagnostics', name: 'diagnostics'},
            {data: 'InUse', name: 'InUse'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'created_by', name: 'created_by'},
            {data: 'updated_by', name: 'updated_by'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "order":[[0, 'desc']],

         dom: "Blfrtip",
                buttons: [
                
                    {
                        title:'Profiles',
                        text: 'Excel',
                        footer: true,
                        extend: 'excelHtml5',
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    },
                    {
                    title:'Profiles', 
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
                        title:'Profiles',
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
                { "visible": false, "targets": [8,9,10,11] }
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
                input.placeholder = "Level";
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
                input.placeholder = "Department";
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
                input.placeholder = "Duplicate Prevention Period";
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
                input.placeholder = "Special Handling";
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
                input.placeholder = "Diagnostics";
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

 
table.on('click', '.update', function() {


        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')) {
            $tr = $tr.prev('parent');
        }

        $('.heading').text('Update Profile');

        var data = table.row($tr).data();
        var tr_id = '#'+table.row($tr).data().id;

        var id = table.row($tr).data().id;

              $.get("{{route('Profile')}}", 
               {
                id: id,
              }, 
              function(data){
                //console.log(data)
                if(data.length > 0) {

                    $('#id').val(data[0].id);
                    // $('#id').val(data[0].id);
                    
                    $('#name').val(data[0].name);
                    $('#department').val(data[0].department).trigger('change');
                    $('#level').val(data[0].level).trigger('change');
                    $('#specialhandling').val(data[0].specialhandling).trigger('change');
                    $('#dppType').val(data[0].dppType).trigger('change');
                    $('#dpp').val(data[0].dpp);
                    $('#code').val(data[0].code);

                    if(data[0].diagnostics != null ) {
                     const diagnostics = data[0].diagnostics.split(",");

                    diagnostics2 = splitCsv(data[0].diagnostics);


                              $('#diagnostics').val(diagnostics2).trigger('change'); 

                          } else {
                            
                    

                     $("#diagnostics").select2("val", "");
                          }



                    if(data[0].InUse == 1) {
                        $("#customRadio1").prop("checked", true);
                    } else {
                        $("#customRadio2").prop("checked", true);
                    }

                     if(data[0].btcheck == 1) {
                        $("#customRadio11").prop("checked", true);
                    } else {
                        $("#customRadio22").prop("checked", true);
                    }

                    if(data[0].rcf == 1) {
                        $("#rcf1").prop("checked", true);
                    } else {
                        $("#rcf2").prop("checked", true);
                    }
                    
                      if(data[0].mandatory == 1) {
                        $("#customRadio111").prop("checked", true);
                    } else {
                        $("#customRadio222").prop("checked", true);
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
            $.post("{{ route('deleteProfile') }}",
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

   table.on('click', '.fvrt', function() {


       var id = $(this).attr('data'); 
       var fvrt = $(this).attr('data2'); 

       if(fvrt == '') {

        swal({
          title: "Add Profile to quick list ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {

             $.ajax({
                        type: 'post',
                        url:"{{ route( 'addProfileTOQuickList') }}",
                        data: {id: id , fvrt: fvrt },
                        dataType: 'json',                   
                        success: function(data){ 
                                
                                if ($.isEmptyObject(data.error)){

                                   Lobibox.notify('success', {
                                                pauseDelayOnHover: true,
                                                continueDelayOnInactiveTab: false,
                                                position: 'top right',
                                                msg: data.success,
                                                icon: 'bx bx-info-circle'
                                            });

                                }  else {

                                     Lobibox.notify('warning', {
                                                pauseDelayOnHover: true,
                                                continueDelayOnInactiveTab: false,
                                                position: 'top right',
                                                msg: data.error,
                                                icon: 'bx bx-info-circle'
                                            });
                                } 

                                

                            

                           $(id).fadeOut(1000);
                            $(id).css("background", "#4bca52");
                            setTimeout(function() {
                                $(id).css("background", "none");
                                table.ajax.reload( null, false );
                                }, 900);

                            }
                        });
              
           } 
        });

       } else {

         swal({
          title: "Remove Profile from quick list ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.post("{{ route('RemoveProfileFromQuickList') }}",
            {
                 id: id ,
                fvrt: fvrt 
            });
              $(id).fadeOut(1000);
                $(id).css("background", "#4bca52");
                setTimeout(function() {
                    $(id).css("background", "none");
                    table.ajax.reload( null, false );
                    }, 900);
           } 
        });


       }

       

 });




           $(".clear").click(function (event) {
                 $('#form')[0].reset()
                 $('#id').val('')
                 $('#department').val('').trigger('change');
                 $('#specialhandling').val('').trigger('change');
                 $("#diagnostics").select2("val", "");
                 $('.heading').text('New Profile');
                 $("#diagnostics").select2("val", "");
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

                        var url = "{{ route('updateProfile') }}";        
                       
                    } else {


                        
                    


                        var url = "{{ route('addProfile') }}";   
                        // append Profile id to form
                         // data.append("uid", Profile[0].uid);

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
                                      
                                      $('#id').val('')
                                      $('#name').val('')
                                      $('#specialhandling').val('').trigger('change');
                                     // $("#diagnostics option:selected").removeAttr("selected");
                                     // $("#diagnostics option:selected").prop("selected", false);
                                     //$("#diagnostics").empty();
                                     $("#diagnostics").select2("val", "");

                                     $('#department').val('').trigger('change');
                                     $("#dppType").val('Hours');
                                     $('#dpp').val('')
                                     $("#rcf2").prop("checked", true); 
                                      $('.heading').text('New Profile');

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
