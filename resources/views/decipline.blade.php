@include('layouts.header')
  <style >
    .btnstyle:hover{
background-color:#0D47A1 ;
color: white;
    }
  </style>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Phone Alert
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
    <div class="col-md-6">
    <label class="form-label mb-0" for="decipline">Decipline</label>
    <select id="decipline" class="select form-control" name="descipline">
      <?php
       if($mydata[0]!=''){
      ?>
      <option selected  hidden>{{$mydata[0]['Discipline']}}</option>
      <?php
}else{
      ?>
      <option selected disabled hidden>Choose an Option</option>
      <?php
}
      ?>
    
    <option value="Haematology">Haematology</option>
    <option value="Biochemistry">Biochemistry</option>
    <option value="Coagulation">Coagulation</option>


    </select>  
    </div> 
    <div class="col-md-6" id="changedata">
    <div class="row">
    <div class="col-md-12">
    <label class="form-label mb-0">(must be phoned if the result is)</label> 
    <div class="row">
    <div class="col-md-6">
    <input type="text" name="must" class="form-control" placeholder=">">   
    </div> 
    <div class="col-md-6">
    <input type="text" name="be" class="form-control" placeholder="or <">   
    </div> 
    </div> 
    </div>  
    </div>  
    </div>                       
    </div>
    <div class="row pt-3">
    <div class="col-md-12">
      <?php
        if($mydata[0]!=''){
          foreach($mydata as $mydatas){
      ?>
  
    <button class="btn w-100 getparams btnstyle text-left" id="{{$mydatas['Parameter']}}" type="submit">{{$mydatas['Parameter']}}</button>
   
    <?php
} }else{
    ?>
     
    <?php
}
    ?>
    </div>  
    </div>
    <div class="buttons pt-3">
    <button class="btn btn-success savebtn" type="button">Save</button>  
    <button class="btn btn-warning">Cancel</button>  
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

@push('script')

<script type="text/javascript">
$(document).ready(function(){

  $("#decipline").change(function(){
    id=$(this).val();
    $.ajax({
      url:'/ocm/PhoneAlert/'+id,
      method:'get'
    }).done(function(response){
          window.location="/ocm/PhoneAlert/"+id;
    });

  });
  $(document).on('click','.getparams',function(){
    params=$(this).attr('id');

  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("changedata").innerHTML = this.responseText;
    }
  xhttp.open("GET", "/ocm/Phonelevel/"+params, true);
  xhttp.send();
   event.preventDefault();
  })
$(".savebtn").click(function(){
  let myform=document.getElementById("form");
  let data = new FormData(myform);
    $.ajax({
                        type: "POST",
                        enctype: 'multipart/form-data',
                        url: '/ocm/PhoneAlert',
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
})

});
</script>
        
@endpush
