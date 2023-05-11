@include('layouts.header')
  <style >

    .addscroll{
      height:13.3rem;
      overflow-y: scroll;
    }
  </style>
      <!-- Select2 -->
  <link href="{{ asset('plugins/select2/css/select2.min.css?1112') }}" rel="stylesheet" >
  <link href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css?1112') }}" rel="stylesheet" >
    <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Auto Generate Coagulation Comments
                <a class="btn btn-success btn-sm" href=""><i class="fas fa-arrow-left"></i> Go Back </a>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6  d-none d-sm-none d-md-block ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Payments</li>
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
    <form id="form">
    {{ csrf_field() }}
 
<div class="row">
   <div class="col-md-12">
     <h5>Coagulation</h5>
   </div>
</div>
<div class="row">
    <div class="col-md-12">
       <div class="row">
          <div class="col-md-2">
            <label class="form-label">  Result Has Been </label>
          </div>
           <div class="col-md-3">
         <select class="form-control form-select getcode" id="result" name="code">
<option selected disabled hidden>Choose an Option</option>
      @foreach($mydata as $mydatas)
        <option value="{{$mydatas['Testname']}}">{{$mydatas['Testname']}}</option>
@endforeach
   
      </select>
          </div>
        </div>
   


  </div>

</div>
<div class="row mt-3">

  <div class="col-md-12">
    <div class="row ">
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12">
            <label class="form-label">Numeric Results</label>
          </div>
        </div>
           <div class="row mt-3">
          <div class="col-md-4">
            <label class="form-label mt-1">If The Result is:</label>
          </div>
           <div class="col-md-8">
          <select class="form-control form-select" id="selectrange" name="criteria1">
            <option selected hidden disabled>Choose an option</option>
            <option >Present</option>
             <option >Equal To</option>
              <option >Less Than</option>
               <option >Greater Than</option>
                <option >Between</option>
                  <option >Not Between</option>
          </select>
          </div>
        </div>
      </div>
      <div class="col-md-6">
<div class="row mt-4">
  <div class="col-md-6">
    <label class="form-label">  </label>
    <input type="number" name="value0"  class="form-control field1" >
  </div>
    <div class="col-md-6">
    <label class="form-label">  </label>
    <input type="number" name="value1" class="form-control field2">
  </div>
</div>
      </div>


    </div>
          <div class="row mt-3">
          <div class="col-md-12">
            <label class="form-label  ">Alphanumeric Results</label>
          </div>
    
          <div class="col-md-2">
            <label class="form-label  mt-1">If This Result : </label>
          </div>
           <div class="col-md-5">
            <select class="form-control form-select" name="criteria2">
            <option selected hidden disabled>Choose an option</option>
            <option >Start With</option>
             <option >Contain Text</option>
          </select>
           </div>
             <div class="col-md-5">
            <input type="text" name="value2" class="form-control">
           </div>
       
 

      </div>

    <div class="row mt-3">
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12">
            <label class="form-label">Print This Comment (Maximum 95 Char) : </label>
            <textarea name="comment" class="form-control" rows="1" name="comment"></textarea>
          </div>
        </div>
      </div>
      <div class="col-md-6">
      <div class="row">
  <div class="col-md-12">
    <label>This Role is Active Between :</label>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <input type="date" name="startdate" value="{{ Date('Y-m-d')}}"  class="form-control">
  </div>
    <div class="col-md-6">
    <input type="date" name="enddate" value="{{ Date('Y-m-d')}}"  class="form-control">
  </div>
</div>
</div>



    </div>
    <div class="row mt-3 addscroll" >
  <div class="col-md-12" id="myshowtable">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Criteria</th>
          <th>Comment</th>
           <th>Date Start</th>
          <th>Date End</th>
          <th>Action</th>


        </tr>
      </thead>
      <tbody>
         

<?php
if($mydata2[0] !=''){
  foreach($mydata2 as $mydata2s){
?>
 <tr>
          <td><?php echo $mydata2s['Criteria']; ?></td>
           <td><?php echo $mydata2s['Comment']; ?></td>
            <td><?php echo $mydata2s['DateStart']; ?></td>
           <td><?php echo $mydata2s['DateEnd']; ?></td>
            <td><button type="button" title="Delete Clinician" id="<?php echo $mydata2s['ListOrder']; ?>" class="delete btn btn-dark"><i class="bx bx-x-circle"></i>
            </button></td>
            </tr>
<?php
}}else{


?>
           <tr>
               <td>.</td>
           <td>.</td>
            </tr>
<?php
}
?>

   

 

       
       
      </tbody>
    </table>
  </div>
</div>
  </div>
</div>
<div class="row mt-2">
  <div class="col-md-12">
    <button class="btn btn-primary " id="savebtn" type="button">Save</button>
    <button class="btn btn-warning">Cancel</button>

  </div>
</div>

    </form>
                                          


                            </div>
                        </div> 


      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@extends('layouts.footer')
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{asset('plugins/select2.js')}}"></script>
@push('script')

<script type="text/javascript">
$(document).ready(function(){
    data3=@json($mydata3);
    data4=data3[0]['Testname'];
    if(data3 !=''){
 $('#result').select2().val(data4).trigger('change');
    }else{
       $('#result').select2();
    }
   
      // $('#result').select2();
    // $("#result").val(data4).trigger('change');
    // $('#result').val(data4).triiger('change');

  $(".field1").hide();
  $(".field2").hide();
  $("#selectrange").change(function(){

    var selectvalue=$(this).val();
    if(selectvalue == 'Between'){
        $(".field1").show();
        $(".field2").show();
    }else if(selectvalue == 'Equal To'){
        $(".field1").show();
        $(".field2").hide();
    }else if(selectvalue == 'Less Than'){
         $(".field1").show();
        $(".field2").hide();
      }else if(selectvalue == 'Greater Than'){
         $(".field1").show();
        $(".field2").hide();
      }else if(selectvalue == 'Not Between'){
         $(".field1").show();
        $(".field2").show();
      }else{
          $(".field1").hide();
  $(".field2").hide();
      }
  })

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
    }
});

$('.getcode').change(function(){
let  code=$(this).val();
window.location='/ocm/AutoGenerate/'+code;


// $.ajax({
//   url:'/ocm/AutoGenerate/'+code,
//   type:'get'
// }).done(function(response){

  // window.location='';
  // $('#myshowtable').load(window.location.href+"#myshowtable");
  // $("#showtable").reload();
// });

  // const xhttp = new XMLHttpRequest();
  // xhttp.onload = function() {
  //   document.getElementById("showtable").innerHTML = this.responseText;
  // }
  // xhttp.open("GET", "/ocm/Option4/"+selectoption);
  // xhttp.send();

    // document.preventDefault();
  
  });
$("#savebtn").click(function(){
 
  let myform=document.getElementById("form");
  let data = new FormData(myform);
    $.ajax({
                        type: "POST",
                        enctype: 'multipart/form-data',
                        url: '/ocm/AutoCoagulation',
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
                                     window.location='';
                                 

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
    event.preventDefault();
});
$(document).on('click','.delete',function(){
  getlist=$(this).attr('id');
  swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
 $.ajax({
  url:'/ocm/AutoGenerateDel/'+getlist,
  method:'GET'
 }).done(function(response){
 window.location='';
 })
  } 
});


})
$('.getcode').change(function(){
let  code=$(this).val();
window.location='/ocm/AutoCoagulation/'+code;
})

})
</script>
        
@endpush
