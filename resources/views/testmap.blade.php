<?php
// print_r($agefdays);
$i=1;
// exit(); 
?>

@foreach($agefdays as $a)
<tr>
    <td>
        <input value="{{$i}}"  type= "hidden" id="index">
<?php

$i++;
?>
    </td>

<td >
<input type="hidden" value="{{$a['Code']}}" id="nacode">
        {{$a['Code']}}
    </td>
    <td >
        {{$a['ocmcode']}}
    </td>
    <td >
        <input type="hidden" value="{{$a['AgeFromDays']}}" id="code">
        {{$a['AgeFromDays']}}
    </td>
    
    <td >
        {{$a['AgeToDays']}}
    </td>
    <td >
        
        {{$a['SampleType']}}
    </td>
    <td>
        <button id='check' class="btn btn-primary">Update</button>
    
        <button id='delrow' class="btn btn-danger">Delete</button>
    </td>
    


    </tr>
@endforeach

