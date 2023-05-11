@include('layouts.header')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Caution Test System
               <a class="btn btn-info btn-sm" href="{{route('home')}}"><i class="fas fa-arrow-left"></i> Go Back </a>
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


            <form id="form">
            {{ csrf_field() }}
                                                 
                <div class="card card-primary card-outline">
                    <div class="card-body ">  
                    <div class="col-md-12">

                      <div class="d-flex justify-content-between align-items-center my-2">
                          <h2 class="text-warning">Blood Transfusion Requests</h2>
                          <div class="d-flex">
                          <input type="text" class="form-control w-100" name="btnreqinput" id="btnreqinput" placeholder="Scan Sample">
                          <button class="btn btn-primary d-none" type="button" id="bta">testing</button>
                          </div>
                      </div>
                        <div class="mt-1 overflow-auto" style="height:200px;"> 
                          <table class=" table table-striped tableSecond">
                              <thead class="bg-secondary">
                                  <tr>   
                                      <th></th>
                                      <th>MRN</th>
                                      <th>Sample ID</th>
                                      <th>PatName</th>
                                      <th>Test Code</th>
                                      <th>Profile ID</th>
                                      <th>Sample Date</th>
                                      <th>Status</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $pendingcount=0;
                                  $processcount=0;
                                  if(count($data)>0){
                                      for ($i=0; $i < count($data); $i++) { 
                                  ?>
                                  <tr>
                                  <td> <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check<?php echo $i;
                                    ?>">
                                    <label class="form-check-label" for="exampleCheck1" id="ex"></label>
                                  </div></td>
                                  <td><?php echo $carr[$i]['Chart'];?></td>
                                  <td><?php echo $data[$i]['SampleID'];?></td>
                                  <td><?php echo $carr[$i]['PatName'];?></td>
                                  <td><?php echo $data[$i]['TestCode'];?></td>
                                  <td><?php echo $data[$i]['ProfileID'];?></td>
                                  <td><?php echo \Carbon\Carbon::parse($data[$i]['SampleDate'])->format('d-m-Y H:i');?></td>
                                  <td><?php if($data[$i]['status'] == null) { $pendingcount++; echo "<span class='btn btn-danger btn-xs'>Pending</span>";} elseif(str_contains($data[$i]['status'], "Process")) {                                       
                                  $processcount++;
                                  echo "<span class='btn btn-warning btn-xs'>Process</span>";} ?></td>
                                  </tr>
                                  <?php 
                                      }  }?>
                              </tbody>
                          </table>
                        </div>
                        <div class="pendingSecond d-flex justify-content-between align-items-center my-3">
                            <div class="d-flex">
                              <h5 id="pendingSecond_h5">Pending Orders: <span id="pendingSecond_orders_num"><?php echo $pendingcount; ?></span></h5>
                              <h5 class="ml-5" id="processSecond_h5">Process Orders: <span id="processSecond_orders_num"><?php echo $processcount; ?></span></h5>
                            </div>
                            <button class="btn btn-success d-inline" id="bloodreqbtn"  type="button">Place Order</button>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-5">
                          <h2 class="text-warning">Blood Transfusion Requested Products</h2> 
                          <div class="d-flex">
                            <input type="text" class="form-control w-100 d-none" id="btnrequestedinput" placeholder="Scan Sample">
                            <button class="btn btn-primary d-none" type="button" id="btb">testing</button>
                          </div>
                        </div>
                        <div class="mt-1 overflow-auto" style="height:200px;"> 
                          <table class="table table-striped ">
                              <thead class="bg-secondary">
                                  <tr>   
                                      <th></th>
                                      <th>Sample ID</th>
                                      <th>Patient Name</th>
                                      <th>Test Code</th>
                                      <th>Units</th>
                                      <th>Sample Date</th>
                                      <th>Date Required</th>
                                      <th>Status</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $pendingcount=0;
                                  $processcount=0;
                                  if(count($data2)>0){
                                      for ($j=0; $j < count($data2); $j++) { 
                                  ?>
                                  <tr>
                                  <td> <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="reqcheck<?php echo $j;
                                    ?>">
                                    <label class="form-check-label" for="reqcheck" id="ex2"></label>
                                  </div></td>
                                  <td><?php echo $data2[$j]['SampleID'];?></td>
                                  <td><?php echo $carr2[$j]['PatName'];?></td>
                                  <td><?php echo $data2[$j]['TestCode'];?></td>
                                  <td><?php echo $data2[$j]['units'];?></td>
                                  <td><?php echo \Carbon\Carbon::parse($data2[$j]['SampleDate'])->format('d-m-Y H:i');?></td>
                                  <td><?php echo \Carbon\Carbon::parse($data2[$j]['daterequired'])->format('d-m-Y H:i');?></td>
                                  <td><?php if($data2[$j]['status'] == null || str_contains($data2[$j]['status'], "Pending")) { $pendingcount++; echo "<span class='btn btn-danger btn-xs'>Pending</span>";} elseif(str_contains($data2[$j]['status'], "Process")) {                                       
                                  $processcount++;
                                  echo "<span class='btn btn-warning btn-xs'>Process</span>";} ?></td>
                                  </tr>
                                  <?php 
                                      }  }?>
                              </tbody>
                          </table>
                        </div> 
                        <div class="pending d-flex justify-content-between align-items-center my-3">
                            <div class="d-flex">
                              <h5 id="pending_h5">Pending Orders: <span id="pending_orders_num"><?php echo $pendingcount; ?></span></h5>
                              <h5 class="ml-5" id="process_h5">Process Orders: <span id="process_orders_num"><?php echo $processcount; ?></span></h5>
                            </div>
                            <button class="btn btn-success d-inline" id="bloodreqbtn2"  type="button">Place Order</button>
                        </div>

                    </div>          
                    </div>
                </div>
                <div id="result" class="text-danger"></div>

            </form>        

        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>



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
<script >
  // function fun(elem) {
    // var currentId = $(elem).attr("id");
    // alert(currentId);
