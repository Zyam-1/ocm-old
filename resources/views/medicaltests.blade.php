<style>
    div.dt-button-collection div.dropdown-menu{
        overflow-y: scroll;
        height: 160px;
    }
</style>
@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Tests </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Tests </li>
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
                        
                        <div class="col-md-3">    
                        <div class="card card-primary card-outline">
                            <div class="card-body">                  
                              

                               <div class="row">
                                   <div class="col-md-12">
                                    <h5>New Test 
                                    <button class="btn btn-info px-2 d-none btn-xs float-right syncCodes">
                                        <i class="fas fa-sync"></i> Sync Codes Mapping
                                    </button>
                                </h5>  
                               </div> 
                               </div>

                                  <form id="form">
                                            {{ csrf_field() }}




                                            <div class="row">
                                                <div class="col-md-12">
                    <div class="row">
                                  <div class="col-md-12">
                                      <label class="form-label">Department</label>
                                      <select id="department"class="form-control form-select" name="department">
                                        <option selected hidden disabled>Choose an Option</option>
                                          <option value="Bio">BioChemistry</option>
                                          <option value="Coag">Coagulation</option>
                                          <option value="Haem">Haematology</option>
                                          <option value="External">External</option>
                                          <option value="Micro">MicroBiology</option>
                                      </select>
                                  </div>
                              </div> 

                                            <div class="row ">
                                            <div class="col-md-6 pt-2">
                                            <label  class="col-form-label ">Net Aquire Code <span>*</span></label>
                                                 <input type="text" class="form-control" id="nacode" name="nacode" value="" />
                                             </div>
                                               <div class="col-md-6  pt-2">
                                            <label  class="col-form-label">OCM Code <span>*</span></label>
                                                 <input type="text" class="form-control" id="code" name="code" value="" />
                                             </div>  
                                            </div>
                                         
                                            
                                            
                                             

                                           
                                        
                                           <div class="row">
                                                 <div class="col-md-12  pt-2">
                                            <label  class="col-form-label">Name <span>*</span></label>
                                                 <input type="hidden" class="form-control" id="id" name="id" value="" />
                                                 <input type="text" class="form-control" id="name" name="name" value="" />
                                             </div>
                                        
                                           </div>


                                          <div class="row">
                                        <div class="col-md-12  pt-2">
                                            <label  class="col-form-label">Sampletype <span>*</span></label>
                                            <select class="form-control"  id="type" name="type">
                                              <option  selected value="a"></option>
                                            @foreach ($data['sampleTypes'] as $sampleType)
                                              <option value="{{$sampleType->id}}">{{$sampleType->Text}}</option>
                                              @endforeach
                                          </select>
                                             </div>
                                          </div>

                                             <div class="row">
                                                   <div class="col-md-6  pt-2">
                                            <label  class="col-form-label">Volume Required <span>*</span></label>
                                            <!-- <input type="hidden" class="form-control" id="vr" name="volur" value="" /> -->

                                                <input type="number" class="form-control" id="volumnerequired" name="volumnerequired" value="" />
                                             </div> 

                                                <div class="col-md-6  pt-2">
                                            <label  class="col-form-label">Sample Age (in hours)</label>
                                                 <input type="number" placeholder="e.g 3" class="form-control" id="sampleage" name="sampleage" value="" />
                                             </div>
                                        
                                              
                                             </div>
                                          

                                            <div class="row">
                                         <div class="col-md-12  pt-2">
                                            <label  class="col-form-label">Facility <span>*</span></label>
                                            <select class="form-control"  id="facility" name="facility">
                                              <option  selected value="a"></option>
                                            @foreach ($data['facilities'] as $facility)
                                              <option value="{{$facility->id}}">{{$facility->name}}</option>
                                              @endforeach
                                          </select>
                                             </div>   
                                            </div>
                                     


                                           <div class="row">
                                 <div class="col-md-6  pt-2">
                                            <label  class="col-form-label">Container for Adults <span>*</span></label>
                                            <select class="form-control"  id="adults" name="adults">
                                              <option  selected value="a"></option>
                                               @foreach ($data['containers'] as $container)
                                              <option value="{{$container->id}}">{{$container->name}}</option>
                                              @endforeach
                                          </select>
                                             </div> 

                                            <div class="col-md-6  pt-2">
                                            <label  class="col-form-label">Container for Children <span>*</span></label>
                                            <select class="form-control"  id="children" name="children">
                                              <option  selected value="a"></option>
                                                @foreach ($data['containers'] as $container)
                                              <option value="{{$container->id}}">{{$container->name}}</option>
                                              @endforeach
                                          </select>
                                             </div>    
                                           </div>
     
                                           
                                       <div class="row">
                                           <div class="col-md-6 pt-2">
                                               <label class="form-label">Plausible High</label>
                                               <input type="text "  name="plausiblehigh" class="form-control phigh">
                                           </div>
                                            <div class="col-md-6 pt-2">
                                               <label class="form-label">Plausible Low</label>
                                               <input type="text" name="plausiblelow" class="form-control plow">
                                           </div>
                                       </div>
                                            <div class="row">
                                           <div class="col-md-6 pt-2">
                                               <label class="form-label">Flag Male High</label>
                                               <input type="text" name="flagmalehigh" class="form-control fmhigh">
                                           </div>
                                            <div class="col-md-6 pt-2">
                                               <label class="form-label">Flag Male Low</label>
                                               <input type="text" name="flagmalelow" class="form-control fmlow">
                                           </div>
                                       </div>
                                                      <div class="row">
                                           <div class="col-md-6 pt-2">
                                               <label class="form-label">Flag Female High</label>
                                               <input type="text" name="flagfemalehigh" class="form-control ffhigh">
                                           </div>
                                            <div class="col-md-6 pt-2">
                                               <label class="form-label">Flag Female Low</label>
                                               <input type="text" name="flagfemalelow" class="form-control fflow">
                                           </div>
                                       </div>
                                       <div class="row">
                                           <div class="col-md-6 pt-2">
                                               <label class="form-label">Female High</label>
                                               <input type="text" name="femalehigh" class="form-control fhigh">
                                           </div>
                                            <div class="col-md-6 pt-2">
                                               <label class="form-label">Female Low</label>
                                               <input type="text" name="femalelow" class="form-control flow">
                                           </div>
                                       </div>
                                          <div class="row">
                                           <div class="col-md-6 pt-2">
                                               <label class="form-label">Male High</label>
                                               <input type="text" name="malehigh" class="form-control mhigh">
                                           </div>
                                            <div class="col-md-6 pt-2">
                                               <label class="form-label">Male Low</label>
                                               <input type="text" name="malelow" class="form-control mlow">
                                           </div>
                                       </div>

                                        <div class="row">
                                           <div class="col-md-6 pt-2">
                                               <label class="form-label">Print Priority</label>
                                               <input type="number" name="printpriority" class="form-control printp">
                                           </div>
                                            <div class="col-md-6 pt-2">

                                                <label class="form-label">Print Split</label>
                                               <input type="number" name="printsplit" class="form-control psplit">

                                              
                                           </div>
                                       </div>
                                       <div class="row">
                                           <div class="col-md-6 pt-2">
                                               <label class="form-label">Age From in Days</label>
                                               <input type="number" name="agefromdays" class="form-control agef">
                                           </div>
                                            <div class="col-md-6 pt-2">
                                        
                                            <label class="form-label">Age to in Days</label>
                                               <input type="number" name="agetodays" class="form-control aget">
                                           </div>
                                       </div>

                                         <div class="row">
                                           <div class="col-md-6 pt-2">
                                               <label class="form-label">Units</label>
                                               <input type="text" name="units" class="form-control units">
                                           </div>
                                            <div class="col-md-6 pt-2">
                                               <label class="form-label">Decimal  number</label>
                                               <input type="number" name="decimal" id='decimal' class="form-control ">
                                           </div>
                                       </div>

                                           <div class="row">
                                           <div class="col-md-12 pt-2">
                                               <label class="form-label">Analyser</label>
                                               <input type="text" name="analyser" id="analyser" class="form-control analyser">
                                           </div>
                                         
                                       </div>
                                         <div class="row">
                                           <div class="col-md-6 pt-2">
                                               <label class="form-label">Active From</label>
                                               <input type="date" name="activefrom" id="activefrom" class="form-control ">
                                           </div>
                                            <div class="col-md-6 pt-2 ">
                                                <label class="form-label">Active to</label>
                                               <input type="date" name="activeto" id="activeto" class="form-control ">
                                           </div>
                                       </div>

                                        <div class="row">
                                           <div class="col-md-6 pt-2">
                                            <input type="checkbox" name="printable"id="printable" value="1" class=" mt-2">
                                            <label class="form-label">Printable</label>
                                               
                                           </div>
                                            <div class="col-md-6 pt-2">
                                                <input type="checkbox" name="sendforhealth" id="sendforhealth"  value="1" class=" mt-2 ">
                                            <label class="form-label">Health link</label>
                                           </div>
                                       </div>
                                         <div class="row mt-2">
                                          
                                            <div class="col-md-6 pt-2">
                                            <input type="checkbox" name="medrenal" id="medrenal"  value="1" class="mt-2">
                                            <label class="form-label">Medrenal</label>
                                           </div>
                                       </div>

                                         


                                        


                                             <div class="col-md-12 pt-2">
                                                <label  class="col-form-label">In Use <span>*</span></label>
                                            
                                            <div class="row px-2">
                                              
                                             <div class="custom-control custom-radio">
                                              <input class="custom-control-input" type="radio" id="customRadio1" name="status" value="1" checked>
                                              <label for="customRadio1" class="custom-control-label">Yes</label>
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div class="custom-control custom-radio">
                                              <input class="custom-control-input" type="radio" id="customRadio2" name="status" value="0">
                                              <label for="customRadio2" class="custom-control-label">No</label>
                                            </div>

                                            </div>

                                             </div>  
                                               <div class="row mt-2">
                                                 <div class="col-md-12">
                                                    <input type="checkbox" name="dodelta" class="form-check-input mx-1 dodelta" value="1">
                                                     <label class="form-check-label mx-4" >DoDelta</label>
                                                 </div>
                                             </div>

    
                                             <div class="col-md-12 mt-3">
                                                <button type="button" class="btn btn-info ml-1 float-right clear">Clear Form</button>

                                                <button type="button" class="btn btn-primary float-right AddUpdatebtn">Save Now</button>
                                             </div> 
                                           
 
                                                </div>
                                        
                                            
                                            

                                             
                                        
                                           </div>   
                                        </form>
                                          


                            </div>
                        </div>
                        </div>

                    <div class="col-md-9">
                         <div class="card card-primary card-outline">
                            <div class="card-body table-responsive">                  
                                <table id="table" class="table mb-0 table-striped">
                                  
                                  <thead>
                                    <tr>
                            
                                      <th>Code</th>
                                      <th>NA Code</th>
                                      <th>Name</th>
                                      <th>Volume</th>
                                      <th>Age</th>
                                      <th>SampleType</th>
                                      <th>Age From</th>
                                      <th>Age To</th>
                                      <th>Adult.Cntnr</th>
                                      <th>Child.Cntnr</th>
                                      <th>Facility</th>
                                      <th>InUse</th>
                                      <th>Created</th>
                                      <th>Updated</th>
                                      <th>Created By</th>
                                      <th>Updated By</th>
                                      <th></th>
                                   
                                    </tr>
                                  </thead> 

                                  <!-- <tfoot>
                                    <tr>
                                  
                                      <th>Code</th>
                                      <th>NA Code</th>
                                      <th>Name</th>
                                      <th>Volume</th>
                                      <th>Age</th>
                                      <th>SampleType</th>
                                      <th>Adult.Cntnr</th>
                                      <th>Child.Cntnr</th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                    
                                    </tr>
                                  </tfoot>  -->


                                </table>                 
                            </div>
                        </div> 
                    </div>    

                    
                </div>     
                <div class="modal w-100"  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:40rem;">
      <div class="modal-header">
        <h5 class="modal-title">Tests Available in NA    
            <button id='insert' class="btn btn-info">Insert</button> 
        
    </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          
        </button>
      </div>
     <table id="uptest" class="table-striped">
