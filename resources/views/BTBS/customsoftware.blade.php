@include('layouts.header')
<style >

.collapse2 table {
 overflow:hidden;

}
.bodyscrol{
  overflow: hidden;

}
.form-check-input{
  position: static!important;
}
.collapse1{
overflow-y:scroll;
height:150px;
}
table{
  height:150px;
}
thead{
  position:sticky;
  top:0;
  z-index:1;
}
label{
  margin-top:0.3rem;
}


</style>
<?php
$analyser=$data['analyser'];
?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Net Acquire Dashboard
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
        <form id="form" >
                                       {{ csrf_field() }}
                                                 
                         <div class="card card-primary card-outline">
                            <div class="card-body ">  
                 <div class="col-md-12">
                   
                 </div>           
          
      <div style="display:flex;width; justify-content:space-between" >
      
        <h4>Outstanding
     
        <h4>Add Ons</h4>
      <h4>Others</h4></div>
                                    
                                   
                     

                 <div class="row ">
                   <div class="col-md-4">
                
                         <div class="row ">
                          
                        <label class="form-label"
                        >BIO</label>
                       <div class="col-md-12 collapse1">
                       <table class="table table-striped" id="bio">
                         <thead>
                           <tr>
                            <th>Analyser</th>
                             <th>Sample</th>
                             
                             <th>Date</th>
                            
                           </tr>
                         </thead>
                         <tbody>
                          @foreach($data['bio'] as $key=>$b)
                          <tr>
                            @if($analyser[$key]!="")
                          <td>{{$analyser[$key]}}</td>
                          @else
                          <td>-</td>
                          @endif
                         <td> <input class="item" type="hidden" value="{{$b['SampleID']}}">{{$b['SampleID']}}</td>
                           <td>{{$b['SampleDate']}}</td>
                          
                          </tr>
                          @endforeach
                         </tbody>
                       </table>
                       </div>

                        <label class="form-label">HEAM</label>
                     <div class="col-md-12   collapse1">
                        <div class="">
                                <table class="table table-striped">
                         <thead>
                           <tr>
                             <th>Sample ID</th>
                             <th>Date</th>
                           </tr>
                         </thead>
                         <tbody>
                         @foreach($data['haem'] as $out) 
                         <tr>
                            
                            <td>{{$out['SampleID']}}</td>
                            <td>{{$out['SampleDate']}}</td>
                          </tr>
                          @endforeach
                         </tbody>
                       </table> 
                        </div>
                
                       </div>
                       
                       <label class="form-label ">COAG</label>
                      <div class="col-md-12 ">
                        <div class="collapse1">
                                <table  class="table table-striped">
                         <thead>
                           <tr>
                             <th>Sample ID</th>
                             <th>Date</th>
                           </tr>
                         </thead>
                         <tbody>
                         @foreach($data['coag'] as $out) 
                         <tr>
                            
                            <td>{{$out['SampleID']}}</td>
                            <td>{{$out['SampleDate']}}</td>
                          </tr>
                          @endforeach
                         </tbody>
                       </table>
                        </div>
                  
                       </div>
                       
                       <label class="form-label "style="margin-top:1.3rem">Micro Biology</label>

                       <div class="col-md-12 ">
                       <div class="collapse1">
                       <table  class="table table-striped">

                         <thead>
                           <tr>
                             <th>Sample ID</th>
                             <th>Date</th>
                           </tr>
                         </thead>
                             
                         <tbody >
                          @foreach($data['external3'] as $extoptions)
                          <tr>
                            <td>{{$extoptions['SampleID']}}</td>
                            <td>{{$extoptions['SampleDate']}}</td>
                          </tr>
                          @endforeach
                         </tbody>
                        
                       </table> 
                        </div>
                        
            
                       </div>
                     </div>
                   </div>
                     <div class="  col-md-4 ">
                       
                     <label class="form-label"> BIO</label>
                      <div class="col-md-12   collapse1 ">
                        <div class="">
                                  <table  class="table table-striped">
                         <thead>
                           <tr>
                             <th>Sample ID</th>
                             <th>Sample Date</th>
                           </tr>
                         </thead>
                         <tbody>
                          @foreach($data['bioaddons'] as $b)
                          <tr>
                            <td>{{$b['SampleID']}}</td>
                            <td>{{$b['SampleDate']}}</td>
                          </tr>
                          @endforeach
                         </tbody>
                       </table>
                        </div>
               
                       </div>
                       
                      <label class="form-label">HEAM</label>
                      <div class="col-md-12  collapse1">
                       <table class="table table-striped">
                         <thead>
                           <tr>
                             <th>Sample ID</th>
                             <th>Sample Date</th>
                           </tr>
                         </thead>
                         <tbody>
                         
                         @foreach($data['haemaddons'] as $b)
                          <tr>
                            <td>{{$b['SampleID']}}</td>
                            <td>{{$b['SampleDate']}}</td>
                          </tr>
                          @endforeach
                         </tbody>
                       </table>
                       </div>
                       
                       <label class="form-label">COAG</label>
                        <div class="col-md-12  ">
                       <table class="table table-striped">
                         <thead>
                           <tr>
                             <th>Sample ID</th>
                             <th>Sample Date</th>
                           </tr>
                         </thead>
                         <tbody>
                         
                         @foreach($data['coagaddons'] as $b)
                          <tr>
                            <td>{{$b['SampleID']}}</td>
                            <td>{{$b['SampleDate']}}</td>
                          </tr>
                          @endforeach
                         </tbody>
                       </table>
                       </div>
                       
                       <label class="form-label">External</label>
                      <div class="col-md-12 ">
                        <div class="collapse1">
                                <table class="table table-striped">
                         <thead>
                           <tr>
                             <th>Sample ID</th>
                             <th>Sample Date</th>
                           </tr>
                         </thead>
                         <tbody>
                          @foreach($data['addons4'] as $extaddons)
                          <tr>
                            <td>{{$extaddons['SampleID']}}</td>
                            <td>{{$extaddons['SampleDate']}}</td>
                          </tr>
                          @endforeach
                         </tbody>
                       </table> 
                        </div>
                
                       </div>
                   </div>
                   <div class="col-md-4 ">

                   <label class="form-label">Not Validated</label>
                   <div class="col-md-12 collapse1">
