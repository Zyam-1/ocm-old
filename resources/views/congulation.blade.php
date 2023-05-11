@include('layouts.header')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Congulation Comment 
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
    <form id="formcoag">
    {{ csrf_field() }}
    <h6>Congulation Comments</h6>
    <div class="row">    
    <div class="col-md-6">
    <label class="form-label mb-0 mt-2" for="comment">Comment Template Name</label>

   

<select id="comment" name="commentid" class="select form-control mt-2">

<option selected disabled hidden>Choose An Option</option>

<?php if(count($coagtemp) > 0){ ?>

  @foreach($coagtemp as $coag)

<option value="{{$coag['CommentID']}}" id="coagcom">{{$coag['CommentName']}}</option>

@endforeach


<?php } ?>

</select>   
    </div>                        
    </div>
    <p class="mt-2">(type in name of comment template or select from dropdown list)</p>
        <div class="form-check form-check-inline">
<input class="form-check-input myCheckbox" type="checkbox" name="inactive" id="inactive" value="1"/>
<label class="form-check-label" for="inactive" >Inactive</label>
</div>
    <div class="row pt-2">
    <div class="col-md-12">
      <label class="form-label mb-0 mt-2">Comment Template</label>
    <textarea name="Comment Template" id="commenttemplate" class="form-control mt-2" rows="5"></textarea>  
    </div>  
    </div>
    <div class="buttons mt-3">
    <button class="btn btn-primary" id = "savebtn">Save</button>
    <button class="btn btn-warning">Clear</button> 
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

<script type="text/javascript">



$(document).ready(function() { 



  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    


$('#comment').change(function(){

  var comment = $('#comment').find(":selected").text();
  // var comment = $('#coagcom').val();
  

 $.ajax({
        url: "{{route('CoagulationTmpid')}}",
        type: 'post',
      
        data: {
          comment:comment
             },

        }).done(function (response) {

          
          var newcom = response.commenttemp;
          $("#commenttemplate").val(newcom);

      
          var checkact = response.checkactive;
          if(checkact == 1){
            $('.myCheckbox')[0].checked = true;
          }
          else {
            $('.myCheckbox')[0].checked = false;
          }

         

                // window.location="{{route('Results')}}/Demographics/"+sampleid2;
                    
        });
        event.preventDefault();
}); 




$('#savebtn').click(function(){

// Get form
var form = $('#formcoag')[0];

// Create an FormData object
var data = new FormData(form);



$.ajax({
type: "POST",
enctype: 'multipart/form-data',
url: "{{ route('CoagulationTmpsave') }}",
data: data,

processData: false,
contentType: false,
cache: false,
timeout: 600000,
success: function(response) {


console.log(response.success);


                                         Lobibox.notify('success', {
                                                pauseDelayOnHover: true,
                                                continueDelayOnInactiveTab: false,
                                                position: 'top right',
                                                msg: 'Data Updated',
                                                icon: 'bx bx-info-circle'
                                            });
                                  
                                            return false;
                                       

}
});    
//stop submit the form, we will post it manually.
event.preventDefault();

});


});



</script>
        
@endpush