</thead>
<th class=""></th>
<th>NA Code</th>
<th>Ocm Code</th>
<th>AgeFromDays</th>
<th>AgeToDays</th>
<th>SampleType</th>
<th >Actions</th>
<thead>
    <tbody id="data">
    </tbody> 
     </table>
    </div>

    </div>
    
</div>



</div>

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

   $( "#type" ).select2({
                allowClear:true
               });

   $( "#facility" ).select2({
                allowClear:true
               });

    $( "#children" ).select2({
                allowClear:true
               });

     $( "#adults" ).select2({
                allowClear:true
               }); 


 var table = $('#table').DataTable({

         "lengthMenu": [ [10, 25, 50, 100, 200, 500, -1], [10, 25, 50,100, 200, 500, "All"] ],
        dom: 'lBfrtip', //"Bfrtip",


        processing: true,
        serverSide: true,
        // stateSave: true,
        ajax: {
            url: "{{ route('MTests') }}",
            method: 'POST'
        },
         columns: [
            {data: 'shortname', name: 'shortname'},
            {data: 'nacode', name: 'nacode'},
            {data: 'longname', name: 'longname'},
            {data: 'units', name: 'units'},
            {data: 'sampleage', name: 'sampleage'},
            {data: 'SampleType', name: 'Lists.Text'},
            {data: 'AgeFromDays', name: 'AgeFromDays'},
            {data: 'AgeToDays', name: 'AgeToDays'},
            {data: 'adultsContainer', name: 'C.name'},
            {data: 'childrenContainer', name: 'D.name'},
            {data: 'Hospital', name: 'facilities.name'},
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
                        title:'Tests',
                        text: 'Excel',
                        footer: true,
                        extend: 'excelHtml5',
                        exportOptions: {
                        columns: [':visible :not(:last-child)']
                        },
                    },
                    {
                    title:'Tests', 
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
                        title:'Tests',
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
                { "visible": false, "targets": [11,12,13,14,15] }
                ], 



        initComplete: function () {
            this.api().columns(0).every(function () {
                var column = this;
                var input = document.createElement("input");
                input.classList.add("form-control");
                input.classList.add("text-center");
                input.classList.add("p-0");
                input.placeholder = "Code";
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
                input.placeholder = "e.g. 5";
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
                input.placeholder = "Sample Type";
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
                input.placeholder = "Container Adult";
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
                input.placeholder = "Container Child";
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
                input.placeholder = "Facility";
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });
               



        }
    });

    $("#insert").on('click', function() {
        console.log('phuspa');

        var form = $('#form')[0];

// Create an FormData object
var data = new FormData(form);
var aget =$('.aget').val();
                        console.log(aget)
                        data.append('aget',aget)
$.ajax({
    type:'POST',
    url:"{{route('inserttests')}}",
    data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 600000
                        

}).done(function(response){
    console.log(response);
    Lobibox.notify('success', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg:response.success,
                                            icon: 'bx bx-check-circle'
                                        });
                                        $('.modal').modal('hide');
                                        document.getElementById("form").reset();
// document.getElementById("adults").reset();
// $('#adults').html('');
$('#adults').val('a'); // Select the option with a value of '1'
$('#adults').trigger('change'); //

$('#children').val('a'); // Select the option with a value of '1'
$('#children').trigger('change'); //

$('#facility').val('a'); // Select the option with a value of '1'
$('#facility').trigger('change'); //
$('#type').val('a'); // Select the option with a value of '1'
$('#type').trigger('change'); //

})

    })