// }
var archeckedSamples=[];
var count1=0;
var archeckedSamples2=[];
var count2=0;
// var sampleidget=[];

$(document).ready(function() {

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

var data = @json($data);
console.log(data);
var flag = 0;

const buttons = document.querySelectorAll('button');
for (let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener('click', e => e.preventDefault());
}

$('#bta').click(function(event){
  event.preventDefault();
    var def = document.getElementById("btnreqinput");

    for (let index = 0; index < data.length; index++) {
      if(def.value == data[index]['SampleID']){
        flag = 1;
        $('#check'+index).prop('checked', true);
        if(archeckedSamples.includes(data[index]['SampleID'])){
          console.log('Already in Array');
        } else {
          archeckedSamples[count1] = data[index]['SampleID'];
          // sampleidget[count1] = data[index]['SampleID'];
        }
        count1++;
        break;
      }  
    }
    $(this).trigger("enterKey");
});

var data2 = @json($data2);
console.log(data2);
var flag2 = 0;




$("#btnreqinput").keyup(function(e) {

if(e.key == 'Enter') {
  $('#bta').trigger('click');
}
});

$("#btnrequestedinput").keyup(function(e) {

if(e.key == 'Enter') {
  $('#btb').trigger('click');
}
});


// Ajax Place Order
$('#bloodreqbtn').click(function(event){
  event.preventDefault();

 $.ajax({
    url: "{{ route('Caution') }}",
   method: 'POST', 
   data : {'archeckedSamples':archeckedSamples},
 })
.done(function(response){
  Lobibox.notify('success', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                msg: "Order Placed Successfully",
                icon: 'bx bx-check-circle'
            });
            // window.location.reload();
            if(archeckedSamples.length == 1){
              window.location="{{route('Transfusionlab')}}/"+archeckedSamples[0];
            } else {
              window.location.reload();
            }

}).fail(function (jqXHR, textStatus, errorThrown) {
    // Request failed. Show error message to user. 
    // errorThrown has error message.
    Lobibox.notify('warning', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                msg: "Data does not exist",
                icon: 'bx bx-info-circle'
            });
                            
      inputfocus(); //focuses input field
      
});
});
// Ajax Place Order
$('#bloodreqbtn2').click(function(event){
  event.preventDefault();

  for (let index = 0; index < data2.length; index++) {
        flag2 = 1;
        if($('#reqcheck'+index).is(":checked")){
        if(archeckedSamples2.includes(data2[index]['ID'])){
          console.log('Already in Array');
        } else {
          archeckedSamples2[count2] = data2[index]['ID'];
          count2++;
        }
      }
    }

console.log(archeckedSamples2);

 $.ajax({
    url: "{{ route('CautionReq') }}",
    method: 'POST', 
    data : {'archeckedSamples2':archeckedSamples2},
 })
.done(function(response){
  Lobibox.notify('success', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                msg: "Order Placed Successfully",
                icon: 'bx bx-check-circle'
            });

            window.location.reload();
         

}).fail(function (jqXHR, textStatus, errorThrown) {
    // Request failed. Show error message to user. 
    // errorThrown has error message.
    // Lobibox.notify('warning', {
    //             pauseDelayOnHover: true,
    //             continueDelayOnInactiveTab: false,
    //             position: 'top right',
    //             msg: "Data does not exist",
    //             icon: 'bx bx-info-circle'
    //         });
                            
    //   inputfocus(); //focuses input field
      
});
});







