@foreach($Order as $key=>$d)
    <tr id="<?php echo md5($d)?>" class="exttable">
  
        <td class="extvalue">
        {{    
$d
}} </td>

     
<td>
 <button  type="button"class="btn btn-danger btn-xs" id="delrow3">
<i class=" fa fa-trash" aria-hidden="true"></i>
</button>
          
 </td>
    </tr>
    @endforeach