<table class="table table-striped">
 <thead>
   <tr>
    <th>Analyser</th>
     <th >Sample ID</th>
      <th >Dept</th>

   </tr>
 </thead>
 <tbody>
  @foreach($data['biovalid'] as $bio)
  <tr>
  @if($bio['Analyser']!="")
  <td>{{$bio['Analyser']}}</td>
  @else
  <td>-</td>
  @endif
  <td>{{$bio['SampleID']}}</td>
   <td>{{$bio['DepartmentID']}}</td>
    
  </tr>
  @endforeach
  @foreach($data['coagvalid'] as $coag)
  <tr>@if($coag['Analyser']!="")
  <td>{{$coag['Analyser']}}</td>
  @else
  <td>-</td>
  @endif
    <td>{{$coag['SampleID']}}</td>
    <td>{{$coag['DepartmentID']}}</td>
  </tr>
  @endforeach
  @foreach($data['haemvalid'] as $haem)
  <tr>
  @if($haem['Analyser']!="")
  <td>{{$haem['Analyser']}}</td>
  @else
  <td>-</td>
  @endif  
  <td>{{$haem['SampleID']}}</td>
    <td>{{$haem['DepartmentID']}}</td>
  </tr>
  @endforeach
 </tbody>
</table>
</div>
<label class="form-label">Not Printed</label>