// var table=$('.table').DataTable({

//  columns: [

//   {data: 'sampleid', name: 'sampleid'},
// {data: 'patientname', name: 'patientname'},
// {data: 'testcode', name: 'testcode'},
//  {data: 'units', name: 'units'},
//  {data: 'sampledate', name: 'sampledate'},
//  {data: 'daterequired', name: 'daterequired'},
//    {data: 'status', name: 'status'},

//     // {data: 'action', name: 'action', orderable: false, searchable: false},
// ],
// "order":[[0, 'desc']],

//   dom: "rtip",
//                 buttons: [
               
//                     {
//                         title:'Users',
//                         text: 'Excel',
//                         footer: true,
//                         extend: 'excelHtml5',
//                         exportOptions: {
//                         columns: [':visible :not(:last-child)']
//                         },
//                     },
//                     {
//                     title:'Users',
//                     text: 'PDF',
//                     extend: 'pdfHtml5',
//                     exportOptions: {
//                         columns: [':visible :not(:last-child)']
//                         },
//                     footer: true,
//                     orientation: 'landscape',
//                     pageSize: 'LEGAL',
//                     customize: function (doc) {
//                     doc.content[1].table.widths =
//                               Array(doc.content[1].table.body[0].length + 1).join('*').split('');
//                           doc.styles.tableBodyEven.alignment = 'center';
//                           doc.styles.tableBodyOdd.alignment = 'center';
                               
//                         }
//                     },
//                     {
//                         text: 'Print',
//                         title:'Users',
//                         extend: 'print',
//                         footer: true,
//                         exportOptions: {
//                         columns: [':visible :not(:last-child)']
//                         },
//                     },
//                     'colvis'  
//                 ],

//                 columnDefs: [{
//                     orderable: false,
//                     targets: -1,
//                 },
//                 { "visible": false, "targets": [] }
//                 ],

// });
// var table=$('.tableSecond').DataTable({
 

//   processing: true,
//   serverSide: true,
//   ajax: '/ocm/Caution',

//  columns: [


//   {data: 'MRN', name: 'MRN'},
//        {data: 'SampleID', name: 'SampleID'},
//       {data: 'TestCode', name: 'TestCode'},
//        {data: 'ProfileID', name: 'ProfileID'},
//        {data: 'SampleDate', name: 'SampleDate'},

//     // {data: 'action', name: 'action', orderable: false, searchable: false},
// ],
// "order":[[0, 'desc']],

//   dom: "rtip",
//                 buttons: [
               
//                     {
//                         title:'Users',
//                         text: 'Excel',
//                         footer: true,
//                         extend: 'excelHtml5',
//                         exportOptions: {
//                         columns: [':visible :not(:last-child)']
//                         },
//                     },
//                     {
//                     title:'Users',
//                     text: 'PDF',
//                     extend: 'pdfHtml5',
//                     exportOptions: {
//                         columns: [':visible :not(:last-child)']
//                         },
//                     footer: true,
//                     orientation: 'landscape',
//                     pageSize: 'LEGAL',
//                     customize: function (doc) {
//                     doc.content[1].table.widths =
//                               Array(doc.content[1].table.body[0].length + 1).join('*').split('');
//                           doc.styles.tableBodyEven.alignment = 'center';
//                           doc.styles.tableBodyOdd.alignment = 'center';
                               
//                         }
//                     },
//                     {
//                         text: 'Print',
//                         title:'Users',
//                         extend: 'print',
//                         footer: true,
//                         exportOptions: {
//                         columns: [':visible :not(:last-child)']
//                         },
//                     },
//                     'colvis'  
//                 ],

//                 columnDefs: [{
//                     orderable: false,
//                     targets: -1,
//                 },
//                 { "visible": false, "targets": [] }
//                 ],

// });


// table.on('click', '.delete', function () {
     
//      var id=this.id;
     
//          swal({
//   title: "Are you sure?",
//   text: "Once deleted, you will not be able to recover this imaginary file!",
//   icon: "warning",
//   buttons: true,
//   dangerMode: true,

// }).then((willDelete) => {
//   if (willDelete) {
//                          $.ajax({
//                         type: 'get',
//                         url:"Cdelete/"+id,
//                         //data: {'id':id},
//                         dataType: '',                  
//                        success: function(){
                           
//                          table.ajax.reload(null, false);

//                               }
//                             });

   

//   }
// });

       
//     });
     
   




   

});
</script>
@endpush