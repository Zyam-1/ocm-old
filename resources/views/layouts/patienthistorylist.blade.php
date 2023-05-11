<?php 
  if($data['flags'] > 0) { ?>

    <h5 class="bg-light p-3">
  Abnormal Results Shown 
  <button class="btn btn-danger">HIGH</button> 
  <button class="btn btn-info">LOW</button>
</h5>

  <?php } ?>



<?php  if(count($data['samplesinfo']) > 0) { ?>
<table id="table" class="table mb-0 table-striped">
                                  
<thead class="bg-secondary">
  <tr>
    
    
    <td class="text-center">
      Sample<br> Date<br> Time
    </td>

     @foreach ($data['samplesinfo'] as $sampleinfo)
     <td class="text-center sampleID" data="{{$sampleinfo['SampleDate']}}"> 

  
         <?php  $date= htmlspecialchars_decode(date('d-m-Y', strtotime($sampleinfo['SampleDate']))); ?>

          <?php  $time= htmlspecialchars_decode(date('H:s:i', strtotime($sampleinfo['SampleDate']))); ?>


        
              {{$sampleinfo['SampleID']}}
              <br>
              {{$date}}
              <br>
              {{$time}}  
           

     </td>
     @endforeach

 
  </tr>
</thead> 

<tbody>

       @foreach ($data['codes'] as $key => $code)
        <tr>
      
       <td class="text-center">
          
          <button class="btn btn-primary btn-block btn-xs viewPatientHistoryChart" id="{{$code}} ">
             {{$data['shortnames'][$key]}} 
          </button>
        
          <?php 

            $url = url()->full();
            $len = strpos($url,"&mrn=");
            $mrn = substr($url,$len+5);
            

          ?>

       </td>

           
            @foreach ($data['samplesinfo'] as $sampleinfo)
            <td class="text-center sampleID  flag{{\App\Http\Controllers\patients::GetResult2($code, $sampleinfo['SampleID'],$mrn)}}" > 
           
                    {{\App\Http\Controllers\patients::GetResult($code, $sampleinfo['SampleID'],$mrn)}}


            </td>
            @endforeach


        </tr>
       @endforeach



</tbody>

</table> 
<?php }  else {

  echo '<h1>No Results Found!</h1>';

}?>