table.on('click', '.update', function() {

         $('.card-body h5').text('Update Test');
         $(".AddUpdatebtn").text('Update Now');   

        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')) {
            $tr = $tr.prev('parent');
        }

        var data = table.row($tr).data();
        var tr_id = '#'+table.row($tr).data().id;

        var id = table.row($tr).data().id;

              $.get("{{route('Test')}}", 
               {
                id: id,
              }, 
              function(data){
                //console.log(data)
                if(data.length > 0) {

                    $('#id').val(data[0].id);
                    $('#name').val(data[0].longname);
                    $('#code').val(data[0].shortname);

                    $('#volumnerequired').val(data[0].units);
                   $('#nacode').val(data[0].nacode);
                    $('#type').val(data[0].SampleType).trigger('change');
                    $('#department').val(data[0].department).trigger('change');
                    $('.units').val(data[0].units2);
                    $('#facility').val(data[0].Hospital).trigger('change');
                    $('#adults').val(data[0].adultsContainer).trigger('change');
                    $('#children').val(data[0].childrenContainer).trigger('change');
                    $('.phigh').val(data[0].PlausibleHigh);
                    $('.printp').val(data[0].PrintPriority);
                    $('.psplit').val(data[0].PrintSplit);

                    $('#decimal').val(data[0].dp);

                  $('.plow').val(data[0].PlausibleLow);
                    $('.fmhigh').val(data[0].FlagMaleHigh);
                  $('.fmlow').val(data[0].FlagMaleLow);
                    $('.ffhigh').val(data[0].FlagFemaleHigh);
                  $('.fflow').val(data[0].FlagFemaleLow);
                    $('.fhigh').val(data[0].FemaleHigh);
                    $('.flow').val(data[0].FemaleLow);
                      $('.mhigh').val(data[0].MaleHigh);
                      $('.analyser').val(data[0].Analyser);
                      $('prinp').val(data[0].PrintPriority)
                      

                     $('.mlow').val(data[0].MaleLow);
                     $('.agef').val(data[0].AgeFromDays);
                     $('.aget').val(data[0].AgeToDays);
                     if(data[0].dodelta == 1){
                      $('.dodelta').prop('checked', true);
                     }

                    if(data[0].sampleage > 0) {
                    $('#sampleage').val(data[0].sampleage);
                    }

                    if(data[0].InUse == 1) {
                        $("#customRadio1").prop("checked", true);
                    } else {
                        $("#customRadio2").prop("checked", false);
                    }

                    if(data[0].Printable == 1) {
                        $("#printable").prop("checked", true);
                    } else {
                        $("#printable").prop("checked", false);
                    }

                    if(data[0].medrenal == 1) {
                        $("#medrenal").prop("checked", true);
                    } else {
                        $("#medrenal").prop("checked", false);
                    }


                    if(data[0].HealthLink == 1) {
                        $("#sendforhealth").prop("checked", true);
                    } else {
                        $("#sendforhealth").prop("checked", false);
                    }
                    
                      
                    $('#activeto').val(data[0].ActiveToDate);
                    $('#activefrom').val(data[0].ActiveFromDate);

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
            $.post("{{ route('deleteTest') }}",
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

    
           $(".clear").click(function (event) {
                 $('#form')[0].reset()
                 $('#type').val('').trigger('change');
                 $('#facility').val('').trigger('change');
                 $('#adults').val('').trigger('change');
                 $('#children').val('').trigger('change');
                 $('#id').val('')
                 $('.card-body h5').text('New Test');
                 $(".AddUpdatebtn").text('Save Now');   
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
                        var aget =$('.aget').val();
                        // console.log(aget)
                        data.append('aget',aget)
                        var agefdays =$('.agef').val();
                    data.append("agefdays",agefdays)


                    if($('#id').val() > 0) {

                        var url = "{{ route('updateTest') }}";  
                         
                       
                    } else {

                        var url = "{{ route('addTest') }}";   
                        

              

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
                            console.log(data);
                            console.log(data.error);
                            console.log(data.success);
                       
                             
                              
                                
                            




// console.log(a);     
                if ($.isEmptyObject(data.error)){
                                     Lobibox.notify('success', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg: data.success,
                                            icon: 'bx bx-check-circle'
                                        });
                                      table.ajax.reload( null, false );
                                      
                                     // $('#form')[0].reset()
                                      $('#id').val('')
                                     

                                   
                                      

                                      document.getElementById("form").reset();
                                      // document.getElementById("adults").reset();
                                // $('#adults').html('');
                                $('#adults').val('a'); // Select the option with a value of '1'
                                $('#adults').trigger('change'); //

                                $('#children').val('a'); // Select the option with a value of '1'
                                $('#children').trigger('change'); //

                                $('#facility').val('a'); // Select the option with a value of '1'
                                $('#facility').trigger('change'); //
                                $('#type').val('a'); // Select the option with a value of '1'
                                $('#type').trigger('change'); //

                               // $('.modal').modal('show');
                               // $('#data').html(data);
                                $('.card-body  h5').text('New Test');
                                   $(".AddUpdatebtn").text('Save Now');   
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
        $('#uptest').on('click', '#delrow', function(){
            var form = $('#form')[0];
// console.log("1")
// Create an FormData object
var id = $(this).closest("tr").find('#code').val();
var ind = $(this).closest("tr").find('#index').val();
var data = new FormData(form);
console.log(ind);
var aget =$('.aget').val();
                        // console.log(aget)
                        
data.append("ind",ind)
data.append('aget',aget)


$.ajax({
    type: "POST",
                        enctype: 'multipart/form-data',
                        url: "{{ route('deletetests') }}",
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        success: function(response) {
                            // console.log(response)
                            document.getElementById("form").reset();
// document.getElementById("adults").reset();
// $('#adults').html('');
$('#adults').val('a'); // Select the option with a value of '1'
$('#adults').trigger('change'); //

$('#children').val('a'); // Select the option with a value of '1'
$('#children').trigger('change'); //

$('#facility').val('a'); // Select the option with a value of '1'
$('#facility').trigger('change'); //
$('#type').val('a'); // Select the option with a value of '1'
$('#type').trigger('change'); //
if(response.success=""){
                              Lobibox.notify('success', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg:"Deleted Successfully",
                                            icon: 'bx bx-check-circle'
                                        });
							}
							else{
							 Lobibox.notify('warning', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg:"Data Could not be Deleted successfully",
                                            icon: 'bx bx-info'
                                        });
                         
                        }
                    }
                
        
        
        });
        });



        $('#uptest').on('click', '#check', function(){
        var form = $('#form')[0];
// console.log("1")
// Create an FormData object
var id = $(this).closest("tr").find('#code').val();
var ind = $(this).closest("tr").find('#index').val();
console.log(ind);
var data = new FormData(form);
// data.append("agefdays",id)


data.append("ind",ind)


var aget =$('.aget').val();
data.append("aget",aget)

var agefdays =$('.agef').val();
data.append("agefdays",agefdays)

$.ajax({
    type: "POST",
                        enctype: 'multipart/form-data',
                        url: "{{ route('updatetests') }}",
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        success: function(response) {
                            // console.log(response)
                            if (response==1){
                                     Lobibox.notify('success', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg:"Updated Successfully",
                                            icon: 'bx bx-check-circle'
                                        });
                                    //   table.ajax.reload( null, false );
                                      
                                    //  // $('#form')[0].reset()
                                    //   $('#id').val('')
                                    //   $('.card-body > h5').text('New Test');

                                    //   $('.syncCodes').trigger('click');

                                } else {
                                     Lobibox.notify('warning', {
                                            pauseDelayOnHover: true,
                                            continueDelayOnInactiveTab: false,
                                            position: 'top right',
                                            msg:"NA Code Not Updated Successfully ",
                                            icon: 'bx bx-info-circle'
                                        });
                                }
                                    //   table.ajax.reload( null, false );
                                      
                                    //  // $('#form')[0].reset()
                                    //   $('#id').val('')
                                    //   $('.card-body > h5').text('New Test');

                                    //   $('.syncCodes').trigger('click');
                                    document.getElementById("form").reset();
// document.getElementById("adults").reset();
// $('#adults').html('');
$('#adults').val('a'); // Select the option with a value of '1'
$('#adults').trigger('change'); //

$('#children').val('a'); // Select the option with a value of '1'
$('#children').trigger('change'); //

$('#facility').val('a'); // Select the option with a value of '1'
$('#facility').trigger('change'); //
$('#type').val('a'); // Select the option with a value of '1'
$('#type').trigger('change'); //

                       
                        }
})
        
    });

                       $(document).on('click', '.syncCodes ', function (e) {
                             

                             $('.syncCodes i').addClass("fa-spin");    
                                
                             $.ajax({
                                      type: 'post',
                                      url:"{{ route( 'syncTestCodesWithNA') }}",
                                      dataType: 'json',                   
                                      success: function(response){ 

                                        $('i').removeClass("fa-spin"); 
                                      }

                              })

                          });    

    });

</script>
@endpush
