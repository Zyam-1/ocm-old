 <?php 
    //   echo '<pre>';
      // print_r($data['array']);


       $tests = $data['array'];
       $requestinfo = $data['array2'][0];
    //    $tests=array_unique($tests);



        foreach($tests as $key => $test){

            ?>
  <tr>

   
    <td> 
        <?=$test['SampleID'];?><input type="text" id="s[]" name="sID[]" value="{{$test['SampleID']}}" class="d-none">
    </td>

    
    <td> 
        <?php echo \App\Http\Controllers\tickets::test($test['SampleID']); ?>
    </td>

     
    <td> 
        <?php echo $requestinfo['PatName']; ?>
    </td>
     
    <td> 
        <?php  $DoB=$requestinfo['DoB'];
        echo date('Y-m-d',strtotime($DoB));
        
        ?>
    </td>


        
    <td> 
    <?php if($requestinfo['Urgent'] == 0){
        echo '<span class="btn btn-success btn-xs"> No </span>';
    }
    else {
        echo '<span class="btn btn-danger btn-xs"> Yes </span>';
    }
     ?>
    </td>

    <td> 
        <input type="datetime-local" id="sdate[]" name="sdate[]" value="<?php echo \Carbon\Carbon::parse($test['SampleDate'])->format('Y-m-d H:i'); ?>">
    </td>

    <td> 
         <input type="datetime-local"id="rdate[]" name="rdate[]" value="<?php echo \Carbon\Carbon::parse($test['recevieddate'])->format('Y-m-d H:i');?>">
    </td>

 <td>
 <button  class="btn btn-danger" id="delrow">
<i class=" fa fa-trash" aria-hidden="true"></i>
</button>
          
 </td>

</tr>
  
<?php

        }
        ?>


        


   

          
