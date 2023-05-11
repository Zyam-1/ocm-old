@include('layouts.header')
 
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
            <h1 class="m-0">Organism Name 
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
    <div class="row">
    <div class="col-md-12">
                  <label class="form-label mb-0" for="org">ORG Name</label>
                  <select id="org" class="select form-control organismname" name="orgname">

                                    <option value="0" selected disabled hidden>Select option</option>
                                    @foreach($data as $datas)
                                    <option value="{{$datas['Name']}}">{{$datas['Name']}}</option>
                                    @endforeach

                </select>  
    </div>  
    </div>  
        <div class="row pt-2">
    <div class="col-md-12">
    
    <label class="form-label mb-0" for="site">Site</label>
    
    <select id="site" class="select form-control" name="site"> 

    <?php
if(count($site) > 0){
  foreach($site as $sites){
    ?>
                  <option value="1"><?php echo $sites['Site']; ?></option>

  <?php
}
}else{
                  ?>
              <option  selected disabled hidden>Select Option</option>
                  <?php
}
                  ?>
             
    </select>  
    </div>  
    </div>
            <div class="row pt-2">
    <div class="col-md-12">
                        <label class="form-label mb-0" for="loc">Location</label>
                    <select id="loc" class="select form-control" name="location">

    <?php if(count($location)>0){ 
      foreach($location as $locations){
     ?>
      <option><?php echo $locations['Location']; ?></option>

      <?php }
    }else { ?>

 <option selected disabled hidden>Select Option</option>
<?php } ?>

                       
                  </select>  
    </div>  
    </div>
    <div class="row pt-2">
    <div class="col-md-12">
                      <label class="form-label mb-0" for="comments">Comments (max 400 characters) </label> 
                      <textarea name="comment" class="form-control" rows="3" name="comment"></textarea> 
    </div>  
    </div>
    </div> 
    <div class="col-md-6">
    <div class="row">
    <div class="col-md-12">
                      <label class="form-label mb-0 ">Age/Days</label>  
    <div class="row">
    <div class="col-md-6">
                      <input type="number" name="agefrom" class="form-control" placeholder="From"> 
    </div>  
    <div class="col-md-6"> 
                      <input type="number" name="ageto" class="form-control" placeholder="To"> 
    </div> 
    </div>
    </div>  
    </div>
                      <label class="form-label mb-0">(This Rule Is Active Between)</label> 
    <div class="row">
    <div class="col-md-6">
<div class="form-outline datepicker w-100">
                      <label for="from" class="form-label mb-0">From</label>
<div>
                      <input type="date" name="activefrom" class="form-control">
</div>
</div>    
</div>  
 <div class="col-md-6">
<div class="form-outline datepicker w-100">
                      <label for="to" class="form-label mb-0">To</label>
<div>
                      <input type="date" name="activeto" class="form-control">
</div>
</div>    
</div>
    </div> 
    <div class="form-check form-check-inline mt-3">
                      <input class="form-check-input" type="checkbox" name="phone" id="phone"value="option1"  />
                      <label class="form-check-label" for="phone">Phone Alert</label>
</div>
<div class="row">
 <div class="col-md-6">
<div class="form-outline datepicker w-100 mt-3">
                      <label for="to" class="form-label mb-0">Scheduled Date</label>
<div>
                      <input type="date" name="scheduleddate" class="form-control">
</div>
</div>    
</div>  
</div>
<div class="buttons mt-2">
                <button class="btn btn-primary mysave" type="button">Save</button>  
                <button class="btn btn-success">Reset</button>  
</div>
    </div>                        
    </div>
        <div class="row pt-3">
<div class="col-md-12">
                      <table class="table table-striped"  >
                    <thead>
                      <tr>
                        <th scope="col">Orgnsm Name</th>
                        <th scope="col">Site</th>
                        <th scope="col">Pat.Loc</th>
                        <th scope="col">Age From</th>
                        <th scope="col">Age To</th>
                        <th scope="col">Date start</th>
                        <th scope="col">Date End</th>
                        <th scope="col">Comment</th>
                        <th scope="col">Phone alrt</th>
                        <th scope="col">Sched Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>.......</td>
                        <td>.......</td>
                        <td>.......</td>
                        <td>.......</td>
                        <td>.......</td>
                        <td>.......</td>
                        <td>.......</td>
                        <td>.......</td>
                        <td>.......</td>
                        <td>.......</td>
                      </tr>
                      <tr>
                        <td>.......</td>
                        <td>.......</td>
                        <td>.......</td>
                        <td>.......</td>
                        <td>.......</td>
                        <td>.......</td>
                        <td>.......</td>
                        <td>.......</td>
                        <td>.......</td>
                        <td>.......</td>
                      </tr>
                    </tbody>
                  </table>    
</div>    
    
</div>
<div class="buttons1 mt-3">
<button class="btn btn-primary">Edit</button>
<button class="btn btn-success">Exit</button>  
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

<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/select2.js') }}"></script>

<script type="text/javascript">
$(document).ready(function(){
   $('.organismname').select2();
  $('.organismname').select2();
  $('.mysave').click(function(){
    let form=document.getElementById('form');
    let data=new FormData(form);
    $.ajax({
      url:'{{route('OrgName')}}',
      data:data,
      type:'post',
      cache:false,
      processData:false,
      contentType:false,
    }).done(function(response){
      console.log(1);
    })
    event.preventDefault();
  })
})
</script>
        
@endpush