<div class="  collapse1">
<table class="table table-striped">
 <thead>
   <tr>
    <th>Analyser</th>
     <th>Sample ID</th>
      <th>Dept</th>
   </tr>
 </thead>
 <tbody>
 @foreach($data['biop'] as $bio)
 <tr>
  @if($bio['Analyser']!="")
  <td>{{$bio['Analyser']}}</td>
  @else
  <td>-</td>
  @endif
  <td>{{$bio['SampleID']}}</td>
   <td>{{$bio['DepartmentID']}}</td>
    
  </tr>
  @endforeach


  @foreach($data['coagp'] as $coag)
  <tr>@if($coag['Analyser']!="")
  <td>{{$coag['Analyser']}}</td>
  @else
  <td>-</td>
  @endif
    <td>{{$coag['SampleID']}}</td>
    <td>{{$coag['DepartmentID']}}</td>
  </tr>
  @endforeach




  @foreach($data['haemp'] as $haem)

    <tr>
  @if($haem['Analyser']!="")
  <td>{{$haem['Analyser']}}</td>
  @else
  <td>-</td>
  @endif  
  <td>{{$haem['SampleID']}}</td>
    <td>{{$haem['DepartmentID']}}</td>
  </tr>
  @endforeach
 </tbody>
</table>
</div>
                 <label class="form-label">Urgent Samples </label>
<div class=" collapse1  ">
<table class="table table-striped" >
                         <thead>
                           <tr>
                             <th>Sample ID</th>
                             <th>H</th>
                             <th>B</th>
                             <th>C</th>
                             <th>E</th>
                            
                        
                           </tr>
                         </thead>
                         <tbody class="" >
                          @foreach($data['urgent'] as $urgentopt)
                          <tr>
                            <td>{{$urgentopt['SampleID']}}</td>
                           
                            <td><input type="checkbox" name="H" class="form-check-input" <?php if($urgentopt['DepartmentID']=='Haem'){ echo 'checked' ;}?>></td>
                            <td><input type="checkbox" name="B" class="form-check-input" <?php if($urgentopt['DepartmentID']=='Bio'){ echo 'checked' ;}?>></td>
                            <td><input type="checkbox" name="C" class="form-check-input" <?php if($urgentopt['DepartmentID']=='Coag'){ echo 'checked' ;}?>></td>
                            <td><input type="checkbox" name="E" class="form-check-input" <?php if($urgentopt['external_']==1){ echo 'checked' ;}?> ></td>
                           
                          </tr>
                          @endforeach
                         </tbody>
                       </table>
               </div>   
               
           <label class="form-label mt-4">Phone Alerts</label>
               <div class="collapse1 ">
           <div class="">
           <table class="table table-striped">
<thead>
  <tr>
    <th>Sample ID</th>
    <th>Parameter</th>
    <th>Ward</th>
  </tr>
</thead>
<tbody>
 <tr>
 </tr>
</tbody>
</table>  
           </div>

        </div>       
</div>           

</form>       
              

                     
</div>
               
</div>               
</div>               
</div>          


      
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>



@extends('layouts.footer')

@push('script')
<script>

$(document).ready(function(){

$("#placeorder").on('click',function(){
// alert("s");
// var $chkboxes = $('#bio').find("tr input[type='checkbox']:checked");
// var checkBoxVals = $chkboxes.map(function(){alert( $(this).val()); }).toArray();
// var row = $(this).parent().parent();
//    var rowcells = row.find('td');


var $chkboxes = $('#bio').find("tr input[type='checkbox']:checked");
// console.log($chkboxes);
var checkBoxVals = $chkboxes.map(function(){

  var row = jQuery(this).closest('tr');//your nearest row for the check box
var x=[];

var i=0;
$(row).each(function(){
    //get all data using the id and use/store it
 x[i]=$(this).find(".item").val();
i++;

});

return x;
});
// var result = Object.keys(checkBoxVals).map((key) => [Number(key), checkBoxVals[key]]);
// var result=Object.values(checkBoxVals);
// console.log(checkBoxVals);
var s=[];
for(z=0;z<checkBoxVals.length;z++){
  s+=checkBoxVals[z]+",";
}


console.log(s);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    url: "{{ route('Scan') }}",
   method: 'POST', 
   data : {
sid:s
}

 }).done(function(response){
window.location="/ocm/Scan/"+s;



    }).fail(function (jqXHR, textStatus, errorThrown) {
    // Request failed. Show error message to user. 
    // errorThrown has error message.
    Lobibox.notify('warning', {
                                pauseDelayOnHover: true,
                                continueDelayOnInactiveTab: false,
                                position: 'top right',
                                msg: "Sample# does not exist",
                                icon: 'bx bx-info-circle'
                            });

});


});
});

</script>

@endpush